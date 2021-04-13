<div class="form-style-5">
	<form method="POST" action="./maisInfos.php">
		<h6> Visualize informações adicionais do <b>animal selecionado</b></h6><br/>
		<fieldset class="cabecario">
			<label for="codigo" class="label-centro">Código</label>
			<input class="input-disabilitado" name="codigo" type="text" value="<?php echo $_SESSION['codigo']; ?>">

			<label for="Apelido" class="label-centro">Apelido</label>
			<input class="input-disabilitado" name="apelido" type="text" value="<?php echo $_SESSION['apelido']; ?>">
		</fieldset>

		<fieldset>
			<legend> Informações adicionais </legend>

			<label for="Peso">Peso</label>
			<input class="input-disabilitado" name="peso" type="text" value="<?php echo $_SESSION['peso']; ?>">

			<label for="idade">Idade</label>
			<input class="input-disabilitado" name="idade" type="text" value="<?php echo $_SESSION['idade']; ?>" placeholder="Idade">

			<label for="Comportamento">Comportamento</label>
				<select class="input-disabilitado" name="comportamento">
					<option value="" <?php if($_SESSION['comportamento'] == '') echo "selected";?>>Selecione</option>
					<option value="Calmo" <?php if($_SESSION['comportamento'] == "Calmo") echo "selected";?>>Calmo</option>
					<option value="Agitado" <?php if($_SESSION['comportamento'] == "Agitado") echo "selected";?>>Agitado</option>
					<option value="Agressivo" <?php if($_SESSION['comportamento'] == "Agressivo") echo "selected";?>>Agressivo</option>
				</select>

			<label for="nome_responsavel_resgate">Resgate feito por</label>
			<input class="input-disabilitado" name="nome_responsavel_resgate" type="text" value="<?php echo $_SESSION['nome_responsavel_resgate']; ?>">

			<label for="data_resgate">no dia</label>
			<input class="input-disabilitado" name="data_resgate" type="text" value="<?php echo $_SESSION['data_resgate']; ?>">

			<label for="descricao">Descrição</label>
			<textarea class="input-disabilitado" name="descricao"><?php echo $_SESSION['descricao']; ?></textarea>
		</fieldset>
		<a href="http://localhost/php-gerenciador-canil/home"> <input type="button" value="Voltar"/> </a>   
	</form>
</div>