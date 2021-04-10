<div class="form-style-5">
	<form method="POST" action="./adocaoInfos.php?id=<?php echo $selected_animal_id; ?>">   
		<h6> Preencha com atenção os dados de responsabilidade de quem está adotando para registrar a saída desse animal do canil! </h6> <br/>
		<fieldset>
			<legend>Sendo adotado</legend>
				<input class="input-disabilitado" name="tipo" type="text" value="<?php echo $_SESSION['tipo']; ?>">
				<input class="input-disabilitado" name="apelido" type="text" value="<?php echo $_SESSION['apelido']; ?>">
				<input class="input-disabilitado" name="raca" type="text" value="<?php echo $_SESSION['raca']; ?>">

				<label for="codigo">do código</label>
					<input class="input-disabilitado" name="codigo" type="text" value="<?php echo $_SESSION['codigo']; ?>">

				<label for="porte">porte</label>
					<input class="input-disabilitado" name="porte" type="text" value="<?php echo $_SESSION['porte']; ?>">

					<label for="cor">cor</label>
				<input class="input-disabilitado" name="cor" type="text" value="<?php echo $_SESSION['cor']; ?>">

					<label for="sexo">sexo</label>
				<input class="input-disabilitado" name="sexo" type="text" value="<?php echo $_SESSION['sexo']; ?>">
			<hr class="sidebar-divider my-0"><br/>

			<legend> Termo de Responsabilidade </legend>
				<label for="nome">Ao clicar em 'Adotar!', fica declarado que toda a responsabilidade de cuidados está sendo passada por meio dessa doação à </label>
                    <input name="nome_responsavel_adocao" type="text" value="<?php echo $_SESSION['nome_responsavel_adocao']; ?>" required>
                    <?php echo "<span class='errortext'>$nomeErro</span>"; ?>
								
				<label for="cpf">portador do CPF Nº</label>
					<input name="cpf_responsavel_adocao" type="text" value="<?php echo $_SESSION['cpf_responsavel_adocao']; ?>" required>
					<?php echo "<span class='errortext'>$cpfErro</span>"; ?>
				<label for="sexo">e que todos os envolvidos estão de acordo com o <a href="termo-de-adocao.docx" download="Termo-de-Adoção.docx">Termo de Adoção</a>.</label>
				<br/><br/>
			<hr class="sidebar-divider my-0"><br/>
		</fieldset>
		<input type="submit" name="adotar" value="Adotar!" />
		<a href="adocao.php?page=0"> <input type="button" value="Cancelar"/> </a>   
	</form>
</div>