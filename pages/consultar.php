<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

$crmvErro = '';
$animalErro = '';
$pesoErro = '';
$saudeErro = '';
$descricaoErro = '';
$procedimentoErro = '';
$_SESSION['crmv'] = '';
$_SESSION['animal'] = '';
$_SESSION['peso'] = '';
$_SESSION['saude'] = '';
$_SESSION['descricao'] = '';
$_SESSION['procedimento'] = '';

if(isset($_POST['cadastrar'])){

	if(!isset($_SESSION))
	 	session_start();
	 	
	foreach ($_POST as $key => $value) 
	 		 $_SESSION[$key] = $mysqli->real_escape_string($value);
	 
	 	//Validando SE DIGITOU NOS CAMPOS, esses erros aparecerão em navegadores que nao detectam o atributo 'required' automaticamente dos inputs
		 if(strlen($_SESSION['crmv']) == 0){ 
		 	$crmvErro = 'É necessário preencher com o CRMV do veterinário!';
		 } else if(strlen($_SESSION['animal']) == 0){
			$animalErro = 'É necessário selecionar um animal!';
		 } else if(strlen($_SESSION['peso']) == 0){
			$pesoErro = 'Insira o peso atual do animal!';
		 } else if(strlen($_SESSION['saude']) == 0){
			$saudeErro = 'Insira o estado de saúde do animal!';
		 } else if(strlen($_SESSION['descricao']) == 0){
			$descricaoErro = 'Insira uma breve descricao do procedimento!';
		 } else if(strlen($_SESSION['procedimento']) == 0){
			$procedimentoErro = 'É necessário selecionar qual procedimento foi realizado!';
		 } else {
			$crmvErro = '';
			$animalErro = '';
			$pesoErro = '';
			$saudeErro = '';
			$descricaoErro = '';
			$procedimentoErro = '';

			$mysqli->query("INSERT INTO acompanhamento (id_veterinario, id_animal, peso, saude, descricao, data_acompanhamento, id_procedimento) VALUES ('$_SESSION[id_veterinario]', '$_SESSION[id_animal]', '$_SESSION[peso]', '$_SESSION[saude]', '$_SESSION[descricao]', NOW(), '$_SESSION[id_procedimento]')");

		 	header("Location: http://localhost/php-gerenciador-canil/pages/consultas.php?page=0");
			exit();
		}
	}
?>

<div>
    <h3 class="centraliza-titulo">Resgate</h3>
    <div class="form-style-5">
        <form method="POST" action="./consultar.php">
            <h6> Preencha o formulário abaixo após a realização da consulta médica do animal</h6><br/>
            <fieldset>
                <legend><span class="number">1</span>Veterinário</legend>
					<label for="crmv">CRMV*</label>
					<input name="crmv" type="number" value="<?php echo $_SESSION['crmv']; ?>" required>
					<?php echo "<span class='errortext'>$crmvErro</span>"; ?>

                <legend><span class="number">2</span> Animal </legend>

				<label for="animal">Animal*</label>
                <input name="animal" type="text" value="<?php echo $_SESSION['animal']; ?>" required>
                <?php echo "<span class='errortext'> $animalErro </span>"; ?>

                <legend><span class="number">3</span> Consulta </legend>

				<label for="peso">Peso*</label>
                <input name="peso" type="text" value="<?php echo $_SESSION['peso']; ?>" required>
                <?php echo "<span class='errortext'> $pesoErro </span>"; ?>

				<label for="saude">Saúde*</label>
                <input name="saude" type="text" value="<?php echo $_SESSION['saude']; ?>" required>
                <?php echo "<span class='errortext'> $saudeErro </span>"; ?>

				<label for="descricao">Descrição geral*</label>
                <textarea name="descricao" required><?php echo $_SESSION['descricao']; ?></textarea>
				<?php echo "<span class='errortext'> $descricaoErro </span>"; ?>

				<label for="procedimento">Procedimento*</label>
                <input name="procedimento" type="text" value="<?php echo $_SESSION['procedimento']; ?>" required>
                <?php echo "<span class='errortext'> $procedimentoErro </span>"; ?>

            </fieldset>
            <input type="submit" name="cadastrar" value="Cadastrar" />
        </form>
    </div>
</div>

<?php require_once "bars/bottom_bar.php"?>