


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

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

        $this->data['title'] = "title and background page";
        $this->data['user'] = $this->user_model->userById($this->session->userdata('id'));
    }

	public function index()
	{
        $this->form_validation->set_rules('title', 'title', 'required');
		$this->data['home'] = $this->db->get_where('home', array('id' => 1))->row_array();

		if ($this->form_validation->run() == FALSE)
		{
            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
			$this->load->view('home/index');
			$this->load->view('template_admin/footer');
		}
		else
		{
			$title = $this->input->post('title');

            $image = $_FILES['image']['name'];
            //check file
            if($image)
            {
                $config['upload_path'] = './assets_portfolio/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
               // $config['max_width'] = '1920';
               // $config['max_height'] = '1080';
                $this->load->library('upload', $config);

                if( $this->upload->do_upload('image'))
                {
                    $old_image = $this->data['home']['image'];
                    if($old_image !== "default.jpg")
                    {
                        unlink(FCPATH . 'assets_portfolio/img/'.$old_image);
                    }
                    //set new name 
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image',$new_image);

                }
                else
                {
					
					$this->session->set_flashdata('messege', alertDanger($this->upload->display_errors()) );
            		redirect('home');
                }
            }

            $this->db->set('title', $title);
            $this->db->where('id', $this->data['home']['id']);
			
			
			if($this->db->update('home'))
			{
				$this->session->set_flashdata('messege', alertSuccess('success change') );
            	redirect('home');
			}
			else
			{
				$this->session->set_flashdata('messege', alertDanger('something wrong cannot change') );
            	redirect('home');
			}

            
		}
	}//end index
	
	public function delete($id = 1)
	{
		$home = $this->db->get_where('home', array('id' => 1))->row_array();

		$old_image = $home['image'];
		if($old_image !== "default.jpg")
		{
			unlink(FCPATH . 'assets_portfolio/img/'.$old_image);
			$this->db->set('image',"default.jpg");
		}
		else
		{
			$this->session->set_flashdata('messege', alertDanger('image already by default background') );
			redirect('home');
		}

		$this->db->where('id', $id);
			
		if($this->db->update('home'))
		{
			$this->session->set_flashdata('messege', alertSuccess('success delete') );
			redirect('home');
		}
		else
		{
			$this->session->set_flashdata('messege', alertDanger('something wrong cannot delete') );
			redirect('home');
		}
	}
}//end class