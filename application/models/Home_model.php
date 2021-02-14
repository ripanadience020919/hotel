<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getlogindata($username, $password)
    {
        $data = $this->db->where('email', $username)->where('password', $password)->get('users')->num_rows();
        return $data;
    }

    public function hotel_roomSrcbyID1($id, $l_id)
    {
        $data = $this->db->where('hotel_name', $id)->where('location',$l_id)->get('roomm')->result_array();
        return $data;
    }

    public function metasrc()
    {
        $data = $this->db->get('meta_tbl')->row();
        return $data;
    }

    public function inspartner_business($data)
    {
        $this->db->insert('partner_business', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function partner_business_srcbyid($id)
    {
        $data = $this->db->where('user_id', $id)->get('partner_business')->result_array();
        return $data;
    }

    public function partner_business_editSrcbyID($id)
    {
        $data = $this->db->where('id', $id)->get('partner_business')->row();
        return $data;
    }

    public function updpartner_business($formArray, $id)
    {
        $this->db->where('id', $id)->update('partner_business', $formArray);
        return true;
    }

    public function getuser($username, $password)
    {
        $data = $this->db->where('email', $username)->where('password', $password)->get('users')->row_array();
        return $data;
    }

    public function get_user($email)
    {
        $data = $this->db->where('email',$email)->get('users')->row_array();
        return $data;
    }

    public function getmobile($mobile)
    {
        $data = $this->db->where('mobile', $mobile)->get('users')->row_array();
        return $data;
    }

    public function getemail($email)
    {
        $data = $this->db->where('email', $email)->get('users')->row_array();
        return $data;
    }

    public function insuser($data)
    {
        $this->db->insert('users', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function locationsSrc()
    {
        $this->db->order_by('id');
        // $this->db->limit(6);
        $query = $this->db->get('locations');
        return $query->result_array();
    }

    public function insbooking($data)
    {
        $this->db->insert('room_booking', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    /*public function get_specific_hotels($frm_date,$to_date,$adults,$childs){
        return $this->db->select('*')
        // ->where('s_date >=',$frm_date)
        ->where('s_date <>',$frm_date)
        ->where('e_date >=',$to_date)
        ->where('occupancy_adult >=',$adults)
        ->where('occupancy_child >=',$childs)
        ->get('roomm')->result_array();
    }*/

    public function get_specific_hotels($frm_date,$to_date,$guest,$location)
    {
        return $this->db->select('*')
        // ->where('s_date >=',$frm_date)
        ->where('s_date <=',$frm_date)
        ->where('e_date >=',$to_date)
        ->where('occupancy >=',$guest)
        ->where('location =',$location)
        ->get('roomm')->result_array();
    }
    
    public function user_db_list($id)
    {
        $data = $this->db->where('id', $id)->get('users')->row();
        return $data;
    }

    public function get_hotels()
    {
        $data = $this->db->get('roomm')->result_array();
        return $data;
    }
    
    public function room_booking_db_list($id)
    {
        $data = $this->db->where('user_id', $id)->get('room_booking')->result_array();
        return $data;
    }
}