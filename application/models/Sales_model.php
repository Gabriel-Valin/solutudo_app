<?php


/* Trabalhando apenas com dados relacionados as vendas  */

class Sales_model extends CI_Model
{
    public function getSalesTotal()
    {
        return $this->db->order_by('id', 'DESC')->get('vendas')->result_array();
    }

    public function getSaleBySeller($seller)
    {
        return $this->db->order_by('id', 'DESC')->get_where('vendas', array('vendedor' => $seller))->result_array();
    }

    public function insertsale($sale)
    {
        $this->db->insert('vendas', $sale);
    }

    public function deletesale($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('vendas');
    }

    public function updateInfoSale($id, $sale)
    {
        $this->db->where('id', $id);
        $this->db->update('vendas', $sale);
    }

    public function getInfoSale($id)
    {
        return $this->db->get_where('vendas', array('id' => $id))->result_array();
    }

    public function getInfoSeller($seller)
    {
        return $this->db->get_where('vendas', array('vendedor' => $seller))->result_array();
    }
}
