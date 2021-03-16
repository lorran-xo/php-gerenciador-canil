<?php 

$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "canil";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno) //Se der erro ao conectar retorna erro
	echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
?>