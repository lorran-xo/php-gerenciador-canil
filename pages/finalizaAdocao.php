<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$tipoErro = '';
$sexoErro = '';

$selected_animal_id = intval($_GET['id']);
$selected_person_id = intval($_GET['pessoa']);

	if(isset($_POST['finalizar'])){
    $mysqli->query("INSERT INTO adocao (id_animal, id_pessoa, data_adocao, data_retorno) VALUES ('$selected_animal_id', '$selected_person_id', NOW(), 0)");
   
    $mysqli->query("UPDATE animal SET adotado= 1 WHERE id_animal = '$selected_animal_id'");

		header("Location: http://localhost/php-gerenciador-canil/pages/historicoAdocao.php?page=0");
		exit();
	}
?>
<div class="container about-section">
      <div>
        <h1>Finalizar adoção</h1>
        <legend> Termo de Responsabilidade </legend>
				<label>Ao clicar para confirmar a adoção, fica declarado que toda a responsabilidade sobre o animal está sendo passada </br> por meio dessa doação à pessoa selecionada
				<label>e que todos os envolvidos estão de acordo com o <a href="termo-de-adocao.docx" download="Termo-de-Adoção.docx">Termo de Adoção</a>,</label>
        <label> que deve ser imprimido, assinado e arquivado no exato momento deste registro.</label>

				<br/><br/>
			<hr class="sidebar-divider my-0"><br/>
         <p>Tem certeza que deseja registrar essa adoção? </p> <br/>
        </div>
        <div class="row">
        <div class="column cards-position-langs">
          <div>
            <form method="POST" action="./finalizaAdocao.php?id=<?php echo $selected_animal_id; ?>&pessoa=<?php echo $selected_person_id; ?>">
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
