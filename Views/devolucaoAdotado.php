<div class="form-style-5">
	<form method="POST" action="./devolverAdotado.php?id=<?php echo $selected_animal_id; ?>">   
		<h6> Verifique abaixo os dados do animal que está sendo devolvido ao canil </h6> <br/>
		<fieldset>
			<legend>Sendo devolvido</legend>
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

			<legend> Dados do antigo responsável </legend>
				<label for="nome">Nome </label>
                    <input class="input-disabilitado" name="nome_responsavel_adocao" type="text" value="<?php echo $_SESSION['nome_responsavel_adocao']; ?>">
								
				<label for="cpf">portador do CPF Nº</label>
					<input class="input-disabilitado" name="cpf_responsavel_adocao" type="text" value="<?php echo $_SESSION['cpf_responsavel_adocao']; ?>">
				<br/>
					<label for="descricao"><b>Motivo da devolução</b></label>
				<textarea name="motivo_devolucao" required><?php echo $_SESSION['motivo_devolucao']; ?></textarea>
				<br/>
			<hr class="sidebar-divider my-0"><br/>
		</fieldset>
		<input type="submit" name="devolver" value="Finalizar" />
		<a href="historicoAdocao.php?page=0"> <input type="button" value="Cancelar"/> </a>   
	</form>
</div>