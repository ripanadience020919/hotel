<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getlogindata($username, $password)
    {
        $data = $this->db->where('email', $username)->where('opassword', $password)->get('admins')->num_rows();
        return $data;
    }

    public function getsuperadmin($username, $password)
    {
        $data = $this->db->where('email', $username)->where('opassword', $password)->get('admins')->row_array();
        return $data;
    }

    public function locationSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('locations')->row();
        return $data;
    }

    public function hotelcategorySrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('hotel_category')->row();
        return $data;
    }

    public function locations()
    {
        $data = $this->db->get('locations')->result_array();
        return $data;
    }

    public function hotels()
    {
        $data = $this->db->get('hotels')->result_array();
        return $data;
    }

    public function rooms()
    {
        $data = $this->db->get('roomm')->result_array();
        return $data;
    }

    public function hotelcategory()
    {
        $data = $this->db->get('hotel_category')->result_array();
        return $data;
    }

    public function mealplan()
    {
        $data = $this->db->get('meal_plans')->result_array();
        return $data;
    }

    public function allroomtype()
    {
        $data = $this->db->get('rooms')->result_array();
        return $data;
    }

    public function alltravelpartner()
    {
        $data = $this->db->get('travelpartners')->result_array();
        return $data;
    }

    public function allamenity()
    {
        $data = $this->db->get('amenities')->result_array();
        return $data;
    }

    public function allfacility()
    {
        $data = $this->db->get('facilities')->result_array();
        return $data;
    }

    public function inslocation($data)
    {
        $this->db->insert('locations', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function inshotel($data)
    {
        $this->db->insert('hotels', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insroom($data)
    {
        $this->db->insert('roomm', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function instestimonials($data)
    {
        $this->db->insert('testimonials', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function update_testi_img($file_names,$retid)
    {
        $this->db->set('images', $file_names)->where('id', $retid)->update('testimonials');
    }
    
    public function testi_list()
    {
        $data = $this->db->get('testimonials')->result_array();
        return $data;
    }
    
    public function testiSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('testimonials')->row();
        return $data;
    }
    
    public function updtestimonials($formArray, $id)
    {
        $this->db->where('id', $id)->update('testimonials', $formArray);
        return true;
    }
    
    public function deletetesti($retid)
    {
        $this->db->where('id', $retid)->delete('testimonials');
    }

    public function inshotelcategory($data)
    {
        $this->db->insert('hotel_category', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insmealplan($data)
    {
        $this->db->insert('meal_plans', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insroomtype($data)
    {
        $this->db->insert('rooms', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function instravelpartners($data)
    {
        $this->db->insert('travelpartners', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insamenity($data)
    {
        $this->db->insert('amenities', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insfacility($data)
    {
        $this->db->insert('facilities', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function update_location($formArray, $id)
    {
        $this->db->where('id', $id)->update('locations', $formArray);
        return true;
    }

    public function update_hotelcategory($formArray, $id)
    {
        $this->db->where('id', $id)->update('hotel_category', $formArray);
        return true;
    }

    public function update_loc_imgs($file_names,$retid)
    {
        $this->db->set('image', $file_names)->where('id', $retid)->update('locations');
    }

    public function update_loc_vid($file_names,$retid)
    {
        $this->db->set('l_video', $file_names)->where('id', $retid)->update('locations');
    }

    public function update_h_thumb_img($file_names,$retid)
    {
        $this->db->set('h_thumb', $file_names)->where('id', $retid)->update('hotels');
    }

    public function update_h_banner_img($file_names,$retid)
    {
        $this->db->set('h_banner', $file_names)->where('id', $retid)->update('hotels');
    }

    public function update_h_img1_img($file_names,$retid)
    {
        $this->db->set('h_img1', $file_names)->where('id', $retid)->update('hotels');
    }

    public function update_h_img2_img($file_names,$retid)
    {
        $this->db->set('h_img2', $file_names)->where('id', $retid)->update('hotels');
    }

    public function update_h_img3_img($file_names,$retid)
    {
        $this->db->set('h_img3', $file_names)->where('id', $retid)->update('hotels');
    }

    public function update_h_img4_img($file_names,$retid)
    {
        $this->db->set('h_img4', $file_names)->where('id', $retid)->update('hotels');
    }

    public function update_r_img1_img($file_names,$retid)
    {
        $this->db->set('r_img1', $file_names)->where('id', $retid)->update('roomm');
    }

    public function update_r_img2_img($file_names,$retid)
    {
        $this->db->set('r_img2', $file_names)->where('id', $retid)->update('roomm');
    }

    public function update_r_img3_img($file_names,$retid)
    {
        $this->db->set('r_img3', $file_names)->where('id', $retid)->update('roomm');
    }

    public function update_r_img4_img($file_names,$retid)
    {
        $this->db->set('r_img4', $file_names)->where('id', $retid)->update('roomm');
    }

    public function deletelocation($retid)
    {
        $this->db->where('id', $retid)->delete('locations');
    }

    public function deletehotel($retid)
    {
        $this->db->where('id', $retid)->delete('hotels');
    }

    public function deleteroom($retid)
    {
        $this->db->where('id', $retid)->delete('roomm');
    }

    public function deletehotelcategory($retid)
    {
        $this->db->where('id', $retid)->delete('hotel_category');
    }

    public function deletemealplan($retid)
    {
        $this->db->where('id', $retid)->delete('meal_plans');
    }

    public function deleteroomtype($retid)
    {
        $this->db->where('id', $retid)->delete('rooms');
    }

    public function deletetravelpartner($retid)
    {
        $this->db->where('id', $retid)->delete('travelpartners');
    }

    public function deleteamenity($retid)
    {
        $this->db->where('id', $retid)->delete('amenities');
    }

    public function deletefacility($retid)
    {
        $this->db->where('id', $retid)->delete('facilities');
    }

    public function amenitySrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('amenities')->row();
        return $data;
    }

    public function updamenity($formArray, $id)
    {
        $this->db->where('id', $id)->update('amenities', $formArray);
        return true;
    }

    public function facilitySrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('facilities')->row();
        return $data;
    }

    public function updfacility($formArray, $id)
    {
        $this->db->where('id', $id)->update('facilities', $formArray);
        return true;
    }

    public function mealSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('meal_plans')->row();
        return $data;
    }

    public function updmealplan($formArray, $id)
    {
        $this->db->where('id', $id)->update('meal_plans', $formArray);
        return true;
    }

    public function roomtypeSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('rooms')->row();
        return $data;
    }

    public function updroomtype($formArray, $id)
    {
        $this->db->where('id', $id)->update('rooms', $formArray);
        return true;
    }

    public function travelpartnerSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('travelpartners')->row();
        return $data;
    }

    public function updtravelpartners($formArray, $id)
    {
        $this->db->where('id', $id)->update('travelpartners', $formArray);
        return true;
    }

    public function roomSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('roomm')->row_array();
        return $data;
    }

    public function roomSrcnotbyID($id)
    {
        $data = $this->db->where('id !=', $id)->get('roomm')->result_array();
        return $data;
    }

    public function hotel_roomSrcbyID($id)
    {
        $data = $this->db->where('hotel_name', $id)->get('roomm')->result_array();
        return $data;
    }

    public function hotelsSrcbyID($id)
    {
        $data = $this->db->where('location', $id)->get('hotels')->result_array();
        return $data;
    }

    public function roomSrcbyIDadmin($id)
    {
        $data = $this->db->where('id', $id)->get('roomm')->row();
        return $data;
    }

    public function updroom($formArray, $id)
    {
        $this->db->where('id', $id)->update('roomm', $formArray);
        return true;
    }

    public function partner_business_db()
    {
        $data = $this->db->get('partner_business')->result_array();
        return $data;
    }

    public function hotelSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('hotels')->row();
        return $data;
    }

    public function updhotel($formArray, $id)
    {
        $this->db->where('id', $id)->update('hotels', $formArray);
        return true;
    }

    public function booking_request_db()
    {
        $data = $this->db->get('room_booking')->result_array();
        return $data;
    }

    public function booking_request_db_by_id($id)
    {
        $data = $this->db->where('room_booking_id', $id)->get('room_booking')->row();
        return $data;
    }

    public function business_request_db_by_id($id)
    {
        $data = $this->db->where('id', $id)->get('partner_business')->row();
        return $data;
    }

    public function sub_admin_db()
    {
        $data = $this->db->where('role', '2')->get('admins')->result_array();
        return $data;
    }

    public function subadminSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->where('role', '2')->get('admins')->row();
        return $data;
    }

    public function updsubadmin($formArray, $id)
    {
        $this->db->where('id', $id)->update('admins', $formArray);
        return true;
    }

    public function inssubadmin($data)
    {
        $this->db->insert('admins', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function metas_db()
    {
        $data = $this->db->get('meta_tbl')->result_array();
        return $data;
    }

    public function deletemeta($retid)
    {
        $this->db->where('id', $retid)->delete('meta_tbl');
    }

    public function metaSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('meta_tbl')->row();
        return $data;
    }

    public function update_meta($formArray, $retid)
    {
        $this->db->where('id', $retid)->update('meta_tbl', $formArray);
        return true;
    }

    public function insgallery($data)
    {
        $this->db->insert('gallery', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function update_gal_h_imgs($file_names,$retid)
    {
        $this->db->set('h_image', $file_names)->where('id', $retid)->update('gallery');
    }

    public function update_gal_r_imgs($file_names,$retid)
    {
        $this->db->set('r_image', $file_names)->where('id', $retid)->update('gallery');
    }

    public function update_gal_b_imgs($file_names,$retid)
    {
        $this->db->set('b_image', $file_names)->where('id', $retid)->update('gallery');
    }

    public function update_gal_d_imgs($file_names,$retid)
    {
        $this->db->set('d_image', $file_names)->where('id', $retid)->update('gallery');
    }

    public function gallery_list()
    {
        $data = $this->db->get('gallery')->result_array();
        return $data;
    }

    public function deletegallery($retid)
    {
        $this->db->where('id', $retid)->delete('gallery');
    }

    public function gallerySrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('gallery')->row();
        return $data;
    }

    public function updgallery($fdata,$retid)
    {
        $this->db->where('id', $retid)->update('gallery', $fdata);
        return true;
    }

//ripan
    public function fetchtermdetails()
    {
        $data = $this->db->where('id', 1)->get('terms')->row_array();
        return $data;
    }

    public function fetchprivacydetails()
    {
        $data = $this->db->where('id', 1)->get('privacy')->row_array();
        return $data;
    }

    public function fetchcanceldetails()
    {
        $data = $this->db->where('id', 1)->get('cancellations')->row_array();
        return $data;
    }

    public function fetchfaqdetails()
    {
        $data = $this->db->where('id', 1)->get('faqs')->row_array();
        return $data;
    }
    
    public function fetchcontactdetails()
    {
        $data = $this->db->where('id', 1)->get('contact_details')->row_array();
        return $data;
    }

    public function fetchaboutdetails()
    {
        $data = $this->db->where('id', 1)->get('about_details')->row_array();
        return $data;
    }

    public function fetchroomratedetails()
    {
        $data = $this->db->where('id', 1)->get('room_rates')->row_array();
        return $data;
    }

    public function fetchpartnermetadetails()
    {
        $data = $this->db->where('id', 1)->get('partner_meta_details')->row_array();
        return $data;
    }

    public function inscontactdetails($data)
    {
        $this->db->where('id', 1)->update('contact_details', $data);
        // $id = $this->db->insert_id();
        // return $id;
    }

    public function insaboutdetails($data)
    {
        $this->db->where('id', 1)->update('about_details', $data);
        // $id = $this->db->insert_id();
        // return $id;
    }

    public function insroomratedetails($data)
    {
        $this->db->where('id', 1)->update('room_rates', $data);
        // $id = $this->db->insert_id();
        // return $id;
    }

    public function inspartnerdetails($data)
    {
        $this->db->where('id', 1)->update('partner_meta_details', $data);
        // $id = $this->db->insert_id();
        // return $id;
    }
    
    public function instermdetails($data)
    {
        $this->db->where('id', 1)->update('terms', $data);
        // $id = $this->db->insert_id();
        // return $id;
    }

    public function insprivacydetails($data)
    {
        $this->db->where('id', 1)->update('privacy', $data);
        // $id = $this->db->insert_id();
        // return $id;
    }

    public function inscanceldetails($data)
    {
        $this->db->where('id', 1)->update('cancellations', $data);
        // $id = $this->db->insert_id();
        // return $id;
    }

    public function insfaqdetails($data)
    {
        $this->db->where('id', 1)->update('faqs', $data);
        // $id = $this->db->insert_id();
        // return $id;
    }
    
    public function insbanner($data)
    {
        $this->db->insert('banner', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function update_banner_imgs($file_names,$retid)
    {
        $this->db->set('images', $file_names)->where('id', $retid)->update('banner');
    }

    public function banner_list()
    {
        $data = $this->db->get('banner')->result_array();
        return $data;
    }

    public function bannerSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('banner')->row();
        return $data;
    }

    public function updbanner($formArray, $retid)
    {
        $this->db->where('id', $retid)->update('banner', $formArray);
        return true;
    }

    public function deletebanner($retid)
    {
        $this->db->where('id', $retid)->delete('banner');
    }
    
    public function fetchsociallinkdetails()
    {
        $data = $this->db->where('id', 1)->get('social_links')->row_array();
        return $data;
    }
    
    public function inssocialdetails($data)
    {
        $this->db->where('id', 1)->update('social_links', $data);
        // $id = $this->db->insert_id();
        // return $id;
    }
}