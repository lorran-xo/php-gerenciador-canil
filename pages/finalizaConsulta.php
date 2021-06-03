<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$tipoErro = '';
$sexoErro = '';

$selected_animal_id = intval($_GET['id']);
$selected_procedimento_id = intval($_GET['procedimento']);
$selected_vet_id = intval($_GET['veterinario']);

	if(isset($_POST['finalizar'])){
    $mysqli->query("INSERT INTO acompanhamento (id_animal, id_procedimento, id_veterinario, data_acompanhamento) VALUES 
      ('$selected_animal_id', '$selected_procedimento_id', '$selected_vet_id', NOW())");
   
    $mysqli->query("UPDATE animal SET adotado= 1 WHERE id_animal = '$selected_animal_id'");

		header("Location: http://localhost/php-gerenciador-canil/pages/consultas.php?page=0");
		exit();
	}
?>
<div class="container about-section">
      <div>
        <h1>Finalizar consulta</h1>
				<br/><br/>
			<hr class="sidebar-divider my-0"><br/>
         <p>Deseja finalizar o registro dessa consulta?</p> <br/>
        </div>
        <div class="row">
        <div class="column cards-position-langs">
          <div>
            <form method="POST" action="./finalizaConsulta.php?id=<?php echo $selected_animal_id; ?>&procedimento=<?php echo $selected_procedimento_id; ?>&veterinario=<?php echo $selected_vet_id; ?>">
              <p class="title"> <input class="button" type="submit" name="finalizar" value="Sim" />  </p>
            </form>
          </div>
        </div>
        <div class="column cards-position-langs">
          <div>
            <p class="title"> <a href="adocao.php"><button class="button">Não</button></a></p>
          </div><br/>
        </div>
    </div>
</div>

<?php require_once "bars/bottom_bar.php"?>
