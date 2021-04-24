<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$tipoErro = '';
$sexoErro = '';
$corErro = '';
$porteErro = '';
$codigoErro = '';
$racaErro = '';
$comportamentoErro = '';
//Alguns campos nao tem erro pq nao sao obrigatorios

//Iniciando o value dos inputs com valor vazio 
//tabela animal
$_SESSION['tipo'] = '';
$_SESSION['sexo'] = '';
$_SESSION['idade'] = '';
$_SESSION['cor'] = '';
$_SESSION['porte'] = '';
$_SESSION['nome_animal'] = '';
$_SESSION['codigo'] = '';
$_SESSION['raca'] = '';
$_SESSION['comportamento'] = '';
$_SESSION['castrado'] = '';
$_SESSION['data_resgate'] = ''; //cadastra sempre a data do dia que esta sendo feito o cadastro
$_SESSION['responsavel_resgate'] = '';
$_SESSION['descricao_resgate'] = '';



if(isset($_POST['cadastrar'])){

	if(!isset($_SESSION))
	 	session_start();
	 	
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
		 } else if(strlen($_SESSION['codigo']) == 0){
		 	$codigoErro = 'É necessário digitar o Código!';
		 } else if(strlen($_SESSION['raca']) == 0){
			$racaErro = 'É necessário digitar a Raça!';
		} else if(strlen($_SESSION['comportamento']) == 0){
			$comportamentoErro = 'É necessário selecionar um Comportamento!!';
		} else {
			$tipoErro = '';
			$sexoErro = '';
			$corErro = '';
			$porteErro = '';
			$codigoErro = '';
			$racaErro = '';
			$comportamentoErro = '';

			$mysqli->query("INSERT INTO animal (codigo, tipo, nome_animal, raca, sexo, cor, porte, idade, comportamento, castrado, data_resgate, responsavel_resgate, descricao_resgate) VALUES ('$_SESSION[codigo]', '$_SESSION[tipo]', '$_SESSION[nome_animal]', '$_SESSION[raca]', '$_SESSION[sexo]', '$_SESSION[cor]', '$_SESSION[porte]', '$_SESSION[idade]', '$_SESSION[comportamento]', '$_SESSION[castrado]', NOW(), '$_SESSION[responsavel_resgate]', '$_SESSION[descricao_resgate]')");

		 	header("Location: http://localhost/php-gerenciador-canil/pages/index.php?page=0");
			exit();
		}
	}
?>

<div>
    <h3 class="centraliza-titulo">Resgate</h3>
    <div class="form-style-5">
        <form method="POST" action="./cadastrarAnimal.php">
            <h6> Preencha o formulário abaixo para cadastrar um novo animal no canil</h6><br/>
            <fieldset>
                <legend><span class="number">1</span>Identificação</legend>
					<label for="codigo">Código*</label>
					<input name="codigo" type="number" value="<?php echo $_SESSION['codigo']; ?>" required>
					<?php echo "<span class='errortext'>$codigoErro</span>"; ?>

					<label for="codigo">Tipo*</label>
                    <input name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>" required>
                    <?php echo "<span class='errortext'>$tipoErro</span>"; ?>

					<label for="nome_animal">Apelido</label>
					<input name="nome_animal" type="text" value="<?php echo $_SESSION['nome_animal'] ?>">

                <legend><span class="number">2</span> Características </legend>

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
                <select class="field" name="porte" required>
                    <option value="" <?php if($_SESSION['porte'] == '') echo "selected";?>>Selecione</option>
                    <option value="Pequeno" <?php if($_SESSION['porte'] == "Pequeno") echo "selected";?>>Pequeno</option>
                    <option value="Médio" <?php if($_SESSION['porte'] == "Médio") echo "selected";?>>Médio</option>
                    <option value="Grande" <?php if($_SESSION['porte'] == "Grande") echo "selected";?>>Grande</option>
                </select>
                <?php echo "<span class='errortext'>$porteErro</span>"; ?>

				<label for="idade">Idade</label>
                <input name="idade" type="text" value="<?php echo $_SESSION['idade']; ?>">

                <label for="sexo">Comportamento</label>
                    <select name="comportamento" required>
                        <option value="" <?php if($_SESSION['comportamento'] == '') echo "selected";?>>Selecione</option>
                        <option value="Calmo" <?php if($_SESSION['comportamento'] == "Calmo") echo "selected";?>>Calmo</option>
                        <option value="Agitado" <?php if($_SESSION['comportamento'] == "Agitado") echo "selected";?>>Agitado</option>
                        <option value="Agressivo" <?php if($_SESSION['comportamento'] == "Agressivo") echo "selected";?>>Agressivo</option>
                    </select>
				<?php echo "<span class='errortext'>$comportamentoErro</span>"; ?>

				<label for="castrado">Data de castração</label> <h2 class="font-size-menor">Caso tenha chegado castrado, colocar como data de cadastro. Se ainda não foi castrado, não preencher. </h2>
                <input name="castrado" type="date" value="<?php echo $_SESSION['castrado']; ?>">

                <legend><span class="number">3</span> Adicionais </legend>
				<label for="responsavel_resgate">Responsável pelo resgate</label>
                <input name="responsavel_resgate" type="text" value="<?php echo $_SESSION['responsavel_resgate']; ?>" required>

				<label for="descricao_resgate">Descrição do resgate</label>
                <textarea name="descricao_resgate" required><?php echo $_SESSION['descricao_resgate']; ?></textarea>
            </fieldset>
            <input type="submit" name="cadastrar" value="Cadastrar" />
        </form>
    </div>
</div>

<?php require_once "bars/bottom_bar.php"?>