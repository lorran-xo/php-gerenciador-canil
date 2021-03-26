<?php require_once "barras/barra_superior.php"?>
<style>

*, *:before, *:after {
  box-sizing: inherit;
}

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
</style>

<div class="container">
    <div class="about-section">
        <h1>Apoie</h1>
        <p>Em várias lugares do Brasil, existem diversas ONGs de proteção aos animais que sobrevivem apenas através de doações e trabalhos voluntários.</p>
        <p>Em Juiz de Fora por exemplo, é possível ajudar algumas delas de forma muito prática e sem esforço nenhum. Você pode ajudar fazendo doações em dinheiro, materiais de construção, 
            alimentos, trabalhos voluntários no canil ou até mesmo adotando um dos animais!
        </p>
        </div>

        <!--<h2 style="text-align:center">Our Team</h2> -->
        <div class="row">
        <div class="column">
            <div class="card">
            <img src="img/sjpa-logo.png" alt="SJPA" style="width:75%">
            <div class="container">
                <h2>SJPA</h2>
                <p class="title">Sociedade Juizforense de Proteção aos Animais e ao Meio Ambiente</p>
                <p>PIX: 20.460.556/0001-78</p>
                <p>PicPay: ong.sjpa</p>
                <p>Instagram: <a href="https://www.instagram.com/ong_sjpa/?hl=pt" target="_blank">ong_sjpa</a></p> 
                <p>BR-040, Km 787, Salvaterra - Juiz de Fora-MG</p>
                <p> <a href="https://api.whatsapp.com/send/?phone=553291401033&text&app_absent=0" target="_blank"><button class="button">Contato</button></a></p>
            </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
            <img src="img/jf-logo.png" alt="PJF" style="width:100%">
            <div class="container">
                <h2>Canil Municipal de Juiz de Fora</h2>
                <p class="title"></p>
                <p>Facebook: <a href="https://www.facebook.com/canilmunicipaljf/" target="_blank">Canil Municipal - Adote um Amigo</a></p> 
                <p>Telefone: (32) 3690-3591</p>
                <p>R. Bartolomeu dos Santos, 384-620, São Damião, Juiz de Fora - MG, 36088-514</p>
                <p> <a href="https://www.pjf.mg.gov.br/fale_prefeitura/index.php" target="_blank"><button class="button">Contato</button></a></p>
            </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "barras/barra_inferior.php"?>