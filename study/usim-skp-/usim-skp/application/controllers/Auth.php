<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }//end constructor

	public function index()
	{
        if($this->input->cookie('username'))
        {
            $queryc = $this->db->get_where('users', ['username' =>$this->input->cookie('username')])->row_array();
            $data = ['username' => $queryc['username'],'role'=>$queryc['role']];
            $this->session->set_userdata($data);
            redirect('dashboard');
        }
        
        if($this->session->userdata('role'))
        {
            redirect('dashboard/');
        }

        $this->form_validation->set_rules('username', 'Username', 'required',['required' => 'username perlu diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required',['required' => 'password perlu diisi']);

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/index');
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $ingat_saya = $this->input->post('ingat_saya');
            
            $query = $this->db->get_where('users', ['username' =>$username])->row_array();

            //echo var_dump($query);

            if($query['username'] == $username)
            {
                if(password_verify($password,$query['password']))
                {
                    if($ingat_saya )
                    {
                        $cookie1 = array(
                            'name'   => 'username',
                            'value'  => $query['username'],
                            'expire' => time() + (60 * 60),
                            'secure' => TRUE
                        );

                        $cookie2 = array(
                            'name'   => 'role',
                            'value'  => $query['role'],
                            'expire' => time() + (60 * 60),
                            'secure' => TRUE
                        );
                    
                        $this->input->set_cookie($cookie1);
                        $this->input->set_cookie($cookie2);
                        //echo "test";
                    }
                    
                    
                    $data = ['username' => $query['username'],'role'=>$query['role']];
                    $this->session->set_userdata($data);

                    switch($query['role'])
                    {
                        case 1 :
                            redirect('dashboard');
                            break;
                        default:
                            $this->session->set_flashdata('messege', 'akaun anda menpunyai masalah');
                            redirect('auth');
                    }

                }
                else
                {
                    $this->session->set_flashdata('messege', 'password anda tidak tepat');
                    redirect('auth');
                }
            }
            else
            {
                $this->session->set_flashdata('messege', 'username tidak dijumpai');
                redirect('auth');
            }

            //echo password_hash('123',PASSWORD_DEFAULT);
        }

		
	}//end index

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        delete_cookie('username');
        delete_cookie('role');

        $this->session->set_flashdata('messege_logout', 'akaun anda log out');
        redirect('auth/');
    }//end log out

}//end class
