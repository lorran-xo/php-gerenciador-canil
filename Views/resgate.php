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