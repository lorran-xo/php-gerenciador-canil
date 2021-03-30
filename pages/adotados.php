<?php require_once "barras/barra_superior.php" ?>
<?php 

include("./../banco/conexao.php");

$itens_por_pagina = 7;
$pagina_atual = $_GET['page'];

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    $consulta = "SELECT * FROM animais WHERE CONCAT(`id`, `tipo`, `raca`, `sexo`, `idade`, `porte`, `data`) LIKE '%".$valueToSearch."%'/* AND adotado IS TRUE*/";
    $con = $mysqli->query($consulta) or die($mysqli->error);

    $num_total = $mysqli->query("SELECT * FROM animais")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}
else 
{
    $consulta = "SELECT * FROM animais LIMIT $pagina_atual, $itens_por_pagina";
    $con = $mysqli->query($consulta) or die($mysqli->error);

    $num_total = $mysqli->query("SELECT * FROM animais")->num_rows;

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

<div class="container">
    <h4 class="centraliza">Histórico de adoções</h4>
    <br>  
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">     
                    <form action="adotados.php?page=filtered" method="post"> 
                        <input type="text" name="valueToSearch" class="input-procurar" placeholder="Procurar...">
                        <button type="submit" name="search" class="input-submit"><i class="fas fa-search"></i></button>
                        <table id="myTable" class="table table-striped table-bordered table-condensed" style="width:100%">                        
                        <thead class="text-center">
                                <tr>
                                    <th>Código</th>
                                    <th>Apelido</th>
                                    <th>Raça</th>                                
                                    <th>Sexo</th>  
                                    <th>Cor</th>
                                    <th>Adotado por</th>
                                    <th>CPF</th>
                                    <th>Data da adoção</th>
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
                                    <td><?php echo $dado["data"];?></td>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>        
                        </table>   
                    </form>     
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="adotados.php?page=0">Anterior</a></li>
                            <?php for($i=0;$i<$num_total;$i++){
                                $style = "";
                                if($pagina_atual == $i)
                                    $style = "class=\"active\"";
                            ?>
                            <li <?php echo $style; ?>> <a class="page-link" href="adotados.php?page=<?php echo ($i * $itens_por_pagina); ?>"><?php echo ($i + 1); ?></a> </li>
                            <?php }?>
                            <li class="page-item"><a class="page-link" href="adotados.php?page=<?php echo $num_total-1; ?>">Próxima</a></li>
                        </ul>
                    </nav>            
                </div>
            </div>
        </div>  
    </div>    
</div>

<?php require_once "barras/barra_inferior.php"?>