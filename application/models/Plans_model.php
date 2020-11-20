<?php


/* Trabalhando apenas com dados relacionados aos membros  */


class Plans_model extends CI_Model
{
    public function getPlans()
    {
        return $this->db->get('planos')->result_array();
    }

    public function deleteplan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('planos');
    }

    public function getInfoToEdit($id)
    {
        return $this->db->get_where('planos', array('id' => $id))->result_array();
    }

    public function updateInfoPlan($id, $info)
    {
        $this->db->where('id', $id);
        $this->db->update('planos', $info);
    }

    public function insertplan($plan)
    {
        $this->db->insert('planos', $plan);
    }

    public function getOnlyPlans()
    {
        $this->db->select('*');
        return $this->db->get('planos')->result();
    }
}
