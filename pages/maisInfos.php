<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//tabela animais
$_SESSION['idade'] = '';

//tabela aparencia id_animal = id.animais
$_SESSION['peso'] = '';

//tabela identificacao id_animal = id.animais
$_SESSION['apelido'] = '';
$_SESSION['codigo'] = '';

//tabela raca id_animal = id.animais
$_SESSION['comportamento'] = '';

//tabela situacao id_animal = id.animais
$_SESSION['descricao'] = '';
$_SESSION['nome_responsavel_resgate'] = '';
$_SESSION['data_resgate'] = '';

$selected_animal_id = intval($_GET['id']);

if(isset($_POST['excluir'])){

	if(!isset($_SESSION))
	 	session_start();
	 	
	foreach ($_POST as $key => $value) 
	 		 $_SESSION[$key] = $mysqli->real_escape_string($value);
	
		$sql_code = "DELETE from animais WHERE id = '$selected_animal_id'";

		$cadastra = $mysqli->query($sql_code) or die($mysqli->error);

		header("Location: http://localhost/php-gerenciador-canil/pages/index.php?page=0");
		exit();
		
	} else {
		$sql_code = "SELECT
		can.idade,
		cap.peso,
		cid.codigo,
		cid.apelido,
		cra.comportamento,
		csi.descricao,
		csi.nome_responsavel_resgate,
		csi.data_resgate
	  FROM
		canil.animais can
		  INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
		  INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
		  INNER JOIN canil.raca cra ON can.id = cra.id_animal
		  INNER JOIN canil.situacao csi ON can.id = csi.id_animal
	  WHERE can.id = '$selected_animal_id'";
		$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
		$array = $sql_query->fetch_assoc();

		if(!isset($_SESSION))
	 	session_start();

		$_SESSION['idade'] = $array['idade'];
		$_SESSION['peso'] = $array['peso'];
		$_SESSION['apelido'] = $array['apelido'];
		$_SESSION['codigo'] = $array['codigo'];
		$_SESSION['comportamento'] = $array['comportamento'];
		$_SESSION['descricao'] = $array['descricao'];;
		$_SESSION['nome_responsavel_resgate'] = $array['nome_responsavel_resgate'];
		$_SESSION['data_resgate'] = $array['data_resgate'];
	}
?>

<div class="form-style-5">
	<form method="POST" action="./maisInfos.php">
		<h6> Visualize informações adicionais do <b>animal selecionado</b></h6><br/>
		<fieldset class="cabecario">
			<label for="codigo" class="label-centro">Código</label>
			<input class="input-disabilitado" name="codigo" type="text" value="<?php echo $_SESSION['codigo']; ?>">

			<label for="Apelido" class="label-centro">Apelido</label>
			<input class="input-disabilitado" name="apelido" type="text" value="<?php echo $_SESSION['apelido']; ?>">
		</fieldset>

		<fieldset>
			<legend> Informações adicionais </legend>

			<label for="Peso">Peso</label>
			<input class="input-disabilitado" name="peso" type="text" value="<?php echo $_SESSION['peso']; ?>">

			<label for="idade">Idade</label>
			<input class="input-disabilitado" name="idade" type="text" value="<?php echo $_SESSION['idade']; ?>" placeholder="Idade">

			<label for="Comportamento">Comportamento</label>
				<select class="input-disabilitado" name="comportamento">
					<option value="" <?php if($_SESSION['comportamento'] == '') echo "selected";?>>Selecione</option>
					<option value="Calmo" <?php if($_SESSION['comportamento'] == "Calmo") echo "selected";?>>Calmo</option>
					<option value="Agitado" <?php if($_SESSION['comportamento'] == "Agitado") echo "selected";?>>Agitado</option>
					<option value="Agressivo" <?php if($_SESSION['comportamento'] == "Agressivo") echo "selected";?>>Agressivo</option>
				</select>

			<label for="nome_responsavel_resgate">Resgate feito por</label>
			<input class="input-disabilitado" name="nome_responsavel_resgate" type="text" value="<?php echo $_SESSION['nome_responsavel_resgate']; ?>">

			<label for="data_resgate">no dia</label>
			<input class="input-disabilitado" name="data_resgate" type="text" value="<?php echo $_SESSION['data_resgate']; ?>">

			<label for="descricao">Descrição</label>
			<textarea class="input-disabilitado" name="descricao"><?php echo $_SESSION['descricao']; ?></textarea>
		</fieldset>
		<a href="index.php?page=0"> <input type="button" value="Voltar"/> </a>   
	</form>
</div>

<?php require_once "bars/bottom_bar.php"?>