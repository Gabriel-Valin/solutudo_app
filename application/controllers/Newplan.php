<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newplan extends CI_Controller
{

    public function index()
    {
        checkUserLogged();
        checkisNotManager(); //** CHECANDO SE O USUÁRIO É GERENTE, APENAS O GERENTE PODE INSERIR UM NOVO PLANO */
        $data['session_name'] = $_SESSION['logged_user']['nome'];
        $this->load->view('news/newplan', $data);
    }

    public function insertplan()
    {
        $this->load->model('plans_model');


        $plan = array(
            'planos' => $_POST['plan'],
            'valor' => 'R$ ' . $_POST['value']
        );

        if (isset($_POST['plan']) && !empty($_POST['plan']) && isset($_POST['value']) && !empty($_POST['value'])) {
            $this->plans_model->insertplan($plan);
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
            $mail->Subject = 'NOVO PLANO PARA VENDAS CRIADO NA EMPRESA!';
            $mail->isHTML(true);


            /* ESCREVENDO O CONTEÚDO HTML A SER ENVIADO */

            $mailContent = '<h1 style="text-align: center;">NOVO PLANO CRIADO PARA VENDAS!</h1>
                    <h3 style="text-align: center;">Confira o novo plano para venda que temos agora em nossa empresa.</h3>
                    <h1 style="text-align: center;">Obrigado!!!</h1>
                    <a href="localhost/solutudo/plans">
                        <h3 style="text-align: center;">IR PARA PLANOS</h3>
                    </a>';
            $mail->Body = $mailContent;
            foreach ($emailmembers as $emails) {
                $mail->addAddress($emails['email']);
            }

            // Send email

            if (!$mail->send()) {
                echo 'Mensagem não enviada';
                echo 'Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Mensagem enviada';
            }

            $this->session->set_flashdata('success_plan', 'Plano criado.');
            redirect('plans');
        } else {
            $this->session->set_flashdata('error_plan', 'Preencha todos os campos.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
