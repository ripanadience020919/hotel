<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('admin_model');
        $this->load->model('global_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $action = $this->uri->segment(2);
        $newdata = array(
            'action' => $action,
        );
        $this->session->set_userdata($newdata);
        $data['list1'] = $this->home_model->locationsSrc();

        $data['list2'] = $this->home_model->metasrc();
        $data['list3'] = $this->admin_model->gallery_list();
        $data['about_us'] = $this->admin_model->fetchaboutdetails();
        $data['banner'] = $this->admin_model->banner_list();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();

        $data['testi'] = $this->admin_model->testi_list();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/home', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function about()
    {
        $data['title'] = 'About';
        $action = $this->uri->segment(2);
        $newdata = array(
            'action' => $action,
        );
        $this->session->set_userdata($newdata);
        $data['list2'] = $this->home_model->metasrc();
        $data['about_us'] = $this->admin_model->fetchaboutdetails();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();

        $data['stats'] = $this->db->where('id', 1)->get('statistics')->row_array();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/about', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function rate()
    {
        $check = $this->home_model->get_hotels();
        if (!empty($check)) {
            $data['check'] = $check;
        }
        $data['title'] = 'Room & Rate';
        $action = $this->uri->segment(2);
        $newdata = array(
            'action' => $action,
        );
        $this->session->set_userdata($newdata);
        $data['list2'] = $this->home_model->metasrc();
        $data['rate'] = $this->admin_model->fetchroomratedetails();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/room_rate', $data);
        $this->load->view('front/inc/footer', $data);
    }

    /*public function room_details()
    {
    $data['title'] = 'Room Details';
    $action = $this->uri->segment(2);
    $id = $this->uri->segment('3');
    $hotel=get_perticular_field_value('roomm','location'," and `id`='".$id."'");
    $data['hotel_location'] = get_perticular_field_value('locations','l_name'," and `id`='".$hotel."'");
    $rooms1 = get_perticular_field_value('roomm','room_type'," and `id`='".$id."'");
    $data['rooms2'] = get_perticular_field_value('rooms','r_type'," and `id`='".$rooms1."'");
    $newdata = array(
    'action'  => $action.'/'.$id
    );
    $this->session->set_userdata($newdata);
    $data['list'] = $this->admin_model->roomSrcbyID($id);
    $data['list3'] = $this->admin_model->roomSrcnotbyID($id);
    // echo "<pre>";print_r($data['list3']);die;
    $data['list2'] = $this->home_model->metasrc();

    $this->load->view('front/inc/header',$data);
    $this->load->view('front/room_details',$data);
    $this->load->view('front/inc/footer');
    }*/

    public function room_details()
    {
        $data['title'] = 'Room Details';
        $action = $this->uri->segment(2);
        $id = $this->uri->segment('3');
        $hotel = get_perticular_field_value('roomm', 'location', " and `id`='" . $id . "'");
        $data['hotel_location'] = get_perticular_field_value('locations', 'l_name', " and `id`='" . $hotel . "'");

        $h_name = get_perticular_field_value('roomm', 'hotel_name', " and `id`='" . $id . "'");
        $data['hotel_name'] = get_perticular_field_value('hotels', 'name', " and `id`='" . $h_name . "'");
        $rooms1 = get_perticular_field_value('roomm', 'room_type', " and `id`='" . $id . "'");
        $data['rooms2'] = get_perticular_field_value('rooms', 'r_type', " and `id`='" . $rooms1 . "'");
        $newdata = array(
            'action' => $action . '/' . $id,
        );
        $this->session->set_userdata($newdata);
        $data['list'] = $this->admin_model->roomSrcbyID($id);
        $data['list3'] = $this->admin_model->roomSrcnotbyID($id, $h_name);
        // $data['list3'] = $this->home_model->roomSrcnotbyID1($id,$h_name);
        // echo "<pre>";print_r($data['list3']);die;
        $data['list2'] = $this->home_model->metasrc();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/room_details', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function hotel_details()
    {
        $data['title'] = 'List Of Hotels';
        $action = $this->uri->segment(2);
        $id = $this->uri->segment('3');
        $data['location'] = get_perticular_field_value('locations', 'l_name', " and `id`='" . $id . "'");
        $newdata = array(
            'action' => $action . '/' . $id,
        );
        $this->session->set_userdata($newdata);
        $data['list'] = $this->admin_model->hotelsSrcbyID($id);
        $data['list2'] = $this->home_model->metasrc();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/hotel_details', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function hotel_detail()
    {
        $data['title'] = 'List Of Hotels';
        $action = $this->uri->segment(2);
        $id = $this->uri->segment('3');
        $data['location'] = get_perticular_field_value('locations', 'l_name', " and `id`='" . $id . "'");
        $newdata = array(
            'action' => $action . '/' . $id,
        );
        $this->session->set_userdata($newdata);
        $data['list'] = $this->home_model->get_specific_hotels($this->session->userdata('arrive_date'), $this->session->userdata('checkout_date'), $this->session->userdata('guest'), $this->session->userdata('location'));
        // $data['list'] = $this->admin_model->hotelsSrcbyID($id);
        $data['list2'] = $this->home_model->metasrc();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/hotel_detail', $data);
        $this->load->view('front/inc/footer', $data);
    }

    /*public function hotel_rooms()
    {
    $data['title'] = 'List Of Rooms';
    $action = $this->uri->segment(2);
    $id = $this->uri->segment('3');
    $data['hotel'] = get_perticular_field_value('hotels','name'," and `id`='".$id."'");
    $newdata = array(
    'action'  => $action.'/'.$id
    );
    $this->session->set_userdata($newdata);
    $data['list'] = $this->admin_model->hotel_roomSrcbyID($id);
    // echo '<pre>';print_r($data['list']);die();
    $data['list2'] = $this->home_model->metasrc();

    $this->load->view('front/inc/header',$data);
    $this->load->view('front/hotel_rooms',$data);
    $this->load->view('front/inc/footer');
    }*/

    public function hotel_rooms()
    {
        $data['title'] = 'List Of Rooms';
        $action = $this->uri->segment(2);
        $id = $this->uri->segment('3');
        $data['hotel'] = get_perticular_field_value('hotels', 'name', " and `id`='" . $id . "'");
        $l_id = get_perticular_field_value('hotels', 'location', " and `id`='" . $id . "'");
        $newdata = array(
            'action' => $action . '/' . $id,
        );
        $this->session->set_userdata($newdata);
        // $data['list'] = $this->admin_model->hotel_roomSrcbyID($id);
        $data['list'] = $this->home_model->hotel_roomSrcbyID1($id, $l_id);
        // echo '<pre>';print_r($data['list']);die();
        $data['list2'] = $this->home_model->metasrc();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();

        $this->load->view('front/inc/header', $data);
        $this->load->view('front/hotel_rooms', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function contact()
    {
        $data['title'] = 'Contact Us';
        $action = $this->uri->segment(2);
        $newdata = array(
            'action' => $action,
        );
        $this->session->set_userdata($newdata);
        $data['list2'] = $this->home_model->metasrc();
        $data['contact'] = $this->admin_model->fetchcontactdetails();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();

        $this->load->view('front/inc/header', $data);
        $this->load->view('front/contact', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function login()
    {
        $data['title'] = 'Login';
        $data['list2'] = $this->home_model->metasrc();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();

        $this->load->view('front/inc/header', $data);
        $this->load->view('front/login', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function userlogin()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run()) {
            $username = $this->input->post('email');
            $password = md5($this->input->post('password'));

            if ($this->home_model->getlogindata($username, $password)) {

                $var = $this->home_model->getuser($username, $password);
                $session_data = array(
                    'email' => $username,
                    'id' => $var['id'],
                    'name' => $var['name'],
                );
                $this->session->set_userdata($session_data);
                if ($this->session->userdata('action') != '') {
                    redirect(base_url() . 'home/' . $this->session->userdata('action'));
                } else {

                    redirect(base_url('home/partner_with_us'));
                }
            } else {
                $this->session->set_flashdata('failure', 'Invalid Username and Password');
                redirect(base_url() . 'home/login');
            }
        } else {
            echo "Error";
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('name');
        if ($this->session->userdata('action') != '') {
            $this->session->sess_destroy();
            redirect(base_url() . 'home/' . $this->session->userdata('action'));
        } else {
            redirect(base_url());
        }
    }

    public function register()
    {
        $data['title'] = 'Register New User';
        $data['list2'] = $this->home_model->metasrc();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();

        $this->load->view('front/inc/header', $data);
        $this->load->view('front/register', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function store_user()
    {
        $formArray = array();
        $formArray['name'] = $_POST['name'];
        $formArray['first_name'] = $_POST['first_name'];
        $formArray['last_name'] = $_POST['last_name'];
        $have_mobile = $this->home_model->getmobile($_POST['mobile']);
        if (empty($have_mobile)) {
            $formArray['mobile'] = $_POST['mobile'];
        } else {
            $this->session->set_flashdata('failure', 'Mobile No Already Taken.');
            redirect(base_url() . 'home/register');
        }
        $have_email = $this->home_model->getemail($_POST['email']);
        if (empty($have_email)) {
            $formArray['email'] = $_POST['email'];
        } else {
            $this->session->set_flashdata('failure', 'Email Already Taken.');
            redirect(base_url() . 'home/register');
        }
        if ($_POST['password'] == $_POST['cpassword']) {
            $formArray['password'] = md5($_POST['password']);
            $formArray['opassword'] = $_POST['password'];
            $retid = $this->home_model->insuser($formArray);
            if (!empty($retid)) {
                $this->session->set_flashdata('success', 'You Are Registered Now, Please Login.');
                redirect(base_url() . 'home/login');
            } else {
                $this->session->set_flashdata('failure', 'Mobile or Email Already Taken.');
                redirect(base_url() . 'home/register');
            }
        } else {
            $this->session->set_flashdata('failure', 'Your Password Not Matched.');
            redirect(base_url() . 'home/register');
        }
    }

    public function show_forgotpassword_form()
    {
        $data['title'] = 'Forgot Password';
        $data['list2'] = $this->home_model->metasrc();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();

        $this->load->view('front/inc/header', $data);
        $this->load->view('front/forgotpassword', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function recover_password()
    {
        $email = $this->input->post('email');
        $have = $this->home_model->get_user($email);
        if (!empty($have)) {
            $encoded = base64_encode($have['id']);
            $this->load->library('email');
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_timeout'] = '60';

            $config['smtp_user'] = 'wizroomssiliguri@gmail.com'; //Important
            $config['smtp_pass'] = '@2021Travel!'; //Important

            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = true; // bool whether to validate email or not
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $url = base_url() . 'home/set_password/' . $encoded . '';
            $htmlContent = '<h1>Password Reset Link</h1>';
            $htmlContent .= '<p>This email has sent from Hotel Booking</p>';
            $htmlContent .= '<p><b> Click the link to reset password: </b></p><br>';
            $htmlContent .= $url;
            $this->email->from('Hotel-Booking@gmail.com', 'Hotel Booking');
            $this->email->to($email);
            $this->email->subject('Password Reset Link');
            $this->email->message($htmlContent);

            $this->email->send();

            $this->session->set_flashdata('success', 'Password Reset Link Send Successfully.');
            redirect(base_url() . 'home/login');
        } else {
            $this->session->set_flashdata('failure', 'Email Is Not Registered With Us.');
            redirect(base_url() . 'home/show_forgotpassword_form');
        }
    }

    public function set_password()
    {
        $data['title'] = 'Reset Password';
        $token = $this->uri->segment(3);
        $data['id'] = base64_decode($token);
        $this->load->view('front/set_password', $data);
    }

    public function update_password_mail()
    {
        $id = $this->input->post('id');
        if ($this->input->post('npassword') == $this->input->post('cpassword')) {
            $password = $this->input->post('cpassword');
            $sql = "update `users` set `opassword`='" . $password . "' where `id`='" . $id . "'";
            $this->db->query($sql);
            $hashed = md5($this->input->post('cpassword'));
            $sql1 = "update `users` set `password`='" . $hashed . "' where `id`='" . $id . "'";
            $this->db->query($sql1);
            $this->session->set_flashdata('success', 'Password Reset Successfully.');
            redirect(base_url() . 'home/login');
        } else {
            $this->session->set_flashdata('failure', 'Passwords Not Matched Successfully.');
            redirect(base_url() . 'home/show_forgotpassword_form');
        }
    }

    public function check_arrive_date()
    {
        $data = array();
        $data['arrive_date'] = $_POST['arrive_date'];
        $data['hotel_id'] = $_POST['hotel_id'];
        $data['room_id'] = $_POST['room_id'];
        $check = $this->db->where('id', $_POST['room_id'])->get('roomm')->row();
        $s_date_code = $check->s_date;
        $s_date_acct = explode(',', $s_date_code);

        if ($s_date_acct[0] <= date('Y-m-d', strtotime($_POST['arrive_date']))) {
            echo "<b style=" . 'color:red' . ">Not Available</b>";
            echo "<script type='text/javascript'>$('#booking_btn_id').attr('disabled',true)</script>";
        } else {
            echo "<b style=" . 'color:green' . ">Available</b>";
            echo "<script type='text/javascript'>$('#booking_btn_id').attr('disabled',false)</script>";
        }
    }

    public function check_checkout_date()
    {
        $data = array();
        $data['arrive_date'] = $_POST['arrive_date'];
        $data['checkout_date'] = $_POST['checkout_date'];
        $data['hotel_id'] = $_POST['hotel_id'];
        $data['room_id'] = $_POST['room_id'];
        $check = $this->db->where('id', $_POST['room_id'])->get('roomm')->row();
        $e_date_code = $check->e_date;
        $e_date_acct = explode(',', $e_date_code);

        // echo "<pre>";print_r($a);die;
        if ($e_date_acct[0] >= date('Y-m-d', strtotime($_POST['checkout_date']))) {
            echo "available";
            echo "<script type='text/javascript'>$('#booking_btn_id').attr('disabled',false)</script>";
        } else {
            echo "not availale";
            echo "<script type='text/javascript'>$('#booking_btn_id').attr('disabled',true)</script>";
        }
    }

    public function hotel_booking()
    {
        // echo "<pre>";print_r($_POST);die;
        if (!empty($this->session->userdata('id'))) {
            $data = array();
            $data['arrive_date'] = $_POST['arrive_date'];
            $start_date = date('d-m-Y', strtotime($_POST['arrive_date']));
            $data['checkout_date'] = $_POST['checkout_date'];
            $end_date = date('d-m-Y', strtotime($_POST['checkout_date']));
            $data['adult'] = $_POST['adult'];
            $data['child'] = $_POST['child'];
            $data['hotel_id'] = $_POST['hotel_id'];
            $data['room_id'] = $_POST['room_id'];
            $data['rooms'] = !empty($_POST['room']) ? $_POST['room'] : '0';
            $data['user_id'] = $this->session->userdata('id');
            if (!empty($_POST['arrive_date']) && !empty($_POST['checkout_date'])) {
                // if($_POST['checkout_date'] <! $_POST['arrive_date'])
                // {
                $check = $this->db->where('id', $_POST['room_id'])->get('roomm')->row();
                $s_date_code = $check->s_date;
                $s_date_acct = explode(',', $s_date_code);
                $e_date_code = $check->e_date;
                $e_date_acct = explode(',', $e_date_code);
                // echo "<pre>";print_r($s_date_acct[0]);
                if (($s_date_acct[0] <= date('Y-m-d', strtotime($_POST['arrive_date']))) && ($e_date_acct[0] >= date('Y-m-d', strtotime($_POST['checkout_date'])))) {
                    // echo "<pre>";print_r($a);die;
                    // if ($e_date_acct[0] >= date('Y-m-d', strtotime($_POST['checkout_date'])))
                    // {

                    // $check1=$this->db->where('room_id', $_POST['room_id'])->where('hotel_id', $_POST['hotel_id'])->where('arrive_date'. '>=', $_POST['arrive_date'] AND 'arrive_date'. '<=' , $_POST['arrive_date'])->where('checkout_date'. '<>' , $_POST['checkout_date'] AND 'checkout_date'. '<=' , $_POST['checkout_date'])->get('room_booking')->num_rows();

                    // $start=$check1->arrive_date;
                    // echo "<pre>";print_r($check1);die;
                    $dates1 = new DateTime($start_date);
                    $dates2 = new DateTime($end_date);
                    $diff = $dates1->diff($dates2);
                    $days = $diff->days;
                    $start_day = date('d-m-Y', strtotime($start_date));
                    // echo "<pre>";print_r($diff->days);die;
                    for ($iDay = 0; $iDay <= $days; $iDay++) {
                        $aDays[1 + $iDay]['b_date'] = date('d-m-Y', strtotime($start_day . ' + ' . $iDay . ' days'));
                    }

                    // echo "<pre>";print_r($aDays);die;
                    foreach ($aDays as $datebyday) {
                        // echo "<pre>";print_r($datebyday);die;
                        $check_by_date = $this->db->select('no_of_rooms')->where('room_id', $_POST['room_id'])->where('no_of_rooms >=', $_POST['room'])->where('booked', '0')->where('b_date', $datebyday['b_date'])->get('room_allot')->result();
                        if (empty($check_by_date)) {
                            echo "Booking full in the " . $datebyday['b_date'] . " date you choose, Pls choose others date";
                            die();
                        }
                    }
                    $this->session->set_userdata($data);

                    echo "<script>location.href='" . base_url('home/address_page') . "';</script>";

                } else {
                    echo "Pls choose others date";
                }
                // }
                // else
                // {
                //     echo "checkout date must be greater than arrive date.";
                // }
            } else {
                echo "Pls choose date";
            }
        } else {
            // $this->session->set_flashdata('failure', 'Invalid Username and Password');
            //             echo"<script>location.href='".base_url('home/login')."';</script>";
            echo "Please Do Login To Book Your Room. <a href=" . base_url() . "home/login" . ">Click Here</a>";
        }

    }

    public function booking_address()
    {
        // echo "<pre>";print_r($_POST);die;
        if (!empty($this->session->userdata('id'))) {
            $data = array();
            $data['first_name'] = $_POST['first_name'];
            $data['last_name'] = $_POST['last_name'];
            $data['address'] = $_POST['address'];
            $data['address_optional'] = !empty($_POST['address_optional']) ? $_POST['address_optional'] : '0';
            $data['city'] = $_POST['city'];
            $data['country'] = $_POST['country'];
            $data['email'] = $_POST['email'];
            $data['phone'] = $_POST['phone'];
            $data['other_notes'] = !empty($_POST['other_notes']) ? $_POST['other_notes'] : '0';

            $data['arrive_date'] = $this->session->userdata('arrive_date');
            $start_date = date('d-m-Y', strtotime($data['arrive_date']));
            $data['checkout_date'] = $this->session->userdata('checkout_date');
            $end_date = date('d-m-Y', strtotime($data['checkout_date']));
            $data['adult'] = $this->session->userdata('adult');
            $data['child'] = $this->session->userdata('child');
            $data['hotel_id'] = $this->session->userdata('hotel_id');
            $data['room_id'] = $this->session->userdata('room_id');
            $data['rooms'] = !empty($this->session->userdata('rooms')) ? $this->session->userdata('rooms') : '0';
            $data['user_id'] = $this->session->userdata('user_id');
            $this->session->set_userdata($data);
            // echo "<pre>";print_r($_SESSION);die;
            redirect('home/payment_page');

            if (!empty($this->session->userdata('arrive_date')) && !empty($this->session->userdata('checkout_date'))) {
                $check = $this->db->where('room_id', $this->session->userdata('room_id'))->where('booked', '1')->where("`b_date` BETWEEN '" . $start_date . "' AND '" . $end_date . "'")->get('room_allot')->num_rows();
                // echo "<pre>";print_r($check);die;

                if ($check <= 0) {
                    $this->db->set('booked', '1')->where('room_id', $this->session->userdata('room_id'))->where("`b_date` BETWEEN '" . $start_date . "' AND '" . $end_date . "'")->update('room_allot');

                    if ($this->home_model->insbooking($data)) {
                        // echo "Booking Successfully";
                        $this->session->set_flashdata('message', 'Booking Successfully');
                        $this->session->set_flashdata('message_status', 1);
                    } else {
                        // echo "Booking Unsuccessfully";
                        $this->session->set_flashdata('message', 'Booking Unsuccessfully');
                        $this->session->set_flashdata('message_status', 0);
                    }
                } else {
                    // echo "Booking full in that date you choose, Pls choose others date";
                    $this->session->set_flashdata('message', 'Booking full in that date you choose, Pls choose others date');
                    $this->session->set_flashdata('message_status', 0);
                }
            } else {
                // echo "Pls choose others date";
                $this->session->set_flashdata('message', 'Please choose others date');
                $this->session->set_flashdata('message_status', 0);
            }
        } else {
            // $this->session->set_flashdata('failure', 'Invalid Username and Password');
            echo "<script>location.href='" . base_url('home/login') . "';</script>";
            // echo "Please Do Login To Book Your Room. <a href=".base_url()."home/login".">Click Here</a>";
        }
        // redirect('home');

    }

    public function payment_page()
    {
        $this->load->view('front/payment/registration_form');
    }

    public function check_adult_db()
    {
        $data = array();
        $data['occupancy_adult'] = $_POST['adult'];
        $data['hotel_id'] = $_POST['hotel_id'];
        $data['room_id'] = $_POST['room_id'];
        $data['arrive_date'] = $_POST['arrive_date'];
        $start_date = date('d-m-Y', strtotime($_POST['arrive_date']));
        $data['checkout_date'] = $_POST['checkout_date'];
        $end_date = date('d-m-Y', strtotime($_POST['checkout_date']));
        $date_by_check = $this->db->where('room_id', $_POST['room_id'])->where('booked', '0')->where("`b_date` BETWEEN '" . $start_date . "' AND '" . $end_date . "'")->get('room_allot')->num_rows();
        if ($date_by_check > 0) {
            $check = $this->db->where('id', $_POST['room_id'])->get('roomm')->row();
            $adult = $check->occupancy_adult;
            $occupancy = $check->occupancy;
            if ($occupancy == $_POST['child']) {

            } else {
                if ($occupancy >= $_POST['adult'] + $_POST['child']) {
                    if ($adult >= $_POST['adult']) {

                    }
                } else {
                    echo "pls select extra room";
                }
            }
        }
    }

    public function check_child_db()
    {
        // echo "<pre>";print_r($_POST);die;
        $data = array();
        $data['occupancy_child'] = $_POST['child'];
        $data['hotel_id'] = $_POST['hotel_id'];
        $data['room_id'] = $_POST['room_id'];
        $data['arrive_date'] = $_POST['arrive_date'];
        $start_date = date('d-m-Y', strtotime($_POST['arrive_date']));
        $data['checkout_date'] = $_POST['checkout_date'];
        $end_date = date('d-m-Y', strtotime($_POST['checkout_date']));
        $date_by_check = $this->db->where('room_id', $_POST['room_id'])->where('booked', '0')->where("`b_date` BETWEEN '" . $start_date . "' AND '" . $end_date . "'")->get('room_allot')->num_rows();
        if ($date_by_check > 0) {
            $check = $this->db->where('id', $_POST['room_id'])->get('roomm')->row();
            $child = $check->occupancy_child;
            // echo "<pre>";print_r($adult);die;
            $adult = $check->occupancy_adult;
            $occupancy = $check->occupancy;
            // echo "<pre>";print_r($occupancy);die;

            if ($occupancy == $_POST['adult']) {
                echo "pls select extra room";
            } else {
                if ($occupancy >= $_POST['adult'] + $_POST['child']) {
                    if ($child >= $_POST['child']) {

                    }
                } else {
                    echo "pls select extra room";
                }
            }
        }
    }

    public function check_form_data()
    {
        echo '<pre>';
        print_r($_POST);die();
    }

    public function check_room_by_date()
    {
        // echo "<pre>";print_r($_POST);die;
        $data = array();
        $data['arrive_date'] = date('Y-m-d', strtotime($_POST['arrival']));
        $data['checkout_date'] = date('Y-m-d', strtotime($_POST['departure']));
        // $data['adults'] = $_POST['adults'];
        // $data['children'] = $_POST['children'];
        $data['guest'] = $_POST['guest'];
        $data['location'] = !empty($_POST['location']) ? $_POST['location'] : '0';
        // if($data['checkout_date'] <! $data['arrive_date'])
        // {
        $check = $this->home_model->get_specific_hotels($data['arrive_date'], $data['checkout_date'], $data['guest'], $data['location']);
        // echo '<pre>'; print_r($check);die();

        if (!empty($check)) {
            /*$html='<div class="row">
            <div id="rooms" class="owl-carousel owl-theme" style="display:block;">
            <div class="item ">';*/
            foreach ($check as $room) {
                $r_id = $room['location'];
                $location = get_perticular_field_value('locations', 'l_name', " and `id`='" . $room['location'] . "'");
                $image = get_perticular_field_value('locations', 'image', " and `id`='" . $room['location'] . "'");
                if ($image == '') {
                    $pd_image = 'assets/admin/uploads/rooms/default.jpg';
                } else {
                    $pd_image = 'assets/admin/uploads/locations/' . $image;
                }

            }
            $this->session->set_userdata($data);
            echo $r_id;
        }
    }

    public function my_profile()
    {
        if (!empty($this->session->userdata('id'))) {
            $data['list'] = $this->home_model->user_db_list($this->session->userdata('id'));
            $data['list1'] = $this->home_model->room_booking_db_list($this->session->userdata('id'));
            // echo "<pre>";print_r($data);die;
            $data['list2'] = $this->home_model->metasrc();
            $data['list3'] = $this->home_model->partner_business_srcbyid($this->session->userdata('id'));
            $data['hcat'] = $this->admin_model->hotelcategory();
            $data['locations'] = $this->admin_model->locations();
            $data['facilities'] = $this->admin_model->allfacility();
            $data['title'] = 'My Account';
            $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
            $this->load->view('front/inc/header', $data);
            $this->load->view('front/my_account_page', $data);
            $this->load->view('front/inc/footer', $data);
        } else {

        }
    }

    public function address_page()
    {
        if (!empty($this->session->userdata('id'))) {
            $data['title'] = 'My Address';
            $data['list'] = $this->home_model->user_db_list($this->session->userdata('id'));

            $data['list2'] = $this->home_model->metasrc();
            $data['s_links'] = $this->admin_model->fetchsociallinkdetails();

            $this->load->view('front/inc/header', $data);
            $this->load->view('front/address_page', $data);
            $this->load->view('front/inc/footer', $data);
        } else {

        }
    }

    public function update_user_db()
    {
        if (!empty($this->session->userdata('id'))) {
            $data['name'] = $_POST['name'];
            $data['first_name'] = $_POST['first_name'];
            $data['last_name'] = $_POST['last_name'];
            $data['mobile'] = $_POST['mobile'];
            $data['email'] = $_POST['email'];
            $id = $_POST['id'];
            if ($this->db->where('id', $id)->update('users', $data)) {
                $this->session->set_flashdata('success', 'Profile Updated Successfully.');
            } else {
                $this->session->set_flashdata('failure', 'Invalid Username and Password');
            }
            redirect('home/my_profile');
        } else {

        }
    }

    public function cancel_booking()
    {
        $id = $this->uri->segment('4');
        $block = $this->uri->segment('3');
        if ($this->db->set('block', $block)->where('room_booking_id', $id)->update('room_booking')) {
            $this->session->set_flashdata('success', 'Booking Cancel');
            // $this->session->set_flashdata('message_status',1);
        } else {
            $this->session->set_flashdata('failure', 'Not Denied');
            // $this->session->set_flashdata('message_status',1);
        }
        redirect('home/my_profile');
    }

    public function partner_with_us()
    {
        if (!empty($this->session->userdata('id'))) {
            $data['title'] = 'Partner With Us';
            $action = $this->uri->segment(2);
            $newdata = array(
                'action' => $action,
            );
            $this->session->set_userdata($newdata);
            $id = $this->uri->segment('3');
            $data['business'] = $this->home_model->partner_business_editSrcbyID($id);
            $data['list2'] = $this->home_model->metasrc();
            $data['hcat'] = $this->admin_model->hotelcategory();
            $data['locations'] = $this->admin_model->locations();
            $data['facilities'] = $this->admin_model->allfacility();
            $data['partner'] = $this->admin_model->fetchpartnermetadetails();
            $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
            $this->load->view('front/inc/header', $data);
            $this->load->view('front/partner_page', $data);
            $this->load->view('front/inc/footer', $data);
        } else {
            redirect('home/login');
        }
    }

    public function storehotel_partner()
    {
        if ($this->session->userdata('id') != '') {
            // echo '<pre>';print_r($_POST);die();
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['user_id'] = $this->session->userdata('id');
            $formArray['name'] = $_POST['h_name'];
            $formArray['location'] = $_POST['h_location'];
            $formArray['category'] = $_POST['h_category'];
            $formArray['web_url'] = $_POST['url'];
            $formArray['check_in'] = $_POST['c_in'];
            $formArray['check_out'] = $_POST['c_out'];
            $formArray['p_mobile'] = $_POST['p_mobile'];
            $formArray['s_mobile'] = $_POST['s_mobile'];
            $formArray['p_landline'] = $_POST['p_landline'];
            $formArray['s_landline'] = $_POST['s_landline'];
            $formArray['p_email'] = $_POST['p_email'];
            $formArray['s_email'] = $_POST['s_email'];
            $formArray['address'] = $_POST['address'];
            $formArray['hotel_type'] = $_POST['hotel_type'];
            $formArray['description'] = $_POST['description'];
            $formArray['T_C'] = $_POST['T&C'];
            $formArray['CP'] = $_POST['CP'];
            $facility = !empty($_POST['facility']) ? implode(',', $_POST['facility']) : '0';
            $formArray['facility'] = $facility;
            $retid = $this->home_model->inspartner_business($formArray);
            $this->session->set_flashdata('success', 'Partner Successfully Added Business.');
            redirect(base_url() . 'home/my_profile');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function edit_storehotel_partner()
    {
        if ($this->session->userdata('id') != '') {
            // echo '<pre>';print_r($_POST);die();
            $this->load->model('Admin_model');
            $formArray = array();
            $id = $_POST['id'];
            $formArray['user_id'] = $this->session->userdata('id');
            $formArray['name'] = $_POST['h_name'];
            $formArray['location'] = $_POST['h_location'];
            $formArray['category'] = $_POST['h_category'];
            $formArray['web_url'] = $_POST['url'];
            $formArray['check_in'] = $_POST['c_in'];
            $formArray['check_out'] = $_POST['c_out'];
            $formArray['p_mobile'] = $_POST['p_mobile'];
            $formArray['s_mobile'] = $_POST['s_mobile'];
            $formArray['p_landline'] = $_POST['p_landline'];
            $formArray['s_landline'] = $_POST['s_landline'];
            $formArray['p_email'] = $_POST['p_email'];
            $formArray['s_email'] = $_POST['s_email'];
            $formArray['address'] = $_POST['address'];
            $formArray['hotel_type'] = $_POST['hotel_type'];
            $formArray['description'] = $_POST['description'];
            $formArray['T_C'] = $_POST['T&C'];
            $formArray['CP'] = $_POST['CP'];
            $facility = !empty($_POST['facility']) ? implode(',', $_POST['facility']) : '0';
            $formArray['facility'] = $facility;
            $retid = $this->home_model->updpartner_business($formArray, $id);
            $this->session->set_flashdata('success', 'Partner Business Successfully Updated .');
            redirect(base_url() . 'home/my_profile');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deletepartner_business()
    {
        $id = $this->uri->segment('3');
        if ($this->db->where('id', $id)->delete('partner_business')) {
            $this->session->set_flashdata('success', 'Partner Business Successfully Deleted');
            // $this->session->set_flashdata('message_status',1);
        } else {
            $this->session->set_flashdata('failure', 'Not Denied');
            // $this->session->set_flashdata('message_status',1);
        }
        redirect('home/my_profile');
    }

    public function customer_query()
    {
        // echo '<pre>';print_r($_POST);die();
        $formArray['message'] = $_POST['message'];
        $formArray['name'] = $_POST['name'];
        $formArray['email'] = $_POST['email'];
        $formArray['subject'] = $_POST['subject'];
        $subject = "Query To Admin";
        $message = "<!DOCTYPE html>
				<html>
				<head>
					<title>Welcome to Hotel Booking System</title>
				</head>
				<body>
					<h5>Dear Admin</h5>
					<h5>I Have Some Query To You Is Regarding, " . $formArray['subject'] . "</h5><br>
					<h5>" . $formArray['message'] . "</h5>
					<h5>Thank You</h5>
					<h5>" . $formArray['name'] . "</h5><br>
					<h5>" . $formArray['email'] . "</h5>
				</body>
				</html>
			";
        $this->global_model->email_massage($formArray['email'], $message, $subject);
        $this->session->set_flashdata('success', 'Query Successfully Submited.');
        redirect('home/contact');
    }

    public function term_details()
    {
        $data['title'] = 'Term Details';
        $this->load->model('Admin_model');
        $id = $this->uri->segment('3');
        $data['list'] = $this->admin_model->fetchtermdetails();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/term_details', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function privacy_details()
    {
        $data['title'] = 'Privacy Details';
        $this->load->model('Admin_model');
        $id = $this->uri->segment('3');
        $data['list'] = $this->admin_model->fetchprivacydetails();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/privacy_details', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function cancellation_details()
    {
        $data['title'] = 'Cancellation Details';
        $this->load->model('Admin_model');
        $id = $this->uri->segment('3');
        $data['list'] = $this->admin_model->fetchcanceldetails();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/cancellation_details', $data);
        $this->load->view('front/inc/footer', $data);
    }

    public function faq_details()
    {
        $data['title'] = 'FAQ Details';
        $this->load->model('Admin_model');
        $id = $this->uri->segment('3');
        $data['list'] = $this->admin_model->fetchfaqdetails();
        $data['s_links'] = $this->admin_model->fetchsociallinkdetails();
        $this->load->view('front/inc/header', $data);
        $this->load->view('front/faq_details', $data);
        $this->load->view('front/inc/footer', $data);
    }

}