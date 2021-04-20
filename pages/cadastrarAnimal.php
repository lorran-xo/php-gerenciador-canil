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
$_SESSION['data_resgate'] = ''; //cadastra data agora sempre
$_SESSION['adotado'] = 'false'; //cadastra false sempre


/*$_SESSION['responsavel_adocao_nome'] = '';
$_SESSION['responsavel_adocao_cpf'] = '';
$_SESSION['data_adocao'] = '';  
motivo_devolucao

/\ DEIXA NULOS /\ */


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

			//Passar pra Transaction para otimizar
			$mysqli->query("INSERT INTO animais (tipo, sexo, idade) VALUES ('$_SESSION[tipo]', '$_SESSION[sexo]', '$_SESSION[idade]')");
			$id_atual = $mysqli->insert_id; //Pega o id do insert da tabela animais e coloca como chave estrangeira nos outros inserts
			$mysqli->query("INSERT INTO aparencia (cor, porte, peso, id_animal) VALUES ('$_SESSION[cor]', '$_SESSION[porte]', '$_SESSION[peso]', '$id_atual')");
			$mysqli->query("INSERT INTO identificacao (codigo, apelido, id_animal) VALUES ('$_SESSION[codigo]', '$_SESSION[apelido]', '$id_atual')");
			$mysqli->query("INSERT INTO raca (raca, comportamento, id_animal) VALUES ('$_SESSION[raca]', '$_SESSION[comportamento]', '$id_atual')");
			$mysqli->query("INSERT INTO situacao (adotado, descricao, nome_responsavel_resgate, data_resgate, nome_responsavel_adocao, cpf_responsavel_adocao, data_adocao, motivo_devolucao, id_animal) 
			VALUES (0, '$_SESSION[descricao]', '$_SESSION[nome_responsavel_resgate]', NOW(), NULL, NULL, NULL, NULL, '$id_atual')");

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

					<label for="apelido">Apelido</label>
					<input name="apelido" type="text" value="<?php echo $_SESSION['apelido']; ?>">

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
                <input name="idade" type="number" value="<?php echo $_SESSION['idade']; ?>">

				<label for="peso">Peso</label>
                <input name="peso" type="number" value="<?php echo $_SESSION['peso']; ?>">

                <label for="sexo">Comportamento</label>
                    <select name="comportamento" required>
                        <option value="" <?php if($_SESSION['comportamento'] == '') echo "selected";?>>Selecione</option>
                        <option value="Calmo" <?php if($_SESSION['comportamento'] == "Calmo") echo "selected";?>>Calmo</option>
                        <option value="Agitado" <?php if($_SESSION['comportamento'] == "Agitado") echo "selected";?>>Agitado</option>
                        <option value="Agressivo" <?php if($_SESSION['comportamento'] == "Agressivo") echo "selected";?>>Agressivo</option>
                    </select>
				<?php echo "<span class='errortext'>$comportamentoErro</span>"; ?>

                <legend><span class="number">3</span> Adicionais </legend>
				<label for="nome_responsavel_resgate">Responsável pelo resgate</label>
                <input name="nome_responsavel_resgate" type="text" value="<?php echo $_SESSION['nome_responsavel_resgate']; ?>">

				<label for="descricao">Descrição</label>
                <textarea name="descricao"><?php echo $_SESSION['descricao']; ?></textarea>
            </fieldset>
            <input type="submit" name="cadastrar" value="Cadastrar" />
        </form>
    </div>
</div>

<?php require_once "bars/bottom_bar.php"?>