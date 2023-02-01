

<?php


class Role_model extends CI_Model {

    public function role_type($id)
    {
        return $this->db->get_where('roles', ['id' =>$id])->row_array();
    }

    public function role_all()
    {
        return $this->db->get('roles')->result_array();
    }

}
?>