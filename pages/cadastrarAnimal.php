<?php require_once "barras/barra_superior.php"?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$tipoErro = '';
$racaErro = '';
$porteErro = '';
$sexoErro = '';
$idadeErro = '';
//Iniciando o value dos inputs com valor vazio 
$_SESSION['tipo'] = '';
$_SESSION['raca'] = '';
$_SESSION['porte'] = '';
$_SESSION['sexo'] = '';
$_SESSION['idade'] = '';

if(isset($_POST['cadastrar'])){

	if(!isset($_SESSION))
	 	session_start();
	 	
	foreach ($_POST as $key => $value) 
	 		 $_SESSION[$key] = $mysqli->real_escape_string($value);
	 
	//Validando SE DIGITOU NOS CAMPOS

	 	//Esses erros aparecerão em navegadores que nao detectam o atributo 'required' automaticamente dos inputs
		 if(strlen($_SESSION['tipo']) == 0){ 
		 	$tipoErro = 'É necessário preencher o campo Tipo!';
		 } else if(strlen($_SESSION['raca']) == 0){
		 	$racaErro = 'É necessário preencher o campo Raça!';
		 } else if(strlen($_SESSION['porte']) == 0){
		 	$porteErro = 'É necessário selecionar um Porte!';
		 } else if(strlen($_SESSION['sexo']) == 0){
		 	$sexoErro = 'É necessário selecionar um Sexo';
		 } else if(strlen($_SESSION['idade']) == 0){
		 	$idadeErro = 'É necessário preencher o campo Idade!';
		 } else {
			$tipoErro = '';
			$racaErro = '';
			$porteErro = '';
			$sexoErro = '';
			$idadeErro = '';

			$sql_code = "INSERT into animais (tipo, raca, porte, sexo, idade, data) 
	 				 VALUES ('$_SESSION[tipo]', '$_SESSION[raca]', '$_SESSION[porte]',
	 				 		 '$_SESSION[sexo]', '$_SESSION[idade]', NOW() )";
		 	$cadastra = $mysqli->query($sql_code) or die($mysqli->error);

		 	header("Location: http://localhost/php-gerenciador-canil/pages/index.php");
			exit();
		}
	}
?>


<div class="container">
    <h1>Página de Resgates</h1>
        <form class="form" method="POST" action="./cadastrarAnimal.php">
            <center>
                <h4> Preencha os dados abaixo para cadastrar um novo animal no canil</h4>
            </center>
            <label for="sexo">Tipo</label>
            <input class="field" name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>" required>
                <?php echo "<span class='errortext'>$tipoErro</span>"; ?>
            <label for="sexo">Raça</label>
            <input class="field" name="raca" type="text" value="<?php echo $_SESSION['raca']; ?>" required>
                <?php echo "<span class='errortext'> $racaErro </span>"; ?>
            <label for="porte">Porte</label>
            <select class="field" name="porte" required>
                <option value="" <?php if($_SESSION['porte'] == '') echo "selected";?>>Selecione</option>
                <option value="Pequeno" <?php if($_SESSION['porte'] == "Pequeno") echo "selected";?>>Pequeno</option>
                <option value="Médio" <?php if($_SESSION['porte'] == "Médio") echo "selected";?>>Médio</option>
                <option value="Grande" <?php if($_SESSION['porte'] == "Grande") echo "selected";?>>Grande</option>
            </select>
                <?php echo "<span class='errortext'>$porteErro</span>"; ?>
            <label for="sexo">Sexo</label>
            <select class="field" name="sexo" required>
                <option value="" <?php if($_SESSION['sexo'] == '') echo "selected";?>>Selecione</option>
                <option value="Macho" <?php if($_SESSION['sexo'] == "Macho") echo "selected";?>>Macho</option>
                <option value="Fêmea" <?php if($_SESSION['sexo'] == "Fêmea") echo "selected";?>>Fêmea</option>
            </select>
                <?php echo "<span class='errortext'>$sexoErro</span>"; ?>
            <label for="sexo">Idade</label>
            <input class="field" name="idade" type="number" value="<?php echo $_SESSION['idade']; ?>" required>
                <?php echo "<span class='errortext'>$idadeErro</span>"; ?>
            <br/><br/><button type="submit" name="cadastrar" class="btn btn-success" data-toggle="modal">Cadastrar</button>
        </form>   
</div>

<?php require_once "barras/barra_inferior.php"?>