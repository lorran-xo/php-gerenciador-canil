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
$_SESSION['nome'] = '';
$_SESSION['cpf'] = '';
$_SESSION['contato'] = '';
$_SESSION['endereco'] = '';

$selected_id = intval($_GET['id']);

	if(isset($_POST['excluir'])){
		$mysqli->query("DELETE FROM pessoa WHERE id_pessoa = '$selected_id'");
				
		header("Location: http://localhost/php-gerenciador-canil/pages/pessoas.php?page=0");
		exit();
	} else if(isset($_POST['editar'])){
			
		if(!isset($_SESSION)){
			session_start();
		}
			
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
				$enderecoErro = 'É necessário preencher o campo Contato!';
			} else {
				$nomeErro = '';
				$cpfErro = '';
				$contatoErro = '';
				$enderecoErro = '';

				//usar PDO 
				$mysqli->query("UPDATE pessoa SET nome= '$_SESSION[nome]', cpf= '$_SESSION[cpf]', contato= '$_SESSION[contato]', endereco= '$_SESSION[endereco]' WHERE id_pessoa = '$selected_id'");
				
				header("Location: http://localhost/php-gerenciador-canil/pages/pessoas.php?page=0");
				exit();
			}
	} else {
		$sql_code = "SELECT * FROM canil.pessoa WHERE id_pessoa = '$selected_id'";
		$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
		$array = $sql_query->fetch_assoc();

		if(!isset($_SESSION))
	 	session_start();

		$_SESSION['nome'] = $array['nome'];
		$_SESSION['cpf'] = $array['cpf'];
		$_SESSION['contato'] = $array['contato'];
		$_SESSION['endereco'] = $array['endereco'];
	}
?>

<div>
    <h4 class="centraliza-titulo">Editar</h4>
    <div class="form-style-5">
        <form method="POST" action="./editarPessoa.php?id=<?php echo $selected_id; ?>">
			<h6> Edite os dados da pessoa selecionada (<?php echo $_SESSION['nome']; ?>) </h6><br/>
            <fieldset>
				<label for="nome">Nome*</label>
				<input name="nome" type="text" value="<?php echo $_SESSION['nome']; ?>" required>
				<?php echo "<span class='errortext'>$nomeErro</span>"; ?>

				<label for="cpf">CPF*</label>
				<input name="cpf" type="text" value="<?php echo $_SESSION['cpf']; ?>" required>
				<?php echo "<span class='errortext'>$cpfErro</span>"; ?>

				<label for="contato">Contato*</label>
				<input name="contato" type="text" value="<?php echo $_SESSION['contato']; ?>" required>
				<?php echo "<span class='errortext'>$contatoErro</span>"; ?>

				<label for="contato">Endereco*</label>
				<input name="endereco" type="text" value="<?php echo $_SESSION['endereco']; ?>" required>
				<?php echo "<span class='errortext'>$enderecoErro</span>"; ?>
            </fieldset>
			<div class="alinha-botaoUm">  
				<a href="pessoas.php?page=0"> <input type="button" value="Voltar"/> </a>   
			</div>
			<div class="alinha-botaoDois"> 
            	<input type="submit" name="editar" value="Salvar" />
			</div>
			<div class="alinha-botaoTres"> 
				<input type="submit" name="excluir" value="Excluir" />
			</div>
        </form>
    </div>
</div>

<?php require_once "bars/bottom_bar.php"?>