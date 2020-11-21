<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Editplan extends CI_Controller
{

    public function index()
    {
        checkUserLogged();
        $id = $_GET['plan'];
        $data['session_name'] = $_SESSION['logged_user']['nome'];

        $this->load->model('plans_model');
        $data['plans_info'] = $this->plans_model->getInfoToEdit($id);
        $this->load->view('edits/editplan', $data);
    }

    public function updateplan($id)
    {
        $this->load->model('plans_model');
        $plan = array(
            'planos' => $_POST['plan'],
            'valor' => 'R$ ' . $_POST['value']
        );

        if (isset($_POST['plan']) && !empty($_POST['plan']) && isset($_POST['value']) && !empty($_POST['value'])) {
            $this->plans_model->updateInfoPlan($id, $plan);
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
            $mail->Subject = 'O PLANO ' . $_POST['plan'] . ' foi alterado, confira.';
            $mail->isHTML(true);

            /* ESCREVENDO O CONTEÚDO HTML A SER ENVIADO */

            $mailContent = '<h1 style="text-align: center;">O ' . $_POST['plan'] . ' teve seu valor alterado!</h1>
                    <h3 style="text-align: center;">Confira essa nova mudança.</h3>
                    <h1 style="text-align: center;">Obrigado!!!</h1>
                    <a href="localhost/solutudo/plans">
                        <h3 style="text-align: center;">IR PARA PLANOS</h3>
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




            $this->session->set_flashdata('success_plan', 'Plano editado.');
            redirect('plans');
        } else {
            $this->session->set_flashdata('error_plan', 'Preencha todos os campos.');
            redirect($_SERVER['HTTP_REFERER']);
        }

        /* Essa função recebe o ID do usuário como parâmetro para editar seus dados no DB */
    }
}
