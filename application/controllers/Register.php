<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Register extends CI_Controller {
	
	public function pay()
	{
		// echo '<pre>';print_r($_POST);die();
		$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		/**
		 * You can calculate payment amount as per your logic
		 * Always set the amount from backend for security reasons
		 */
		$_SESSION['payable_amount'] = $_POST['amount'];

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' => 1 // auto capture
		));


		$amount = $razorpayOrder['amount'];

		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');

		$razorpayOrderId = $razorpayOrder['id'];


		$_SESSION['razorpay_order_id'] = $razorpayOrderId;

		$data = $this->prepareData($amount,$name,$email,$contact,$razorpayOrderId);

		$this->load->view('front/payment/rezorpay',array('data' => $data));
	}

	/**
	 * This function verifies the payment,after successful payment
	 */
	public function verify()
	{
		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		try {
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);
				$this->session->set_userdata($attributes);
				$api->utility->verifyPaymentSignature($attributes);
			} catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
			/**
			 * Call this function from where ever you want
			 * to save save data before of after the payment
			 */
			$this->setRegistrationData();

			redirect(base_url().'register/success');
		}
		else {
			redirect(base_url().'register/paymentFailed');
		}
	}

	/**
	 * This function preprares payment parameters
	 * @param $amount
	 * @param $razorpayOrderId
	 * @return array
	 */
	public function prepareData($amount,$name,$email,$contact,$razorpayOrderId)
	{
		$data = array(
			"key" => RAZOR_KEY,
			"amount" => $amount,
			"name" => "Coding Birds Online",
			"description" => "Learn To Code",
			"image" => "https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png",
			"prefill" => array(
				"name"  => $name,
				"email"  => $email,
				"contact" => $contact,
			),
			"notes"  => array(
				"address"  => "Hello World",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#F37254"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	/**
	 * This function saves your form data to session,
	 * After successfull payment you can save it to database
	 */
	public function setRegistrationData()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$amount = $_SESSION['payable_amount'];

		$registrationData = array(
			'order_id' => $_SESSION['razorpay_order_id'],
			'name' => $name,
			'email' => $email,
			'contact' => $contact,
			'amount' => $amount,
		);
		// save this to database

	}

	/**
	 * This is a function called when payment successfull,
	 * and shows the success message
	 */
	public function success()
	{
		if (!empty($this->session->userdata('id')))
		{
    		$this->load->model('home_model');
    		$this->load->model('global_model');
			$data=array();
			$data['first_name']=$this->session->userdata('first_name');
			$first_name=$this->session->userdata('first_name');
			$data['last_name']=$this->session->userdata('last_name');
			$last_name=$this->session->userdata('last_name');
			$data['address']=$this->session->userdata('address');
			$data['address_optional']=!empty($this->session->userdata('arrive_date'))?$this->session->userdata('arrive_date'):'0';
			$data['city']=$this->session->userdata('city');
			$data['country']=$this->session->userdata('country');
			$data['email']=$this->session->userdata('email');
			$to_email=$this->session->userdata('email');
			$data['phone']=$this->session->userdata('phone');
			$data['other_notes']=!empty($this->session->userdata('other_notes'))?$this->session->userdata('other_notes'):'0';

			$data['arrive_date']=$this->session->userdata('arrive_date');
			$start_date=date('d-m-Y', strtotime($data['arrive_date']));
			$data['checkout_date']=$this->session->userdata('checkout_date');
			$end_date=date('d-m-Y', strtotime($data['checkout_date']));
			$data['adult']=$this->session->userdata('adult');
			$data['child']=$this->session->userdata('child');
			$data['hotel_id']=$this->session->userdata('hotel_id');
			$data['room_id']=$this->session->userdata('room_id');
			$data['rooms']=!empty($this->session->userdata('rooms'))?$this->session->userdata('rooms'):'0';
			$rooms=!empty($this->session->userdata('rooms'))?$this->session->userdata('rooms'):'0';
			$data['user_id']=$this->session->userdata('user_id');
			$data['payment_id']=$this->session->userdata('razorpay_payment_id');
			$data['order_id']=$_SESSION['razorpay_order_id'];
			$order_id=$_SESSION['razorpay_order_id'];
			$data['payment_amount']=$_SESSION['payable_amount'];
			$payment_amount=$_SESSION['payable_amount'];
			/*$data['email_payment']=$_POST['email'];
			$data['payment_contact']=$_POST['contact'];*/


			if (!empty($this->session->userdata('arrive_date')) && !empty($this->session->userdata('checkout_date'))) 
			{

				$dates1 = new DateTime($start_date);
				$dates2 = new DateTime($end_date);
				$diff = $dates1->diff($dates2);
				$days=$diff->days;
				$start_day=date('d-m-Y',strtotime($start_date));
				// echo "<pre>";print_r($diff->days);die;
				for ($iDay = 0; $iDay <= $days; $iDay++) 
				{
		   			$aDays[1 + $iDay]['b_date'] = date('d-m-Y', strtotime($start_day. ' + '.$iDay.' days'));
				} 

				// echo "<pre>";print_r($aDays);die;
				// $i=0;
				foreach ($aDays as $datebyday) 
				{
					$valdate=$this->db->where('room_id', $this->session->userdata('room_id'))->where('booked', '0')->where('b_date',$datebyday['b_date'])->get('room_allot')->row();
					if (!empty($valdate))
					{
						$rooms_count=$valdate->no_of_rooms-$rooms;
				    	$this->db->set('no_of_rooms', $rooms_count)->where('room_id', $this->session->userdata('room_id'))->where('b_date',$datebyday['b_date'])->update('room_allot');

					}
					// $i++;
				}
				// echo "<pre>";print_r($valdate);die;

	        	if($this->home_model->insbooking($data))
	        	{
					// echo "Booking Successfully";
					$subject = "Welcome to Hotel Booking System";
					$message = "<!DOCTYPE html>
						<html>
						<head>
							<title>Welcome to Hotel Booking System</title>
						</head>
						<body>
							<h3>Name ".$first_name."&nbsp".$last_name." ,</h3>
							<h5>Arrival Date: ".$start_date."</h5>
							<h5>Checkout Date: ".$end_date."</h5>
							<h5>No of Room: ".$rooms."</h5>
							<h5>Order ID: ".$order_id."</h5>
							<h5>Price: ".$payment_amount."</h5>
							<h5>Thank You</h5>
							<h5>Hotel Team</h5>
						</body>
						</html>
					";

					$subject1 = "Welcome to Hotel Booking System";
					$message1 = "<!DOCTYPE html>
						<html>
						<head>
							<title>Welcome to Hotel Booking System</title>
						</head>
						<body>
							<h5>Dear ".$first_name."</h5>
							<h5>We are glad to approve your Bookings.</h5>
							<h5>Order ID: ".$order_id."</h5>
							<h5>Thanks for booking, You have Successfully Payment of Rs: ".$payment_amount."</h5>
							<h5>Thank You</h5>
							<h5>Hotel Team</h5>
						</body>
						</html>
					";
					$this->global_model->email_massage_new($to_email,$message1,$subject1);
					$this->global_model->email_massage($to_email,$message,$subject);
					$this->session->set_flashdata('message','Booking Successfully');
					$this->session->set_flashdata('message_status',1);
	        	}
	        	else
	        	{
					// echo "Booking Unsuccessfully";
					$this->session->set_flashdata('message','Booking Unsuccessfully');
					$this->session->set_flashdata('message_status',0);
	        	}
					
				
					/*else
					{
						$this->db->set('booked', '1')->where('room_id', $this->session->userdata('room_id'))->where("`b_date` BETWEEN '".$start_date."' AND '".$end_date."'")->update('room_allot');
					}*/
				//}
			}
			else
			{
				// echo "Pls choose others date";
				$this->session->set_flashdata('message','Please choose others date');
				$this->session->set_flashdata('message_status',0);
			}
		}
		else
		{
			// $this->session->set_flashdata('failure', 'Invalid Username and Password');
			echo"<script>location.href='".base_url('home/login')."';</script>";
            // echo "Please Do Login To Book Your Room. <a href=".base_url()."home/login".">Click Here</a>";
		}

		redirect('home/thank_you');

	}

	public function thank_you()
	{
		$this->load->view('front/payment/success');
	}
	/**
	 * This is a function called when payment failed,
	 * and shows the error message
	 */
	public function paymentFailed()
	{
		$this->load->view('front/payment/error');
	}
}
