<?php

class Login_model extends CI_Model
{
    public function validateUser($email, $pass)
    {
        /* Verificando se o usuário existe no nosso DB */

        $user = $this->db->get_where('membros', array('email' => $email))->result_array();

        /* Essa linha de código compara o texto normal digitado com a senha hashada em BCRYPT para validar.  */

        if (isset($user[0])) {
            $passHash = $user[0]['senha'];
            if (password_verify($pass, $passHash)) {
                return $user[0];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
