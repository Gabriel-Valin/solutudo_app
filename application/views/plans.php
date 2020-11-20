<?php
defined('BASEPATH') or exit('No direct script access allowed');


$this->load->view('mytemplates/sidebar'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/plans.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Inria+Sans&display=swap" rel="stylesheet">

    <title>Planos - Solutudo</title>
</head>

<body>
    <h1 class="bodymember">Planos</h1>
    <div class="center-all">
        <div class="my-table" style="padding-left: 250px;">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>

                        <th scope="col">PLANO</th>
                        <th scope="col">VALOR</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($plans as $mc) : ?>
                        <tr>

                            <td><?php echo $mc['planos'] ?></td>
                            <td><?php echo $mc['valor']  ?></td>


                            <?php if ($_SESSION['logged_user']['nivel_acesso'] == 'Gerente') {

                                echo '<td><a href="javascript:goDel(' . $mc['id'] . ')"><img src="assets/icons/delete.png" style="width: 25px;"></a></td>';
                                /*  echo '<td><a href="' . base_url() . 'editmember' . '"><img src="assets/icons/edit.png" style="width: 25px;"></a></td>'; */
                                echo '<td><a href="' . base_url() . 'editplan?plan=' . $mc['id'] . '"><img src="assets/icons/edit.png" style="width: 25px;"></a></td>';
                                echo '<td><a href="' . base_url() . 'newplan' . '"><img src="assets/icons/add.png" style="width: 25px;"></a></td>';
                            }
                            ?>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <script>
                function goDel(id) {
                    var myUrl = 'plans/deleteplan/' + id
                    if (confirm("Are you sure you want to delete this plan?")) {
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