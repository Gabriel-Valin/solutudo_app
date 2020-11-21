<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editcompany extends CI_Controller
{

    public function index()
    {
        checkUserLogged(); /* FUNÇÃO PARA VERIFICAR SE O USUÁRIO LOGADO É VERDADEIRO */
        $id = $_GET['company'];
        $data['session_name'] = $_SESSION['logged_user']['nome'];
        $this->load->model('company_model');
        $data['company_info'] = $this->company_model->getInfoCompany($id);
        $this->load->view('edits/editcompany', $data);
    }

    /* Essa função recebe o ID do usuário como parâmetro para editar seus dados no DB */

    public function updateInfoCompany($id)
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
            $this->company_model->updateInfoCompany($id, $company);
            $this->load->model('members_model');

            $emailmembers = $this->members_model->getMembersTotal();
            $this->load->library('phpmailer_lib');

            $mail = $this->phpmailer_lib->load();

            // SMTP configuration
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'processosolutudo@gmail.com';
            $mail->Password = 'gabrielvalin';
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = 465;
            $mail->setFrom('processosolutudo@gmail.com', 'Gabriel Valin');
            $mail->Subject = 'A EMPRESA ' . $_POST['name'] . ' TEVE DADOS ALTERADOS!';
            $mail->isHTML(true);


            /* ESCREVENDO O CONTEÚDO HTML A SER ENVIADO */
            $mailContent = '<h1 style="text-align: center;">A EMPRESA ' . $_POST['name'] . ' teve seus dados alterados.</h1>
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

            $this->session->set_flashdata('success_edit', 'Dados editados');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error_edit', 'Preencha todos os campos.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
