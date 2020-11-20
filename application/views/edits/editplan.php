<?php
defined('BASEPATH') or exit('No direct script access allowed');


$this->load->view('mytemplates/sidebar'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/editplan.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Inria+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <title>Editar plano - Solutudo</title>
</head>

<body>
    <h1 class="bodymember">Editar Plano.</h1>
    <div class="center-all">

        <form action="<?php base_url() ?>editplan/updateplan/<?= $plans_info[0]['id'] ?>" method="POST">

            <label for="" class="label1">Plano:</label></br></br>
            <input class="form-member" type="text" name="plan" value="<?php echo $plans_info[0]['planos'] ?>"></br></br>

            <label for="" class="label1">Valor</label></br></br>
            <input class="form-member" type="text" name="value" onkeypress="$(this).mask('R$ #.##0,00', {reverse: true});" value="<?php echo  $plans_info[0]['valor']  ?>"></br></br>


            <input class="entry" type="submit" value="EDITAR PLANO">

            <div>
                <?php if ($error = $this->session->flashdata('success_plan')); ?>
                <?= $error ?>
                <?php if ($error = $this->session->flashdata('error_plan')); ?>
                <?= $error ?>
            </div>


        </form>
    </div>

</body>

</html>