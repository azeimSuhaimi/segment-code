<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        check_role_admin();
    }

	public function index()
	{
        $data = [
            'title' => 'add staff',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'dept' => $this->Department_model->getalldepartmentactive(),
            'positionall' => $this->Position_model->getallpositionactive(),
            'role' => $this->Role_model->role_all()
        ];

        $this->form_validation->set_rules('ic', 'I.C', 'required|numeric|exact_length[12]|is_unique[users.ic]');
        $this->form_validation->set_rules('password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('name', 'NAME', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('position', 'Position', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('staff/index');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('add new user ');
            $data = array(
                'ic' => htmlspecialchars($this->input->post('ic')),
                'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
                'name' => htmlspecialchars($this->input->post('name')),
                'phone' => htmlspecialchars($this->input->post('phone')),
                'email' => htmlspecialchars($this->input->post('email')),
                'department' => htmlspecialchars($this->input->post('department')),
                'position' => htmlspecialchars($this->input->post('position')),
                'image' => 'empty.png',
                'role' => htmlspecialchars($this->input->post('role')),
                'status' => 1);
            
            
            if($this->db->insert('users', $data))
            {
                $this->session->set_flashdata('success', 'success insert new staff profile!!!');
                redirect('staff/');
            }
            else
            {
                $this->session->set_flashdata('messege', 'fail insert new staff!!!');
                redirect('user/');
            }
        }
	}//end 

    public function liststaff()
    {
        $data = [
            'title' => 'list staff',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'staff' => $this->Users_model->getallstaffactive()
        ];

        $this->load->view('layout/header',$data);
        $this->load->view('staff/liststaff');
        $this->load->view('layout/footer');
    }



    public function view($ic = 0)
    {
        $data = [
            'title' => 'view staff',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'staff' => $this->Users_model->getbyic($ic),
            'dept' => $this->Department_model->getbyid($this->Users_model->getbyic($ic)['department']),
            'position' => $this->Position_model->getbyid($this->Users_model->getbyic($ic)['position'])
        ];

        $this->load->view('layout/header',$data);
        $this->load->view('staff/view');
        $this->load->view('layout/footer');
    }

    public function reset_password($ic = 0)
    {
        $data = [
            'title' => 'reset staff password',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'staff' => $this->Users_model->getbyic($ic),
        ];

        $this->form_validation->set_rules('pass1', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('pass2', 'Comfirm Password', 'required|matches[pass1]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('staff/reset_password');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('reset password user');
            $pass1 = htmlspecialchars( $this->input->post('pass1'));

            if(!password_verify($pass1,$data['staff']['password']))
            {
               
                     $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
 
                     $this->Users_model->changepass($pass_hash, $ic);
                     $this->session->set_flashdata('success', 'reset staff password success!!!');
                     redirect('staff/reset_password/'.$data['staff']['ic']);
                
            }
            else
            {
             $this->session->set_flashdata('messege', 'new password already same with old password!!!');
             redirect('staff/reset_password/'.$data['staff']['ic']);
            }

        }

    }

    public function edit($ic_id = 0)
    {
        //checkic();

        $data = [
            'title' => 'edit staff',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'staff' => $this->Users_model->getbyic($ic_id),
            'ic_id' => $ic_id,
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
            $this->load->view('staff/edit');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('edit user profile');
            $icdb = $this->Users_model->editprofilebyic($ic_id);

            $status = false;
            foreach($icdb as $n)
            {
                if($n['ic'] == $this->input->post('ic'))
                {
                    $status = true;
                    break;
                }
            }

            if($status)
            {

                $this->session->set_flashdata('messege', 'ic '.$this->input->post('ic').' already use!!!');
                redirect('staff/edit/'.$ic_id);

            }
            else
            {   $icdata['accout'] = $this->Users_model->getbyic($ic_id);
                $this->Users_model->edit($ic_id, $icdata, $this->input->post('ic'));

                $this->session->set_flashdata('success', 'success edit profile!!!');
                redirect('staff/view/'.$this->input->post('ic'));
            }
        }


    }

    public function disabled($ic = 0)
    {
        if($ic == 0)
        {
            redirect('staff/liststaff');
        }
        activiti_log('disabled user ');
        $this->db->set('status', 2 );
        $this->db->where('ic', $ic);
        $this->db->update('users');

        $this->session->set_flashdata('success', 'ic '.$ic.' is disabled account!!!');
        redirect('staff/liststaff');
    }



    public function restoredisabled($ic = 0)
    {
        if($ic == 0)
        {
            redirect('staff/liststaffdisabled');
        }
        activiti_log('restore user');
        $this->db->set('status', 1 );
        $this->db->where('ic', $ic);
        $this->db->update('users');

        $this->session->set_flashdata('success', 'ic '.$ic.' is restore account!!!');
        redirect('staff/view/'.$ic);
    }

    public function role($ic = 0)
    {
        if($ic == 0)
        {
            redirect('staff/liststaff');
        }
        activiti_log('change role user');
        $this->db->set('role', 3 );
        $this->db->where('ic', $ic);
        $this->db->update('users');

        $this->session->set_flashdata('success', 'ic '.$ic.' is change role account!!!');
        redirect('staff/view/'.$ic);
    }

    public function disabledrole($ic = 0)
    {
        if($ic == 0)
        {
            redirect('staff/liststaff');
        }
        activiti_log('disabled role');
        $this->db->set('role', 2 );
        $this->db->where('ic', $ic);
        $this->db->update('users');

        $this->session->set_flashdata('success', 'ic '.$ic.' is disabled role account!!!');
        redirect('staff/view/'.$ic);
    }

    public function remove($ic = 0, $id = 0)
    {
        activiti_log('remove user');
        $report = $this->db->get_where('reports',['id_user' => $id])->result_array();
        foreach($report as $r)
        {
            $img = $this->db->get_where('gallery_report',['id_report' => $r['id']])->result_array();
            foreach($img as $i)
            {
                unlink(FCPATH . 'assets/img/gallery/'.$i['image']);
                $this->db->where('id', $i['id']);
                $this->db->delete('gallery_report');
            }
        }
        $old_image = $this->Users_model->getbyic($ic)['image'];
        if($old_image !== "empty.png")
        {
            unlink(FCPATH . 'assets/img/profile/'.$old_image);
        }

        $this->db->where('ic', $ic);
        $this->db->delete('users');

        $this->session->set_flashdata('success', 'ic '.$ic.' berjaya dibuang!!!');
        redirect('staff/liststaff');
    }



}//end class 



?>