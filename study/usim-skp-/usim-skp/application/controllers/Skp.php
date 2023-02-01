<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skp extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        check_login();

    }//end constructor

	public function index()
	{
        $this->load->view('layout/header');
        $this->load->view('skp/index');
		$this->load->view('layout/footer');
        
	}//end index

    public function list_program()
	{
        $this->load->view('layout/header');
        $this->load->view('skp/list_program');
		$this->load->view('layout/footer');
        
	}//end 

    public function print_list_skp($id = 0)
    {
        $data['id'] = $id;
        $program_title = $this->db->get_where('program_skp',['id' => $id])->row_array();

        $tahun =  $this->db->get_where('tahun_skp',['id' => $program_title['tahun_id']])->row_array();

        $query = $this->db->get_where('list_skp',['program_id' => $id])->result_array();
        $data['list'] = $query;
        $data['title'] = $program_title;
        $data['tahun'] = $tahun;
        //$this->load->view('layout/header');
        $this->load->view('skp/print_list_skp',$data);
		//$this->load->view('layout/footer');


    }

    public function print_tahun_skp( $id= 0)
    {
        if($id == 0)
        {
            redirect('skp/list_tahun_skp');
        }
    
        $tahundata = $this->db->get_where('tahun_skp',['id' => $id])->row_array();
        $programdata = $this->db->get_where('program_skp',['tahun_id' => $id])->result_array();
        $data['program'] = $programdata;
        $data['tahun'] = $tahundata;

        $this->load->view('skp/print_tahun_skp',$data);
        
    }

    public function list_tahun_skp()
    {
        $query = $this->db->get('tahun_skp')->result_array();
        $data['tahunid'] = $query;
        $this->form_validation->set_rules('tahun_skp', 'tahun skp', 'required',['required' => 'tahun s.k.p perlu dipilih']);
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header',$data);
            $this->load->view('skp/select_tahun_skp');
            $this->load->view('layout/footer');
        }
        else
        {
            $select_tahun_id = $this->input->post('tahun_skp');
            $tahundata = $this->db->get_where('tahun_skp',['id' => $select_tahun_id])->row_array();
            $programdata = $this->db->get_where('program_skp',['tahun_id' => $select_tahun_id])->result_array();
            $data['program'] = $programdata;
            $data['tahun'] = $tahundata;
            $this->load->view('layout/header',$data);
            $this->load->view('skp/list_tahun_skp');
            $this->load->view('layout/footer');
        }
    
    }

    public function getskp()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $query = $this->db->get('tahun_skp')->result_array();

        echo json_encode($query);
    }
    public function getskptitle()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $query = $this->db->get_where('tahun_skp',['id' => $receive_data->select_tahun1])->row_array();

        echo json_encode($query);
    }

    public function deleteskp()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $query = $this->db->get_where('program_skp',['tahun_id' => $receive_data->id1])->result_array();

        foreach( $query as $q)
        {
            $this->db->where('program_id',$q['id']);
            $this->db->delete('list_skp');
        }

        $this->db->where('tahun_id',$receive_data->id1);
        $this->db->delete('program_skp');

        $this->db->where('id',$receive_data->id1);
        $this->db->delete('tahun_skp');
    }

    public function inserttahunskp()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $data = array(
            'tahun' => $receive_data->tahun_skp1
        );
    
        $this->db->insert('tahun_skp', $data);
    }

    public function fetchprogramall()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $query = $this->db->get('program_skp')->result_array();

        echo json_encode($query);
    }

    public function fetchprogramid()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $query = $this->db->get_where('program_skp',['tahun_id' => $receive_data->select_tahun1])->result_array();

        echo json_encode($query);
    }

    public function insertprogram()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $data = array(
            'tahun_id' => $receive_data->select_tahun1,
            'program' => $receive_data->insert_program1
        );
    
        $this->db->insert('program_skp', $data);
    }

    public function fetch_list_skp()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $query = $this->db->get_where('list_skp',['program_id' => $receive_data->programid1])->result_array();

        echo json_encode($query);
    }

    public function fetch_list_skp_byid()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $query = $this->db->get_where('list_skp',['id' => $receive_data->id1])->row_array();

        echo json_encode($query);
    }
    public function gettotalpositionnumber()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $this->db->select_sum('position_number');
        $query = $this->db->get_where('list_skp',['program_id' => $receive_data->programid1])->row_array();
        echo json_encode($query);
    }

    public function addskp()
    {
        $receive_data = json_decode(file_get_contents("php://input"));
        $data = array(
            'program_id' => $receive_data->programid1,
            'position_title' => $receive_data->posi_title1,
            'salary_ssm' => $receive_data->salary_ssm1,
            'skim' => $receive_data->skim1,
            'position_number' => $receive_data->position_number1,
            'detail' => $receive_data->detail1
        );
    
        $this->db->insert('list_skp', $data);
    
    }

    public function updateskp()
    {
        $receive_data = json_decode(file_get_contents("php://input"));

        $this->db->set('position_title' , $receive_data->posi_title1);
        $this->db->set('salary_ssm' , $receive_data->salary_ssm1);
        $this->db->set('skim' , $receive_data->skim1);
        $this->db->set('position_number' , $receive_data->position_number1);
        $this->db->set('detail' , $receive_data->detail1);

        $this->db->where('id' ,$receive_data->id1);
        $this->db->update('list_skp');
    }

    public function delete_list_skp_byid()
    {
        $receive_data = json_decode(file_get_contents("php://input"));

        $this->db->where('id',$receive_data->id1);
        $this->db->delete('list_skp');
    }

    public function delete_program_skp_byid()
    {
        $receive_data = json_decode(file_get_contents("php://input"));

        $this->db->where('program_id',$receive_data->id1);
        $this->db->delete('list_skp');

        $this->db->where('id',$receive_data->id1);
        $this->db->delete('program_skp');
    }


}//end class
