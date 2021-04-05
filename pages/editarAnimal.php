<?php require_once "barras/barra_superior.php"?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$tipoErro = '';
$sexoErro = '';
$corErro = '';
$porteErro = '';
$racaErro = '';
$comportamentoErro = '';
//Alguns campos nao tem erro pq nao sao obrigatorios

//Iniciando o value dos inputs com valor vazio 
//tabela animais
$_SESSION['tipo'] = '';
$_SESSION['sexo'] = '';
$_SESSION['idade'] = '';

//tabela aparencia id_animal = id.animais
$_SESSION['cor'] = '';
$_SESSION['porte'] = '';
$_SESSION['peso'] = '';

//tabela identificacao id_animal = id.animais
$_SESSION['apelido'] = '';
$_SESSION['codigo'] = '';

//tabela raca id_animal = id.animais
$_SESSION['raca'] = '';
$_SESSION['comportamento'] = '';

//tabela situacao id_animal = id.animais
$_SESSION['descricao'] = '';
$_SESSION['nome_responsavel_resgate'] = '';

$selected_animal_id = intval($_GET['id']);

	if(isset($_POST['editar'])){
		if(!isset($_SESSION)){
			session_start();
		}
			
		foreach ($_POST as $key => $value) 
				$_SESSION[$key] = $mysqli->real_escape_string($value);
		
			//Validando SE DIGITOU NOS CAMPOS, esses erros aparecerão em navegadores que nao detectam o atributo 'required' automaticamente dos inputs
			if(strlen($_SESSION['tipo']) == 0){ 
				$tipoErro = 'É necessário preencher o campo Tipo!';
			} else if(strlen($_SESSION['sexo']) == 0){
				$sexoErro = 'É necessário selecionar um Sexo';
			} else if(strlen($_SESSION['cor']) == 0){
				$corErro = 'É necessário preencher o campo Cor!';
			} else if(strlen($_SESSION['porte']) == 0){
				$porteErro = 'É necessário selecionar um Porte!';
			} else if(strlen($_SESSION['raca']) == 0){
				$racaErro = 'É necessário digitar a Raça!';
			} else if(strlen($_SESSION['comportamento']) == 0){
				$comportamentoErro = 'É necessário selecionar um Comportamento!';
			} else {
				$tipoErro = '';
				$sexoErro = '';
				$corErro = '';
				$porteErro = '';
				$racaErro = '';
				$comportamentoErro = '';
				
				//usar PDO 
				$mysqli->query("UPDATE animais SET tipo= '$_SESSION[tipo]', sexo= '$_SESSION[sexo]', idade= '$_SESSION[idade]' WHERE id = '$selected_animal_id'");
				$mysqli->query("UPDATE aparencia SET cor= '$_SESSION[cor]', porte= '$_SESSION[porte]', peso= '$_SESSION[peso]' WHERE id_animal = '$selected_animal_id'");
				$mysqli->query("UPDATE identificacao SET apelido= '$_SESSION[apelido]' WHERE id_animal = '$selected_animal_id'");
				$mysqli->query("UPDATE raca SET raca='$_SESSION[raca]', comportamento= '$_SESSION[comportamento]' WHERE id_animal = '$selected_animal_id'");
				$mysqli->query("UPDATE situacao SET descricao='$_SESSION[descricao]', nome_responsavel_resgate ='$_SESSION[nome_responsavel_resgate]' WHERE id_animal = '$selected_animal_id'");
				
				header("Location: http://localhost/php-gerenciador-canil/pages/index.php?page=0");
				exit();
			}
	} else {
		$sql_code = "SELECT
		can.tipo,
		can.sexo, 
		can.idade,
		cap.cor,
		cap.porte, 
		cap.peso,
		cid.codigo,
		cid.apelido,
		cra.raca,
		cra.comportamento,
		csi.descricao,
		csi.nome_responsavel_resgate
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

		$_SESSION['tipo'] = $array['tipo'];
		$_SESSION['sexo'] = $array['sexo'];
		$_SESSION['idade'] = $array['idade'];
		$_SESSION['cor'] = $array['cor'];
		$_SESSION['porte'] = $array['porte'];
		$_SESSION['peso'] = $array['peso'];
		$_SESSION['apelido'] = $array['apelido'];
		$_SESSION['codigo'] = $array['codigo'];
		$_SESSION['raca'] = $array['raca'];
		$_SESSION['comportamento'] = $array['comportamento'];
		$_SESSION['descricao'] = $array['descricao'];
		$_SESSION['nome_responsavel_resgate'] = $array['nome_responsavel_resgate'];

	}

