<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

        Private $table_name;
        Private $primary_key;
        
        public function __construct() {
            parent::__construct();
            $this->table_name = 'products';
            $this->primary_key = 'id';
        }

        public function add_product($post_arr)
	{
            $insert_data=[
                'name'=>$post_arr['prod_name'],
                'description'=>$post_arr['prod_description'],
                'price'=>$post_arr['prod_price'],
                'qty'=>$post_arr['prod_qty'],
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d')
            ];
            $this->db->insert($this->table_name,$insert_data);
            $insert_id=$this->db->insert_id();
            return $insert_id;
	}
        
        public function update_product($post_data,$id)
	{
            $update_data=[
                'name'=>$post_data['prod_name'],
                'description'=>$post_data['prod_description'],
                'price'=>$post_data['prod_price'],
                'qty'=>$post_data['prod_qty'],
                'updated_at'=>date('Y-m-d')
            ];
            $this->db->where($this->primary_key,$id);
            $this->db->update($this->table_name,$update_data);
            $affected_rows=$this->db->affected_rows();
            return $affected_rows;
        }
        
        public function delete_product($id)
	{
            if(is_array($id))
                $this->db->where_in($this->primary_key,$id);           
            else
                $this->db->where($this->primary_key,$id);
            $this->db->delete($this->table_name);
            $affected_rows=$this->db->affected_rows();
            return $affected_rows;
	}
        
        public function get_product($id)
	{
            $this->db->select("id AS id,name AS name,description AS description,price AS price,qty AS qty,DATE_FORMAT(created_at,' %d %b %Y') AS created_at,DATE_FORMAT(updated_at,' %d %b %Y') AS updated_at");
            $this->db->from($this->table_name);
            $this->db->where($this->primary_key,$id);
            $product=$this->db->get()->row();
            return $product;
	}
        
        public function product_list()
	{
            $this->db->select("id AS id,name AS name,description AS description,price AS price,qty AS qty,DATE_FORMAT(created_at,' %d %b %Y') AS created_at,DATE_FORMAT(updated_at,' %d %b %Y') AS updated_at");
            $products= $this->db->get($this->table_name)->result();
            return $products;
	}
}   