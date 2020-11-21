<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Changepass extends CI_Controller
{
    public function index()
    {
        $this->load->view('changepass');
    }

    /* Essa função vai fazer todas as validações dos inputs para que o usuário consiga trocar sua senha, além da validação de input preenchido, temos que comparar os hash (BCRYPT) 
    das senhas */

    public function newpassword()
    {
        $this->load->model('users_model');
        $pass_old = $_POST['pass_old'];
        $email = $_POST['email'];

        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass_old']) && !empty($_POST['pass_old']) && isset($_POST['pass_new']) && !empty($_POST['pass_new'])) {
            $query = $this->users_model->checkOldPass($_POST['email']);
            $pass = $query[0]['senha'];


            if (password_verify($pass_old, $pass)) {

                $updatedpass = array(
                    'senha' => password_hash($_POST['pass_new'], PASSWORD_BCRYPT)
                );

                $this->users_model->updatepass($email, $updatedpass);

                /* CONFIGURAÇÃO DO SERVIÇO DE EMAIL E HTML A SER ENVIADO*/


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
                $mail->Subject = 'SENHA ALTERADA COM SUCESSO!';
                $mail->isHTML(true);

                $mailContent = '<h1 style="text-align: center;">Você alterou sua senha!</h1>
                    <h3 style="text-align: center;">A alteração da sua senha foi um sucesso, não a compartilhe com ningúem, lembre-se disso!</h3>
                    <h1 style="text-align: center;">Obrigado!!!</h1>
                    <a href="localhost/solutudo/login">
                        <h3 style="text-align: center;">LOGIN</h3>
                    </a>';
                $mail->Body = $mailContent;

                // Send email
                if (!$mail->send()) {
                    echo 'Mensagem não enviada';
                    echo 'Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Mensagem enviada';
                }


                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error_senha', 'Preencha TODOS os campos.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
