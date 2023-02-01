<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller {

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

        $this->data['title'] = "skills page";
        $this->data['user'] = $this->user_model->userById($this->session->userdata('id'));
    }

    public function index()
    {
        $this->data['skills'] = $this->db->get('skills')->result_array();

        $this->load->view('template_admin/header',$this->data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/navbar');
        $this->load->view('skills/index');
        $this->load->view('template_admin/footer');

    }//end indexx


    public function add()
    {

        $this->form_validation->set_rules('skill', 'skill', 'required|is_unique[skills.skill]|alpha_numeric');
        $this->form_validation->set_rules('percent', 'percent', 'required|integer|less_than_equal_to[100]|greater_than_equal_to[1]');

        if ($this->form_validation->run() == FALSE)
        {           
            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('skills/add');
            $this->load->view('template_admin/footer');
        }
        else
        {
            $skill = $this->input->post('skill');
            $percent = $this->input->post('percent');

            $data = array(
                'skill' => $skill,
                'percent' => $percent
            );
            

            if($this->db->insert('skills', $data))
            {
                $this->session->set_flashdata('messege', alertSuccess('add skills success!!!'));
				redirect('skills/');
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('something wrong  cannot add new skills!!!'));
				redirect('skills/add');
            }

        }
   

    }//end add


    public function edit($id= null)
    {

        //$this->form_validation->set_rules('skill', 'skill', 'required|is_unique[skills.skill]|alpha_numeric');
        $this->form_validation->set_rules('percent', 'percent', 'required|integer|less_than_equal_to[100]|greater_than_equal_to[1]');


        if ($this->form_validation->run() == FALSE)
        {
            $this->data['skill'] =  $this->db->get_where('skills', array('id' => $id))->row_array();;

            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('skills/edit');
            $this->load->view('template_admin/footer');
        }
        else
        {
            //$skill = $this->input->post('skill');
            $percent = $this->input->post('percent');

            //$this->db->set('skill', $skill);
            $this->db->set('percent', $percent);
            $this->db->where('id', $id);
            
            if($this->db->update('skills'))
            {
                $this->session->set_flashdata('messege', alertSuccess('edit skills success!!!'));
				redirect('skills/');
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('something wrong  cannot edit sosial media!!!'));
				redirect('skills/edit/'.$id);
            }
            

        }
   

    }//end edit


    public function delete($id = null)
    {
        if($id !== null)
        {
            $this->db->where('id', $id);
           
            if($this->db->delete('skills'))
            {
                $this->session->set_flashdata('messege', alertSuccess('success delete'));
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('fail to delete'));
            }
            
        }
        redirect('skills');
    }//end delete


}//end class