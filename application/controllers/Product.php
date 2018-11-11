<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('product_model');
        }

        public function index()
	{
            $data['products']= $this->product_model->product_list();
            $this->load->view('products/list',$data);
	}
        
        public function add()
	{
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_rules('prod_name', 'Product Name', 'required|max_length[60]|min_length[5]|xss_clean');
            $this->form_validation->set_rules('prod_description', 'Product Description', 'min_length[5]|xss_clean');
            $this->form_validation->set_rules('prod_price', 'Product Price', 'required|integer|xss_clean');
            $this->form_validation->set_rules('prod_qty', 'Product Quantity', 'required|integer|max_length[5]|xss_clean');
            if ($this->form_validation->run() != FALSE)
            {
                $post_arr=$this->input->post();
                if(!empty($post_arr))
                {
                    $insert_id= $this->product_model->add_product($post_arr);
                    if($insert_id>0)
                        $this->session->set_flashdata('success','Product added successfully');
                    else
                        $this->session->set_flashdata('failure','Some error occured.Please try again.');
                    redirect('product','refresh');
                }
            }
            $this->load->view('products/add');
	}
        
        public function edit($id)
	{
            $data['product']= $this->product_model->get_product($id);
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_rules('prod_name', 'Product Name', 'required|max_length[60]|min_length[5]|xss_clean');
            $this->form_validation->set_rules('prod_description', 'Product Description', 'min_length[5]|xss_clean');
            $this->form_validation->set_rules('prod_price', 'Product Price', 'required|integer|xss_clean');
            $this->form_validation->set_rules('prod_qty', 'Product Quantity', 'required|integer|max_length[5]|xss_clean');
            if ($this->form_validation->run() != FALSE)
            {
                $post_arr=$this->input->post();
                if(!empty($post_arr))
                {
                    $affected_rows= $this->product_model->update_product($post_arr,$id);
                    if($affected_rows>0)
                        $this->session->set_flashdata('success','Product updated successfully');
                    else
                        $this->session->set_flashdata('failure','Some error occured.Please try again.');
                redirect('product','refresh');
                }
            }
            $this->load->view('products/edit',$data);
        }
        
        public function delete($id)
	{
            $affected_rows= $this->product_model->delete_product($id);
            if($affected_rows>0)
                $this->session->set_flashdata('success','Product deleted successfully');
            else
                $this->session->set_flashdata('failure','Some error occured.Please try again.');
            redirect('product','refresh');
	}
        
        public function view($id)
	{
            $data['product']= $this->product_model->get_product($id);
            $this->load->view('products/view',$data);
	}
        
        public function delete_all()
        {
            $ids=$this->input->post('checked_id');
//            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            //$this->form_validation->set_rules('checked_id[]', 'Product Id', 'required|xss_clean',array('required'=>'Please select at least 1 record.'));
            //if ($this->form_validation->run() != FALSE)
            //{
                $delete=$this->product_model->delete_product($ids);
                if($delete>0)
                    $this->session->set_flashdata('success','Product(s) deleted successfully');
                else
                    $this->session->set_flashdata('failure','Some error occured.Please try again.');
            //}
            //else
            //    $this->session->set_flashdata('failure',  validation_errors());
            redirect('product','refresh');
        }
}   