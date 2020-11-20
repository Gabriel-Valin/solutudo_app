<?php


/* Trabalhando apenas com dados relacionados aos membros  */


class Members_model extends CI_Model
{
    public function getMembersTotal()
    {
        return $this->db->order_by('id', 'DESC')->get('membros')->result_array();
    }

    public function deleteuser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('membros');
    }

    public function insertmember($member)
    {
        $this->db->insert('membros', $member);
    }

    public function getInfoToEdit($id)
    {
        return $this->db->get_where('membros', array('id' => $id))->result_array();
    }

    public function updateInfoMember($id, $info)
    {
        $this->db->where('id', $id);
        $this->db->update('membros', $info);
    }
}
