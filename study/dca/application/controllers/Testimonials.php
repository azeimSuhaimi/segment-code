<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

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

        $this->data['title'] = "testimonials page";
        $this->data['user'] = $this->user_model->userById($this->session->userdata('id'));
    }

    public function index()
    {

        $this->data['testimonial'] = $this->db->get('testimonials')->result_array();

        $this->load->view('template_admin/header',$this->data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/navbar');
        $this->load->view('testimonials/index');
        $this->load->view('template_admin/footer');

    }//end indexx


    public function add()
    {

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('job', 'job', 'required');
        $this->form_validation->set_rules('testimonial', 'testimonial', 'required');

        if ($this->form_validation->run() == FALSE)
        {           
            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('testimonials/add');
            $this->load->view('template_admin/footer');
        }
        else
        {
            $name = $this->input->post('name');
            $job = $this->input->post('job');
            $testimonial = $this->input->post('testimonial');

            $data = array(
                'name' => $name,
                'job' => $job,
                'testimonial' => $testimonial,
                'image' => 'empty.png'
            );
            

            if($this->db->insert('testimonials', $data))
            {
                $this->session->set_flashdata('messege', alertSuccess('add new testimonials success!!!'));
				redirect('testimonials/');
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('something wrong  cannot add testimonials!!!'));
				redirect('testimonials/add');
            }

        }
   

    }//end add


    public function edit($id= null)
    {
        $this->data['testimonial'] = $this->db->get_where('testimonials', array('id' => $id))->row_array();

        
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('job', 'job', 'required');
        $this->form_validation->set_rules('testimonial', 'testimonial', 'required');
        

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('testimonials/edit');
            $this->load->view('template_admin/footer');
        }
        else
        {
            $name = $this->input->post('name');
            $job = $this->input->post('job');
            $testimonial = $this->input->post('testimonial');


            $image = $_FILES['image']['name'];
            //check file
            if($image)
            {
                $config['upload_path'] = './assets_portfolio/img/testimonials/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);

                if( $this->upload->do_upload('image'))
                {
                    $old_image = $this->data['testimonial']['image'];
                    if($old_image !== "empty.png")
                    {
                        unlink(FCPATH . 'assets_portfolio/img/testimonials/'.$old_image);
                    }
                    //set new name 
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image',$new_image);

                }
                else
                {
					$this->session->set_flashdata('messege', alertDanger($this->upload->display_errors()));
					redirect('testimonials/edit/'.$id);
                }
			}//end validation image

          

            $this->db->set('name', $name);
            $this->db->set('job', $job);
            $this->db->set('testimonial', $testimonial);
            $this->db->where('id', $id);
            
            
            
            if($this->db->update('testimonials'))
            {
                $this->session->set_flashdata('messege', alertSuccess('edit testimonial success!!!'));
				redirect('testimonials/');
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('something wrong  cannot edit testimonial!!!'));
				redirect('testimonials/edit/'.$id);
            }
            

        }
   

    }//end edit


    public function delete($id = null)
    {
        $this->data['testimonial'] = $this->db->get_where('testimonials', array('id' => $id))->row_array();
        if($id !== null)
        {

            $old_image = $this->data['testimonial']['image'];
            if($old_image !== "empty.png")
            {
                unlink(FCPATH . 'assets_portfolio/img/testimonials/'.$old_image);
            }


            $this->db->where('id', $id);

            if($this->db->delete('testimonials'))
            {
                $this->session->set_flashdata('messege', alertSuccess('success delete'));
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('fail to delete'));
            }
            
        }
        redirect('testimonials');
    }


}//end class