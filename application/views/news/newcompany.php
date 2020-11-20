<?php
defined('BASEPATH') or exit('No direct script access allowed');


$this->load->view('mytemplates/sidebar'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/newmember.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Inria+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <title>Nova empresa - Solutudo</title>
</head>

<body>
    <h1 class="bodymember">Registre uma nova empresa</h1>
    <div class="center-all">

        <form action="<?php base_url() ?>newcompany/insertcompany" method="POST">

            <label for="" class="label1">Nome da empresa</label></br></br>
            <input class="form-member" type="text" name="name"></br></br>

            <label for="" class="label1">Contato</label></br></br>
            <input class="form-member" type="text" name="tel" onkeypress="$(this).mask('(00) 0000-00009')"></br></br>

            <label for="" class="label1">Endereço</label></br></br>
            <input class="form-member" type="text" name="address"></br></br>

            <label for="" class="label1">Email</label></br></br>
            <input class="form-member" type="email" name="email"></br></br>

            <label for="" class="label1">Estado</label></br></br>
            <select class="form-member" name="state">
                <option value="">Selecione</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AM">AM</option>
                <option value="AP">AP</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MG">MG</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="PR">PR</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SE">SE</option>
                <option value="SP">SP</option>
                <option value="TO">TO</option>
            </select></br></br>


            <label for="" class="label1">Cidade</label></br></br>
            <input class="form-member" type="text" name="city"></br></br>

            <input class="entry" type="submit" value="REGISTRAR EMPRESA">

            <?php if ($error = $this->session->flashdata('success_edit')); ?>
            <?= $error ?>
            <?php if ($error = $this->session->flashdata('error_edit')); ?>
            <?= $error ?>
        </form>
    </div>

</body>

</html>