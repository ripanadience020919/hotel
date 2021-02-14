<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
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
        if ($this->session->userdata('username') != '') {
            redirect(base_url() . 'Admin/dashboard');
        } else {
            $this->load->view('admin/login');
        }
    }

    public function dashboard()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Dashboard';
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/dashboard');
            $this->load->view('admin/inc/footer');
        } else {
            redirect(base_url() . 'Admin');
        }
    }

    public function adminlogin()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run()) {
            $username = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('Admin_model');
            if ($this->Admin_model->getlogindata($username, $password)) {
                $var = $this->Admin_model->getsuperadmin($username, $password);
                $session_data = array('email' => $username, 'role' => $var['role'], 'id' => $var['id'], 'username' => $var['username']);
                $this->session->set_userdata($session_data);
                if ($var['role'] == 1) {
                    redirect(base_url() . 'Admin/dashboard');
                } else {
                    $this->session->set_flashdata('failure', 'Invalid Username and Password');
                    redirect(base_url() . 'Admin');
                }

            } else {
                $this->session->set_flashdata('failure', 'Invalid Username and Password');
                redirect(base_url() . 'Admin');
            }
        } else {
            echo "Error";
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username', 'manager');
        $this->session->sess_destroy();
        redirect(base_url() . 'Admin');
    }

    public function addlocation()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            if (!empty($id)) {
                $data['title'] = 'Edit a Location';
            } else {
                $data['title'] = 'Add a Location';
            }
            $data['location'] = $this->admin_model->locationSrcbyID($id);
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addlocation', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storelocation()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['l_name'] = $_POST['l_name'];
            $formArray['l_description'] = $_POST['l_description'];
            $retid = $this->Admin_model->inslocation($formArray);
            if ($_FILES['photo']['name'] != '') {
                $this->update_location_img('photo', $retid);
            }
            if ($_FILES['l_video']['name'] != '') {
                $this->update_location_video('l_video', $retid);
            }
            $this->session->set_flashdata('success', 'Location Added Successfully.');
            redirect(base_url() . 'Admin/locationlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function updatelocation()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $retid = $_POST['id'];
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['l_name'] = $_POST['l_name'];
            $formArray['l_description'] = $_POST['l_description'];
            if ($_FILES['photo']['name'] != '') {
                $this->update_location_img('photo', $retid);
            }
            if ($_FILES['l_video']['name'] != '') {
                $this->update_location_video('l_video', $retid);
            }

            if ($this->Admin_model->update_location($formArray, $retid)) {
                $this->session->set_flashdata('success', 'Location updated Successfully.');
                redirect(base_url() . 'Admin/locationlist');
            } else {
                $this->session->set_flashdata('failure', 'Location Not Updated Successfully.');
                redirect(base_url() . 'Admin/locationlist');
            }
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function update_location_video($form_field_name, $retid)
    {
        $configVideo['upload_path'] = 'assets/admin/uploads/locations/videos';
        $configVideo['max_size'] = '102400';
        $configVideo['allowed_types'] = '*';
        $configVideo['overwrite'] = false;
        $configVideo['remove_spaces'] = true;
        $video_name = mt_rand(10000, 99999) . '.mp4';
        $configVideo['file_name'] = $video_name;

        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);

        if (!$this->upload->do_upload('l_video')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_loc_vid($file_names, $retid);
        }
    }

    public function update_location_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/locations';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_loc_imgs($file_names, $retid);
        }
    }

    public function locationlist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Locations';
            $this->load->model('Admin_model');
            $data['locations'] = $this->Admin_model->locations();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/locationlist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deletelocation($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletelocation($id);
            $this->session->set_flashdata('success', 'Location Deleted Successfully.');
            redirect('Admin/locationlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function metalist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Metas';
            $this->load->model('Admin_model');
            $data['list'] = $this->Admin_model->metas_db();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/metalist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deletemeta($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletemeta($id);
            $this->session->set_flashdata('success', 'Meta Deleted Successfully.');
            redirect('Admin/metalist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function editmeta()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Edit Metas';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->metaSrcbyID($id);
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/meta_page', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function updatemeta()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['meta_title'] = $_POST['meta_title'];
            $formArray['meta_description'] = $_POST['meta_description'];
            $formArray['meta_keywords'] = $_POST['meta_keywords'];
            $retid = $_POST['id'];
            if ($this->Admin_model->update_meta($formArray, $retid)) {
                $this->session->set_flashdata('success', 'Meta Updated Successfully.');
                redirect(base_url() . 'Admin/metalist');
            } else {
                $this->session->set_flashdata('failure', 'Meta Not Updated Successfully.');
                redirect(base_url() . 'Admin/metalist');
            }
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function testimonials()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Testimonials List';
            $this->load->model('Admin_model');
            $data['list'] = $this->Admin_model->testi_list();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/testimonials_list', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addtestimonials()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            if (!empty($id)) {
                $data['title'] = 'Edit Testimonials';
            } else {
                $data['title'] = 'Add Testimonials';
            }
            $data['list'] = $this->admin_model->testiSrcbyID($id);
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addtestimonials', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storetestimonials()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['name'] = $_POST['name'];
            $formArray['address'] = $_POST['address'];
            $formArray['messege'] = $_POST['messege'];

            $retid = $this->Admin_model->instestimonials($formArray);
            if ($_FILES['images']['name'] != '') {
                $this->update_testi_img('images', $retid);
            }

            $this->session->set_flashdata('success', 'Testimonials Added Successfully.');
            redirect(base_url() . 'Admin/testimonials');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function updatetestimonials()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $this->load->model('Admin_model');
            $formArray = array();
            $id = $_POST['id'];
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['name'] = $_POST['name'];
            $formArray['address'] = $_POST['address'];
            $formArray['messege'] = $_POST['messege'];

            $this->Admin_model->updtestimonials($formArray, $id);
            if ($_FILES['images']['name'] != '') {
                $this->update_testi_img('images', $id);
            }

            $this->session->set_flashdata('success', 'Testimonials Updated Successfully.');
            redirect(base_url() . 'Admin/testimonials');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deletetestimonials($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletetesti($id);
            $this->session->set_flashdata('success', 'Testimonials Deleted Successfully.');
            redirect('Admin/testimonials');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function update_testi_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/hotels';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_testi_img($file_names, $retid);
        }
    }

    public function gallery()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Gallery List';
            $this->load->model('Admin_model');
            $data['list'] = $this->Admin_model->gallery_list();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/gallerylist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addgallery()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            if (!empty($id)) {
                $data['title'] = 'Edit Gallery';
            } else {
                $data['title'] = 'Add Gallery';
            }
            $data['list'] = $this->admin_model->gallerySrcbyID($id);
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_gallery', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deletegallery($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletegallery($id);
            $this->session->set_flashdata('success', 'Gallery Deleted Successfully.');
            redirect('Admin/gallery');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storegallery()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['cat1'] = $_POST['cat1'];
            $formArray['cat2'] = $_POST['cat2'];
            $formArray['cat3'] = $_POST['cat3'];
            $formArray['cat4'] = $_POST['cat4'];
            $retid = $this->Admin_model->insgallery($formArray);
            if ($_FILES['h_images']['name'] != '') {
                $this->update_h_img('h_images', $retid);
            }
            if ($_FILES['r_images']['name'] != '') {
                $this->update_r_img('r_images', $retid);
            }
            if ($_FILES['b_images']['name'] != '') {
                $this->update_b_img('b_images', $retid);
            }
            if ($_FILES['d_images']['name'] != '') {
                $this->update_d_img('d_images', $retid);
            }
            $this->session->set_flashdata('success', 'Gallery Added Successfully.');
            redirect(base_url() . 'Admin/gallery');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function update_h_img($form_field_name, $retid)
    {
        $data = array();
        $countfiles = count($_FILES['h_images']['name']);
        for ($i = 0; $i < $countfiles; $i++) {
            if (!empty($_FILES['h_images']['name'][$i])) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['h_images']['name'][$i];
                $_FILES['file']['type'] = $_FILES['h_images']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['h_images']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['h_images']['error'][$i];
                $_FILES['file']['size'] = $_FILES['h_images']['size'][$i];

                // Set preference
                $config['upload_path'] = 'assets/admin/uploads/gallery';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|xlsx';
                $config['max_size'] = '5120'; // max_size in kb
                $config['max_width'] = '4480'; // pixel
                $config['max_height'] = '4480'; // pixel
                $config['file_name'] = $_FILES['h_images']['name'][$i];

                //Load upload library
                $this->upload->initialize($config);
                // File upload
                $product_images = '';
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename[] = $uploadData['file_name'];
                }
            }
        }
        $pictures = '';
        if (!empty($filename)) {
            $pictures = implode(",", $filename);
        }
        $this->Admin_model->update_gal_h_imgs($pictures, $retid);
    }

    public function update_r_img($form_field_name, $retid)
    {
        $data = array();
        $countfiles = count($_FILES['r_images']['name']);
        for ($i = 0; $i < $countfiles; $i++) {

            if (!empty($_FILES['r_images']['name'][$i])) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['r_images']['name'][$i];
                $_FILES['file']['type'] = $_FILES['r_images']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['r_images']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['r_images']['error'][$i];
                $_FILES['file']['size'] = $_FILES['r_images']['size'][$i];

                // Set preference
                $config['upload_path'] = 'assets/admin/uploads/gallery';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|xlsx';
                $config['max_size'] = '5120'; // max_size in kb
                $config['max_width'] = '4480'; // pixel
                $config['max_height'] = '4480'; // pixel
                $config['file_name'] = $_FILES['r_images']['name'][$i];

                //Load upload library
                $this->upload->initialize($config);
                // File upload
                $product_images = '';
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename[] = $uploadData['file_name'];
                }
            }
        }
        $pictures = '';
        if (!empty($filename)) {
            $pictures = implode(",", $filename);
        }
        $this->Admin_model->update_gal_r_imgs($pictures, $retid);
    }

    public function update_b_img($form_field_name, $retid)
    {
        $data = array();
        $countfiles = count($_FILES['b_images']['name']);
        for ($i = 0; $i < $countfiles; $i++) {

            if (!empty($_FILES['b_images']['name'][$i])) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['b_images']['name'][$i];
                $_FILES['file']['type'] = $_FILES['b_images']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['b_images']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['b_images']['error'][$i];
                $_FILES['file']['size'] = $_FILES['b_images']['size'][$i];

                // Set preference
                $config['upload_path'] = 'assets/admin/uploads/gallery';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|xlsx';
                $config['max_size'] = '5120'; // max_size in kb
                $config['max_width'] = '4480'; // pixel
                $config['max_height'] = '4480'; // pixel
                $config['file_name'] = $_FILES['b_images']['name'][$i];

                //Load upload library
                $this->upload->initialize($config);
                // File upload
                $product_images = '';
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename[] = $uploadData['file_name'];
                }
            }
        }
        $pictures = '';
        if (!empty($filename)) {
            $pictures = implode(",", $filename);
        }
        $this->Admin_model->update_gal_b_imgs($pictures, $retid);
    }

    public function update_d_img($form_field_name, $retid)
    {
        $data = array();
        $countfiles = count($_FILES['d_images']['name']);
        for ($i = 0; $i < $countfiles; $i++) {

            if (!empty($_FILES['d_images']['name'][$i])) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['d_images']['name'][$i];
                $_FILES['file']['type'] = $_FILES['d_images']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['d_images']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['d_images']['error'][$i];
                $_FILES['file']['size'] = $_FILES['d_images']['size'][$i];

                // Set preference
                $config['upload_path'] = 'assets/admin/uploads/gallery';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|xlsx';
                $config['max_size'] = '5120'; // max_size in kb
                $config['max_width'] = '4480'; // pixel
                $config['max_height'] = '4480'; // pixel
                $config['file_name'] = $_FILES['d_images']['name'][$i];

                //Load upload library
                $this->upload->initialize($config);
                // File upload
                $product_images = '';
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename[] = $uploadData['file_name'];
                }
            }
        }
        $pictures = '';
        if (!empty($filename)) {
            $pictures = implode(",", $filename);
        }
        $this->Admin_model->update_gal_d_imgs($pictures, $retid);
    }

    public function updategallery()
    {
        if ($this->session->userdata('username') != '') {
            // echo "<pre>";print_r(array_filter($_FILES['r_images']['name']));die;
            $this->load->model('Admin_model');
            $formArray = array();
            $retid = $_POST['id'];
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['cat1'] = $_POST['cat1'];
            $formArray['cat2'] = $_POST['cat2'];
            $formArray['cat3'] = $_POST['cat3'];
            $formArray['cat4'] = $_POST['cat4'];
            $this->Admin_model->updgallery($formArray, $retid);
            if (array_filter($_FILES['h_images']['name'])) {
                $this->update_h_img('h_images', $retid);
            }
            if (array_filter($_FILES['r_images']['name'])) {
                // echo "<pre>";print_r($_FILES['r_images']['name']);die;
                // echo "test";die;
                $this->update_r_img('r_images', $retid);
            }
            if (array_filter($_FILES['b_images']['name'])) {
                $this->update_b_img('b_images', $retid);
            }
            if (array_filter($_FILES['d_images']['name'])) {
                $this->update_d_img('d_images', $retid);
            }
            $this->session->set_flashdata('success', 'Gallery Updated Successfully.');
            redirect(base_url() . 'Admin/gallery');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addhotelcategory()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            if (!empty($id)) {
                $data['title'] = 'Edit a Hotel Category';
            } else {
                $data['title'] = 'Add a Hotel Category';
            }
            $data['category'] = $this->admin_model->hotelcategorySrcbyID($id);
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addhotelcategory', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storehotelcategory()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['h_category'] = $_POST['c_name'];
            $retid = $this->Admin_model->inshotelcategory($formArray);
            $this->session->set_flashdata('success', 'Hotel Category Added Successfully.');
            redirect(base_url() . 'Admin/hotelcategorylist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function updatehotelcategory()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $retid = $_POST['id'];
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['h_category'] = $_POST['c_name'];
            // $retid = $this->Admin_model->inshotelcategory($formArray);
            if ($this->Admin_model->update_hotelcategory($formArray, $retid)) {
                $this->session->set_flashdata('success', 'Hotel Category Updated Successfully.');
                redirect(base_url() . 'Admin/hotelcategorylist');
            } else {
                $this->session->set_flashdata('failure', 'Hotel Category Not Updated Successfully.');
                redirect(base_url() . 'Admin/hotelcategorylist');
            }
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function hotelcategorylist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Hotel Category';
            $this->load->model('Admin_model');
            $data['hcat'] = $this->Admin_model->hotelcategory();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/hotelcategorylist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deletehotelcategory($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletehotelcategory($id);
            $this->session->set_flashdata('success', 'Hotel Category Deleted Successfully.');
            redirect('Admin/hotelcategorylist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function mealplanlist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Meal Plan';
            $this->load->model('Admin_model');
            $data['mplan'] = $this->Admin_model->mealplan();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/mealplanlist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addmealplan()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add a Meal Plan';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->mealSrcbyID($id);
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addmealplan', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storemealplan()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['initials'] = $_POST['initials'];
            $formArray['details'] = $_POST['details'];
            $retid = $this->Admin_model->insmealplan($formArray);
            $this->session->set_flashdata('success', 'Meal Plan Added Successfully.');
            redirect(base_url() . 'Admin/mealplanlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function edit_storemealplan()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $id = $_POST['id'];
            $formArray['initials'] = $_POST['initials'];
            $formArray['details'] = $_POST['details'];
            $retid = $this->Admin_model->updmealplan($formArray, $id);
            $this->session->set_flashdata('success', 'Meal Plan Updated Successfully.');
            redirect(base_url() . 'Admin/mealplanlist');
        } else {
            $this->session->set_flashdata('failure', 'Meal Plan Updated Unsuccessfully');
            redirect(base_url() . 'Admin/mealplanlist');
        }
    }

    public function deletemealplan($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletemealplan($id);
            $this->session->set_flashdata('success', 'Meal Plan Deleted Successfully.');
            redirect('Admin/mealplanlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function roomlist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Room Type';
            $this->load->model('Admin_model');
            $data['rlist'] = $this->Admin_model->allroomtype();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/roomtypelist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addroomtype()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add a Room Type';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->roomtypeSrcbyID($id);
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addroomtype', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storeroomtype()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['r_type'] = $_POST['r_type'];
            $retid = $this->Admin_model->insroomtype($formArray);
            $this->session->set_flashdata('success', 'Room Type Added Successfully.');
            redirect(base_url() . 'Admin/roomlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function edit_storeroomtype()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $id = $_POST['id'];
            $formArray['r_type'] = $_POST['r_type'];
            $retid = $this->Admin_model->updroomtype($formArray, $id);
            $this->session->set_flashdata('success', 'Room Type Updated Successfully.');
            redirect(base_url() . 'Admin/roomlist');
        } else {
            $this->session->set_flashdata('failure', 'Room Type Updated Unsuccessfully.');
            redirect(base_url() . 'Admin/roomtypelist');
        }
    }

    public function deleteroomtype($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deleteroomtype($id);
            $this->session->set_flashdata('success', 'Room Type Deleted Successfully.');
            redirect('Admin/roomlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function travelpartnerlist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Travel Partner';
            $this->load->model('Admin_model');
            $data['plist'] = $this->Admin_model->alltravelpartner();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/travelpartnerlist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addtravelpartner()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add a Travel Partner';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->travelpartnerSrcbyID($id);
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addtravelpartner', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storetravelpartner()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['p_name'] = $_POST['p_name'];
            $formArray['p_contact'] = $_POST['p_contact'];
            $formArray['p_email'] = $_POST['p_email'];
            $formArray['p_address'] = $_POST['p_address'];
            $retid = $this->Admin_model->instravelpartners($formArray);
            $this->session->set_flashdata('success', 'Travel Partner Added Successfully.');
            redirect(base_url() . 'Admin/travelpartnerlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function edit_storetravelpartner()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $id = $_POST['id'];
            $formArray['p_name'] = $_POST['p_name'];
            $formArray['p_contact'] = $_POST['p_contact'];
            $formArray['p_email'] = $_POST['p_email'];
            $formArray['p_address'] = $_POST['p_address'];
            $retid = $this->Admin_model->updtravelpartners($formArray, $id);
            $this->session->set_flashdata('success', 'Travel Partner Updated Successfully.');
            redirect(base_url() . 'Admin/travelpartnerlist');
        } else {
            $this->session->set_flashdata('failure', 'Travel Partner Updated Unsuccessfully.');
            redirect(base_url() . 'Admin/travelpartnerlist');
        }
    }

    public function deletetravelpartner($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletetravelpartner($id);
            $this->session->set_flashdata('success', 'Travel Partner Deleted Successfully.');
            redirect('Admin/travelpartnerlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function amenitieslist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Amenity';
            $this->load->model('Admin_model');
            $data['amenities'] = $this->Admin_model->allamenity();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/amenitieslist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addamenity()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add an Amenity';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->amenitySrcbyID($id);
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addamenity', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storeamenity()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['a_name'] = $_POST['a_name'];
            $retid = $this->Admin_model->insamenity($formArray);
            $this->session->set_flashdata('success', 'Amenity Added Successfully.');
            redirect(base_url() . 'Admin/amenitieslist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function edit_storeamenity()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $id = $_POST['id'];
            $formArray['a_name'] = $_POST['a_name'];
            $retid = $this->Admin_model->updamenity($formArray, $id);
            $this->session->set_flashdata('success', 'Amenity Updated Successfully.');
            redirect(base_url() . 'Admin/amenitieslist');
        } else {
            $this->session->set_flashdata('failure', 'Amenity Updated Unsuccessfully.');
            redirect(base_url() . 'Admin/amenitieslist');
        }
    }

    public function deleteamenity($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deleteamenity($id);
            $this->session->set_flashdata('success', 'Amenity Deleted Successfully.');
            redirect('Admin/amenitieslist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function facilitieslist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Facility';
            $this->load->model('Admin_model');
            $data['facilities'] = $this->Admin_model->allfacility();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/facilitieslist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addfacility()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add a Facility';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->facilitySrcbyID($id);
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addfacility', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storefacility()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['f_name'] = $_POST['f_name'];
            $retid = $this->Admin_model->insfacility($formArray);
            $this->session->set_flashdata('success', 'Facility Added Successfully.');
            redirect(base_url() . 'Admin/facilitieslist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function edit_storefacility()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $id = $_POST['id'];
            $formArray['f_name'] = $_POST['f_name'];
            $retid = $this->Admin_model->updfacility($formArray, $id);
            $this->session->set_flashdata('success', 'Facility Updated Successfully.');
            redirect(base_url() . 'Admin/facilitieslist');
        } else {
            $this->session->set_flashdata('failure', 'Facility Updated Unsuccessfully.');
            redirect(base_url() . 'Admin/facilitieslist');
        }
    }

    public function deletefacility($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletefacility($id);
            $this->session->set_flashdata('success', 'Facility Deleted Successfully.');
            redirect('Admin/facilitieslist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addhotel()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add a Hotel';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->hotelSrcbyID($id);
            // echo "<pre>";print_r($data['list']);die;
            $data['hcat'] = $this->Admin_model->hotelcategory();
            $data['locations'] = $this->Admin_model->locations();
            $data['facilities'] = $this->Admin_model->allfacility();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addhotel', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storehotel()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
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
            $retid = $this->Admin_model->inshotel($formArray);
            if ($_FILES['h_thumb']['name'] != '') {
                $this->update_h_thumb_img('h_thumb', $retid);
            }
            if ($_FILES['h_banner']['name'] != '') {
                $this->update_h_banner_img('h_banner', $retid);
            }
            if ($_FILES['h_img1']['name'] != '') {
                $this->update_h_img1_img('h_img1', $retid);
            }
            if ($_FILES['h_img2']['name'] != '') {
                $this->update_h_img2_img('h_img2', $retid);
            }
            if ($_FILES['h_img3']['name'] != '') {
                $this->update_h_img3_img('h_img3', $retid);
            }
            if ($_FILES['h_img4']['name'] != '') {
                $this->update_h_img4_img('h_img4', $retid);
            }
            $this->session->set_flashdata('success', 'Hotel Added Successfully.');
            redirect(base_url() . 'Admin/hotellist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function edit_storehotel()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $this->load->model('Admin_model');
            $formArray = array();
            $retid = $_POST['id'];
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
            $this->Admin_model->updhotel($formArray, $retid);
            if ($_FILES['h_thumb']['name'] != '') {
                $this->update_h_thumb_img('h_thumb', $retid);
            }
            if ($_FILES['h_banner']['name'] != '') {
                $this->update_h_banner_img('h_banner', $retid);
            }
            if ($_FILES['h_img1']['name'] != '') {
                $this->update_h_img1_img('h_img1', $retid);
            }
            if ($_FILES['h_img2']['name'] != '') {
                $this->update_h_img2_img('h_img2', $retid);
            }
            if ($_FILES['h_img3']['name'] != '') {
                $this->update_h_img3_img('h_img3', $retid);
            }
            if ($_FILES['h_img4']['name'] != '') {
                $this->update_h_img4_img('h_img4', $retid);
            }
            $this->session->set_flashdata('success', 'Hotel Updated Successfully.');
            redirect(base_url() . 'Admin/hotellist');
        } else {
            $this->session->set_flashdata('success', 'Hotel Updated Unsuccessfully.');
            redirect(base_url() . 'Admin/hotellist');
        }
    }

    public function update_h_thumb_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/hotels';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_h_thumb_img($file_names, $retid);
        }
    }

    public function update_h_banner_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/hotels';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_h_banner_img($file_names, $retid);
        }
    }

    public function update_h_img1_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/hotels';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_h_img1_img($file_names, $retid);
        }
    }

    public function update_h_img2_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/hotels';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_h_img2_img($file_names, $retid);
        }
    }

    public function update_h_img3_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/hotels';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_h_img3_img($file_names, $retid);
        }
    }

    public function update_h_img4_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/hotels';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_h_img4_img($file_names, $retid);
        }
    }

    public function hotellist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Hotels';
            $this->load->model('Admin_model');
            $data['hotels'] = $this->Admin_model->hotels();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/hotellist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deletehotel($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletehotel($id);
            $this->session->set_flashdata('success', 'Hotel Deleted Successfully.');
            redirect('Admin/hotellist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addroom()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add a Room';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->roomSrcbyIDadmin($id);
            // echo "<pre>";print_r($data['list']);die;
            $data['hcat'] = $this->Admin_model->hotelcategory();
            $data['locations'] = $this->Admin_model->locations();
            $data['hotels'] = $this->Admin_model->hotels();
            $data['roomtype'] = $this->Admin_model->allroomtype();
            $data['mealplan'] = $this->Admin_model->mealplan();
            $data['amenity'] = $this->Admin_model->allamenity();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addroom', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storeroom()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['location'] = $_POST['location'];
            $formArray['hotel_name'] = $_POST['hotel_name'];
            $formArray['room_type'] = $_POST['room_type'];
            $formArray['meal_plan'] = $_POST['meal_plan'];
            $formArray['occupancy'] = $_POST['occupancy'];
            $formArray['occupancy_adult'] = $_POST['occupancy_adult'];
            $formArray['occupancy_child'] = $_POST['occupancy_child'];
            /*$amenity = implode(',',$_POST['amenity']);
            $formArray['amenity'] = $amenity;
            $formArray['refundable_status'] = $_POST['refundable_status'];
            $formArray['extra_bed'] = $_POST['extra_bed'];
            $formArray['extra_bed_charge'] = $_POST['extra_bed_charge'];*/
            $amenity = !empty($_POST['amenity']) ? implode(',', $_POST['amenity']) : '0';
            $formArray['amenity'] = $amenity;
            $formArray['refundable_status'] = !empty($_POST['refundable_status']) ? $_POST['refundable_status'] : '0';
            if (!empty($_POST['extra_bed'])) {
                $formArray['extra_bed'] = $_POST['extra_bed'];
            } else {
                $formArray['extra_bed'] = '0';
            }
            if (!empty($_POST['extra_bed_charge'])) {
                $formArray['extra_bed_charge'] = $_POST['extra_bed_charge'];
            } else {
                $formArray['extra_bed_charge'] = '0';
            }

            $s_date = implode(',', $_POST['s_date']);
            $formArray['s_date'] = $s_date;
            $e_date = implode(',', $_POST['e_date']);
            $formArray['e_date'] = $e_date;

            $date1 = explode(',', $s_date);
            $start_date = $date1[0];
            $date2 = explode(',', $e_date);
            $end_date = $date2[0];

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

            $a_price = implode(',', $_POST['a_price']);
            $formArray['actual_price'] = $a_price;
            $o_price = implode(',', $_POST['o_price']);
            $formArray['offer_price'] = $o_price;
            $n_rooms = implode(',', $_POST['n_rooms']);
            $formArray['n_rooms'] = $n_rooms;
            $retid = $this->Admin_model->insroom($formArray);
            if ($_FILES['r_img1']['name'] != '') {
                $this->update_r_img1_img('r_img1', $retid);
            }
            if ($_FILES['r_img2']['name'] != '') {
                $this->update_r_img2_img('r_img2', $retid);
            }
            if ($_FILES['r_img3']['name'] != '') {
                $this->update_r_img3_img('r_img3', $retid);
            }
            if ($_FILES['r_img4']['name'] != '') {
                $this->update_r_img4_img('r_img4', $retid);
            }
            foreach ($aDays as $value) {
                $this->db->set('room_id', $retid)->set('no_of_rooms', $n_rooms)->insert('room_allot', $value);
            }
            $this->session->set_flashdata('success', 'Room Added Successfully.');
            redirect(base_url() . 'Admin/roommlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function edit_storeroom()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $this->load->model('Admin_model');
            $formArray = array();
            $retid = $_POST['id'];
            $formArray['location'] = $_POST['location'];
            $formArray['hotel_name'] = $_POST['hotel_name'];
            $formArray['room_type'] = $_POST['room_type'];
            $formArray['meal_plan'] = $_POST['meal_plan'];
            $formArray['occupancy'] = $_POST['occupancy'];
            $formArray['occupancy_adult'] = $_POST['occupancy_adult'];
            $formArray['occupancy_child'] = $_POST['occupancy_child'];
            $amenity = !empty($_POST['amenity']) ? implode(',', $_POST['amenity']) : '0';
            $formArray['amenity'] = $amenity;
            $formArray['refundable_status'] = !empty($_POST['refundable_status']) ? $_POST['refundable_status'] : '0';
            if (!empty($_POST['extra_bed'])) {
                $formArray['extra_bed'] = $_POST['extra_bed'];
            } else {
                $formArray['extra_bed'] = 0;
            }
            if (!empty($_POST['extra_bed_charge'])) {
                $formArray['extra_bed_charge'] = $_POST['extra_bed_charge'];
            } else {
                $formArray['extra_bed_charge'] = 0;
            }
            $s_date = implode(',', $_POST['s_date']);
            $formArray['s_date'] = $s_date;
            $e_date = implode(',', $_POST['e_date']);
            $formArray['e_date'] = $e_date;

            $date1 = explode(',', $s_date);
            $start_date = $date1[0];
            $date2 = explode(',', $e_date);
            $end_date = $date2[0];

            $dates1 = new DateTime($start_date);
            $dates2 = new DateTime($end_date);
            $diff = $dates1->diff($dates2);
            $days = $diff->days;
            $start_day = date('d-m-Y', strtotime($start_date));

            $a_price = implode(',', $_POST['a_price']);
            $formArray['actual_price'] = $a_price;
            $o_price = implode(',', $_POST['o_price']);
            $formArray['offer_price'] = $o_price;
            $n_rooms = implode(',', $_POST['n_rooms']);
            $formArray['n_rooms'] = $n_rooms;

            // echo "<pre>";print_r($diff->days);die;
            for ($iDay = 0; $iDay <= $days; $iDay++) {
                $aDays[1 + $iDay]['b_date'] = date('d-m-Y', strtotime($start_day . ' + ' . $iDay . ' days'));
            }
            $delete = $this->db->where('room_id', $retid)->delete('room_allot');
            if ($delete) {
                foreach ($aDays as $value) {
                    $this->db->set('room_id', $retid)->set('no_of_rooms', $n_rooms)->insert('room_allot', $value);
                }
            }

            $this->Admin_model->updroom($formArray, $retid);
            if ($_FILES['r_img1']['name'] != '') {
                $this->update_r_img1_img('r_img1', $retid);
            }
            if ($_FILES['r_img2']['name'] != '') {
                $this->update_r_img2_img('r_img2', $retid);
            }
            if ($_FILES['r_img3']['name'] != '') {
                $this->update_r_img3_img('r_img3', $retid);
            }
            if ($_FILES['r_img4']['name'] != '') {
                $this->update_r_img4_img('r_img4', $retid);
            }
            $this->session->set_flashdata('success', 'Room Updated Successfully.');
            redirect(base_url() . 'Admin/roommlist');
        } else {
            $this->session->set_flashdata('success', 'Room Updated Unsuccessfully.');
            redirect(base_url() . 'Admin/roommlist');
        }
    }

    public function update_r_img1_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/rooms';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_r_img1_img($file_names, $retid);
        }
    }

    public function update_r_img2_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/rooms';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_r_img2_img($file_names, $retid);
        }
    }

    public function update_r_img3_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/rooms';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_r_img3_img($file_names, $retid);
        }
    }

    public function update_r_img4_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/rooms';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_r_img4_img($file_names, $retid);
        }
    }

    public function roommlist()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Hotels';
            $this->load->model('Admin_model');
            $data['rooms'] = $this->Admin_model->rooms();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/roomlist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deleteroom($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deleteroom($id);
            $this->session->set_flashdata('success', 'Room Deleted Successfully.');
            redirect('Admin/roommlist');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function booking_request()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All bookings';
            $this->load->model('Admin_model');
            $data['list'] = $this->Admin_model->booking_request_db();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/booking_request_list', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function booking_details($id)
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Bookings Details';
            $this->load->model('Admin_model');
            $data['list'] = $this->Admin_model->booking_request_db_by_id($id);
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/booking_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function booking_details_print($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $data['list'] = $this->Admin_model->booking_request_db_by_id($id);
            $data['title'] = "Invoice for " . $data['list']->order_id . "";

            // $this->load->view('admin/inc/header',$data);
            $this->load->view('admin/booking_details_print', $data);
            // $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function business_details($id)
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Business Details';
            $this->load->model('Admin_model');
            $data['list'] = $this->Admin_model->business_request_db_by_id($id);
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/business_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function approve_booking()
    {
        if ($this->session->userdata('username') != '') {
            $id = $this->uri->segment('4');
            $block = $this->uri->segment('3');
            if ($this->db->set('block', $block)->where('room_booking_id', $id)->update('room_booking')) {
                $data = $this->db->where('room_booking_id', $id)->get('room_booking')->row();
                $name = $data->first_name;
                $amount = $data->payment_amount;
                $to_email = $data->email;
                $subject = "Welcome to Hotel Booking System";
                $message = "<!DOCTYPE html>
					<html>
					<head>
						<title>Welcome to Hotel Booking System</title>
					</head>
					<body>
						<h5>Dear " . $name . "</h5>
						<h5>We are glad to approve your Bookings.</h5>
						<h5>Thanks for booking, You have Successfully Payment of Rs: " . $amount . "</h5>
						<h5>Thank You</h5>
						<h5>Hotel Team</h5>
					</body>
					</html>
				";
                $this->global_model->email_massage_new($to_email, $message, $subject);
                $this->session->set_flashdata('success', 'Booking Approved');
                // $this->session->set_flashdata('message_status',1);
            } else {
                $this->session->set_flashdata('failure', 'Not Approved');
                // $this->session->set_flashdata('message_status',1);
            }
            redirect('admin/booking_request');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deny_booking()
    {
        if ($this->session->userdata('username') != '') {
            $id = $this->uri->segment('4');
            $block = $this->uri->segment('3');
            if ($this->db->set('block', $block)->where('room_booking_id', $id)->update('room_booking')) {
                $this->session->set_flashdata('success', 'Booking Denied');
                // $this->session->set_flashdata('message_status',1);
            } else {
                $this->session->set_flashdata('failure', 'Not Denied');
                // $this->session->set_flashdata('message_status',1);
            }
            redirect('admin/booking_request');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function partner_business_request()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Partner Business';
            $this->load->model('Admin_model');
            $data['list3'] = $this->Admin_model->partner_business_db();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/business_request_list', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function approve_business()
    {
        if ($this->session->userdata('username') != '') {
            $id = $this->uri->segment('4');
            $block = $this->uri->segment('3');
            if ($this->db->set('block', $block)->where('id', $id)->update('partner_business')) {
                $this->session->set_flashdata('success', 'Business Approved');
                // $this->session->set_flashdata('message_status',1);
            } else {
                $this->session->set_flashdata('failure', 'Not Approved');
                // $this->session->set_flashdata('message_status',1);
            }
            redirect('admin/partner_business_request');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deny_business()
    {
        if ($this->session->userdata('username') != '') {
            $id = $this->uri->segment('4');
            $block = $this->uri->segment('3');
            if ($this->db->set('block', $block)->where('id', $id)->update('partner_business')) {
                $this->session->set_flashdata('success', 'Business Denied');
                // $this->session->set_flashdata('message_status',1);
            } else {
                $this->session->set_flashdata('failure', 'Not Denied');
                // $this->session->set_flashdata('message_status',1);
            }
            redirect('admin/partner_business_request');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function sub_admin()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Sub Admin';
            $this->load->model('Admin_model');
            $data['list'] = $this->Admin_model->sub_admin_db();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/sub_admin_list', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function add_sub_admin()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Sub Admin';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->subadminSrcbyID($id);
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/addsubadmin', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function store_sub_admin_data()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['username'] = $_POST['username'];
            $formArray['phone'] = $_POST['phone'];
            $formArray['email'] = $_POST['email'];
            $formArray['password'] = md5($_POST['password']);
            $formArray['opassword'] = $_POST['password'];
            $formArray['role'] = '2';
            $check = $this->db->where('email', $_POST['email'])->get('admins')->num_rows();

            if ($check <= 0) {
                $retid = $this->Admin_model->inssubadmin($formArray);
                $this->session->set_flashdata('success', 'Sub Admin Added Successfully.');
                redirect(base_url() . 'Admin/sub_admin');
            } else {
                $this->session->set_flashdata('failure', 'Sub Admin Already Exist.');
                redirect(base_url() . 'Admin/sub_admin');
            }
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function edit_store_sub_admin_data()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $id = $_POST['id'];
            $formArray['username'] = $_POST['username'];
            $formArray['phone'] = $_POST['phone'];
            $formArray['email'] = $_POST['email'];
            $formArray['password'] = md5($_POST['password']);
            $formArray['opassword'] = $_POST['password'];
            $formArray['role'] = '2';

            $check = $this->db->where('email', $_POST['email'])->where('id', $id)->get('admins')->num_rows();
            if ($check == 1) {
                $this->admin_model->updsubadmin($formArray, $id);
                $this->session->set_flashdata('success', 'Sub Admin Updated Successfully');
                redirect(base_url() . 'Admin/sub_admin');

            } else {
                $check = $this->db->where('email', $_POST['email'])->get('admins')->num_rows();
                if ($check <= 0) {
                    $this->admin_model->updsubadmin($formArray, $id);
                    $this->session->set_flashdata('success', 'Sub Admin Updated Successfully');
                    redirect(base_url() . 'Admin/sub_admin');

                } else {
                    $this->session->set_flashdata('failure', 'Sub Admin already Exist');
                    redirect(base_url() . 'Admin/sub_admin');

                }
            }
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function delete_sub_admin()
    {
        if ($this->session->userdata('username') != '') {
            $id = $this->uri->segment('3');
            if ($this->db->where('id', $id)->delete('admins')) {
                $this->session->set_flashdata('success', 'Sub Admin Deleted Successfully');
                // $this->session->set_flashdata('message_status',1);
            } else {
                $this->session->set_flashdata('failure', 'Sub Admin Deleted Unsuccessfully');
                // $this->session->set_flashdata('message_status',1);
            }
            redirect('admin/sub_admin');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

//ripan
    public function add_contactus_details()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add Contact Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->fetchcontactdetails();
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_contact_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addcontactdetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add Contact Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['address'] = $_POST['address'];
            $formArray['phone'] = $_POST['phone'];
            $formArray['email'] = $_POST['email'];
            $formArray['map'] = $_POST['map'];
            $formArray['description'] = $_POST['description'];
            $formArray['metatitle'] = $_POST['metatitle'];
            $formArray['metadescription'] = $_POST['metadescription'];
            $formArray['keywords'] = $_POST['keywords'];
            $data['list'] = $this->admin_model->inscontactdetails($formArray);
            $this->session->set_flashdata('success', 'Contact  Details Updated Successfully.');
            redirect(base_url() . 'admin/add_contactus_details');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function statistics()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add statistics Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->db->where('id', 1)->get('statistics')->row_array();
            //$this->admin_model->fetchaboutdetails();

            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_statistics_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addstatisticsdetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add Statistics Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['count1'] = $_POST['count1'];
            $formArray['count2'] = $_POST['count2'];
            $formArray['count3'] = $_POST['count3'];
            $formArray['count4'] = $_POST['count4'];
            $formArray['title1'] = $_POST['title1'];
            $formArray['title2'] = $_POST['title2'];
            $formArray['title3'] = $_POST['title3'];
            $formArray['title4'] = $_POST['title4'];

            $data['list'] = $this->db->where('id', 1)->update('statistics', $formArray);
            //$this->admin_model->insstatisticsdetails($formArray);

            $this->session->set_flashdata('success', 'Statictics Details Updated Successfully.');
            redirect(base_url() . 'admin/statistics');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function add_about_details()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add About Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->fetchaboutdetails();
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_about_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addaboutdetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add About Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['about_us'] = $_POST['about_us'];
            $formArray['title1'] = $_POST['title1'];
            $formArray['title2'] = $_POST['title2'];
            $formArray['why'] = $_POST['why'];
            $formArray['metatitle'] = $_POST['metatitle'];
            $formArray['metadescription'] = $_POST['metadescription'];
            $formArray['keywords'] = $_POST['keywords'];
            $data['list'] = $this->admin_model->insaboutdetails($formArray);
            $retid = '1';
            if (array_filter($_FILES['images']['name'])) {
                $this->update_about_img('images', $retid);
            }
            $this->session->set_flashdata('success', 'About  Details Updated Successfully.');
            redirect(base_url() . 'admin/add_about_details');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function update_about_img($form_field_name, $retid)
    {
        $data = array();
        $countfiles = count($_FILES['images']['name']);
        for ($i = 0; $i < $countfiles; $i++) {
            if (!empty($_FILES['images']['name'][$i])) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['images']['name'][$i];
                $_FILES['file']['type'] = $_FILES['images']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['images']['error'][$i];
                $_FILES['file']['size'] = $_FILES['images']['size'][$i];

                // Set preference
                $config['upload_path'] = 'assets/admin/uploads/gallery';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|xlsx';
                $config['max_size'] = '5120'; // max_size in kb
                $config['max_width'] = '4480'; // pixel
                $config['max_height'] = '4480'; // pixel
                $config['file_name'] = $_FILES['images']['name'][$i];

                //Load upload library
                $this->upload->initialize($config);
                // File upload
                $product_images = '';
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename[] = $uploadData['file_name'];
                }
            }
        }
        $pictures = '';
        if (!empty($filename)) {
            $pictures = implode(",", $filename);
        }
        $this->db->set('images', $pictures)->where('id', $retid)->update('about_details');
        // $this->Admin_model->update_about_imgs($pictures,$retid);
    }

    public function add_roomrate_details()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add Room & Rate Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->fetchroomratedetails();
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_roomrate_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addroomratedetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add Room & Rate Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['metatitle'] = $_POST['metatitle'];
            $formArray['metadescription'] = $_POST['metadescription'];
            $formArray['keywords'] = $_POST['keywords'];
            $data['list'] = $this->admin_model->insroomratedetails($formArray);
            $this->session->set_flashdata('success', 'Room & Rate  Details Updated Successfully.');
            redirect(base_url() . 'admin/add_roomrate_details');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function add_partner_details()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add Partner Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->fetchpartnermetadetails();
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_partner_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addpartnerdetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add Partner Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['metatitle'] = $_POST['metatitle'];
            $formArray['metadescription'] = $_POST['metadescription'];
            $formArray['keywords'] = $_POST['keywords'];
            $data['list'] = $this->admin_model->inspartnerdetails($formArray);
            $this->session->set_flashdata('success', 'Partner  Details Updated Successfully.');
            redirect(base_url() . 'admin/add_partner_details');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function banner()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'All Banner List';
            $this->load->model('Admin_model');
            $data['list'] = $this->Admin_model->banner_list();
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/bannerlist', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addbanner()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            if (!empty($id)) {
                $data['title'] = 'Edit Banner';
            } else {
                $data['title'] = 'Add Banner';
            }
            $data['list'] = $this->admin_model->bannerSrcbyID($id);
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_banner', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function deletebanner($id)
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $this->Admin_model->deletebanner($id);
            $this->session->set_flashdata('success', 'Banner Deleted Successfully.');
            redirect('Admin/banner');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function storebanner()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model('Admin_model');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['title'] = $_POST['title'];
            $formArray['sub_title'] = $_POST['sub_title'];
            $retid = $this->Admin_model->insbanner($formArray);
            if ($_FILES['images']['name'] != '') {
                $this->update_banner_img('images', $retid);
            }

            $this->session->set_flashdata('success', 'Banner Added Successfully.');
            redirect(base_url() . 'Admin/banner');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function update_banner_img($form_field_name, $retid)
    {
        $this->load->model('Admin_model');
        $config['upload_path'] = 'assets/admin/uploads/banner';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($form_field_name)) {
            $errors = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $file_names = $upload_data['file_name'];
            $rs_update = $this->Admin_model->update_banner_imgs($file_names, $retid);
        }
    }

    public function updatebanner()
    {
        if ($this->session->userdata('username') != '') {
            // echo "<pre>";print_r(array_filter($_FILES['r_images']['name']));die;
            $this->load->model('Admin_model');
            $formArray = array();
            $retid = $_POST['id'];
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['title'] = $_POST['title'];
            $formArray['sub_title'] = $_POST['sub_title'];
            $this->Admin_model->updbanner($formArray, $retid);

            if (!empty($_FILES['images']['name'])) {
                $this->update_banner_img('images', $retid);
            }

            $this->session->set_flashdata('success', 'Banner Updated Successfully.');
            redirect(base_url() . 'Admin/banner');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function add_sociallink_details()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add Social Links';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->fetchsociallinkdetails();
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_social_links', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addsocialdetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add Social Links';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['fb'] = $_POST['fb'];
            $formArray['insta'] = $_POST['insta'];
            $formArray['twitter'] = $_POST['twitter'];
            $data['list'] = $this->admin_model->inssocialdetails($formArray);
            $this->session->set_flashdata('success', 'Social  Details Updated Successfully.');
            redirect(base_url() . 'admin/add_sociallink_details');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function add_term_details()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add Term Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->fetchtermdetails();
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_term_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addtermdetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add Term Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['terms'] = $_POST['terms'];
            $data['list'] = $this->admin_model->instermdetails($formArray);
            $this->session->set_flashdata('success', 'Term  Details Updated Successfully.');
            redirect(base_url() . 'admin/add_term_details');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function add_privacy_details()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add Privacy Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->fetchprivacydetails();
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_privacy_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addprivacydetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add Privacy Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['terms'] = $_POST['terms'];
            $data['list'] = $this->admin_model->insprivacydetails($formArray);
            $this->session->set_flashdata('success', 'Privacy Details Updated Successfully.');
            redirect(base_url() . 'admin/add_privacy_details');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function add_cancellation_details()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add Cancellation Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->fetchcanceldetails();
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_cancellation_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addcancellationdetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add Cancellation Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['terms'] = $_POST['terms'];
            $data['list'] = $this->admin_model->inscanceldetails($formArray);
            $this->session->set_flashdata('success', 'Cancellation Details Updated Successfully.');
            redirect(base_url() . 'admin/add_cancellation_details');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function add_faq_details()
    {
        if ($this->session->userdata('username') != '') {
            $data['title'] = 'Add FAQ Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $data['list'] = $this->admin_model->fetchfaqdetails();
            // echo "<pre>";print_r($data['list']);die;
            $this->load->view('admin/inc/header', $data);
            $this->load->view('admin/add_faq_details', $data);
            $this->load->view('admin/inc/footer');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function addfaqdetails()
    {
        if ($this->session->userdata('username') != '') {
            // echo '<pre>';print_r($_POST);die();
            $data['title'] = 'Add FAQ Details';
            $this->load->model('Admin_model');
            $id = $this->uri->segment('3');
            $formArray = array();
            $formArray['admin_id'] = $this->session->userdata('id');
            $formArray['terms'] = $_POST['terms'];
            $data['list'] = $this->admin_model->insfaqdetails($formArray);
            $this->session->set_flashdata('success', 'FAQ Details Updated Successfully.');
            redirect(base_url() . 'admin/add_faq_details');
        } else {
            $this->session->set_flashdata('failure', 'Invalid Username and Password');
            redirect(base_url() . 'Admin');
        }
    }

    public function gethotel()
    {
        // echo "<pre>";print_r($_POST);die;
        $id = $_POST['id'];
        $location_id = $_POST['location'];
        $list = $this->db->where('id', $_POST['id'])->get('roomm')->row();
        if (!empty($location_id)) {
            $check = $this->db->where('location', $_POST['location'])->get('hotels')->result_array();
            // echo "<pre>";print_r($check);die;
            if (!empty($check)) {
                echo '<option value="">Select Hotel</option>';
                foreach ($check as $value) {
                    $c = "";
                    if (!empty($list)) {
                        if ($value['id'] == $list->hotel_name) {
                            $c = "selected";
                        }
                    }
                    echo '<option value="' . $value['id'] . '" ' . $c . '>' . $value['name'] . '</option>';
                }
            } else {
                echo '<option value="">Select Hotel</option>';
            }
        } else {
            echo '<option value="">Select Hotel</option>';
        }
    }
}