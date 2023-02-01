<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Select_data extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        check_role_admin();
    }

	public function index()
	{
        $data = [
            'title' => 'level',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'levels' => $this->db->get('levels')->result_array()
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('select_data/index');
        $this->load->view('layout/footer');
	}//end 

    public function add()
	{
        $data = [
            'title' => 'level',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            
        ];

        $this->form_validation->set_rules('level', 'level', 'required|is_unique[levels.level]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('select_data/add');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('add new level');
            $data = array(
                'level' => htmlspecialchars($this->input->post('level')),

            );
            
            $this->db->insert('levels', $data);

            $this->session->set_flashdata('success', 'success insert new level!!!');
                redirect('select_data/');
        }

	}//end 

    public function remove($id =0)
    {
        activiti_log('remove level');
        $this->db->where('id', $id);
        $this->db->delete('levels');

        $this->session->set_flashdata('success', 'success delete level!!!');
        redirect('select_data/');
    }


    public function list_people()
	{
        $data = [
            'title' => 'target people',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'people' => $this->db->get('target_people')->result_array()
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('select_data/list_people');
        $this->load->view('layout/footer');
	}//end 


    public function add_people()
	{
        $data = [
            'title' => 'people',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            
        ];

        $this->form_validation->set_rules('people', 'people', 'required|is_unique[target_people.people]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('select_data/add_people');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('add new people');
            $data = array(
                'people' => htmlspecialchars($this->input->post('people')),

            );
            
            $this->db->insert('target_people', $data);

            $this->session->set_flashdata('success', 'success insert new people!!!');
                redirect('select_data/list_people');
        }

	}//end 

    public function remove_people($id =0)
    {
        activiti_log('remove people');
        $this->db->where('id', $id);
        $this->db->delete('target_people');

        $this->session->set_flashdata('success', 'success delete people!!!');
        redirect('select_data/list_people');
    }
    

}//end class 



?>