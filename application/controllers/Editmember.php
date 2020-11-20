<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Editmember extends CI_Controller
{

    public function index()
    {
        checkUserLogged();
        /* checkisNotManager(); */
        $id = $_GET['member'];
        $data['session_name'] = $_SESSION['logged_user']['nome'];

        $this->load->model('members_model');
        $data['member'] = $this->members_model->getInfoToEdit($id);
        $this->load->view('edits/editmember', $data);
    }

    /* Essa função recebe o ID do usuário como parâmetro para editar seus dados no DB */

    public function updateInfoMember($id)
    {
        $this->load->model('members_model');

        $member1 = array(
            'nome' => $_POST['name'],
            'celular' => $_POST['cel'],
            'endereco' => $_POST['address'],
            'email' => $_POST['email'],
            'data_admissao' => $_POST['admission'],
            'nivel_acesso' => $_POST['level']
        );
        if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['cel']) && !empty($_POST['cel']) && isset($_POST['address']) && !empty($_POST['address']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['admission']) && !empty($_POST['admission']) && isset($_POST['level']) && !empty($_POST['level'])) {
            $this->members_model->updateInfoMember($id, $member1);

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
            $mail->addAddress($_POST['email']);
            $mail->Subject = 'ALTERAÇÃO DE DADOS!';
            $mail->isHTML(true);

            /* ESCREVENDO O CONTEÚDO HTML A SER ENVIADO */
            $mailContent = '<h1 style="text-align: center;">Seus dados foram alterados, confira na aplicação!</h1>
                    <h3 style="text-align: center;">Se você não solicitou essa alteração de dados, entre em contato com o suporte.</h3>
                    <h1 style="text-align: center;">Obrigado!!!</h1>
                    <a href="localhost/solutudo/login">
                        <h3 style="text-align: center;">IR PARA APLICAÇÃO</h3>
                    </a>';
            $mail->Body = $mailContent;

            // Send email
            if (!$mail->send()) {
                echo 'Mensagem não enviada';
                echo 'Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Mensagem enviada';
            }




            $this->session->set_flashdata('success_edit', 'Membro editado.');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error_edit', 'Preencha todos os campos.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
