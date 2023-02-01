<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();

    }//end constructor

	public function index()
	{
        $this->form_validation->set_rules('password', 'Password', 'required',['required' => 'kata laluan asal perlu diisi']);
        $this->form_validation->set_rules('password1', 'Password', 'required',['required' => 'kata laluan baharu perlu diisi']);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]',['required' => 'sahkan kata laluan  perlu diisi','matches' => 'sahkan kata laluan tidak padan dengan kata laluan baharu']);

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header');
            $this->load->view('admin/index');
            $this->load->view('layout/footer');
        }
        else
        {
            $current_pass = $this->input->post('password');
            $new_pass = $this->input->post('password1');
            $pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);
            $query = $this->db->get_where('users', ['username' =>$this->session->userdata('username')])->row_array();

            if($current_pass !== $new_pass)
            {
                if( password_verify( $current_pass,$query['password']))
                {
                    $this->db->set('password',$pass_hash);
                    $this->db->where('username',$this->session->userdata('username'));
                    $this->db->update('users');

                    $this->session->set_flashdata('messegesucc', 'kata laluan baharu berjaya diubah ');
                    redirect('admin/');
                }
                else
                {
                    $this->session->set_flashdata('messegeerr', 'kata laluan asal tidak padan');
                    redirect('admin/');
                }
            }
            else
            {
                $this->session->set_flashdata('messegeerr', 'kata laluan asal sudah sama dengan kata laluan baharu');
                redirect('admin/');
            }
        }
 
        
	}//end index

}//end class
