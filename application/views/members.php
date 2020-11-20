<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('mytemplates/sidebar'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/members.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Inria+Sans&display=swap" rel="stylesheet">
    <title>Membros - Solutudo</title>
</head>

<body>
    <div class="center-all">
        <h1 class="bodymember">Membros</h1>
        <div class="my-table" style="padding-left: 250px;">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>

                        <th scope="col">NOME</th>
                        <th scope="col">CELULAR</th>
                        <th scope="col">ENDEREÇO</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">DATA DE ADMISSÃO</th>
                        <th scope="col">NÍVEL DE ACESSO</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members_total as $mc) : ?>
                        <tr>

                            <td><?php echo $mc['nome'] ?></td>
                            <td><?php echo $mc['celular'] ?></td>
                            <td><?php echo $mc['endereco'] ?></td>
                            <td><?php echo $mc['email'] ?></td>
                            <td><?php echo $mc['data_admissao'] ?></td>
                            <td><?php echo $mc['nivel_acesso'] ?></td>

                            <?php if ($_SESSION['logged_user']['nivel_acesso'] == 'Gerente') {

                                echo '<td><a href="javascript:goDel(' . $mc['id'] . ')"><img src="assets/icons/delete.png" style="width: 25px;"></a></td>';
                                /*  echo '<td><a href="' . base_url() . 'editmember' . '"><img src="assets/icons/edit.png" style="width: 25px;"></a></td>'; */
                                echo '<td><a href="' . base_url() . 'editmember?member=' . $mc['id'] . '"><img src="assets/icons/edit.png" style="width: 25px;"></a></td>';
                                echo '<td><a href="' . base_url() . 'newmember' . '"><img src="assets/icons/add.png" style="width: 25px;"></a></td>';
                            }
                            ?>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <script>
                function goDel(id) {
                    var myUrl = 'members/deleteuser/' + id
                    if (confirm("Are you sure you want to delete this user?")) {
                        window.location.href = myUrl;
                    } else {
                        alert('No modified.');
                        return false;
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>