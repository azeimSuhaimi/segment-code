<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        check_role_admin_kj();
    }

	public function index()
	{
        $data = [
            'title' => 'Dashboard',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic'))
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
	}//end 

}//end class 



?>