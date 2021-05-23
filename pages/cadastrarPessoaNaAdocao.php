<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$nomeErro = '';
$cpfErro = '';
$contatoErro = '';
$enderecoErro = '';

//Alguns campos nao tem erro pq nao sao obrigatorios

//Iniciando o value dos inputs com valor vazio 
//tabela canil.pessoa
$_SESSION['nome'] = '';
$_SESSION['cpf'] = '';
$_SESSION['contato'] = '';
$_SESSION['endereco'] = '';

if(isset($_POST['cadastrar'])){

	if(!isset($_SESSION))
	 	session_start();
	 	
	foreach ($_POST as $key => $value) 
	 		 $_SESSION[$key] = $mysqli->real_escape_string($value);
	 
	 	//Validando SE DIGITOU NOS CAMPOS, esses erros aparecerão em navegadores que nao detectam o atributo 'required' automaticamente dos inputs
		 if(strlen($_SESSION['nome']) == 0){ 
		 	$nomeErro = 'É necessário preencher o campo Nome!';
		 } else if(strlen($_SESSION['cpf']) == 0){
			$cpfErro = 'É necessário preencher o campo CPF!';
		 } else if(strlen($_SESSION['contato']) == 0){
		 	$contatoErro = 'É necessário preencher o campo Contato!';
		 } else if(strlen($_SESSION['endereco']) == 0){
		 	$enderecoErro = 'É necessário preencher o campo Endereço!';
		 } else {
			$nomeErro = '';
			$cpfErro = '';
			$contatoErro = '';
			$enderecoErro = '';

			$mysqli->query("INSERT INTO pessoa (nome, cpf, contato, endereco) VALUES ('$_SESSION[nome]', '$_SESSION[cpf]', '$_SESSION[contato]', '$_SESSION[endereco]')");

		 	header("Location: http://localhost/php-gerenciador-canil/pages/selecionarAnimal.php?page=0");
			exit();
		}
	}
?>

<div>
    <h3 class="centraliza-titulo">Cadastrar pessoa</h3>
    <div class="form-style-5">
        <form method="POST" action="./cadastrarPessoaNaAdocao.php">
            <h6> Preencha o formulário abaixo para cadastrar a pessoa que vai adotar no canil</h6><br/>
            <fieldset>
                <legend><span class="number">.</span>Informações</legend>

					<label for="nome">Nome*</label>
					<input name="nome" type="text" value="<?php echo $_SESSION['nome'] ?>">
					<?php echo "<span class='errortext'>$nomeErro</span>"; ?>

					<label for="cpf">CPF*</label>
					<input name="cpf" type="number" value="<?php echo $_SESSION['cpf']; ?>" required>
					<?php echo "<span class='errortext'>$cpfErro</span>"; ?>

					<label for="contato">Contato*</label>
					<input name="contato" type="number" value="<?php echo $_SESSION['contato']; ?>" required>
					<?php echo "<span class='errortext'>$contatoErro</span>"; ?>

					<label for="endereco">Endereço*</label>
					<input name="endereco" type="text" value="<?php echo $_SESSION['endereco']; ?>" required>
					<?php echo "<span class='errortext'>$enderecoErro</span>"; ?>
            </fieldset>
            <input type="submit" name="cadastrar" value="Cadastrar" />
			<a href="adocao.php"> <input type="button" value="Voltar"/> </a>
        </form>
    </div>
</div>

<?php require_once "bars/bottom_bar.php"?>