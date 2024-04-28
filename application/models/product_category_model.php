<?php
class product_category_model extends CI_Model
{
    public function __construct(){
        parent :: __construct();
    }
    public function add($data=array()){
        return $this->db->insert("product_categories",$data);
    }
    public function get($where=array()){
        return $this->db->where($where)->get("product_categories")->row();
    }
    public function getAll($order="id ASC"){
        return $this->db->order_by($order)->get("product_categories")->result();
    }
    public function delete($where=array()){
        return $this->db->where($where)->delete("product_categories");
    }
    public function update($where=array(),$data=array()){
        return $this->db->where($where)->update("product_categories",$data);
    }
}?>