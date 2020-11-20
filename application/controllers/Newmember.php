<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newmember extends CI_Controller
{


    public function index()
    {
        checkUserLogged();
        $data['session_name'] = $_SESSION['logged_user']['nome'];
        $this->load->view('news/newmember', $data);
    }


    /* Essa função insere um novo membro no nosso DB, apenas o GERENTE  vai ter acesso a funcionalidade */

    public function insertmember()
    {
        $this->load->model('members_model');
        $member = array(
            'nome' => $_POST['name'],
            'celular' => $_POST['cel'],
            'endereco' => $_POST['address'],
            'email' => $_POST['email'],
            'senha' => password_hash('teste', PASSWORD_BCRYPT),
            'data_admissao' => $_POST['admission'],
            'nivel_acesso' => $_POST['level']
        );

        if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['cel']) && !empty($_POST['cel']) && isset($_POST['address']) && !empty($_POST['address']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['admission']) && !empty($_POST['admission']) && isset($_POST['level']) && !empty($_POST['level'])) {
            $this->members_model->insertmember($member);

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
            $mail->addAddress($_POST['email']);
            $mail->Subject = 'BEM-VINDO A NOSSA EMPRESA!';
            $mail->isHTML(true);

            /* ESCREVENDO O CONTEÚDO HTML A SER ENVIADO */

            $mailContent = '<h1 style="text-align: center;">Bem vindo a nossa empresa!</h1>
                <h3 style="text-align: center;">Todos nossos membros, quando cadastrados tem a senha definida como "teste"</h3>
                <h3 style="text-align: center;">Clique no link abaixo e redefina a mesma, usando teste como senha antiga.</h3>
                <h1 style="text-align: center;">Obrigado!!!</h1>
                <a href="localhost/solutudo/changepass">
                    <h3 style="text-align: center;">CLIQUE AQUI PARA MUDAR SUA SENHA!</h3>
                </a>';
            $mail->Body = $mailContent;

            // Send email
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }

            $this->session->set_flashdata('success_member', 'Membro registrado.');
            redirect('newmember');
        } else {
            $this->session->set_flashdata('error_member', 'Preencha todos os campos.');
            redirect('newmember');
        }
    }
}
