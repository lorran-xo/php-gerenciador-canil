<!DOCTYPE html>
<html lang="pt">

<head>
	<link href="index.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gerenciador de Canil</title>
</head>

<body>
	<script src="functions.js"></script>

	<?php
		//echo "Hello World!"
		// aqui dentro pode usar codigos lógicos
	?>
	<!-- <button class="styled-button" onclick="geraAlerta('Cadastrar Animal no Sistema')">Cadastrar Animal</button>
	<button class="styled-button" onclick="geraAlerta('Retirar Animal do Sistema')">Retirar Animal</button>-->

	<section class="content">
		<div class="cadastro">
			<center><h2> Gerenciador de Canil </h2></center>
			<form class="form" method="POST" action="./functions.php">
				<center><h3> Cadastro de Animais</h3></center>
				<input class="field" name="tipo" placeholder="Tipo">
				<input class="field" name="raca" placeholder="Raça">
				<input class="field" name="porte" placeholder="Porte">
				<input class="field" name="sexo" placeholder="Sexo">
				<input class="field" name="idade" placeholder="Idade">
				<input class="field" name="acao" type="submit" value="Cadastrar">
			</form>
			 <a href="./page2.php"><input name="acao" type="submit" value="Retirar Animal"></a> 
		</div>

	</section>
</body>

</html>

