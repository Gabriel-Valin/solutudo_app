<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('login');
    }

    public function validateUser()
    {
        /* Essa linha carrega o model */
        $this->load->model('login_model');

        /* Esse bloco de código seta os input para as variaveis */

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $data = $this->login_model->validateUser($email, $pass);


        /* Verificando sessão e logando o usuário */

        if (isset($data)) {
            $_SESSION["logged_user"] = $data;
            redirect('companys');
        } else {
            redirect('login');
        }
    }

    /* Função para deslogar usuário da aplicação */

    public function logout()
    {
        unset($_SESSION["logged_user"]);
        redirect('login');
    }
}
