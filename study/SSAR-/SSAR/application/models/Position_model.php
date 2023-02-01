



<?php


class Position_model extends CI_Model {

    public function getallposition()
    {
        return $this->db->get('positions')->result_array();
    }

    public function getallpositionactive()
    {
        return $this->db->get_where('positions', ['status' => 1])->result_array();
    }

    public function getbyid($id = 0)
    {
        return $this->db->get_where('positions', ['id' =>$id])->row_array();
    }

    public function editpositionbyname($name = '')
    {
        $this->db->where('position !=', $name);
        $query = $this->db->get('positions')->result_array();
        return $query;
    }

    public function disabled($id)
    {
        $this->db->set('status', 2);
        $this->db->where('id', $id);
        $this->db->update('positions');
    }

    public function restoredisabled($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('positions');
    }

}
?>