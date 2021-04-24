<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//tabela animais
$_SESSION['idade'] = '';

//tabela aparencia id_animal = id.animais
//$_SESSION['peso'] = '';

//tabela identificacao id_animal = id.animais
$_SESSION['nome_animal'] = '';
$_SESSION['codigo'] = '';

//tabela raca id_animal = id.animais
$_SESSION['comportamento'] = '';

//tabela situacao id_animal = id.animais
$_SESSION['descricao_resgate'] = '';
$_SESSION['nome_responsavel_resgate'] = '';
$_SESSION['data_resgate'] = '';

$selected_animal_id = intval($_GET['id']);

	$sql_code = "SELECT * FROM canil.animal
	WHERE id_animal = '$selected_animal_id'";
	$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
	$array = $sql_query->fetch_assoc();

	if(!isset($_SESSION))
	session_start();

	$_SESSION['idade'] = $array['idade'];
	//$_SESSION['peso'] = $array['peso'];
	$_SESSION['nome_animal'] = $array['nome_animal'];
	$_SESSION['codigo'] = $array['codigo'];
	$_SESSION['comportamento'] = $array['comportamento'];
	$_SESSION['descricao_resgate'] = $array['descricao_resgate'];;
	$_SESSION['responsavel_resgate'] = $array['responsavel_resgate'];
	$_SESSION['data_resgate'] = $array['data_resgate'];
	$_SESSION['castrado'] = $array['castrado'];
	
?>

<div class="form-style-5">
	<form method="POST" action="./maisInfos.php">
		<h6> Visualize informações adicionais do <b>animal selecionado</b></h6><br/>
		<fieldset class="cabecario">
			<label for="codigo" class="label-centro">Código</label>
			<input class="input-disabilitado" name="codigo" type="text" value="<?php echo $_SESSION['codigo']; ?>">

			<label for="nome_animal" class="label-centro">Apelido</label>
			<input class="input-disabilitado" name="nome_animal" type="text" value="<?php echo $_SESSION['nome_animal']; ?>">
		</fieldset>

		<fieldset>
			<legend> Informações adicionais </legend>

			<!--<label for="Peso">Peso</label>
			<input class="input-disabilitado" name="peso" type="text" value="<?php echo $_SESSION['peso']; ?>"> -->

			<label for="idade">Idade</label>
			<input class="input-disabilitado" name="idade" type="text" value="<?php echo $_SESSION['idade']; ?>" placeholder="Idade">

			<label for="Comportamento">Comportamento</label>
				<select class="input-disabilitado" name="comportamento">
					<option value="" <?php if($_SESSION['comportamento'] == '') echo "selected";?>>Selecione</option>
					<option value="Calmo" <?php if($_SESSION['comportamento'] == "Calmo") echo "selected";?>>Calmo</option>
					<option value="Agitado" <?php if($_SESSION['comportamento'] == "Agitado") echo "selected";?>>Agitado</option>
					<option value="Agressivo" <?php if($_SESSION['comportamento'] == "Agressivo") echo "selected";?>>Agressivo</option>
				</select>

			<label for="castracao">Castração</label>
			<input class="input-disabilitado" name="castracao" type="date" value="<?php echo $_SESSION['castrado']; ?>" placeholder="Castração">

			<label for="responsavel_resgate">Resgate feito por</label>
			<input class="input-disabilitado" name="responsavel_resgate" type="text" value="<?php echo $_SESSION['responsavel_resgate']; ?>">

			<label for="data_resgate">no dia</label>
			<input class="input-disabilitado" name="data_resgate" type="text" value="<?php echo $_SESSION['data_resgate']; ?>">

			<label for="descricao_resgate">Descrição</label>
			<textarea class="input-disabilitado" name="descricao_resgate"><?php echo $_SESSION['descricao_resgate']; ?></textarea>
		</fieldset>
		<a href="index.php?page=0"> <input type="button" value="Voltar"/> </a>   
	</form>
</div>

<?php require_once "bars/bottom_bar.php"?>