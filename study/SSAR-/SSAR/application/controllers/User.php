<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        
    }

	public function index()
	{
        $data = [
            'title' => 'Profile',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'dept' => $this->Department_model->getbyid($this->Users_model->getbyic($this->session->userdata('ic'))['department']),
            'position' => $this->Position_model->getbyid($this->Users_model->getbyic($this->session->userdata('ic'))['position'])
            
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('user/index');
        $this->load->view('layout/footer');
	}//end 

    public function edit()
    {
        $data = [
            'title' => 'Edit Profile',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'dept' => $this->Department_model->getalldepartmentactive(),
            'positionall' => $this->Position_model->getallpositionactive()
            
        ];

        $this->form_validation->set_rules('ic', 'I.c', 'required|numeric|exact_length[12]');
        $this->form_validation->set_rules('name', 'NAME', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('position', 'Position', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('user/edit');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('edit profile');
            $ic_input = $this->input->post('ic');
            $icdb = $this->Users_model->editprofilebyic($this->session->userdata('ic'));

            $status = false;
            foreach($icdb as $n)
            {
                if($n['ic'] == $ic_input)
                {
                    $status = true;
                    break;
                }
            }

            if( $status)
            {
                
                $this->session->set_flashdata('messege', 'ic '.$ic_input.' is already use!!!');
                redirect('user/edit');

            }
            else
            {   
               
                $this->Users_model->edit($this->session->userdata('ic'), $data, $ic_input);

                $data = ['ic' => $ic_input];
                $this->session->set_userdata($data);

                $this->session->set_flashdata('success', 'success edit profile!!!');
                redirect('user/');

            }

 
        }

    }//end edit

    public function changepass()
    {
        $data = [
            'title' => 'Change Password',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            
        ];

        $this->form_validation->set_rules('oldpass', 'Old Password', 'required');
        $this->form_validation->set_rules('pass1', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('pass2', 'Comfirm Password', 'required|matches[pass1]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('user/changepass');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('change password');
           $oldpass = $this->input->post('oldpass');
           $pass1 = htmlspecialchars( $this->input->post('pass1'));
           

           if(password_verify($oldpass,$data['accout']['password']))
           {
                if($oldpass !== $pass1)
                {
                    $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

                    $this->Users_model->changepass($pass_hash, $this->session->userdata('ic'));
                    $this->session->set_flashdata('success', 'Change My password success!!!');
                    redirect('user/changepass');
                }
                else
                {
                    $this->session->set_flashdata('messege', 'New Password already same with Old password!!!');
                    redirect('user/changepass');
                }
           }
           else
           {
            $this->session->set_flashdata('messege', 'Old password is not correct!!!');
            redirect('user/changepass');
           }
        }

    }//end change pass

    public function activity_log()
    {
        $data = [
            'title' => 'activity log',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'log' => $this->db->get_where('activity_log', ['id_user' => $this->session->userdata('id') ])->result_array()
            
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('user/activity_log');
        $this->load->view('layout/footer');
    }

}//end class 



?>