?>

<style> 
/* Centralizar todos os css/styles. */
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

.input-disabilitado{
	pointer-events: none;
	cursor: not-allowed;
}

.cabecario{
	width: 60%;
	margin-left: 25%;
}

.label-centro{
	margin-left: 40%;
}
</style>

<div>
    <h4 class="centraliza">Editar</h4>
    <div class="form-style-5">
        <form method="POST" action="./editarAnimal.php?id=<?php echo $selected_animal_id; ?>">
			<h6> Visualize os dados do <b>animal selecionado</b> abaixo e edite quando necessário</h6><br/>
			<fieldset class="cabecario">
				<label for="codigo" class="label-centro">Código</label>
				<input class="input-disabilitado" name="codigo" type="text" value="<?php echo $_SESSION['codigo']; ?>">
			</fieldset>
			
            <fieldset>
				<label for="codigo">Tipo*</label>
				<input name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>" required>
				<?php echo "<span class='errortext'>$tipoErro</span>"; ?>

				<label for="apelido">Apelido</label>
				<input name="apelido" type="text" value="<?php echo $_SESSION['apelido']; ?>">

				<label for="raca">Raça*</label>
                <input name="raca" type="text" value="<?php echo $_SESSION['raca']; ?>" required>
                <?php echo "<span class='errortext'> $racaErro </span>"; ?>

				<label for="sexo">Sexo*</label>
				<select name="sexo" required>
					<option value="" <?php if($_SESSION['sexo'] == '') echo "selected";?>>Selecione</option>
					<option value="Macho" <?php if($_SESSION['sexo'] == "Macho") echo "selected";?>>Macho</option>
					<option value="Fêmea" <?php if($_SESSION['sexo'] == "Fêmea") echo "selected";?>>Fêmea</option>
				</select>
				<?php echo "<span class='errortext'>$sexoErro</span>"; ?>

				<label for="cor">Cor*</label>
                <input name="cor" type="text" value="<?php echo $_SESSION['cor']; ?>" required>
                <?php echo "<span class='errortext'> $corErro </span>"; ?>

                <label for="porte">Porte*</label>
                <select name="porte" required>
                    <option value="" <?php if($_SESSION['porte'] == '') echo "selected";?>>Selecione</option>
                    <option value="Pequeno" <?php if($_SESSION['porte'] == "Pequeno") echo "selected";?>>Pequeno</option>
                    <option value="Médio" <?php if($_SESSION['porte'] == "Médio") echo "selected";?>>Médio</option>
                    <option value="Grande" <?php if($_SESSION['porte'] == "Grande") echo "selected";?>>Grande</option>
                </select>
                <?php echo "<span class='errortext'>$porteErro</span>"; ?>

				<label for="idade">Idade</label>
                <input name="idade" type="number" value="<?php echo $_SESSION['idade']; ?>">

				<label for="peso">Peso</label>
                <input name="peso" type="number" value="<?php echo $_SESSION['peso']; ?>">

                <label for="comportamento">Comportamento*</label>
                    <select name="comportamento" required>
                        <option value="" <?php if($_SESSION['comportamento'] == '') echo "selected";?>>Selecione</option>
                        <option value="Calmo" <?php if($_SESSION['comportamento'] == "Calmo") echo "selected";?>>Calmo</option>
                        <option value="Agitado" <?php if($_SESSION['comportamento'] == "Agitado") echo "selected";?>>Agitado</option>
                        <option value="Agressivo" <?php if($_SESSION['comportamento'] == "Agressivo") echo "selected";?>>Agressivo</option>
                    </select>
				<?php echo "<span class='errortext'>$comportamentoErro</span>"; ?>

				<label for="nome_responsavel_resgate">Responsável pelo resgate</label>
                <input name="nome_responsavel_resgate" type="text" value="<?php echo $_SESSION['nome_responsavel_resgate']; ?>">

				<label for="descricao">Descrição</label>
                <textarea name="descricao">
					<?php echo $_SESSION['descricao']; ?>
				</textarea>
            </fieldset>
            <input type="submit" name="editar" value="Salvar" />
        </form>
    </div>
</div>

<?php require_once "barras/barra_inferior.php"?>