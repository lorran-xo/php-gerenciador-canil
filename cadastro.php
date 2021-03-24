<?php

include("banco/conexao.php");
//Iniciando as mensagens de erro com valor vazio 
$tipoErro = '';
$racaErro = '';
$porteErro = '';
$sexoErro = '';
$idadeErro = '';
//Iniciando o value dos inputs com valor vazio 
$_SESSION['tipo'] = '';
$_SESSION['raca'] = '';
$_SESSION['porte'] = '';
$_SESSION['sexo'] = '';
$_SESSION['idade'] = '';

if(isset($_POST['cadastrar'])){

	if(!isset($_SESSION))
	 	session_start();
	 	
	foreach ($_POST as $key => $value) 
	 		 $_SESSION[$key] = $mysqli->real_escape_string($value);
	 
	//Validando SE DIGITOU NOS CAMPOS

	 	//Esses erros aparecerão em navegadores que nao detectam o atributo 'required' automaticamente dos inputs
		 if(strlen($_SESSION['tipo']) == 0){ 
		 	$tipoErro = 'É necessário preencher o campo Tipo!';
		 } else if(strlen($_SESSION['raca']) == 0){
		 	$racaErro = 'É necessário preencher o campo Raça!';
		 } else if(strlen($_SESSION['porte']) == 0){
		 	$porteErro = 'É necessário selecionar um Porte!';
		 } else if(strlen($_SESSION['sexo']) == 0){
		 	$sexoErro = 'É necessário selecionar um Sexo';
		 } else if(strlen($_SESSION['idade']) == 0){
		 	$idadeErro = 'É necessário preencher o campo Idade!';
		 } else {
			$tipoErro = '';
			$racaErro = '';
			$porteErro = '';
			$sexoErro = '';
			$idadeErro = '';

			$sql_code = "INSERT into animais (tipo, raca, porte, sexo, idade, data) 
	 				 VALUES ('$_SESSION[tipo]', '$_SESSION[raca]', '$_SESSION[porte]',
	 				 		 '$_SESSION[sexo]', '$_SESSION[idade]', NOW() )";
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
			<center><h2 class="pageTitle"> Sistema Gerenciador de Canil </h2></center>
			<form class="form" method="POST" action="./cadastro.php">
				<center>
					<h3> Cadastro de Animais</h3>
					<h4> Preencha os dados abaixo para cadastrar um novo animal no canil</h4>
				</center>
				<label for="sexo">Tipo</label>
				<input class="field" name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>" required>
					<?php echo "<span class='errortext'>$tipoErro</span>"; ?>
				<label for="sexo">Raça</label>
				<input class="field" name="raca" type="text" value="<?php echo $_SESSION['raca']; ?>" required>
					<?php echo "<span class='errortext'> $racaErro </span>"; ?>

				<label for="porte">Porte</label>
				<select class="field" name="porte" required>
					<option value="" <?php if($_SESSION['porte'] == '') echo "selected";?>>Selecione</option>
					<option value="Pequeno" <?php if($_SESSION['porte'] == "Pequeno") echo "selected";?>>Pequeno</option>
					<option value="Médio" <?php if($_SESSION['porte'] == "Médio") echo "selected";?>>Médio</option>
					<option value="Grande" <?php if($_SESSION['porte'] == "Grande") echo "selected";?>>Grande</option>
				</select>
					<?php echo "<span class='errortext'>$porteErro</span>"; ?>

				<label for="sexo">Sexo</label>
				<select class="field" name="sexo" required>
					<option value="" <?php if($_SESSION['sexo'] == '') echo "selected";?>>Selecione</option>
					<option value="Macho" <?php if($_SESSION['sexo'] == "Macho") echo "selected";?>>Macho</option>
					<option value="Fêmea" <?php if($_SESSION['sexo'] == "Fêmea") echo "selected";?>>Fêmea</option>
				</select>
					<?php echo "<span class='errortext'>$sexoErro</span>"; ?>
				<label for="sexo">Idade</label>
				<input class="field" name="idade" type="number" value="<?php echo $_SESSION['idade']; ?>" required>
					<?php echo "<span class='errortext'>$idadeErro</span>"; ?>
				<center><button class="field submitButton" name="cadastrar" type="submit"> Cadastrar </button></center>
			</form>
			 <center><a href="./index.php"><button class="field submitButton">Listagem</button></a></center>
		</div>

	</section>
</body>

</html>

