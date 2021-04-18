<div>
    <h3 class="centraliza-titulo">Resgate</h3>
    <div class="form-style-5">
        <form method="POST" action="resgate/insertAnimal">
            <h6> Preencha o formulário abaixo para cadastrar um novo animal no canil</h6><br/>
            <fieldset>
                <legend><span class="number">1</span>Identificação</legend>
					<label for="codigo">Código*</label>
					<input name="codigo" type="number" required>
					<label for="codigo">Tipo*</label>
                    <input name="tipo" type="text" required>
                

					<label for="apelido">Apelido</label>
					<input name="apelido" type="text">

                <legend><span class="number">2</span> Características </legend>

				<label for="raca">Raça*</label>
                <input name="raca" type="text" required>
            

                    <label for="sexo">Sexo*</label>
                    <select name="sexo" required>
                        <option value="">Selecione</option>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>

				<label for="cor">Cor*</label>
                <input name="cor" type="text" required>

                <label for="porte">Porte*</label>
                <select class="field" name="porte" required>
                    <option value="">Selecione</option>
                    <option value="Pequeno">Pequeno</option>
                    <option value="Médio">Médio</option>
                    <option value="Grande">Grande</option>
                </select>

				<label for="idade">Idade</label>
                <input name="idade" type="text">


				<label for="peso">Peso</label>

                <label for="sexo">Comportamento</label>
                    <select name="comportamento" required>
                        <option value="">Selecione</option>
                        <option value="Calmo">Calmo</option>
                        <option value="Agitado">Agitado</option>
                        <option value="Agressivo">Agressivo</option>
                    </select>

                <legend><span class="number">3</span> Adicionais </legend>
				<label for="nome_responsavel_resgate">Responsável pelo resgate</label>
                <input name="nome_responsavel_resgate" type="text">

				<label for="descricao">Descrição</label>
                <textarea name="descricao"></textarea>
            </fieldset>
            <input type="submit" value="Cadastrar" />
        </form>
    </div>
</div>