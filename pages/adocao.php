<?php require_once "barras/barra_superior.php" ?>
<?php 

include("./../banco/conexao.php");

$itens_por_pagina = 7;
$pagina_atual = $_GET['page'];

if(isset($_POST['search']))
{
    //Funcao de pesquisar na tabela
    $valueToSearch = $_POST['valueToSearch'];

    $consulta = "SELECT
    can.id,
    can.tipo, 
    can.sexo, 
    can.idade,
    cap.cor, 
    cap.porte, 
    cap.peso,
    cid.codigo,
    cid.apelido,
    cra.raca,
    cra.comportamento,
    csi.descricao,
    csi.nome_responsavel_resgate,
    csi.data_resgate
  FROM
    canil.animais can
      INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
      INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
      INNER JOIN canil.raca cra ON can.id = cra.id_animal
      INNER JOIN canil.situacao csi ON can.id = csi.id_animal
  WHERE csi.adotado = 0 AND CONCAT(`codigo`, `tipo`, `raca`, `sexo`, `cor`, `porte`, `data_resgate`) LIKE '%".$valueToSearch."%'";
    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT
    can.id,
    can.tipo, 
    can.sexo, 
    can.idade,
    cap.cor, 
    cap.porte, 
    cap.peso,
    cid.codigo,
    cid.apelido,
    cra.raca,
    cra.comportamento,
    csi.descricao,
    csi.nome_responsavel_resgate,
    csi.data_resgate
  FROM
    canil.animais can
      INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
      INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
      INNER JOIN canil.raca cra ON can.id = cra.id_animal
      INNER JOIN canil.situacao csi ON can.id = csi.id_animal
  WHERE csi.adotado = 0")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}
else 
{
    //Consulta normal com paginação, sem ser filtrando pela pesquisa da tabela
    $consulta = "SELECT
    can.id,
    can.tipo, 
    can.sexo, 
    can.idade,
    cap.cor, 
    cap.porte, 
    cap.peso,
    cid.codigo,
    cid.apelido,
    cra.raca,
    cra.comportamento,
    csi.descricao,
    csi.nome_responsavel_resgate,
    csi.data_resgate
  FROM
    canil.animais can
      INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
      INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
      INNER JOIN canil.raca cra ON can.id = cra.id_animal
      INNER JOIN canil.situacao csi ON can.id = csi.id_animal
  WHERE csi.adotado = 0 LIMIT $pagina_atual, $itens_por_pagina";

    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT
    can.id,
    can.tipo, 
    can.sexo, 
    can.idade,
    cap.cor, 
    cap.porte, 
    cap.peso,
    cid.codigo,
    cid.apelido,
    cra.raca,
    cra.comportamento,
    csi.descricao,
    csi.nome_responsavel_resgate,
    csi.data_resgate
  FROM
    canil.animais can
      INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
      INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
      INNER JOIN canil.raca cra ON can.id = cra.id_animal
      INNER JOIN canil.situacao csi ON can.id = csi.id_animal
  WHERE csi.adotado = 0")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}

?>

<style>

.centraliza{
  margin-left: 40%;
}

.input-procurar {
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 80%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

.input-submit {
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 10%; /* Full-width */
  padding: 10px; /* Add some padding */
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
    <h4 class="centraliza">Adoções</h4><br>  
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <form action="adocao.php?page=filtered" method="post">         
                        <input type="text" name="valueToSearch" class="input-procurar" placeholder="Procurar...">
                        <button type="submit" name="search" class="input-submit"><i class="fas fa-search"></i></button>
                        <table id="myTable" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Código</th>
                                    <th>Tipo</th>
                                    <th>Raça</th>                                
                                    <th>Sexo</th>  
                                    <th>Cor</th>
                                    <th>Porte</th>
                                    <th>Data do Resgate</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($dado = $con->fetch_array()){ ?>
                                <tr class="trData">
                                    <td><?php echo $dado["codigo"];?></td>
                                    <td><?php echo $dado["tipo"];?></td>
                                    <td><?php echo $dado["raca"];?></td>
                                    <td><?php echo $dado["sexo"];?></td>
                                    <td><?php echo $dado["cor"];?></td>
                                    <td><?php echo $dado["porte"];?></td>
                                    <td><?php echo $dado["data_resgate"];?></td>
                                    <td>
                                        <a href="adocaoInfos.php"> <button type="button"><span>Adotar</span></button></a>
                                    </td>
                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>        
                        </table>   
                    </form>      
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="adocao.php?page=0">Anterior</a></li>
                            <?php for($i=0;$i<$num_total;$i++){
                                $style = "";
                                if($pagina_atual == $i)
                                    $style = "class=\"active\"";
                            ?>
                            <li <?php echo $style; ?>> <a class="page-link" href="adocao.php?page=<?php echo ($i * $itens_por_pagina); ?>"><?php echo ($i + 1); ?></a> </li>
                            <?php }?>
                            <li class="page-item"><a class="page-link" href="adocao.php?page=<?php echo $num_total-1; ?>">Próxima</a></li>
                        </ul>
                    </nav>            
                </div>
            </div>
        </div>  
    </div>    
</div>

<?php require_once "barras/barra_inferior.php"?>