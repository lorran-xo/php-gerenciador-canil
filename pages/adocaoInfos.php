<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$nomeErro = '';
$cpfErro = '';
$selected_animal_id = intval($_GET['id']);
//Iniciando o value dos inputs com valor vazio 
$_SESSION['nome_responsavel_adocao'] = '';
$_SESSION['cpf_responsavel_adocao'] = '';
$_SESSION['tipo'] = '';
$_SESSION['codigo'] = '';
$_SESSION['porte'] = '';
$_SESSION['cor'] = '';
$_SESSION['sexo'] = '';
$_SESSION['apelido'] = '';
$_SESSION['raca'] = '';

if(isset($_POST['adotar'])){

	if(!isset($_SESSION))
	 	session_start();
	 	
	foreach ($_POST as $key => $value) 
	 		 $_SESSION[$key] = $mysqli->real_escape_string($value);

		 if(strlen($_SESSION['tipo']) == 0){ 
		 	$nomeErro = 'É necessário preencher com o nome!';
		 } else if(strlen($_SESSION['raca']) == 0){
		 	$cpfErro = 'É necessário preencher com o CPF';
		 } else {
			$nomeErro = '';
			$cpfErro = '';

			$sql_code = "UPDATE situacao SET nome_responsavel_adocao = '$_SESSION[nome_responsavel_adocao]', cpf_responsavel_adocao = '$_SESSION[cpf_responsavel_adocao]', adotado = 1, data_adocao = NOW() WHERE id_animal = '$selected_animal_id'";

		 	$cadastra = $mysqli->query($sql_code) or die($mysqli->error);

			header("Location: http://localhost/php-gerenciador-canil/pages/historicoAdocao.php?page=0");
			exit();
		}
	} else {
		
	$sql_code = "SELECT
		can.tipo, 
		can.sexo, 
		cap.cor, 
		cap.porte, 
		cid.codigo,
		cid.apelido,
		cra.raca
	  FROM
		canil.animais can
		  INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
		  INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
		  INNER JOIN canil.raca cra ON can.id = cra.id_animal
	  WHERE can.id = '$selected_animal_id'";
		$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
		$array = $sql_query->fetch_assoc();

		if(!isset($_SESSION))
	 	session_start();

		$_SESSION['tipo']= $array['tipo'];
		$_SESSION['sexo'] = $array['sexo'];
		$_SESSION['cor'] = $array['cor'];
		$_SESSION['porte'] = $array['porte'];
		$_SESSION['codigo'] = $array['codigo'];
		$_SESSION['apelido'] = $array['apelido'];
		$_SESSION['raca'] = $array['raca'];
	}
?>

<div class="form-style-5">
	<form method="POST" action="./adocaoInfos.php?id=<?php echo $selected_animal_id; ?>">   
		<h6> Preencha com atenção os dados de responsabilidade de quem está adotando para registrar a saída desse animal do canil! </h6> <br/>
		<fieldset>
			<legend>Sendo adotado</legend>
				<input class="input-disabilitado" name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>">
				<input class="input-disabilitado" name="apelido" type="text" value="<?php echo $_SESSION['apelido']; ?>">
				<input class="input-disabilitado" name="raca" type="text" value="<?php echo $_SESSION['raca']; ?>">

				<label for="codigo">do código</label>
					<input class="input-disabilitado" name="codigo" type="text" value="<?php echo $_SESSION['codigo']; ?>">

				<label for="porte">porte</label>
					<input class="input-disabilitado" name="porte" type="text" value="<?php echo $_SESSION['porte']; ?>">

					<label for="cor">cor</label>
				<input class="input-disabilitado" name="cor" type="text" value="<?php echo $_SESSION['cor']; ?>">

					<label for="sexo">sexo</label>
				<input class="input-disabilitado" name="sexo" type="text" value="<?php echo $_SESSION['sexo']; ?>">
			<hr class="sidebar-divider my-0"><br/>

			<legend> Termo de Responsabilidade </legend>
				<label for="nome">Ao clicar em 'Adotar!', fica declarado que toda a responsabilidade de cuidados está sendo passada por meio dessa doação à </label>
                    <input name="nome_responsavel_adocao" type="text" value="<?php echo $_SESSION['nome_responsavel_adocao']; ?>" required>
                    <?php echo "<span class='errortext'>$nomeErro</span>"; ?>
								
				<label for="cpf">portador do CPF Nº</label>
					<input name="cpf_responsavel_adocao" type="text" value="<?php echo $_SESSION['cpf_responsavel_adocao']; ?>" required>
					<?php echo "<span class='errortext'>$cpfErro</span>"; ?>
				<label for="sexo">e que todos os envolvidos estão de acordo com o <a href="termo-de-adocao.docx" download="Termo-de-Adoção.docx">Termo de Adoção</a>.</label>
				<br/><br/>
			<hr class="sidebar-divider my-0"><br/>
		</fieldset>
		<input type="submit" name="adotar" value="Adotar!" />
		<a href="adocao.php?page=0"> <input type="button" value="Cancelar"/> </a>   
	</form>
</div>
<?php require_once "bars/bottom_bar.php"?>