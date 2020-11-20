<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editsale extends CI_Controller
{

    public function index()
    {
        checkUserLogged();
        $id = $_GET['sale'];
        $data['session_name'] = $_SESSION['logged_user']['nome'];
        $this->load->model('sales_model');
        $data['sale_info'] = $this->sales_model->getInfoSale($id);
        $this->load->view('edits/editsale', $data);
    }


    /* Essa função recebe o ID do usuário como parâmetro para editar seus dados no DB */

    public function updateInfoSale($id)
    {
        $this->load->model('sales_model');
        $sale = array(
            'empresa' => $_POST['company'],
            'vendedor' => $_POST['seller'],
            'plano' => $_POST['plan'],
            'valor' => $_POST['value'],
            'status' => $_POST['status'],
            'empresa' => $_POST['company'],

        );

        if (isset($_POST['company']) && !empty($_POST['company']) && isset($_POST['seller']) && !empty($_POST['seller']) && isset($_POST['plan']) && !empty($_POST['plan']) && isset($_POST['value']) && !empty($_POST['value'])) {

            $this->sales_model->updateInfoSale($id, $sale);
            $this->session->set_flashdata('success_sale', 'Sale registered.');
            redirect('sales');
        } else {
            $this->session->set_flashdata('error_sale', 'Fill all fields.');
            redirect('sales');
        }
    }
}
