<?php


class Department_model extends CI_Model {

    public function getbyid($id = 0)
    {
        return $this->db->get_where('departments', ['id' =>$id])->row_array();
    }

    public function getalldepartment()
    {
        return $this->db->get('departments')->result_array();
    }

    public function getalldepartmentactive()
    {
        return $this->db->get_where('departments', ['status' => 1])->result_array();
    }

    public function getalldepartmentdisabled()
    {
        return $this->db->get_where('departments', ['status' => 2])->result_array();
    }

    public function disabled($id)
    {
        $this->db->set('status', 2);
        $this->db->where('id', $id);
        $this->db->update('departments');
    }

    public function restoredisabled($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('departments');
    }

    public function editdepartmentbyname($name = '')
    {
        $this->db->where('name !=', $name);
        $query = $this->db->get('departments')->result_array();
        return $query;
    }


}

?>