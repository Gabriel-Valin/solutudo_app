<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/changepass.css">
    <title>Mudar senha - Gestão Solutudo</title>
</head>

<body>
    <div class="login-form">
        <img class="logo-img" src="<?php base_url() ?>assets/imgs/Solutudo_Brasil_Franchising_logo.png" alt="">
        <form action="<?php base_url() ?>changepass/newpassword" method="POST">
            <label class="label2" for="">Email:</label></br>
            <input type="email" name="email"></br></br>

            <label class="label2" for="">Senha antiga:</label></br>
            <input type="password" name="pass_old">

            <label class="label2" for="">Nova senha:</label></br>
            <input type="password" name="confirm_pass">

            <label class="label2" for="">Confirmar nova senha:</label></br>
            <input type="password" name="pass_new">

            <input type="submit" value="TROCAR SENHA"></br>

        </form>
        <div style="margin-top: 10px;"><?php if ($error = $this->session->flashdata('error_senha')); ?>
            <?= $error ?>
        </div>

    </div>

</body>

</html>