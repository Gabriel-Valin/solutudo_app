<?php
defined('BASEPATH') or exit('No direct script access allowed');


$this->load->view('mytemplates/sidebar'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/newmember.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Inria+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <title>Editar Membro - Solutudo</title>
</head>

<body>
    <h1 class="bodymember">Editar membro</h1>
    <div class="center-all">

        <form action="<?php base_url() ?>editmember/updateinfomember/<?= $member[0]['id'] ?>" method="POST">

            <label for="" class="label1">Nome</label></br></br>
            <input class="form-member" type="text" name="name" value="<?php echo $member[0]['nome'] ?>"></br></br>

            <label for="" class="label1">Celular</label></br></br>
            <input class="form-member" type="text" name="cel" onkeypress="$(this).mask('(00) 00000-0000')" value="<?php echo $member[0]['celular'] ?>"></br></br>

            <label for="" class="label1">Endereço</label></br></br>
            <input class="form-member" type="text" name="address" value="<?php echo $member[0]['endereco'] ?>"></br></br>

            <label for="" class="label1">Email</label></br></br>
            <input class="form-member" type="email" name="email" value="<?php echo $member[0]['email'] ?>"></br></br>


            <label for="" class="label1">Data de admissão</label></br></br>
            <input class="form-member" type="text" name="admission" onkeypress="$(this).mask('00/00/0000')" value="<?php echo $member[0]['data_admissao'] ?>"></br></br>


            <label for="" class="label1">Nível de acesso</label></br></br>
            <select name="level" class="form-member">
                <option value="">Selecione o nível de acesso</option>
                <option value="Gerente">Gerente</option>
                <option value="Vendedor">Vendedor</option>

            </select></br></br>

            <input class="entry" type="submit" value="EDITAR MEMBRO">

            <div><?php if ($error = $this->session->flashdata('success_edit')); ?>
                <?= $error ?>
                <?php if ($error = $this->session->flashdata('error_edit')); ?>
                <?= $error ?>
            </div>
        </form>
    </div>
</body>

</html>