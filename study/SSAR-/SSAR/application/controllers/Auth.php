<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $this->session->unset_userdata('reset_password');

        $this->form_validation->set_rules('ic', 'IC', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout_auth/header');
            $this->load->view('auth/index');
            $this->load->view('layout_auth/footer');
        }
        else
        {
            $ic = $this->input->post('ic');
            $password = $this->input->post('password');

            $result = $this->Users_model->getbyic($ic);

            if($result['ic'] == $ic)
            {
                if(password_verify($password,$result['password']))
                {
                    if($result['status'] == '1')
                    {
                        $data = ['ic' => $result['ic'],'role'=>$result['role'], 'id' => $result['id']];
                        $this->session->set_userdata($data);

                        switch($result['role'])
                        {
                            case 1 :
                                activiti_log('log in');
                                redirect('dashboard');
                               
                                break;
                            case 2 :
                                activiti_log('log in');
                                redirect('report');
                                break;
                            case 3 :
                                activiti_log('log in');
                                redirect('kj');
                                break;
                            default:
                                $this->session->set_flashdata('messege', 'your account have a problem');
                                redirect('auth');
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata('messege', 'your account is not active!!!');
                        redirect('auth');
                    }
                }
                else
                {
                    $this->session->set_flashdata('messege', 'Passsword enter is wrong!!!');
                    redirect('auth');
                }
            }
            else
            {
                $this->session->set_flashdata('messege', 'IC not found!!!');
                redirect('auth');
            }
        }
	}//end index


    public function logout()
    {
        activiti_log('log out');
        $this->session->unset_userdata('ic');
        $this->session->unset_userdata('role');

        redirect('auth/');
    }//end log out

    public function forgot_password()
    {

        $this->form_validation->set_rules('ic', 'IC', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout_auth/header');
            $this->load->view('auth/forgot_password');
            $this->load->view('layout_auth/footer');
        }
        else
        {
            $ic = $this->input->post('ic');

            $user = $this->db->get_where('users', ['ic' => $ic,'status' =>1])->row_array();

            if($user)
            {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'ic' => $ic,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);

                //send email activation 
                $this->_sent_email($token,$user['email']);

                $this->session->set_flashdata('success', 'congratulation, success, check your email');
                redirect('auth/');
            }
            else
            {
                $this->session->set_flashdata('messege', 'ic is not register or not activate');
                redirect('auth/forgot_password');
            }
        }   

    }

    private function _sent_email($token, $emailto)
    {
        $email_sender = "weblogin085@gmail.com";


        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => $email_sender,
            'smtp_pass' => 'doubleweblogin',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        /*      $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => $email_sender,
            'smtp_pass' => 'doubleweblogin',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
        
        ];*/

        
        $this->email->initialize($config);
        //$this->load->library('email',$config);

       // $this->email->set_newline("\r\n");
        

        $this->email->from($email_sender, 'web login admin');
        $this->email->to($emailto);
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

            $this->email->subject('reset password');
            $this->email->message('click this to reset password : <a target="_blank" href="'.base_url('auth/reset_password?ic='.$this->input->post('ic').'&token='.urlencode($token) .'').'">reset apssword</a>');
        
        
        if($this->email->send())
        {
            return true;
        }
        else
        {
            echo $this->email->print_debugger();
            $this->session->set_flashdata('messege', show_error($this->email->print_debugger(['headers','subject','body'])));
                    redirect('auth/');
        }
    }

    public function reset_password()
    {
        $ic = $this->input->get('ic');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['ic' => $ic])->row_array();

        if($user)
        {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if($user_token)
            {
                if($user_token['date_created'] + 60 * 60  >  time()  )
                {
                    $this->session->set_userdata('reset_password',$ic);

                    //$this->changepass();
                    redirect('auth/changepass');
                }
                else
                {
                    $this->db->delete('user_token',['ic' =>$ic ]);
                    $this->session->set_flashdata('messege', 'token is expired');
                    redirect('auth/');
                }
               
                
            }
            else
            {
                $this->session->set_flashdata('messege', 'account reset apssword, false token');
                redirect('auth/');
            }
        }
        else
        {   
            $this->session->set_flashdata('messege', 'ic not found');
            redirect('auth/');
        }
    }

    public function changepass()
    {   
        if(!$this->session->userdata('reset_password'))
        {
            redirect('auth/');
        }

        $this->form_validation->set_rules('password1', 'password1', 'required|trim|min_length[6]|max_length[12]|matches[password2]');
        $this->form_validation->set_rules('password2', 'password2', 'required|trim|min_length[6]|max_length[12]');

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = "change password";
            $this->load->view('layout_auth/header');
            $this->load->view('auth/change_password');
            $this->load->view('layout_auth/footer');
        }
        else
        {
            $password = password_hash( $this->input->post('password1'), PASSWORD_DEFAULT);
            $ic= $this->session->userdata('reset_password');

            $this->db->set('password',$password);
                $this->db->where('ic',$ic);
                $this->db->update('users');

                $this->session->unset_userdata('reset_password');

                $this->db->delete('user_token',['ic' =>$ic ]);

                $this->session->set_flashdata('success', 'reset  success '.$ic.' plase login');
                redirect('auth/');
        }

    }

}//end class 



?>