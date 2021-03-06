<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newsale extends CI_Controller
{

    public function index()
    {
        checkUserLogged();
        $data['session_name'] = $_SESSION['logged_user']['nome'];
        $this->load->model('plans_model');
        $this->load->model('company_model');
        $data['plans'] = $this->plans_model->getOnlyPlans();
        $data['companys'] = $this->company_model->getOnlyCompany();
        $this->load->view('news/newsale', $data);
    }

    /* Inserindo uma nova venda no DB */

    public function insertsale()
    {
        $this->load->model('sales_model');
        if (isset($_POST['company']) && !empty($_POST['company']) && isset($_POST['seller']) && !empty($_POST['seller']) && isset($_POST['plan']) && !empty($_POST['plan']) && isset($_POST['value']) && !empty($_POST['value'])) {

            $sale = array(
                'empresa' => $_POST['company'],
                'vendedor' => $_POST['seller'],
                'plano' => $_POST['plan'],
                'valor' => $_POST['value'],
                'status' => $_POST['status'],
                'data_venda' => $_POST['date_sale']
            );
            $this->sales_model->insertsale($sale);

            $this->load->view('pdf-views/newsale');

            // Get output html
            $html = $this->output->get_output();

            // Load pdf library
            $this->load->library('pdf');

            // Load HTML content
            $this->dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            $this->dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $this->dompdf->render();

            // Output the generated PDF (1 = download and 0 = preview)
            $this->dompdf->stream("welcome.pdf", array("Attachment" => 0));










            $this->session->set_flashdata('success_sale', 'Venda registrada.');
            redirect('newsale');
        } else {
            $this->session->set_flashdata('error_sale', 'Preencha todos os campos.');
            redirect('newsale');
        }
    }
}
