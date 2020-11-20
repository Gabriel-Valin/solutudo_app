<?php


/* Esse model é atribuído especialmente para os gráficos, onde trabalhamos com COUNT dos estados em que as empresas se localizam */
/* Também, trabalhamos com a quatindade de vendas Aprovadas, Negadas e Em Processo */


class Charts_model extends CI_Model
{
    public function getStatesCount()
    {
        return $this->db->query('SELECT estado,COUNT(*) as count FROM empresas GROUP BY estado ORDER BY count DESC')->result_array();
    }

    public function getSalesProcess()
    {
        return $this->db->query('SELECT status,COUNT(*) as count FROM vendas GROUP BY status ORDER BY count DESC')->result_array();
    }
}
