<?php 


class User_model extends CI_Model 
{
    public function userById($id = '')
    {
        $query = $this->db->get_where('user', array('id' => $id))->row_array();

        return $query;
    }

    public function userByUsername($username = '')
    {
        $query = $this->db->get_where('user', array('username' => $username))->row_array();

        return $query;
    }

}

?>