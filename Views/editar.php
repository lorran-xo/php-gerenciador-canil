<div>
    <h4 class="centraliza-titulo">Editar</h4>
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
                <textarea name="descricao"><?php echo $_SESSION['descricao']; ?></textarea>
            </fieldset>
            <input type="submit" name="editar" value="Salvar" />
			<input type="submit" name="excluir" value="Excluir" />
			<a href="index.php?page=0"> <input type="button" value="Voltar"/> </a>   
        </form>
    </div>
</div>