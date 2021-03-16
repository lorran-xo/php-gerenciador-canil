<?php 
include("banco/conexao.php");

$consulta = "SELECT * FROM animais";
$con = $mysqli->query($consulta) or die($mysqli->error);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<link href="index.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png" >
	<title>Gerenciador de Canil</title>
</head>

<body>

	<section class="content">
		<div class="cadastro">
			<center><h2> Gerenciador de Canil </h2></center>
			<form class="form" method="POST" action="./functions.php">
				<center><h3> Listagem - Animais disponíveis</h3></center>
					<table border="1">
					    <tr>
					    	<td><b>id</b></td>
					        <td><b>Animal</b></td>
					        <td><b>Raça</b></td>
					        <td><b>Sexo</b></td>
					        <td><b>Idade</b></td>
					        <td><b>Porte</b></td>
					        <td><b>Ação</b></td>

					    </tr>
					    <?php while($dado = $con->fetch_array()){ ?>
					    <tr>
					        <td><?php echo $dado["id"];?></td>
					        <td><?php echo $dado["tipo"];?></td>
					        <td><?php echo $dado["raca"];?></td>
					        <td><?php echo $dado["sexo"];?></td>
					        <td><?php echo $dado["idade"];?></td>
					        <td><?php echo $dado["porte"];?></td>
					        <td><a href="editar.php?id=<?php echo $dado["id"];?>">Editar</a> | 
					        	<a href="saidas.php?id=<?php echo $dado["id"];?>">Retirar</a></td>
					    </tr>
					<?php } ?>
					</table>
			</form>
			 <a href="./cadastro.php">Cadastros</a>
		</div>
	</section>
</body>

</html>

