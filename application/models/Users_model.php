<?php


/* Trabalhando apenas com dados relacionados aos membros  */


class Users_model extends CI_Model
{

    public function checkOldPass($email)
    {
        return $this->db->get_where('membros', array('email' => $email))->result_array();
    }

    public function updatepass($email, $pass)
    {
        $this->db->where('email', $email);
        $this->db->update('membros', $pass);
    }
}
