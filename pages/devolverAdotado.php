<?php require_once "bars/side_bar.php" ?>

<?php

include("./../banco/conexao.php");

//Iniciando as mensagens de erro com valor vazio 
$tipoErro = '';
$sexoErro = '';

$selected_adoption_id = intval($_GET['id']);
$selected_animal_id = intval($_GET['animal']);

	if(isset($_POST['devolucao'])){
    $mysqli->query("UPDATE adocao SET data_retorno= NOW() WHERE id_adocao = '$selected_adoption_id'");
    $mysqli->query("UPDATE animal SET adotado= 0 WHERE id_animal = '$selected_animal_id'");
		header("Location: http://localhost/php-gerenciador-canil/pages/index.php?page=0");
		exit();
	} else {

	}
?>
<div class="container about-section">
      <div>
        <h1>Devolução de animais</h1>
         <p>Tem certeza que o animal selecionado está retornando ao canil? </p> <br/>
         <label>Ao clicar para confirmar esse retorno, fica declarado que toda a responsabilidade sobre o animal está </br>sendo passada à instituição (Canil),
				<label>e que todos os envolvidos estão de acordo com o <a href="termo-de-adocao.docx" download="Termo-de-Adoção.docx">Termo de Adoção</a>,</label>
        <label> que deve ser imprimido, assinado e arquivado no exato momento deste registro.</label>
        </div>
        <!--<h2 style="text-align:center">Our Team</h2> -->
        <div class="row">
        <div class="column cards-position-langs">
          <div>
            <form method="POST" action="./devolverAdotado.php?id=<?php echo $selected_adoption_id; ?>&animal=<?php echo $selected_animal_id; ?>">
              <p class="title"> <input class="button" type="submit" name="devolucao" value="Sim" />  </p>
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
