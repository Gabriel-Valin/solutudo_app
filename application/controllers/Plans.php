<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plans extends CI_Controller
{

    public function index()
    {
        checkUserLogged();
        $data['session_name'] = $_SESSION['logged_user']['nome'];
        $this->load->model('plans_model');
        $data['plans'] = $this->plans_model->getPlans();
        $this->load->view('plans', $data);
    }

    public function deleteplan($id)
    {
        $this->load->model('plans_model');
        $this->plans_model->deleteplan($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
