<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        check_role_admin();
    }

	public function index()
	{
        $data = [
            'title' => 'list report',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'reports' => $this->db->get('reports')->result_array()
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('admin/index');
        $this->load->view('layout/footer');
	}//end 

    public function comfirm($id = 0)
    {
        if($this->session->userdata('role') == 1)
        {
           
            activiti_log('comfirm report staff');
          $this->db->set('admin_comfirm', 1);
          $this->db->where('id', $id);
          $this->db->update('reports');
          $this->session->set_flashdata('success', 'comfirmation success!!!');
          
        }
        redirect('admin/');
    }

    public function listadmin()
    {
        $data = [
            'title' => 'list admin',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'admin' => $this->Users_model->getalladmin($this->session->userdata('ic'))
        ];

        $this->load->view('layout/header',$data);
        $this->load->view('admin/listadmin');
        $this->load->view('layout/footer');
    }

    public function remove($ic = 0, $id = 0)
    {
        activiti_log('remove admin');
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
        redirect('admin/listadmin');
    }

}//end class 



?>