<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();
        
        
    }

	public function index()
	{
        check_role_staff();
        $data = [
            'title' => 'report',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic'))
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('report/index');
        $this->load->view('layout/footer');
	}//end 

    public function add()
	{
        check_role_staff();
        $data = [
            'title' => 'tambah report',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'people' => $this->db->get('target_people')->result_array(),
            'levels' => $this->db->get('levels')->result_array()
        ];

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('intro', 'intro', 'required');
        $this->form_validation->set_rules('objective', 'objective', 'required');
        $this->form_validation->set_rules('time', 'masa', 'required');
        $this->form_validation->set_rules('dates', 'dates', 'required');
        $this->form_validation->set_rules('datee', 'datee', 'required');
        $this->form_validation->set_rules('place', 'place', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_rules('target_people[]', 'kumpulan sasaran', 'required');
        $this->form_validation->set_rules('summary_program', 'summary program', 'required');
        $this->form_validation->set_rules('impak', 'impak program', 'required');
        $this->form_validation->set_rules('total_people', 'total people', 'required|numeric');
        $this->form_validation->set_rules('time_end', 'time end', 'required|differs[time]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('report/add');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('add new report');
            $data = array(
                'title' => htmlspecialchars($this->input->post('title')),
                'intro' => $this->input->post('intro'),
                'objective' => $this->input->post('objective'),
                'time_program' => htmlspecialchars($this->input->post('time')),
                'time_program_end' => htmlspecialchars($this->input->post('time_end')),
                'date_start' => htmlspecialchars($this->input->post('dates')),
                'date_end' => htmlspecialchars($this->input->post('datee')),
                'place' => htmlspecialchars($this->input->post('place')),
                'level' => htmlspecialchars($this->input->post('level')),
                'target_people' => implode(', ',$this->input->post('target_people[]')),
                'summary_program' => $this->input->post('summary_program'),
                'impak' => $this->input->post('impak'),
                'id_user' => htmlspecialchars($data['accout']['id']),
                'position' => htmlspecialchars($data['accout']['position']),
                'department' => htmlspecialchars($data['accout']['department']),
                'status' => 2,
                'comfirmation' => 2,
                'date_send' => time(),
                'total_people' => htmlspecialchars($this->input->post('total_people')),
                'admin_comfirm' => '2'
                
                );

               // print_r(implode(' ',$this->input->post('target_people[]')));

            if($this->db->insert('reports', $data))
            {
                $this->session->set_flashdata('success', 'success insert new report!!!');
                redirect('report/add');
            }
            else
            {
                $this->session->set_flashdata('messege', 'fail insert new report!!!');
                redirect('report/add');
            }
        }
	}//end 

    public function deletereport($id = 0)
    {

        activiti_log('delete report');
        $image = $this->db->get_where('gallery_report', ['id_report' => $id ])->result_array();

        foreach($image as $img)
        {
            unlink(FCPATH . 'assets/img/gallery/'.$img['image']);
            $this->db->where('id', $img['id']);
            $this->db->delete('gallery_report');
        }

        $this->db->where('id', $id);
        $this->db->delete('reports');

        $this->session->set_flashdata('success', 'success delete report!!!');
        redirect('admin/');
    }

    public function listadd()
    {
        check_role_staff();
        $data = [
            'title' => 'list add',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'reports' => $this->db->get_where('reports', ['id_user' => $this->session->userdata('id') ])->result_array(),
             
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('report/listadd');
        $this->load->view('layout/footer');
    }

    public function addimage($id = 0)
    {
        check_role_staff();
        $data = [
            'title' => 'list add image',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'gallery' => $this->db->get_where('gallery_report', ['id_report' => $id ])->result_array(),
            
            'id' => $id
        ];

        $this->form_validation->set_rules('figure', 'figure', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('report/addimage');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('add new image on report');
            $figure = htmlspecialchars($this->input->post('figure'));

            $image = $_FILES['image']['name'];
            //check file
            if($image)
            {
                $config['upload_path'] = './assets/img/gallery';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
    
                if( $this->upload->do_upload('image'))
                {
                   
                    //set new name 
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image',$new_image);

                    $datas = [
                        'id_report' => $id,
                        'image' => $new_image,
                        'figure' => $figure
                    ];

                    if($this->db->insert('gallery_report', $datas))
                    {
                        $this->session->set_flashdata('success', 'success insert new image!!!');
                        redirect('report/addimage/'.$id);
                    }
                    else
                    {
                        $this->session->set_flashdata('messege', 'fail insert new image!!!');
                        redirect('report/addimage/'.$id);
                    }
    
                }
                else
                {
                    $this->session->set_flashdata('messege', $this->upload->display_errors());
                    redirect('report/addimage/'.$id);
                }
            }
            else
            {
                $this->session->set_flashdata('messege', 'image is empty');
                    redirect('report/addimage/'.$id);
            }
        }

    }

    public function deleteimage($id = 0, $id_image = 0)
    {
        activiti_log('delete image on report');
        check_role_staff();
        $old_image = $this->db->get_where('gallery_report', ['id' => $id ])->row_array();


            unlink(FCPATH . 'assets/img/gallery/'.$old_image['image']);
            $this->db->where('id', $id);
            $this->db->delete('gallery_report');

            $this->session->set_flashdata('success', 'success delete image!!!');
            redirect('report/listadd');
        
    }

    public function editimage($id = 0)
    {
        activiti_log('edit image on report');
        check_role_staff();
        $data = [
            'title' => 'edit image',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'gallery' => $this->db->get_where('gallery_report', ['id' => $id ])->row_array(),
            'id' => $id
        ];

        $this->form_validation->set_rules('figure', 'figure', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('report/editimage');
            $this->load->view('layout/footer');
        }
        else
        {
            $id_image = htmlspecialchars($this->input->post('id'));
            $figure = htmlspecialchars($this->input->post('figure'));

            $image = $_FILES['image']['name'];
            //check file
            if($image)
            {
                $config['upload_path'] = './assets/img/gallery';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
    
                if( $this->upload->do_upload('image'))
                {
                    $old_image = $data['gallery']['image'];

                        unlink(FCPATH . 'assets/img/gallery/'.$old_image);
                    
                    //set new name 
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image',$new_image);
    
                }
                else
                {
                    $this->session->set_flashdata('messege', $this->upload->display_errors());
                    redirect('report/editimage/'.$id);
                }
            }

            $this->db->set('figure', $figure );

            $this->db->where('id', $id_image);
            $this->db->update('gallery_report');

            $this->session->set_flashdata('success', 'edit success');
                    redirect('report/addimage/'.$id);


        }

    }

    public function view($id = 0)
    {
        $id_kj = $this->db->get_where('comfirm', ['id_report' => $id ])->row_array();
        $data = [
            'title' => 'view report',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'report' => $this->db->get_where('reports', ['id' => $id ])->row_array(),
            'gallery' => $this->db->get_where('gallery_report', ['id_report' => $id ])->result_array(),
            'id' => $id,
            'comfirm' => $id_kj,
            'id_kj' => $this->db->get_where('users', ['id' => $id_kj['id_kj'] ])->row_array()
        ];
		$this->load->view('layout/header',$data);
        $this->load->view('report/view');
        $this->load->view('layout/footer');
    }

    public function edit($id= 0)
	{
        
        check_role_staff();
        $data = [
            'title' => 'edit report',
            'accout' => $this->Users_model->getbyic($this->session->userdata('ic')),
            'report' => $this->db->get_where('reports', ['id' => $id ])->row_array(),
            'id' => $id,
            'people' => $this->db->get('target_people')->result_array(),
            'levels' => $this->db->get('levels')->result_array()
        ];

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('intro', 'intro', 'required');
        $this->form_validation->set_rules('objective', 'objective', 'required');
        $this->form_validation->set_rules('time', 'masa', 'required');
        $this->form_validation->set_rules('dates', 'dates', 'required');
        $this->form_validation->set_rules('datee', 'datee', 'required');
        $this->form_validation->set_rules('place', 'place', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_rules('target_people[]', 'kumpulan sasaran', 'required');
        $this->form_validation->set_rules('summary_program', 'summary program', 'required');
        $this->form_validation->set_rules('impak', 'impak program', 'required');
        $this->form_validation->set_rules('total_people', 'total people', 'required|numeric');
        $this->form_validation->set_rules('time_end', 'time end', 'required');
        

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('report/edit');
            $this->load->view('layout/footer');
        }
        else
        {
            activiti_log('edit report ');
            $this->db->set('title',htmlspecialchars($this->input->post('title')));
            $this->db->set('intro',$this->input->post('intro'));
            $this->db->set('objective',$this->input->post('objective'));
            $this->db->set('time_program',htmlspecialchars($this->input->post('time')));
            $this->db->set('date_start', htmlspecialchars($this->input->post('dates')));
            $this->db->set('date_end',htmlspecialchars($this->input->post('datee')));
            $this->db->set('place', htmlspecialchars($this->input->post('place')));
            $this->db->set('level',htmlspecialchars($this->input->post('level')));
            $this->db->set('target_people',implode(' ',$this->input->post('target_people[]')));
            $this->db->set('summary_program',$this->input->post('summary_program'));
            $this->db->set('impak',$this->input->post('impak'));
            $this->db->set('total_people',htmlspecialchars($this->input->post('total_people')));
            $this->db->set('time_program_end',htmlspecialchars($this->input->post('time_end')));

            $this->db->where('id', $id);
            if($this->db->update('reports'))
            {
                $this->session->set_flashdata('success', 'success update report!!!');
                redirect('report/listadd/');
            }
            else
            {
                $this->session->set_flashdata('messege', 'fail update report!!!');
                redirect('report/edit/'.$id);
            }

            
        }
	}//end 

    public function print($id = 0)
    {
        $data['id'] = $id;
        $id_kj = $this->db->get_where('comfirm', ['id_report' => $id ])->row_array();
        $data['id_kj'] = $this->db->get_where('users', ['id' => $id_kj['id_kj'] ])->row_array();
        $data['gallery'] = $this->db->get_where('gallery_report', ['id_report' => $id ])->result_array();
       activiti_log('print report ');
        $this->load->view('report/print',$data);
    }

}//end class 





?>

