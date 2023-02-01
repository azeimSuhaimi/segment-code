<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Error_page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        
    }

	public function index()
	{
        activiti_log('error enter restriction page');
        $data = [
            'title' => 'error',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic'))
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('error/index');
        $this->load->view('layout/footer');
	}//end 

}//end class 



?>