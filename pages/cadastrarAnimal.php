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

		 	header("Location: http://localhost/php-gerenciador-canil/pages/index.php?page=0");
			exit();
		}
	}
?>

<style> 
.centraliza{
  margin-left: 45%;
}

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

</style>

<div>
    <h4 class="centraliza">Resgatar</h4>
    <div class="form-style-5">
        <form method="POST" action="./cadastrarAnimal.php">
            <h6> Preencha o formulário abaixo para cadastrar um novo animal no canil</h6><br/>
            <fieldset>
                <legend><span class="number">1</span>Identificação</legend>
                    <input type="text" name="field1" placeholder="Código*">

                    <input name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>" placeholder="Tipo*" required>
                    <?php echo "<span class='errortext'>$tipoErro</span>"; ?>

                    <input type="text" name="field4" placeholder="Apelido">
                <legend><span class="number">2</span> Características </legend>

                <input name="raca" type="text" value="<?php echo $_SESSION['raca']; ?>"  placeholder="Raça*" required>
                <?php echo "<span class='errortext'> $racaErro </span>"; ?>

                    <label for="sexo">Sexo*</label>
                    <select name="sexo" required>
                        <option value="" <?php if($_SESSION['sexo'] == '') echo "selected";?>>Selecione</option>
                        <option value="Macho" <?php if($_SESSION['sexo'] == "Macho") echo "selected";?>>Macho</option>
                        <option value="Fêmea" <?php if($_SESSION['sexo'] == "Fêmea") echo "selected";?>>Fêmea</option>
                    </select>
                    <?php echo "<span class='errortext'>$sexoErro</span>"; ?>

                <input type="text" name="field1" placeholder="Cor*">

                <label for="job">Porte*</label>
                <select class="field" name="porte" required>
                    <option value="" <?php if($_SESSION['porte'] == '') echo "selected";?>>Selecione</option>
                    <option value="Pequeno" <?php if($_SESSION['porte'] == "Pequeno") echo "selected";?>>Pequeno</option>
                    <option value="Médio" <?php if($_SESSION['porte'] == "Médio") echo "selected";?>>Médio</option>
                    <option value="Grande" <?php if($_SESSION['porte'] == "Grande") echo "selected";?>>Grande</option>
                </select>
                <?php echo "<span class='errortext'>$porteErro</span>"; ?>

                <input type="text" name="field4" placeholder="Peso">
                <input class="field" name="idade" type="number" value="<?php echo $_SESSION['idade']; ?>" placeholder="Idade" required>
                <?php echo "<span class='errortext'>$idadeErro</span>"; ?>

                <label for="sexo">Comportamento</label>
                    <select name="comportamento" required>
                        <option value="">Selecione</option>
                        <option value="Calmo">Calmo</option>
                        <option value="Agitado">Agitado</option>
                        <option value="Agressivo">Agressivo</option>
                    </select>

                <legend><span class="number">3</span> Adicionais </legend>
                <input type="text" name="field1" placeholder="Responsável pelo resgate">
                <textarea name="field3" placeholder="Descrição"></textarea>
            </fieldset>
            <input type="submit" name="cadastrar" value="Cadastrar" />
        </form>
    </div>
</div>

<?php require_once "barras/barra_inferior.php"?>


