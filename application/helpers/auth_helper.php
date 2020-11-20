<?php

function checkUserLogged()
{
    if (isset($_SESSION['logged_user'])) {
        return true;
    } else {
        redirect('login');
        exit;
    }
}

function checkisNotManager()
{
    if ($_SESSION['logged_user']['nivel_acesso'] == 'Vendedor') {
        redirect('companys');
    } else if ($_SESSION['logged_user']['nivel_acesso'] == 'Gerente') {
        return true;
    } else {
        redirect('companys');
    }
}
