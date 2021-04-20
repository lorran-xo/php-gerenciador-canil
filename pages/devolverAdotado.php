<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$motivoDevolucaoErro = '';
$selected_animal_id = intval($_GET['id']);
//Iniciando o value dos inputs com valor vazio 
$_SESSION['nome_responsavel_adocao'] = '';
$_SESSION['cpf_responsavel_adocao'] = '';
$_SESSION['motivo_devolucao'] = '';
$_SESSION['tipo'] = '';
$_SESSION['codigo'] = '';
$_SESSION['porte'] = '';
$_SESSION['cor'] = '';
$_SESSION['sexo'] = '';
$_SESSION['apelido'] = '';
$_SESSION['raca'] = '';

if(isset($_POST['devolver'])){

	if(!isset($_SESSION))
	 	session_start();
	 	
	foreach ($_POST as $key => $value) 
	 		 $_SESSION[$key] = $mysqli->real_escape_string($value);

		 if(strlen($_SESSION['motivo_devolucao']) == 0){
		 	$motivoDevolucaoErro = 'É necessário preencher o motivo da devolução!';
		 } else {
			$motivoDevolucaoErro = '';

			$sql_code = "UPDATE situacao SET adotado=0, data_resgate= NOW(), motivo_devolucao='$_SESSION[motivo_devolucao]' WHERE id_animal = '$selected_animal_id'";

		 	$cadastra = $mysqli->query($sql_code) or die($mysqli->error);

		 	header("Location: http://localhost/php-gerenciador-canil/pages/index.php?page=0");
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
		cra.raca,
		csi.nome_responsavel_adocao,
    	csi.cpf_responsavel_adocao
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

		$_SESSION['tipo']= $array['tipo'];
		$_SESSION['sexo'] = $array['sexo'];
		$_SESSION['cor'] = $array['cor'];
		$_SESSION['porte'] = $array['porte'];
		$_SESSION['codigo'] = $array['codigo'];
		$_SESSION['apelido'] = $array['apelido'];
		$_SESSION['raca'] = $array['raca'];
		$_SESSION['nome_responsavel_adocao'] = $array['nome_responsavel_adocao'];
		$_SESSION['cpf_responsavel_adocao'] = $array['cpf_responsavel_adocao'];
	}
?>

<div class="form-style-5">
	<form method="POST" action="./devolverAdotado.php?id=<?php echo $selected_animal_id; ?>">   
		<h6> Verifique abaixo os dados do animal que está sendo devolvido ao canil </h6> <br/>
		<fieldset>
			<legend>Sendo devolvido</legend>
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

			<legend> Dados do antigo responsável </legend>
				<label for="nome">Nome </label>
                    <input class="input-disabilitado" name="nome_responsavel_adocao" type="text" value="<?php echo $_SESSION['nome_responsavel_adocao']; ?>">
								
				<label for="cpf">portador do CPF Nº</label>
					<input class="input-disabilitado" name="cpf_responsavel_adocao" type="text" value="<?php echo $_SESSION['cpf_responsavel_adocao']; ?>">
				<br/>
					<label for="descricao"><b>Motivo da devolução</b></label>
				<textarea name="motivo_devolucao" required><?php echo $_SESSION['motivo_devolucao']; ?></textarea>
				<br/>
			<hr class="sidebar-divider my-0"><br/>
		</fieldset>
		<input type="submit" name="devolver" value="Finalizar" />
		<a href="historicoAdocao.php?page=0"> <input type="button" value="Cancelar"/> </a>   
	</form>
</div>
<?php require_once "bars/bottom_bar.php"?>