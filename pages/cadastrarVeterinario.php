<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$nomeErro = '';
$cpfErro = '';
$crmvErro = '';
$contatoErro = '';
//Alguns campos nao tem erro pq nao sao obrigatorios

//Iniciando o value dos inputs com valor vazio 
//tabela canil.veterinarios
$_SESSION['nome_veterinario'] = '';
$_SESSION['cpf'] = '';
$_SESSION['crmv'] = '';
$_SESSION['contato'] = '';

if(isset($_POST['cadastrar'])){

	if(!isset($_SESSION))
	 	session_start();
	 	
	foreach ($_POST as $key => $value) 
	 		 $_SESSION[$key] = $mysqli->real_escape_string($value);
	 
	 	//Validando SE DIGITOU NOS CAMPOS, esses erros aparecerão em navegadores que nao detectam o atributo 'required' automaticamente dos inputs
		 if(strlen($_SESSION['nome_veterinario']) == 0){ 
		 	$tipoErro = 'É necessário preencher o campo Nome!';
		 } else if(strlen($_SESSION['cpf']) == 0){
			$sexoErro = 'É necessário preencher o campo CPF!';
		 } else if(strlen($_SESSION['crmv']) == 0){
		 	$corErro = 'É necessário preencher o campo CRMV!';
		 } else if(strlen($_SESSION['contato']) == 0){
		 	$porteErro = 'É necessário preencher o campo Contato!';
		 } else {
			$nomeErro = '';
			$cpfErro = '';
			$crmvErro = '';
			$contatoErro = '';

			$mysqli->query("INSERT INTO veterinario (nome_veterinario, cpf, crmv, contato) VALUES ('$_SESSION[nome_veterinario]', '$_SESSION[cpf]', '$_SESSION[crmv]', '$_SESSION[contato]')");

		 	header("Location: http://localhost/php-gerenciador-canil/pages/veterinarios.php?page=0");
			exit();
		}
	}
?>

<div>
    <h3 class="centraliza-titulo">Cadastrar novo veterinário</h3>
    <div class="form-style-5">
        <form method="POST" action="./cadastrarVeterinario.php">
            <h6> Preencha o formulário abaixo para cadastrar um novo veterinário no canil</h6><br/>
            <fieldset>
                <legend><span class="number">.</span>Informações</legend>

					<label for="nome_veterinario">Nome*</label>
					<input name="nome_veterinario" type="text" value="<?php echo $_SESSION['nome_veterinario'] ?>">
					<?php echo "<span class='errortext'>$nomeErro</span>"; ?>

					<label for="cpf">CPF*</label>
					<input name="cpf" type="text" value="<?php echo $_SESSION['cpf']; ?>" required>
					<?php echo "<span class='errortext'>$cpfErro</span>"; ?>

					<label for="crmv">CRMV*</label>
                    <input name="crmv" type="text" value="<?php echo $_SESSION['crmv']; ?>" required>
                    <?php echo "<span class='errortext'>$crmvErro</span>"; ?>

					<label for="contato">Contato*</label>
					<input name="contato" type="number" value="<?php echo $_SESSION['contato']; ?>" required>
					<?php echo "<span class='errortext'>$contatoErro</span>"; ?>
            </fieldset>
            <input type="submit" name="cadastrar" value="Cadastrar" />
        </form>
    </div>
</div>

<?php require_once "bars/bottom_bar.php"?>