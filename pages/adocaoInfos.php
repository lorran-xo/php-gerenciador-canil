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
    <h2>Adoção</h2>
        <form class="form">
            <h4> Preencha com atenção os dados de responsabilidade de quem está adotando para registrar a saída desse animal do canil!</h4>

            <label for="sexo">Identificacao</label>
            <input disabled class="field" name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>" required>
                <?php echo "<span class='errortext'>$tipoErro</span>"; ?>

            <label for="sexo">Apelido</label>
            <input disabled class="field" name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>" required>
                <?php echo "<span class='errortext'>$tipoErro</span>"; ?>
            
            <br/><br/><hr class="sidebar-divider my-0"><br/>
            <label for="sexo">Ao clicar em 'Adotado' fica declarado que toda a responsabilidade do {animal} está sendo passada por meio dessa doação à </label>
            <input placeholder="Nome completo" class="field" name="raca" type="text" value="<?php echo $_SESSION['raca']; ?>" required>
            
            <label for="sexo">portador do CPF Nº</label>
            <input placeholder="CPF" class="field" name="raca" type="number" value="<?php echo $_SESSION['raca']; ?>" required>
			<label for="sexo">e que todos os envolvidos estão de acordo com o <a href="termo-de-adocao.docx" download="Termo-de-Adoção.docx">Termo de Adoção</a>.</label>
			<br/><br/>
			<hr class="sidebar-divider my-0"><br/>

            <div class="col-lg-12">            
                <br/><a href="adocao.php"> <button type="button" class="btn btn-success" data-toggle="modal">Adotado!</button> </a>   
				<a href="adocao.php"> <button type="button" class="btn btn-success" data-toggle="modal">Cancelar</button> </a>   
			</div> 
        </form>
          

</div>

<?php require_once "barras/barra_inferior.php"?>