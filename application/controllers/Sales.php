<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{

    public function index()
    {

        checkUserLogged();
        $data['session_name'] = $_SESSION['logged_user']['nome'];
        $this->load->model('sales_model');
        /* $a = $this->sales_model->getInfoSeller('Thais Fernandes');
        print_r($a);
        exit; */
        $this->load->model('charts_model');
        $data['charts'] = $this->charts_model->getSalesProcess();


        /* Verificando o nível de acesso do usuário para o CLIENT SIDE consumir apenas o que foi pedido no PDF da aplicação */

        $level = $_SESSION['logged_user']['nivel_acesso'];
        $seller = $_SESSION['logged_user']['nome'];
        if ($level == 'Vendedor') {
            $data['sales_total'] = $this->sales_model->getSaleBySeller($seller);
            $this->load->view('sales', $data);
        } else if ($level == 'Gerente') {
            $data['sales_total'] = $this->sales_model->getSalesTotal();
            $this->load->view('sales', $data);
        } else {
            return null;
        }
    }

    /* Deletando uma venda no DB (creio que na aplicação só seria deletada se fosse reprovada) */

    public function deletesale($id)
    {
        $this->load->model('sales_model');
        $this->sales_model->deletesale($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
