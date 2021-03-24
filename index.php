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
	<title>Gerenciador do Canil</title>
</head>

<body>

	<section class="content">
		<div class="cadastro">
			<center><h2 class="pageTitle"> Sistema Gerenciador de Canil </h2></center>
			<form class="form" method="POST" action="./functions.php">
					<center>
						<h3> <b> Listagem dos Animais do Canil </b></h3>
						<h4> Visualize, edite ou remova animais do canil</h4>
					</center>
					<table border="1">
					    <tr class="trTitle">
					    	<td><b>Código</b></td>
					        <td><b>Animal</b></td>
					        <td><b>Raça</b></td>
					        <td><b>Sexo</b></td>
					        <td><b>Idade</b></td>
					        <td><b>Porte</b></td>
					        <td><b>Data do Resgate</b></td>
					        <td><b>Ação</b></td>

					    </tr>
					    <?php while($dado = $con->fetch_array()){ ?>
					    <tr class="trData">
					        <td><?php echo $dado["id"];?></td>
					        <td><?php echo $dado["tipo"];?></td>
					        <td><?php echo $dado["raca"];?></td>
					        <td><?php echo $dado["sexo"];?></td>
					        <td><?php echo $dado["idade"];?></td>
					        <td><?php echo $dado["porte"];?></td>
					        <td><?php echo $dado["data"];?></td>
					        <td><a href="editar.php?id=<?php echo $dado["id"];?>"><button>Editar</button></a>
					        	<a href="saidas.php?id=<?php echo $dado["id"];?>"><button>Remover</button></a></td>
					    </tr>
					<?php } ?>
					</table>
			</form>
			 <center><a href="./cadastro.php"><button class="field submitButton">Cadastrar</button></a></center>
		</div>
	</section>
</body>

</html>

