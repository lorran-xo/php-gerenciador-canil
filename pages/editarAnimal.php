<?php require_once "bars/side_bar.php" ?>

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
//$_SESSION['peso'] = '';

//tabela identificacao id_animal = id.animais
$_SESSION['nome_animal'] = '';
$_SESSION['codigo'] = '';

//tabela raca id_animal = id.animais
$_SESSION['raca'] = '';
$_SESSION['comportamento'] = '';

//tabela situacao id_animal = id.animais
$_SESSION['descricao_resgate'] = '';
$_SESSION['responsavel_resgate'] = '';

$selected_animal_id = intval($_GET['id']);

	if(isset($_POST['excluir'])){
		$mysqli->query("DELETE FROM animal WHERE id_animal = '$selected_animal_id'");
				
		header("Location: http://localhost/php-gerenciador-canil/pages/index.php?page=0");
		exit();
	} else if(isset($_POST['editar'])){
			
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
				$mysqli->query("UPDATE animal SET tipo= '$_SESSION[tipo]', nome_animal= '$_SESSION[nome_animal]', raca= '$_SESSION[raca]', sexo= '$_SESSION[sexo]', cor= '$_SESSION[cor]', porte= '$_SESSION[porte]', idade= '$_SESSION[idade]', comportamento= '$_SESSION[comportamento]', castrado= '$_SESSION[castrado]', data_resgate= '$_SESSION[data_resgate]', responsavel_resgate= '$_SESSION[responsavel_resgate]', descricao_resgate= '$_SESSION[descricao_resgate]' WHERE id_animal = '$selected_animal_id'");
				
				header("Location: http://localhost/php-gerenciador-canil/pages/index.php?page=0");
				exit();
			}
	} else {
		$sql_code = "SELECT * FROM canil.animal WHERE id_animal = '$selected_animal_id'";
		$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
		$array = $sql_query->fetch_assoc();

		if(!isset($_SESSION))
	 	session_start();

		$_SESSION['tipo'] = $array['tipo'];
		$_SESSION['nome_animal'] = $array['nome_animal'];
		$_SESSION['sexo'] = $array['sexo'];
		$_SESSION['idade'] = $array['idade'];
		$_SESSION['cor'] = $array['cor'];
		$_SESSION['porte'] = $array['porte'];
		//$_SESSION['peso'] = $array['peso'];
		$_SESSION['codigo'] = $array['codigo'];
		$_SESSION['raca'] = $array['raca'];
		$_SESSION['comportamento'] = $array['comportamento'];
		$_SESSION['data_resgate'] = $array['data_resgate'];
		$_SESSION['descricao_resgate'] = $array['descricao_resgate'];
		$_SESSION['responsavel_resgate'] = $array['responsavel_resgate'];
		$_SESSION['castrado'] = $array['castrado'];
	}
?>

<div>
    <h4 class="centraliza-titulo">Editar</h4>
    <div class="form-style-5">
        <form method="POST" action="./editarAnimal.php?id=<?php echo $selected_animal_id; ?>">
			<h6> Edite as informações do animal selecionado </h6><br/>
			<fieldset class="cabecario">
				<label for="codigo" class="label-centro">Código</label>
				<input class="input-disabilitado" name="codigo" type="text" value="<?php echo $_SESSION['codigo']; ?>">
			</fieldset>
			
            <fieldset>
				<label for="codigo">Animal*</label>
				<input name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>" required>
				<?php echo "<span class='errortext'>$tipoErro</span>"; ?>

				<label for="nome_animal">Nome</label>
				<input name="nome_animal" type="text" value="<?php echo $_SESSION['nome_animal']; ?>">

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
                <input name="idade" type="text" value="<?php echo $_SESSION['idade']; ?>">

				<!--<label for="peso">Peso</label>
                <input name="peso" type="number" value="<?php echo $_SESSION['peso']; ?>"> -->

				<label for="castrado">Castração</label>
                <input name="castrado" type="date" value="<?php echo $_SESSION['castrado']; ?>">

                <label for="comportamento">Comportamento*</label>
                    <select name="comportamento" required>
                        <option value="" <?php if($_SESSION['comportamento'] == '') echo "selected";?>>Selecione</option>
                        <option value="Calmo" <?php if($_SESSION['comportamento'] == "Calmo") echo "selected";?>>Calmo</option>
                        <option value="Agitado" <?php if($_SESSION['comportamento'] == "Agitado") echo "selected";?>>Agitado</option>
                        <option value="Agressivo" <?php if($_SESSION['comportamento'] == "Agressivo") echo "selected";?>>Agressivo</option>
                    </select>
				<?php echo "<span class='errortext'>$comportamentoErro</span>"; ?>

				<label for="responsavel_resgate">Responsável pelo resgate</label>
                <input name="responsavel_resgate" type="text" value="<?php echo $_SESSION['responsavel_resgate']; ?>">

				<label for="data_resgate">Data do resgate</label>
                <input name="data_resgate" type="date" value="<?php echo $_SESSION['data_resgate']; ?>">

				<label for="descricao_resgate">Descrição do resgate</label>
                <textarea name="descricao_resgate"><?php echo $_SESSION['descricao_resgate']; ?></textarea>
            </fieldset>
			<div class="alinha-botaoUm">  
				<a href="index.php?page=0"> <input type="button" value="Voltar"/> </a>   
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