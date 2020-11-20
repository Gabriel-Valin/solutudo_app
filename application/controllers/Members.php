<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Members extends CI_Controller
{

    public function index()
    {
        checkUserLogged();
        $data['session_name'] = $_SESSION['logged_user']['nome'];
        $this->load->model('members_model');
        $data['members_total'] = $this->members_model->getMembersTotal();
        $this->load->view('members', $data);
    }

    /* Função para deletar usuário do DB */

    public function deleteuser($id)
    {
        $this->load->model('members_model');
        $this->members_model->deleteuser($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
