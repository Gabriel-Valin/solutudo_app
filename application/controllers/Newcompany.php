<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newcompany extends CI_Controller
{

    public function index()
    {
        checkUserLogged();
        $data['session_name'] = $_SESSION['logged_user']['nome'];
        $this->load->view('news/newcompany', $data);
    }


    /* Função para inserir uma nova empresa no DB (todos usuários tem acesso a essa função.) */

    public function insertCompany()
    {
        $this->load->model('company_model');
        $company = array(
            'nome' => $_POST['name'],
            'telefone' => $_POST['tel'],
            'endereco' => $_POST['address'],
            'email' => $_POST['email'],
            'estado' => $_POST['state'],
            'cidade' => $_POST['city']
        );

        if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['tel']) && !empty($_POST['tel']) && isset($_POST['address']) && !empty($_POST['address']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['state']) && !empty($_POST['state']) & isset($_POST['city']) && !empty($_POST['city'])) {
            $this->company_model->insertCompany($company);

            $this->load->model('members_model');

            $emailmembers = $this->members_model->getMembersTotal();
            $this->load->library('phpmailer_lib');

            $mail = $this->phpmailer_lib->load();
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'processosolutudo@gmail.com';
            $mail->Password = 'gabrielvalin';
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = 465;
            $mail->setFrom('processosolutudo@gmail.com', 'Gabriel Valin');
            $mail->Subject = 'A EMPRESA ' . $_POST['name'] . ' REGISTRADA!';
            $mail->isHTML(true);

            $mailContent = '<h1 style="text-align: center;">A EMPRESA ' . $_POST['name'] . ' agora faz parte de nossa aplicação.</h1>
                    <h3 style="text-align: center;">Confira os dados da empresa, caso você queira fazer uma negociação com a mesma.</h3>
                    <h1 style="text-align: center;">Obrigado!!!</h1>
                    <a href="localhost/solutudo/companys">
                        <h3 style="text-align: center;">IR PARA EMPRESAS</h3>
                    </a>';
            $mail->Body = $mailContent;
            foreach ($emailmembers as $emails) {
                $mail->addAddress($emails['email']);
            }

            if (!$mail->send()) {
                echo 'Mensagem não enviada';
                echo 'Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Mensagem enviada';
            }



            $this->session->set_flashdata('success_edit', 'Empresa Registrada.');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error_edit', 'Preencha todos os campos.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
