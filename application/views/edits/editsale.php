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
    <title>Editar venda - Solutudo</title>
</head>

<body>
    <h1 class="bodymember">Informações sobre a venda</h1>
    <div class="center-all">
        <form action="<?php base_url() ?>editsale/updateinfosale/<?= $sale_info[0]['id'] ?>" method="POST">
            <?php date_default_timezone_set('America/Sao_Paulo') ?>
            <input type="hidden" name="dh" id="" value="<?php echo date('d/m/Y \à\s H:i:s') ?>">


            <label class="label1" for="">Empresa</label></br></br>
            <input class="input-type" type="text" name="company" value="<?php echo $sale_info[0]['empresa'] ?>""></br></br>

            <label class=" label1" for="">Vendedor</label></br></br>
            <input class=" input-type" type="text" name="seller" value="<?php echo $sale_info[0]['vendedor'] ?>"></br></br>

            <label class="label1" for="">Plano</label></br></br>
            <select name="plan" class="input-type">
                <option value=""><?php echo $sale_info[0]['plano'] ?></option>
                <option value="Plano Bronze">Plano Bronze</option>
                <option value="Plano Prata">Plano Prata</option>
                <option value="Plano Gold">Plano Gold</option>
            </select></br></br>


            <label class="label1" for="">Valor</label></br></br>
            <select name="value" class="input-type">
                <option value=""><?php echo $sale_info[0]['valor'] ?></option>
                <option value="450">R$ 450,00</option>
                <option value="600">R$ 600,00</option>
                <option value="900">R$ 900,00</option>
            </select></br></br>

            <label class="label1" for="">Status</label></br></br>
            <select name="status" class="input-type">
                <option value=""><?php echo $sale_info[0]['status'] ?></option>
                <option value="Negado">Negado</option>
                <option value="Aprovado">Aprovado</option>
                <option value="Em Processo">Em Processo</option>
            </select></br></br>

            <input class="entry" type="submit" value="EDITAR VENDA">

            <?php if ($error = $this->session->flashdata('success_sale')); ?>
            <?= $error ?>
            <?php if ($error = $this->session->flashdata('error_sale')); ?>
            <?= $error ?>
        </form>
    </div>

</body>

</html>