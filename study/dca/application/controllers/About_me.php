


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_me extends CI_Controller {

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

        $this->data['title'] = "about me page";
        $this->data['user'] = $this->user_model->userById($this->session->userdata('id'));
    }

    public function index($id = 1)
    {
        $this->data['about_me'] = $this->db->get_where('about_me', array('id' => 1))->row_array();

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required|integer');
        $this->form_validation->set_rules('motto', 'motto', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('freelance', 'freelance', 'required');
        $this->form_validation->set_rules('type_job', 'type_job', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('about_me/index');
            $this->load->view('template_admin/footer');
    
        }
        else
		{
            $title = $this->input->post('title');
            $motto = $this->input->post('motto');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $city = $this->input->post('city');
            $freelance = $this->input->post('freelance');
            $type_job = $this->input->post('type_job');


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
                    $old_image = $this->data['about_me']['image'];
                    if($old_image !== "empty.png")
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
            		redirect('about_me');
                }
            }

            $this->db->set('title', $title);
            $this->db->set('motto', $motto);
            $this->db->set('phone', $phone);
            $this->db->set('email', $email);
            $this->db->set('city', $city);
            $this->db->set('freelance', $freelance);
            $this->db->set('type_job', $type_job);

            $this->db->where('id', $this->data['about_me']['id']);
			
			
			if($this->db->update('about_me'))
			{
				$this->session->set_flashdata('messege', alertSuccess('success change') );
            	redirect('about_me');
			}
			else
			{
				$this->session->set_flashdata('messege', alertDanger('something wrong cannot change') );
            	redirect('about_me');
			}

            
		} 

    }//end indexx





    public function delete($id = null)
    {
        $this->data['about_me'] = $this->db->get_where('about_me', array('id' => 1))->row_array();
        if($id !== null)
        {

            $old_image = $this->data['about_me']['image'];
            if($old_image !== "empty.png")
            {
                unlink(FCPATH . 'assets_portfolio/img/'.$old_image);
            }

            $this->db->set('image','empty.png');
            $this->db->where('id', $id);

            if($this->db->update('about_me'))
            {
                $this->session->set_flashdata('messege', alertSuccess('success delete'));
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('fail to delete'));
            }
            
        }
        redirect('about_me');
    }


}//end class