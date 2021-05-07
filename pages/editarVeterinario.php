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
$_SESSION['nome_veterinario'] = '';
$_SESSION['cpf'] = '';
$_SESSION['crmv'] = '';
$_SESSION['contato'] = '';

$selected_id = intval($_GET['id']);

	if(isset($_POST['excluir'])){
		$mysqli->query("DELETE FROM veterinario WHERE id_veterinario = '$selected_id'");
				
		header("Location: http://localhost/php-gerenciador-canil/pages/veterinarios.php?page=0");
		exit();
	} else if(isset($_POST['editar'])){
			
		if(!isset($_SESSION)){
			session_start();
		}
			
		foreach ($_POST as $key => $value) 
				$_SESSION[$key] = $mysqli->real_escape_string($value);
		
			//Validando SE DIGITOU NOS CAMPOS, esses erros aparecerão em navegadores que nao detectam o atributo 'required' automaticamente dos inputs
			if(strlen($_SESSION['nome_veterinario']) == 0){ 
				$nomeErro = 'É necessário preencher o campo Nome!';
			} else if(strlen($_SESSION['cpf']) == 0){
			   $cpfErro = 'É necessário preencher o campo CPF!';
			} else if(strlen($_SESSION['crmv']) == 0){
				$crmvErro = 'É necessário preencher o campo CRMV!';
			} else if(strlen($_SESSION['contato']) == 0){
				$contatoErro = 'É necessário preencher o campo Contato!';
			} else {
				$nomeErro = '';
				$cpfErro = '';
				$crmvErro = '';
				$contatoErro = '';

				//usar PDO 
				$mysqli->query("UPDATE veterinario SET nome_veterinario= '$_SESSION[nome_veterinario]', cpf= '$_SESSION[cpf]', crmv= '$_SESSION[crmv]', contato= '$_SESSION[contato]' WHERE id_veterinario = '$selected_id'");

				header("Location: http://localhost/php-gerenciador-canil/pages/veterinarios.php?page=0");
				exit();
			}
	} else {
		$sql_code = "SELECT * FROM veterinario WHERE id_veterinario = '$selected_id'";
		$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
		$array = $sql_query->fetch_assoc();

		if(!isset($_SESSION))
	 	session_start();

		$_SESSION['nome_veterinario'] = $array['nome_veterinario'];
		$_SESSION['cpf'] = $array['cpf'];
		$_SESSION['crmv'] = $array['crmv'];
		$_SESSION['contato'] = $array['contato'];
	}
?>

<div>
    <h4 class="centraliza-titulo">Editar</h4>
    <div class="form-style-5">
        <form method="POST" action="./editarVeterinario.php?id=<?php echo $selected_id; ?>">
			<h6> Edite as informações do veterinário selecionado </h6><br/>
			<fieldset class="cabecario">
				<label for="crmv" class="label-centro">CRMV</label>
				<input class="input-disabilitado" name="crmv" type="text" value="<?php echo $_SESSION['crmv']; ?>">
			</fieldset>
            <fieldset>
				<label for="codigo">Nome*</label>
				<input name="nome" type="text" value="<?php echo $_SESSION['nome_veterinario']; ?>" required>
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
            <input type="submit" name="editar" value="Salvar" />
			<input type="submit" name="excluir" value="Excluir" />
			<a href="veterinarios.php?page=0"> <input type="button" value="Voltar"/> </a>   
        </form>
    </div>
</div>

<?php require_once "bars/bottom_bar.php"?>