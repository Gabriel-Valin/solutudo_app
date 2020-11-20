<?php
defined('BASEPATH') or exit('No direct script access allowed');


$this->load->view('mytemplates/sidebar'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/newsale.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Inria+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <title>Nova venda - Solutudo</title>
</head>

<body>
    <h1 class="bodymember">Informação sobre a nova venda.</h1>
    <div class="center-all">

        <form action="<?php base_url() ?>newsale/insertsale" method="POST">
            <?php date_default_timezone_set('America/Sao_Paulo') ?>
            <input type="hidden" name="dh" id="" value="<?php echo date('d/m/Y \à\s H:i:s') ?>">

            <label class="label1" for="">Empresa</label></br></br>
            <select name="company" class="input-type">
                <option value="">Selecione a empresa</option>
                <?php foreach ($companys as $comp) : ?>
                    <option value="<?= $comp->nome ?>"> <?= $comp->nome ?> </option>
                <?php endforeach; ?>
            </select></br></br>

            <label class="label1" for="">Vendedor</label></br></br>
            <input class="input-type" type="text" name="seller" value="<?php echo $_SESSION['logged_user']['nome'] ?>"></br></br>

            <label class="label1" for="">Plano</label></br></br>
            <select name="plan" class="input-type">
                <option value="">Selecione o Plano</option>
                <?php foreach ($plans as $p) : ?>
                    <option value="<?= $p->planos ?>"> <?= $p->planos ?> </option>
                <?php endforeach; ?>
            </select></br></br>


            <label class="label1" for="">Valor</label></br></br>
            <select name="value" class="input-type">
                <?php foreach ($plans as $p) : ?>
                    <option value="<?= $p->valor ?>"> <?= $p->valor ?> </option>
                <?php endforeach; ?>
            </select></br></br>


            <label class="label1" for="">Status</label></br></br>
            <select name="status" class="input-type">
                <option value="">Selecione o status da sua venda</option>
                <option value="Negado">Negado</option>
                <option value="Aprovado">Aprovado</option>
                <option value="Em Processo">Em Processo</option>
            </select></br></br>


            <label class="label1" for="">Data da venda</label></br></br>
            <input class="input-type" type="text" name="date_sale" onkeypress="$(this).mask('00/00/0000')"></br></br>

            <input class="entry" type="submit" value="REGISTRAR VENDA">

            <div><?php if ($error = $this->session->flashdata('success_sale')); ?>
                <?= $error ?>
                <?php if ($error = $this->session->flashdata('error_sale')); ?>
                <?= $error ?>
            </div>
        </form>
    </div>
</body>

</html>