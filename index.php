<!DOCTYPE html>
<html lang="pt">

<head>
	<link href="index.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gerenciador de Canil</title>
</head>

<body>
	<script src="functions.js"></script>

	<?php
		//echo "Hello World!"
		// aqui dentro pode usar codigos lógicos
	?>
	<!-- <button class="styled-button" onclick="geraAlerta('Cadastrar Animal no Sistema')">Cadastrar Animal</button>
	<button class="styled-button" onclick="geraAlerta('Retirar Animal do Sistema')">Retirar Animal</button>-->

	<section class="content">
		<div class="cadastro">
			<center><h2> Gerenciador de Canil </h2></center>
			<form class="form" method="POST" action="./functions.php">
				<center><h3> Listagem - Animais disponíveis</h3></center>
					<table border="1">
					    <tr>
					        <td>Animal</td>
					        <td>Raça</td>
					        <td>Porte</td>
					        <td>Sexo</td>
					        <td>Idade</td>
					    </tr>
					    <tr>
					        <td>Cachorro</td>
					        <td>Pinscher</td>
					        <td>Pequeno</td>
					        <td>Masculino</td>
					        <td>1</td>
					    </tr>
					    <tr>
					        <td>Gato</td>
					        <td>Sphynx</td>
					        <td>Médio</td>
					        <td>Fêmea</td>
					        <td>3</td>
					    </tr>
					</table>
				<input class="field" name="acao" type="submit" value="Editar Dados">
			</form>
			 <a href="./cadastro.php"><input name="acao" type="submit" value="Cadastrar"></a>
			 <a href="./saidas.php"><input name="acao" type="submit" value="Retirar"></a> 
		</div>

	</section>
</body>

</html>

