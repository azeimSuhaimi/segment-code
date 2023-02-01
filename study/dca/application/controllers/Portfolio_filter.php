<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_filter extends CI_Controller {

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

        $this->data['title'] = "portfolio filter page";
        $this->data['user'] = $this->user_model->userById($this->session->userdata('id'));
    }

    public function index()
    {
        $this->data['portfolio'] = $this->db->get('portfolio')->result_array();

        $this->load->view('template_admin/header',$this->data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/navbar');
        $this->load->view('portfolio_filter/index');
        $this->load->view('template_admin/footer');

    }//end indexx


    public function add()
    {

        $this->form_validation->set_rules('title', 'title', 'required|is_unique[portfolio.title]');
        $this->form_validation->set_rules('filter', 'filter', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('client', 'client', 'required');
        $this->form_validation->set_rules('project_date', 'project_date', 'required');
        $this->form_validation->set_rules('url', 'url', 'valid_url');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE)
        {   
            $this->data['filters'] = $this->db->get('filters')->result_array();

            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('portfolio_filter/add');
            $this->load->view('template_admin/footer');
        }
        else
        {
            $title = $this->input->post('title');
            $filter = $this->input->post('filter');
            $category = $this->input->post('category');
            $client = $this->input->post('client');
            $project_date = $this->input->post('project_date');
            $url = $this->input->post('url');
            $description = $this->input->post('description');

            $image = $_FILES['image']['name'];
            //check file
            if($image)
            {
                $config['upload_path'] = './assets_portfolio/img/portfolio';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);

                if( $this->upload->do_upload('image'))
                {
                    //set new name 
                    $new_image = $this->upload->data('file_name');
                    
                    $data = array(
                        'title' => $title,
                        'filter' => $filter,
                        'category' => $category,
                        'client' => $client,
                        'project_date' => $project_date,
                        'url' => $url,
                        'description' => $description,
                        'image' => $new_image
                    );
                    
        
                    if($this->db->insert('portfolio', $data))
                    {
                        $this->session->set_flashdata('messege', alertSuccess('add filter success!!!'));
                        redirect('portfolio_filter/');
                    }
                    else
                    {
                        $this->session->set_flashdata('messege', alertDanger('something wrong  cannot add new filter!!!'));
                        redirect('portfolio_filter/add');
                    }

                }
                else
                {
					$this->session->set_flashdata('messege', alertDanger($this->upload->display_errors()));
					redirect('portfolio_filter/add');
                }
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('image is cannot leave empty!!!'));
                redirect('portfolio_filter/add');
            }




        }
   

    }//end add


    public function edit($id= null)
    {

        $this->form_validation->set_rules('filter', 'filter', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('client', 'client', 'required');
        $this->form_validation->set_rules('project_date', 'project_date', 'required');
        $this->form_validation->set_rules('url', 'url', 'valid_url');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->data['filters'] =  $this->db->get('filters')->result_array();

            $this->data['s'] = $this->db->get_where('portfolio',['id' => $id])->row_array();

            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('portfolio_filter/edit');
            $this->load->view('template_admin/footer');
        }
        else
        {
            $filter = $this->input->post('filter');
            $category = $this->input->post('category');
            $client = $this->input->post('client');
            $project_date = $this->input->post('project_date');
            $url = $this->input->post('url');
            $description = $this->input->post('description');


            $this->db->set('filter', $filter);
            $this->db->set('category', $category);
            $this->db->set('client', $client);
            $this->db->set('project_date', $project_date);
            $this->db->set('url', $url);
            $this->db->set('description', $description);

            $this->db->where('id', $id);
            
            if($this->db->update('portfolio'))
            {
                $this->session->set_flashdata('messege', alertSuccess('edit  success!!!'));
				redirect('portfolio_filter/');
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('something wrong  cannot edit sosial media!!!'));
				redirect('portfolio_filter/edit/'.$id);
            }
            

        }
   

    }//end edit


    public function delete($id = null, $port_img = null)
    {
        $this->data['img'] = $this->db->get_where('image_details', array('id_portfolio' => $id))->result_array();

        if($this->data['img'])
        {
            foreach($this->data['img'] as $img)
            {
                unlink(FCPATH . 'assets_portfolio/img/portfolio/'.$img['image']);
            }
            
        }

        if($id !== null)
        {
            $this->db->where('id_portfolio', $id);
           
            $this->db->delete('image_details');
            
                unlink(FCPATH . 'assets_portfolio/img/portfolio/'.$port_img);
                $this->db->where('id', $id);
                $this->db->delete('portfolio');
                $this->session->set_flashdata('messege', alertSuccess('success delete'));
        } 
        redirect('portfolio_filter/');
    }//end delete

    public function details($id = null)
    {
        $this->data['s'] = $this->db->get_where('portfolio',['id' => $id])->row_array();

        $this->data['image_details'] = $this->db->get_where('image_details', array('id_portfolio' => $id))->result_array();

        $this->load->view('template_admin/header',$this->data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('template_admin/navbar');
        $this->load->view('portfolio_filter/details');
        $this->load->view('template_admin/footer');
    }

    public function gallery($id = null)
    {
        $this->data['image_details'] = $this->db->get_where('image_details', array('id_portfolio' => $id))->result_array();
        $this->data['id_port'] = $id;

        $this->form_validation->set_rules('id', 'id', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template_admin/header',$this->data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('template_admin/navbar');
            $this->load->view('portfolio_filter/gallery');
            $this->load->view('template_admin/footer');
        }
        else
        {
            $image = $_FILES['image']['name'];
            //check file
            if($image)
            {
                $config['upload_path'] = './assets_portfolio/img/portfolio';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);

                if( $this->upload->do_upload('image'))
                {
                    //set new name 
                    $new_image = $this->upload->data('file_name');
                    
                    $data = array(
                        'id_portfolio' => $id,
                        'image' => $new_image
                    );
                            
                    if($this->db->insert('image_details', $data))
                    {
                        $this->session->set_flashdata('messege', alertSuccess('add filter success!!!'));
                        redirect('portfolio_filter/gallery/'.$id);
                    }
                    else
                    {
                        $this->session->set_flashdata('messege', alertDanger('something wrong  cannot add new filter!!!'));
                        redirect('portfolio_filter/gallery/'.$id);
                    }

                }
                else
                {
					$this->session->set_flashdata('messege', alertDanger($this->upload->display_errors()));
					redirect('portfolio_filter/gallery/'.$id);
                }
            }
            else
            {
                $this->session->set_flashdata('messege', alertDanger('image is cannot leave empty!!!'));
                redirect('portfolio_filter/gallery/'.$id);
            }
        }

    }

    public function gallery_delete($id = null, $image = null,$id_port = null)
    {
        unlink(FCPATH . 'assets_portfolio/img/portfolio/'.$image);

        $this->db->where('id', $id);
        $this->db->delete('image_details');

        $this->session->set_flashdata('messege', alertSuccess('delete success!!!'));
        redirect('portfolio_filter/gallery/'.$id_port);
        
    }


}//end class