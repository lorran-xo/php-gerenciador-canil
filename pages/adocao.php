<?php require_once "barras/barra_superior.php" ?>
<?php 

include("./../banco/conexao.php");

$consulta = "SELECT * FROM animais";
$con = $mysqli->query($consulta) or die($mysqli->error);
?>
<style> 
.centraliza{
  margin-left: 40%;
}

.input-pesquisar {
  background-image: url('/img/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}
</style>

<script>
function pesquisar() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr.length; i++) {
    // Hide the row initially.
    tr[i].style.display = "none";

        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
            cell = tr[i].getElementsByTagName("td")[j];
            if (cell) {
                if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                break;
                } 
            }
        }
    }
}
</script>

<div class="container">
    <h1 class="centraliza">Adoções</h1>
    <!--<div class="container">
            <div class="row">
                <div class="col-lg-12">            
                    <a href="http://localhost/php-gerenciador-canil/pages/cadastrarAnimal.php"> <button type="button" class="btn btn-success" data-toggle="modal">Cadastrar animal</button></a>   
                </div>    
            </div>    
    </div>  -->   
        <br>  
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <input type="text" id="myInput" class="input-pesquisar" onkeyup="pesquisar()" placeholder="Procurar...">
                    <table id="myTable" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Identificação</th>
                                <th>Tipo</th>
                                <th>Raça</th>                                
                                <th>Sexo</th>  
                                <th>Idade</th>
                                <th>Porte</th>
                                <th>Data do Resgate</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($dado = $con->fetch_array()){ ?>
                            <tr class="trData">
                                <td><?php echo $dado["id"];?></td>
                                <td><?php echo $dado["tipo"];?></td>
                                <td><?php echo $dado["raca"];?></td>
                                <td><?php echo $dado["sexo"];?></td>
                                <td><?php echo $dado["idade"];?></td>
                                <td><?php echo $dado["porte"];?></td>
                                <td><?php echo $dado["data"];?></td>
                                <td>
                                    <a href="adocaoInfos.php"><button><span class="font-size-menor">Adotar</span></button></a>
                                </td>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>        
                    </table>                    
                </div>
            </div>
        </div>  
    </div>    
</div>

<?php require_once "barras/barra_inferior.php"?>