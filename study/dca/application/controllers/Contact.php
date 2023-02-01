<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    private $data;
	public function __construct()
    {
        parent::__construct();
        
        if(!$this->session->userdata('id'))
        {
            redirect('auth/logout');
        }
		
        $this->db->where('status', 1);
		$this->data['total_message'] = $this->db->count_all_results('contacts');
		
        $this->data['unread_message'] = $this->db->get_where('contacts', array('status' => 1))->result_array();

        $this->data['title'] = "message page";
        $this->data['user'] = $this->user_model->userById($this->session->userdata('id'));
    }

	public function index()
	{
        $this->data['message'] = $this->db->get('contacts')->result_array();
            
            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
			$this->load->view('contact/index');
			$this->load->view('template_admin/footer');
	

		
    }//end index

    public function details($id = null)
    {
        $this->data['message_details'] = $this->db->get_where('contacts', array('id' => $id))->row_array();

        $this->db->set('status', 2);
        $this->db->where('id',$id);
        $this->db->update('contacts');
        
        $this->load->view('template_admin/header',$this->data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/navbar');
        $this->load->view('contact/details');
        $this->load->view('template_admin/footer');
    }

    public function delete($id = null)
    {
        if($id !== null)
        {
            $this->db->where('id', $id);
           
            if($this->db->delete('contacts'))
            {
                $this->session->set_flashdata('messege', alertSuccess('success delete'));
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('fail to delete'));
            }
            
        }
        redirect('contact');
    }//end delete
}