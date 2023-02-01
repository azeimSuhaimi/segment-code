<?php 


class Social_Media_model extends CI_Model 
{
    public function SocialMediaById($id = '')
    {
        $query = $this->db->get_where('sosial_media', array('id' => $id))->row_array();

        return $query;
    }

    public function SocialMediaAll()
    {
        $query = $this->db->get('sosial_media')->result_array();

        return $query;
    }

    public function deleteSocialMedia($id)
    {
        $this->db->where('id', $id);
        return  $this->db->delete('sosial_media');
        

    }



}

?>