<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php base_url() ?>assets/css/login.css">
	<title>Login - Gestão Solutudo</title>
</head>

<body>
	<div class="login-form">
		<img class="logo-img" src="<?php base_url() ?>assets/imgs/Solutudo_Brasil_Franchising_logo.png" alt="">
		<form action="<?php base_url() ?>login/validateuser" method="POST">
			<label class="label2" for="">Email:</label></br>
			<input type="email" name="email"></br></br>

			<label class="label2" for="">Password:</label></br>
			<input type="password" name="pass">

			<div class="change"><a href="<?php base_url() ?>changepass">TROCAR MINHA SENHA</a></div>

			<input type="submit" value="ENTRAR"></br>

		</form>

	</div>

</body>

</html>