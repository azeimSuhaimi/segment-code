<?php

class Users_model extends CI_Model {

    public function getbyic($ic = 0)
    {
        return $this->db->get_where('users', ['ic' =>$ic])->row_array();
    }

    public function getbyid($id = 0)
    {
        return $this->db->get_where('users', ['id' =>$id])->row_array();
    }

    public function getallstaffactive()
    {
        return $this->db->get_where('users', ['role !=' =>1])->result_array();
    }

    public function getalladmin($ic= 0)
    {
        return $this->db->get_where('users', ['role' =>1,'ic !=' => $ic])->result_array();
    }



    public function editprofilebyic($ic = 0)
    {
        $this->db->where('ic !=', $ic);
        
        $query = $this->db->get('users')->result_array();
        return $query;
    }

    public function edit($ic = 0, $data, $icinput = 0 )
    {
        $image = $_FILES['image']['name'];
        //check file
        if($image)
        {
            $config['upload_path'] = './assets/img/profile';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            //$config['max_width'] = '1024';
            //$config['max_height'] = '768';
            $this->load->library('upload', $config);

            if( $this->upload->do_upload('image'))
            {
                $old_image = $data['accout']['image'];
                if($old_image !== "empty.png")
                {
                    unlink(FCPATH . 'assets/img/profile/'.$old_image);
                }
                //set new name 
                $new_image = $this->upload->data('file_name');
                $this->db->set('image',$new_image);

            }
            else
            {
                $this->session->set_flashdata('messege', $this->upload->display_errors());
                redirect('user/edit');
            }
        }

        $this->db->set('ic', htmlspecialchars($icinput) );
        $this->db->set('name', htmlspecialchars( $this->input->post('name')));
        $this->db->set('phone', htmlspecialchars($this->input->post('phone')) );
        $this->db->set('email', htmlspecialchars($this->input->post('email')) );
        $this->db->set('department', htmlspecialchars($this->input->post('department')) );
        $this->db->set('position', htmlspecialchars($this->input->post('position')) );

        $this->db->where('ic', $ic);
        $this->db->update('users');
    }

    public function changepass($pass_hash, $ic)
    {
        $this->db->set('password',$pass_hash);
        $this->db->where('ic', $ic);
        $this->db->update('users');
    }

    public function removestaff($ic = 0)
    {
        $this->db->where('ic', $ic);
        $this->db->delete('users');
    }

}
?>

