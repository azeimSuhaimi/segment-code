<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        check_role_admin();
    }

    public function index()
    {
        $data = [
            'title' => 'Positions',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'positionall' => $this->Position_model->getallposition()
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('Position/index');
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data = [
            'title' => 'add new Position',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic'))
        ];


        $this->form_validation->set_rules('position', 'position', 'required|is_unique[positions.position]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('Position/add');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('add new position ');
            $data = array(
                
                'position' => htmlspecialchars($this->input->post('position')),
                'status' => 1
        );
        
        $this->db->insert('positions', $data);

        $this->session->set_flashdata('success', 'success insert new position!!!');
        redirect('Position/');

        }
    }


    public function edit($id = 0)
    {
        $data = [
            'title' => 'Edit Position',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'position' => $this->Position_model->getbyid($id)
        ];

        $this->form_validation->set_rules('position', 'position', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('position/edit');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('edit position');
            $position = $this->input->post('position');

            $namedb = $this->Position_model->editpositionbyname($data['position']['position']);
            
            $status = false;
            foreach($namedb as $n)
            {
                if($n['position'] == $position)
                {
                    $status = true;
                    break;
                }
            }

            if($status)
            {
               

                $this->session->set_flashdata('messege', 'position '.$position.' is already use!!!');
                redirect('position/edit/'.$id);

            }
            else
            {   
                $this->db->set('position',$position);
                $this->db->where('id',$id);
                $this->db->update('positions');

                $this->session->set_flashdata('success', 'success edit position!!!');
                redirect('position/');
            }

        }

    }

    public function disabled($id)
    {
        activiti_log('disabled position');
        $this->Position_model->disabled($id);
        $this->session->set_flashdata('success', 'disabled position success!!!');
        redirect('position/');
    }

    public function restoredisabled($id)
    {
        activiti_log('restore position ');
        $this->Position_model->restoredisabled($id);
        $this->session->set_flashdata('success', 'restore position success!!!');
        redirect('position/');
    }

}//end class 



?>