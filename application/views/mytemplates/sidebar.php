<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/sidebar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="left-menu">
        <img class="logo-side" width="200px" height="100px" src="<?php base_url() ?>assets/imgs/solutudo-logo-sidebar.png" alt="">
        <div class="menu-area">
            <ul>
                <div class="dropdown">
                    <li class="myli" style="background-image: url('assets/icons/control-panel.png');">Empresas</li>
                    <div class="dropdown-content">
                        <a href="<?php base_url() ?>companys">Visualizar Empresas</a>
                        <a href="<?php base_url() ?>newcompany">Cadastrar Empresas</a>
                    </div>
                </div>

                <div class="dropdown">
                    <li class="myli" style="background-image: url('assets/icons/money.png');">Vendas</li>
                    <div class="dropdown-content">
                        <a href="<?php base_url() ?>sales">Visualizar Vendas</a>
                        <a href="<?php base_url() ?>newsale">Cadastrar Vendas</a>
                    </div>
                </div>

                <div class="dropdown">
                    <li class="myli" style="background-image: url('assets/icons/community.png');">Membros</li>
                    <div class="dropdown-content">
                        <a href="<?php base_url() ?>members">Visualizar Membros</a>
                        <a href="<?php base_url() ?>newmember">Cadastrar Membro</a>
                    </div>
                </div>

                <div class="dropdown">
                    <li class="myli" style="background-image: url('assets/icons/hand.png');">Planos</li>
                    <div class="dropdown-content">
                        <a href="<?php base_url() ?>plans">Visualizar Planos</a>
                        <a href="<?php base_url() ?>newplan">Cadastrar Plano</a>
                    </div>
                </div>

            </ul>
        </div>
    </div>


    <div class="container">
        <div class="top">
            <div class="top-right"><a id="logout" href="<?php base_url() ?>login/logout">Sair</a></div>
            <div class="top-right" id="welcome">Bem-vindo, <?php echo $session_name ?>
            </div>
        </div>
    </div>
</body>

</html>