<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

    private $data;
	public function __construct()
    {
        parent::__construct();

        $this->data['social'] = $this->db->get('sosial_media')->result_array();
        $this->data['home'] = $this->db->get_where('home', array('id' => 1))->row_array();
        $this->data['about_me'] = $this->db->get_where('about_me', array('id' => 1))->row_array();
        $this->data['skills'] = $this->db->get('skills')->result_array();
        $this->data['testimonial'] = $this->db->get('testimonials')->result_array();
        $this->data['filters'] = $this->db->get('filters')->result_array();
        $this->data['portfolio'] = $this->db->get('portfolio')->result_array();
    }

	public function index()
	{

			$this->load->view('template_portfolio/header',$this->data);
            $this->load->view('portfolio/index');
            $this->load->view('portfolio/about');
            $this->load->view('portfolio/portfolio');
            $this->load->view('portfolio/contact');
			$this->load->view('template_portfolio/footer');

    }//end index
    
    public function contact()
    {

        $this->form_validation->set_rules('name', 'name', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('subject', 'subject', 'required|min_length[8]');
        $this->form_validation->set_rules('message', 'message', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template_portfolio/header',$this->data);
            $this->load->view('portfolio/index');
            $this->load->view('portfolio/about');
            $this->load->view('portfolio/portfolio');
            $this->load->view('portfolio/contact');
			$this->load->view('template_portfolio/footer');
        }
        else
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            
            date_default_timezone_set("Asia/Kuala_Lumpur");

            $data = array(
                'email' => htmlspecialchars( $email),
                'name' => htmlspecialchars( $name),
                'subject' => htmlspecialchars( $subject),
                'message' => htmlspecialchars( $message),
                'time' => time(),
                'status' => 1
            );
            
            
            if($this->db->insert('contacts', $data))
            {
                $this->session->set_flashdata('messege', "<script> Swal.fire({
                    title: 'SUCCESS',
                    text: 'messege success been send',
                    icon: 'success'
                });</script>");
				redirect('portfolio/contact#contact');
            }
            else
            {
                $this->session->set_flashdata('messege', "<script> Swal.fire({
                    title: 'ERROR',
                    text: 'fail send messege',
                    icon: 'warning'
                });</script>");
				redirect('portfolio/contact#contact');
            }
        }
    }

    public function portfolio_details($id = null)
    {
        $this->data['details'] = $this->db->get_where('portfolio', array('id' => $id))->row_array();

        $this->data['image_details'] = $this->db->get_where('image_details', array('id_portfolio' => $id))->result_array();

        $this->load->view('template_portfolio/header',$this->data);

        $this->load->view('portfolio/portfolio_details');

        $this->load->view('template_portfolio/footer');
    }


	

}//end class
