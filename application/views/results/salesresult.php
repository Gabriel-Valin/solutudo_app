<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/filters/sales.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Inria+Sans&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

</head>

<body>
    <div class="left-menu">
        <img class="logo-side" width="200px" height="100px" src="<?php echo base_url() ?>assets/imgs/solutudo-logo-sidebar.png" alt="">
        <div class="menu-area">
            <ul>
                <div class="dropdown">
                    <li class="myli" style="background-image: url('<?php echo base_url() ?>assets/icons/control-panel.png');">Empresas</li>
                    <div class="dropdown-content">
                        <a href="<?php echo base_url() ?>companys">Visualizar Empresas</a>
                        <a href="<?php echo base_url() ?>newcompany">Cadastrar Empresas</a>
                    </div>
                </div>

                <div class="dropdown">
                    <li class="myli" style="background-image: url('<?php echo base_url() ?>assets/icons/money.png');">Vendas</li>
                    <div class="dropdown-content">
                        <a href="<?php echo base_url() ?>sales">Visualizar Vendas</a>
                        <a href="<?php echo base_url() ?>newsale">Cadastrar Vendas</a>
                    </div>
                </div>

                <div class="dropdown">
                    <li class="myli" style="background-image: url('<?php echo base_url() ?>assets/icons/community.png');">Membros</li>
                    <div class="dropdown-content">
                        <a href="<?php echo base_url() ?>members">Visualizar Membros</a>
                        <a href="<?php echo base_url() ?>newmember">Cadastrar Membro</a>
                    </div>
                </div>

                <div class="dropdown">
                    <li class="myli" style="background-image: url('<?php echo base_url() ?>assets/icons/hand.png');">Planos</li>
                    <div class="dropdown-content">
                        <a href="<?php echo base_url() ?>plans">Visualizar Planos</a>
                        <a href="<?php echo base_url() ?>newplan">Cadastrar Plano</a>
                    </div>
                </div>

            </ul>
        </div>
    </div>


    <div class="container">
        <div class="top">
            <div class="top-right"><a id="logout" href="<?php base_url() ?>login/logout">Sair</a></div>
            <!-- <div class="top-right" id="welcome">Bem-vindo, <?php echo $session_name ?> -->
        </div>
    </div>
    </div>

    <div class="center-all">
        <h1 class="bodymember">Vendas</h1>
        <!-- <button onclick="window.location.href='newsale'" class="btn-first">NOVA VENDA</button> -->
        <div class="my-table" style="padding-left: 250px;">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">EMPRESA</th>
                        <th scope="col">VENDEDOR</th>
                        <th scope="col">PLANO</th>
                        <th scope="col">VALOR</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">DATA DA VENDA</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($result as $mc) : ?>
                        <tr>
                            <td><?php echo $mc['empresa'] ?></td>
                            <td><?php echo $mc['vendedor'] ?></td>
                            <td><?php echo $mc['plano'] ?></td>
                            <td><?php echo $mc['valor'] ?></td>
                            <td><?php echo $mc['status'] ?></td>
                            <td><?php echo $mc['data_venda'] ?></td>
                            <?php if ($_SESSION['logged_user']['nivel_acesso'] == 'Gerente') {
                                echo '<td><a href="javascript:goDel(' . $mc['id'] . ')"><img src="' . base_url() . 'assets/icons/delete.png" style="width: 25px;"></a></td>';
                                echo '<td><a href="' . base_url() . 'editsale?sale=' . $mc['id'] . '"><img src="' . base_url() . 'assets/icons/edit.png" style="width: 25px;"></a></td>';
                            }
                            ?>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
            <script>
                function goDel(id) {
                    var myUrl = 'sales/deletesale/' + id
                    if (confirm("Certeza que deseja deletar essa venda?")) {
                        window.location.href = myUrl;
                    } else {
                        alert('Registro não modificado');
                        return false;
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>