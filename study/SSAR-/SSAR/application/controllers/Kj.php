<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kj extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        check_role_kj();
    }

	public function index()
	{
        $data = [
            'title' => 'ketua jabatan',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic'))
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('kj/index');
        $this->load->view('layout/footer');
	}//end
    
    public function list()
    {
        $data = [
            'title' => 'list report department '.$this->Department_model->getbyid($this->Users_model->getbyic($this->session->userdata('ic'))['department'])['name'],
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'reports' => $this->db->get_where('reports', ['department' => $this->Users_model->getbyic($this->session->userdata('ic'))['department'], 'admin_comfirm' => 1 ])->result_array(),
             
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('kj/list');
        $this->load->view('layout/footer');
    }

    public function comfirm($id = 0)
    {
        if($this->session->userdata('role') == 3)
        {
            activiti_log('comfirm report staff');
            $datas = [
                'id_kj' => $this->session->userdata('id'),
                'date_comfirm' => time(),
                'id_report' => $id
            ];
            $this->db->insert('comfirm', $datas);

          $this->db->set('comfirmation', 1);
          $this->db->where('id', $id);
          $this->db->update('reports');
          $this->session->set_flashdata('success', 'comfirmation success!!!');
          
        }
        redirect('kj/list');
    }

}//end class 



?>