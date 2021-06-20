<?php require_once "bars/side_bar.php" ?>

<div class="container about-section">
      <div>
        <h1>Adoção</h1>
         <p>Para registrar uma adoção, escolha uma das opções abaixo: </p> <br/>
         <p class="title">Se for a primeira vez que a pessoa vai adotar:</p>
        </div>
        <div class="row">
        <div class="column cards-position-langs">
          <div>
            <p> <a href="cadastrarPessoaNaAdocao.php"><button class="button">Cadastre a pessoa</button></a></p>
          </div>
        </div>
        <div class="column cards-position-langs">
          <p class="title">Se a pessoa já tiver adotado aqui antes:</p>
          <div>
            <p> <a href="selecionarAnimal.php?page=0"><button class="button">Registre a adoção</button></a></p>
          </div><br/>
        </div>
    </div>
</div>

<?php require_once "bars/bottom_bar.php"?>