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
    /*pointer-events: none; */
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

</style>

<div class="form-style-5">
	<form class="form">
		<h6> Preencha com atenção os dados de responsabilidade de quem está adotando para registrar a saída desse animal do canil! </h6> <br/>
		<fieldset>
			<legend>Sendo adotado:</legend>
				<input type="text" name="field1" placeholder="Código">
				<input type="text" name="field4" placeholder="Apelido">
			<hr class="sidebar-divider my-0"><br/>
			<legend> Termo de Responsabilidade </legend>
				<label for="sexo">Ao clicar em 'Adotado!' fica declarado que toda a responsabilidade do {codigo_animal} está sendo passada por meio dessa doação à </label>
				<input placeholder="Nome completo" class="field" name="raca" type="text" value="<?php echo $_SESSION['raca']; ?>" required>
				
				<label for="sexo">portador do CPF Nº</label>
				<input placeholder="CPF" class="field" name="raca" type="number" value="<?php echo $_SESSION['raca']; ?>" required>
				<label for="sexo">e que todos os envolvidos estão de acordo com o <a href="termo-de-adocao.docx" download="Termo-de-Adoção.docx">Termo de Adoção</a>.</label>
				<br/><br/>
			<hr class="sidebar-divider my-0"><br/>
		</fieldset>
		<a href="adocao.php?page=0"> <input type="button" value="Adotado!"/> </a>   
		<a href="adocao.php?page=0"> <input type="button" value="Cancelar"/> </a>   
	</form>
</div>
<?php require_once "barras/barra_inferior.php"?>