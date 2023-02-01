<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();

    }//end constructor

	public function index()
	{
        $this->load->view('layout/header');
        $this->load->view('dashboard/index');
		$this->load->view('layout/footer');
        
	}//end index

}//end class
