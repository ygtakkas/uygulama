<?php
class users_model extends CI_Model
{
    public function __construct(){
        parent :: __construct();
        $this->load->database();
    }
    public function add($data=array()){
        return $this->db->insert("users",$data);
    }
    public function get($where=array()){
        return $this->db->where($where)->get("users")->row();
    }
    public function getAll($order="id ASC"){
        return $this->db->order_by($order)->get("users")->result();
    }
    public function delete($where=array()){
        return $this->db->where($where)->delete("users");
    }
    public function update($where=array(),$data=array()){
        return $this->db->where($where)->update("users",$data);
    }

    public function get_user($email,$password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        return $query->row();
    }
}?>