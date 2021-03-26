<?php require_once "barras/barra_superior.php"?>

<style>

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  width: 90%;
  margin-top:5%;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
  /*margin-left: 50% !important; toDo */ 
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 87%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.left-card-image{
  height: 200px;
}

.cards-position{
  margin-left: 33%
}
</style>
<div class="container about-section">
      <div>
        <h1>Sobre o sistema</h1>
        <!-- <p>O desenvolvimento desse sistema foi feito utilizando as seguintes tecnologias:</p> -->
        </div>
        <!--<h2 style="text-align:center">Our Team</h2> -->
        <div class="row">
        <div class="column cards-position">
          <div class="card">
            <img src="img/langs-logo.png" class="left-card-image" lt="Languages Logo" style="width:100%">
            <div>
            <br><h2 class="title">Gerenciador de Canil</h2><br>
              <h4 class="title">Tecnologias</h4>
              <p class="title">Front-End: HTML, CSS, JavaScript e Bootstrap</p>
              <p class="title">Back-End: PHP</p>
              <p class="title">Banco de Dados: MySQL (PHPMyAdmin)</p>
              <p class="title">Repositório: <a href="https://github.com/lorran-xo/php-gerenciador-canil" target="_blank">lorran-xo/php-gerenciador-canil</a></p> 
              <p class="title"> <a href="https://www.linkedin.com/in/lorran-oliveira-38194b117" target="_blank"><button class="button">Contato</button></a></p>
            </div>
          </div>
        </div>
    </div>
</div>
<?php require_once "barras/barra_inferior.php"?>