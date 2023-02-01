<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filters extends CI_Controller {

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

        $this->data['title'] = "filters page";
        $this->data['user'] = $this->user_model->userById($this->session->userdata('id'));
    }

    public function index()
    {
        $this->data['filters'] = $this->db->get('filters')->result_array();

        $this->load->view('template_admin/header',$this->data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/navbar');
        $this->load->view('filters/index');
        $this->load->view('template_admin/footer');

    }//end indexx


    public function add()
    {

        $this->form_validation->set_rules('filter', 'filter', 'required|is_unique[filters.filter]');

        if ($this->form_validation->run() == FALSE)
        {           
            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('filters/add');
            $this->load->view('template_admin/footer');
        }
        else
        {
            $filter = $this->input->post('filter');


            $data = array(
                'filter' => $filter
            );
            

            if($this->db->insert('filters', $data))
            {
                $this->session->set_flashdata('messege', alertSuccess('add filter success!!!'));
				redirect('filters/');
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('something wrong  cannot add new filter!!!'));
				redirect('filters/add');
            }

        }
   

    }//end add


    public function edit($id= null)
    {

        $this->form_validation->set_rules('filter', 'filter', 'required|is_unique[filters.filter]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->data['filters'] =  $this->db->get_where('filters', array('id' => $id))->row_array();

            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('filters/edit');
            $this->load->view('template_admin/footer');
        }
        else
        {
            //$skill = $this->input->post('skill');
            $filter = $this->input->post('filter');

            //$this->db->set('skill', $skill);
            $this->db->set('filter', $filter);
            $this->db->where('id', $id);
            
            if($this->db->update('filters'))
            {
                $this->session->set_flashdata('messege', alertSuccess('edit skills success!!!'));
				redirect('filters/');
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('something wrong  cannot edit sosial media!!!'));
				redirect('filters/edit/'.$id);
            }
            

        }
   

    }//end edit


    public function delete($id = null)
    {
        if($id !== null)
        {
            $this->db->where('id', $id);
           
            if($this->db->delete('filters'))
            {
                $this->session->set_flashdata('messege', alertSuccess('success delete'));
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('fail to delete'));
            }
            
        }
        redirect('filters');
    }//end delete


}//end class