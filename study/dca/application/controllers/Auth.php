<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "login page";
			$this->load->view('template_auth/header',$data);
			$this->load->view('auth/index');
			$this->load->view('template_auth/footer');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$userdb = $this->user_model->userByUsername($username);

			if($userdb)
			{
				if(password_verify($password,$userdb['password']))
				{
					if($userdb['active'] == 1)
					{
						$newdata = array(
							'id'  => $userdb['id'],
							'username'  => $userdb['username'],
							'role' => $userdb['role']
						);
						$this->session->set_userdata($newdata);

						switch($userdb['role'])
						{
							case 1:
								if($this->session->userdata('id'))
								{
									date_default_timezone_set("Asia/Kuala_Lumpur");
									$data_log = array(
										'username_id'  => $this->session->userdata('id'),
										'date_log' => date('y-m-d'),
										'time_log' => date('h:i:s a'),
										'unix_time' => time(),
										'status' => 'success',
										'type_log' => 'log in'
									);
									$this->db->insert('activity_log', $data_log);
								}
								redirect('admin');
							break;

							default:
							$this->session->unset_userdata('id');
							$this->session->unset_userdata('username');
							$this->session->unset_userdata('role');

							$this->session->set_flashdata('messege', alertDanger('something wrong with you account cannot login!!!'));
							redirect('auth');
						
						}
					}
					else
					{
						$this->session->set_flashdata('messege', alertDanger('account is not active!!!'));
					redirect('auth');
					}


				}
				else
				{
					$this->session->set_flashdata('messege', alertDanger('password is wrong!!!'));
					redirect('auth');
				}
			}
			else
			{
				$this->session->set_flashdata('messege', alertDanger('username is wrong!!!'));
				redirect('auth');
			}

		}//end validation

		
	}//end index

	public function logout()
    {
		if($this->session->userdata('id'))
		{
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$data_log = array(
				'username_id'  => $this->session->userdata('id'),
				'date_log' => date('y-m-d'),
				'time_log' => date('h:i:s a'),
				'unix_time' => time(),
				'status' => 'success',
				'type_log' => 'log out'
			);
			$this->db->insert('activity_log', $data_log);
		}

		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');

        $this->session->set_flashdata('messege', alertSuccess('log out, success!!!') );
        redirect('auth/');
    }

}//end class
