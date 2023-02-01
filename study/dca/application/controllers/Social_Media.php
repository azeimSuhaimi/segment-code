<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_Media extends CI_Controller {

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

        $this->data['title'] = "social media page";
        $this->data['user'] = $this->user_model->userById($this->session->userdata('id'));
    }

    public function index()
    {
        $this->data['social'] = $this->social_media_model->SocialMediaAll();
        $this->load->view('template_admin/header',$this->data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/navbar');
        $this->load->view('social_media/index');
        $this->load->view('template_admin/footer');

    }//end indexx


    public function add()
    {

        $this->form_validation->set_rules('title', 'TITLE', 'required|is_unique[sosial_media.title]|alpha_numeric');
        $this->form_validation->set_rules('icon', 'ICON', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|valid_url');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('social_media/add');
            $this->load->view('template_admin/footer');
        }
        else
        {
            $title = $this->input->post('title');
            $icon = $this->input->post('icon');
            $url = $this->input->post('url');

            $data = array(
                'title' => $title,
                'icon' => $icon,
                'url' => $url
            );
            

            if($this->db->insert('sosial_media', $data))
            {
                $this->session->set_flashdata('messege', alertSuccess('add new social media success!!!'));
				redirect('social_media/');
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('something wrong  cannot add new sosial media!!!'));
				redirect('social_media/add');
            }

        }
   

    }//end add


    public function edit($id= null)
    {

        $this->form_validation->set_rules('title', 'TITLE', 'required|is_unique[sosial_media.title]|alpha_numeric');
        $this->form_validation->set_rules('icon', 'ICON', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|valid_url');

        if ($this->form_validation->run() == FALSE)
        {

            $this->data['social'] = $this->social_media_model->SocialMediaById($id);

            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('social_media/edit');
            $this->load->view('template_admin/footer');
        }
        else
        {
            $title = $this->input->post('title');
            $icon = $this->input->post('icon');
            $url = $this->input->post('url');

          

            $this->db->set('icon', $icon);
            $this->db->set('title', $title);
            $this->db->set('url', $url);
            $this->db->where('id', $id);
            
            
            
            if($this->db->update('sosial_media'))
            {
                $this->session->set_flashdata('messege', alertSuccess('edit social media success!!!'));
				redirect('social_media/');
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('something wrong  cannot edit sosial media!!!'));
				redirect('social_media/edit/'.$id);
            }
            

        }
   

    }//end edit


    public function delete($id = null)
    {
        if($id !== null)
        {
            $delete = $this->social_media_model->deleteSocialMedia($id);
            

            if($delete)
            {
                $this->session->set_flashdata('messege', alertSuccess('success delete'));
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('fail to delete'));
            }
            
        }
        redirect('social_media');
    }


}//end class