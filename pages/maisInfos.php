<?php require_once "barras/barra_superior.php"?>

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

<style> 
.form-style-5{
	max-width: 500px;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 10px auto;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 textarea,
.form-style-5 select {
    pointer-events: none; 
	font-family: Georgia, "Times New Roman", Times, serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	outline: 0;
	padding: 10px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 select{
	-webkit-appearance: menulist-button;
	height:35px;
}
.form-style-5 .number {
	background: #50423A;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
	position: relative;
	display: block;
	padding: 10px;
	color: #FFF;
	margin: 0 auto;
	background: #a99589;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 30%;
	border: 1px solid #9f877a;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
	background: #856e60; /*hover do botao aplicar*/
}

.sem-link{
    text-decoration: 'none';
}

.input-disabilitado{
	pointer-events: none;
	cursor: not-allowed;
}

.cabecario{
	width: 60%;
	margin-left: 25%;
}

.label-centro{
	margin-left: 40%;
}

</style>

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
			<input name="peso" type="text" value="<?php echo $_SESSION['peso']; ?>">

			<label for="idade">Idade</label>
			<input class="field" name="idade" type="text" value="<?php echo $_SESSION['idade']; ?>" placeholder="Idade">

			<label for="Comportamento">Comportamento</label>
				<select name="comportamento">
					<option value="" <?php if($_SESSION['comportamento'] == '') echo "selected";?>>Selecione</option>
					<option value="Calmo" <?php if($_SESSION['comportamento'] == "Calmo") echo "selected";?>>Calmo</option>
					<option value="Agitado" <?php if($_SESSION['comportamento'] == "Agitado") echo "selected";?>>Agitado</option>
					<option value="Agressivo" <?php if($_SESSION['comportamento'] == "Agressivo") echo "selected";?>>Agressivo</option>
				</select>

			<label for="nome_responsavel_resgate">Resgate feito por</label>
			<input name="nome_responsavel_resgate" type="text" value="<?php echo $_SESSION['nome_responsavel_resgate']; ?>">

			<label for="data_resgate">no dia</label>
			<input name="data_resgate" type="text" value="<?php echo $_SESSION['data_resgate']; ?>">

			<label for="descricao">Descrição</label>
			<textarea name="descricao">
				<?php echo $_SESSION['descricao']; ?>
			</textarea>
		</fieldset>
		<a href="index.php?page=0""> <input type="button" value="Voltar"/> </a>   
		<input type="submit" name="excluir" value="Excluir" />
	</form>
</div>

<?php require_once "barras/barra_inferior.php"?>