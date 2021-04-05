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
    cap.cor,
    cap.porte,
    cid.codigo,
    cid.apelido,
    cra.raca,
    csi.nome_responsavel_adocao,
    csi.cpf_responsavel_adocao,
    csi.data_adocao
  FROM
    canil.animais can
      INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
      INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
      INNER JOIN canil.raca cra ON can.id = cra.id_animal
      INNER JOIN canil.situacao csi ON can.id = csi.id_animal
  WHERE csi.adotado = 1 AND CONCAT(`codigo`, `tipo`, `apelido`, `raca`, `sexo`, `cor`, `nome_responsavel_adocao`, `cpf_responsavel_adocao`, `data_adocao`) LIKE '%".$valueToSearch."%'";
    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT
    can.id,
    can.tipo,
    can.sexo,
    cap.cor,
    cap.porte,
    cid.codigo,
    cid.apelido,
    cra.raca,
    csi.nome_responsavel_adocao,
    csi.cpf_responsavel_adocao,
    csi.data_adocao
  FROM
    canil.animais can
      INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
      INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
      INNER JOIN canil.raca cra ON can.id = cra.id_animal
      INNER JOIN canil.situacao csi ON can.id = csi.id_animal
  WHERE csi.adotado = 1")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}
else 
{
    //Consulta normal com paginação, sem ser filtrando pela pesquisa da tabela
    $consulta = "SELECT
    can.id,
    can.tipo,
    can.sexo,
    cap.cor,
    cap.porte,
    cid.codigo,
    cid.apelido,
    cra.raca,
    csi.nome_responsavel_adocao,
    csi.cpf_responsavel_adocao,
    csi.data_adocao
  FROM
    canil.animais can
      INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
      INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
      INNER JOIN canil.raca cra ON can.id = cra.id_animal
      INNER JOIN canil.situacao csi ON can.id = csi.id_animal
  WHERE csi.adotado = 1 LIMIT $pagina_atual, $itens_por_pagina";

    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT
    can.id,
    can.tipo,
    can.sexo,
    cap.cor,
    cap.porte,
    cid.codigo,
    cid.apelido,
    cra.raca,
    csi.nome_responsavel_adocao,
    csi.cpf_responsavel_adocao,
    csi.data_adocao
  FROM
    canil.animais can
      INNER JOIN canil.aparencia cap ON can.id = cap.id_animal
      INNER JOIN canil.identificacao cid ON can.id = cid.id_animal
      INNER JOIN canil.raca cra ON can.id = cra.id_animal
      INNER JOIN canil.situacao csi ON can.id = csi.id_animal
  WHERE csi.adotado = 1")->num_rows;

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
                    <form action="historicoAdocao.php?page=filtered" method="post"> 
                        <input type="text" name="valueToSearch" class="input-procurar" placeholder="Procurar...">
                        <button type="submit" name="search" class="input-submit"><i class="fas fa-search"></i></button>
                        <table id="myTable" class="table table-striped table-bordered table-condensed" style="width:100%">                        
                        <thead class="text-center">
                                <tr>
                                    <th>Código</th>
                                    <th>Apelido</th>
                                    <th>Tipo</th>
                                    <th>Raça</th>                                
                                    <th>Sexo</th>  
                                    <th>Cor</th>
                                    <th>Adotado por</th>
                                    <th>CPF</th>
                                    <th>Data da adoção</th>
                                    <th>Ação</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while($dado = $con->fetch_array()){ ?>
                                <tr class="trData">
                                    <td><?php echo $dado["codigo"];?></td>
                                    <td><?php echo $dado["apelido"];?></td>
                                    <td><?php echo $dado["tipo"];?></td>
                                    <td><?php echo $dado["raca"];?></td>
                                    <td><?php echo $dado["sexo"];?></td>
                                    <td><?php echo $dado["cor"];?></td>
                                    <td><?php echo $dado["nome_responsavel_adocao"];?></td>
                                    <td><?php echo $dado["cpf_responsavel_adocao"];?></td>
                                    <td><?php echo $dado["data_adocao"];?></td>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>        
                        </table>   
                    </form>     
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="historicoAdocao.php?page=0">Anterior</a></li>
                            <?php for($i=0;$i<$num_total;$i++){
                                $style = "";
                                if($pagina_atual == $i)
                                    $style = "class=\"active\"";
                            ?>
                            <li <?php echo $style; ?>> <a class="page-link" href="historicoAdocao.php?page=<?php echo ($i * $itens_por_pagina); ?>"><?php echo ($i + 1); ?></a> </li>
                            <?php }?>
                            <li class="page-item"><a class="page-link" href="historicoAdocao.php?page=<?php echo $num_total-1; ?>">Próxima</a></li>
                        </ul>
                    </nav>            
                </div>
            </div>
        </div>  
    </div>    
</div>

<?php require_once "barras/barra_inferior.php"?>