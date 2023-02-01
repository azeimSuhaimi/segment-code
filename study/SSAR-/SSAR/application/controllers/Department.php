<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        check_role_admin();
    }

	public function index()
	{
        $data = [
            'title' => 'Department',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'departmentall' => $this->Department_model->getalldepartment()
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('department/index');
        $this->load->view('layout/footer');
	}//end 

    public function add()
    {
        $data = [
            'title' => 'add new Department',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic'))
        ];


        $this->form_validation->set_rules('name', 'department', 'required|is_unique[departments.name]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('department/add');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('add new department');
            $data = array(
                
                'name' => htmlspecialchars($this->input->post('name')),
                'status' => 1
        );
        
        $this->db->insert('departments', $data);

        $this->session->set_flashdata('success', 'success insert new department!!!');
                redirect('Department/');

        }
    }

    public function edit($id = 0)
    {
        $data = [
            'title' => 'Edit Department',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'dept' => $this->Department_model->getbyid($id)
        ];

        $this->form_validation->set_rules('name', 'department', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('department/edit');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('edit department');
            $name = $this->input->post('name');

            $namedb = $this->Department_model->editdepartmentbyname($data['dept']['name']);

            $status = false;
            foreach($namedb as $n)
            {
                if($n['name'] == $name)
                {
                    $status = true;
                    break;
                }
            }

            if($status)
            {


                $this->session->set_flashdata('messege', 'department '.$name.' is already use!!!');
                redirect('Department/edit/'.$id);

            }
            else
            {  
                $this->db->set('name',$name);
                $this->db->where('id',$id);
                $this->db->update('departments');

                $this->session->set_flashdata('success', 'success edit department!!!');
                redirect('Department/');
            }

        }

    }

    public function disabled($id)
    {
        activiti_log('didabled department');
        $this->Department_model->disabled($id);
        $this->session->set_flashdata('success', 'disabled department success!!!');
        redirect('Department/');
    }

    public function restoredisabled($id)
    {
        activiti_log('restore department ');
        $this->Department_model->restoredisabled($id);
        $this->session->set_flashdata('success', 'restore department success!!!');
        redirect('Department/');
    }



}//end class 



?>