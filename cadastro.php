<?php

include("banco/conexao.php");
//variavel mysqli criado dentro de conexao.php
$txtErro = '';

if(isset($_POST['cadastrar'])){
	$tipo = $_POST['tipo'];
	$raca = $_POST['raca'];
	$porte = $_POST['porte'];
	$sexo = $_POST['sexo'];
	$idade = $_POST['idade'];

	if(empty($tipo)){
		$txtErro = 'Por favor, preencha o campo tipo!';
	} else {
		$txtErro = '';
		
		$sql_code = "INSERT into animais (tipo, raca, porte, sexo, idade) 
 				 VALUES ('$tipo', '$raca', '$porte',
 				 		 '$sexo', '$idade')";

	 	$cadastra = $mysqli->query($sql_code) or die($mysqli->error);

	 	header("Location: http://localhost/php-gerenciador-canil/index.php");
		exit();
	}

 	
	}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<link href="index.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png" >
	<title>Gerenciador de Canil</title>
</head>

<body>
	<!--<script src="functions.js"></script>
	 <button class="styled-button" onclick="geraAlerta('Cadastrar Animal no Sistema')">Cadastrar Animal</button>
	<button class="styled-button" onclick="geraAlerta('Retirar Animal do Sistema')">Retirar Animal</button>-->

	<section class="content">
		<div class="cadastro">
			<center><h2> Gerenciador de Canil </h2></center>
			<form class="form" method="POST" action="./cadastro.php">
				<center>
					<h3> Cadastro de Animais</h3>
					<h4> Preencha os dados abaixo para cadastrar um novo animal no canil</h4>
				</center>
					<?php echo "$txtErro"; ?>
				<input class="field" name="tipo" placeholder="Tipo">
				<input class="field" name="raca" placeholder="Raça">

				<label for="porte">Porte</label>
				<select class="field" name="porte">
					<option value="Pequeno">Pequeno</option>
					<option value="Médio">Médio</option>
					<option value="Grande">Grande</option>
				</select>

				<label for="sexo">Sexo</label>
				<select class="field" name="sexo">
					<option value="Macho">Macho</option>
					<option value="Fêmea">Fêmea</option>
				</select>

				<input class="field" name="idade" placeholder="Idade">

				<input class="field" name="cadastrar" type="submit" value="Cadastrar">
			</form>

			 <center><a href="./index.php"><button class="field">Listagem</button></a></center>
		</div>

	</section>
</body>

</html>

