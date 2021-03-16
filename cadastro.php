<?php

include("banco/conexao.php");
//variavel mysqli criado dentro de conexao.php

if(isset($_POST['cadastrar'])){
	$tipo = $_POST['tipo'];
	$raca = $_POST['tipo'];
	$porte = $_POST['tipo'];
	$sexo = $_POST['tipo'];
	$idade = $_POST['tipo'];


 	$sql_code = "INSERT into animais (tipo, raca, porte, sexo, idade) 
 				 VALUES ('$tipo', '$raca', '$porte',
 				 		 '$sexo', '$idade')";

 	 echo "<script> location.href='http://localhost/php-gerenciador-canil/index.php'; <script>";
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
				<center><h3> Cadastro de Animais</h3></center>
				
				
				<input class="field" name="tipo" placeholder="Tipo">
				<input class="field" name="raca" placeholder="Raça">

				<label for="porte">Porte></label>
				<select name="porte">
					<option value="Pequeno">Pequeno</option>
					<option value="Médio">Médio</option>
					<option value="Grande">Grande</option>
				</select>

				<label for="sexo">Sexo></label>
				<select name="sexo">
					<option value="Macho">Macho</option>
					<option value="Fêmea">Fêmea</option>
				</select>

				<input class="field" name="idade" placeholder="Idade">

				<input name="cadastrar" type="submit" value="Cadastrar">
			</form>


			 <a href="./saidas.php"><input name="acao" type="submit" value="Retirar"></a> 
			 <a href="./index.php"><input name="acao" type="submit" value="Disponíveis"></a> 
		</div>

	</section>
</body>

</html>

