<?php require_once "barras/barra_superior.php" ?>

<?php 

include("./../banco/conexao.php");

$itens_por_pagina = 7;
$pagina_atual = $_GET['page'];

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    /*  */
    $consulta = "SELECT * FROM animais WHERE CONCAT(`id`, `tipo`, `raca`, `sexo`, `idade`, `porte`, `data`) LIKE '%".$valueToSearch."%' /*AND adotado IS FALSE*/";
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
  margin-left: 45%;
}

.input-procurar {
  background-position: 10px 12px; 
  background-repeat: no-repeat; 
  width: 80%;
  font-size: 16px; 
  padding: 12px 20px 12px 40px; 
  border: 1px solid #ddd; 
  margin-bottom: 12px; 
}

.input-submit {
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 10%;
  padding: 10px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

/*
ToDo: Passar id do selecionado na tabela:

<a href="editar.php?id=<?php echo $dado["id"];?>"> <button type="button"><span>Editar</span></button></a>
*/

</style>

<div class="container">
        <h4 class="centraliza">Início</h4>
    <br><br> 
    <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive"> 
                            <form action="index.php?page=0" method="post"> 
                                <input type="text" name="valueToSearch" class="input-procurar" placeholder="Procurar...">
                                <button type="submit" name="search" class="input-submit"><i class="fas fa-search"></i></button>
                                <table id="myTable" class="table table-striped table-bordered table-condensed" style="width:100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Identificação</th>
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
                                            <td><?php echo $dado["id"];?></td>
                                            <td><?php echo $dado["tipo"];?></td>
                                            <td><?php echo $dado["raca"];?></td>
                                            <td><?php echo $dado["sexo"];?></td>
                                            <td><?php echo $dado["idade"];?></td>
                                            <td><?php echo $dado["porte"];?></td>
                                            <td><?php echo $dado["data"];?></td>
                                            <td>
                                                <a href="maisInfos.php"> <button type="button"><span>Visualizar</span></button></a>
                                                <a href="editar.php?id=<?php echo $dado["id"];?>"> <button type="button"><span>Editar</span></button></a>
                                            </td>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>        
                                </table>
                            </form>    
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="index.php?page=0">Anterior</a></li>
                                    <?php for($i=0;$i<$num_total;$i++){
                                        $style = "";
                                        if($pagina_atual == $i)
                                            $style = "class=\"active\"";
                                    ?>
                                    <li class="active"> <a class="page-link" href="index.php?page=<?php echo ($i * $itens_por_pagina); ?>"><?php echo ($i + 1); ?></a> </li>
                                    <?php }?>
                                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $num_total-1; ?>">Próxima</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
            </div>  
        </div>    
</div>

<?php require_once "barras/barra_inferior.php"?>