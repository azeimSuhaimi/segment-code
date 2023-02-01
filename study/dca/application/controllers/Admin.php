<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $data;
	public function __construct()
    {
        parent::__construct();
        
        if(!$this->session->userdata('id'))
        {
            redirect('auth/logout');
        }
		
        $this->db->where('status', 1);
		$this->data['total_message'] = $this->db->count_all_results('contacts');
		
        $this->data['unread_message'] = $this->db->get_where('contacts', array('status' => 1))->result_array();

        $this->data['title'] = "admin page";
        $this->data['user'] = $this->user_model->userById($this->session->userdata('id'));
    }

	public function index()
	{

            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
			$this->load->view('admin/index');
			$this->load->view('template_admin/footer');		
	}//end index


	public function admin_edit($id = "")
	{

		$this->form_validation->set_rules('name', 'name', 'required|alpha');
		$this->form_validation->set_rules('phone', 'phone', 'required|integer');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('birthday', 'birthday', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('template_admin/header',$this->data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('template_admin/navbar');
			$this->load->view('admin/admin_edit');
			$this->load->view('template_admin/footer');
		}
		else
		{
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$birthday = $this->input->post('birthday');

			$image = $_FILES['image']['name'];
            //check file
            if($image)
            {
                $config['upload_path'] = './asset/img/profile';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);

                if( $this->upload->do_upload('image'))
                {
                    $old_image = $this->data['user']['image'];
                    if($old_image !== "empty.png")
                    {
                        unlink(FCPATH . 'asset/img/profile/'.$old_image);
                    }
                    //set new name 
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image',$new_image);

                }
                else
                {
					$this->session->set_flashdata('messege', alertDanger($this->upload->display_errors()));
					redirect('admin/admin_edit/'.$id);
                }
			}//end validation image
			
			$this->db->set('name', $name);
			$this->db->set('phone', $phone);
			$this->db->set('email', $email);
			$this->db->set('birthday', $birthday);

            $this->db->where('id',$id);
			

			if($this->db->update('user'))
			{
				$this->session->set_flashdata('messege', alertSuccess('success update profile!!!'));
				redirect('admin/');
			}
			else
			{
				$this->session->set_flashdata('messege', alertDanger('something wrong cannot update profile!!!'));
				redirect('admin/admin_edit/'.$id);
			}
			
			

		}

	}//end admin edit


	public function admin_pass()
    {
		
		
        $this->form_validation->set_rules('current_pass', 'Current_pass', 'required|trim');
        $this->form_validation->set_rules('new_pass1', 'New_pass1', 'required|trim|min_length[3]|max_length[8]|matches[new_pass2]');
        $this->form_validation->set_rules('new_pass2', 'New_pass2', 'required|trim|min_length[3]|max_length[8]|matches[new_pass1]');

        if($this->form_validation->run() == FALSE)
        {
            
			$this->load->view('template_admin/header',$this->data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('template_admin/navbar');
			$this->load->view('admin/admin_pass');
			$this->load->view('template_admin/footer');
        }
        else
        {

            $current_pass = $this->input->post('current_pass');
            $new_pass = $this->input->post('new_pass1');
            if(!password_verify($current_pass,$this->data['user']['password']))
            {
                $this->session->set_flashdata('messege', alertDanger('current password wrong') );
            	redirect('admin/admin_pass');
            }
            else
            {
                if($current_pass == $new_pass)
                {
                    $this->session->set_flashdata('messege', alertDanger('current pass same with new pass') );
                    redirect('admin/admin_pass');
                }
                else
                {
                    $pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);

                    $this->db->set('password',$pass_hash);
                    $this->db->where('id',$this->session->userdata('id'));
                    $this->db->update('user');

                    $this->session->set_flashdata('messege', alertSuccess('change pass success') );
                    redirect('admin/admin_pass');
                }
            }
        }
        
    }
    
    public function activity_log()
    {
        $this->db->order_by('date_log', 'DESC');
        $this->data['activity'] =  $this->db->get('activity_log')->result_array();
        $this->load->view('template_admin/header',$this->data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/activity_log');
        $this->load->view('template_admin/footer');
    }
	
}//end class
