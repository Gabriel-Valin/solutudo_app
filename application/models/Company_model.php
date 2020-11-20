<?php

/* Company Model (apenas para trabalhar com os dados relacionados a empresas) */
/* Nome das funções auto-explicativas para facil entendimento */



class Company_model extends CI_Model
{
    public function getAllCompanys()
    {
        return $this->db->order_by('id', 'DESC')->get('empresas')->result_array();
    }

    public function deletecompany($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('empresas');
    }

    public function getInfoCompany($id)
    {
        return $this->db->get_where('empresas', array('id' => $id))->result_array();
    }

    public function updateInfoCompany($id, $info)
    {
        $this->db->where('id', $id);
        $this->db->update('empresas', $info);
    }

    public function insertCompany($company)
    {
        $this->db->insert('empresas', $company);
    }

    public function getOnlyCompany()
    {
        $this->db->select('*');
        return $this->db->get('empresas')->result();
    }
}
