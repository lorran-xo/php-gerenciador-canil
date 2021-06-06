<?php require_once "bars/side_bar.php" ?>

<?php 

include("./../banco/conexao.php");

$itens_por_pagina = 7;
$pagina_atual = $_GET['page'];
$id_animal = $_GET['id'];
$id_procedimento = $_GET['procedimento'];

if(isset($_POST['search']))
{
    //Funcao de pesquisar na tabela
    $valueToSearch = $_POST['valueToSearch'];

    $consulta = "SELECT * FROM canil.veterinario WHERE CONCAT(`nome`, `cpf`, `contato`, `endereco`) LIKE '%".$valueToSearch."%'";
    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT * FROM canil.veterinario")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}
else 
{
    //Consulta normal com paginação, sem ser filtrando pela pesquisa da tabela
    $consulta = "SELECT * FROM canil.veterinario LIMIT $pagina_atual, $itens_por_pagina";

    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT * FROM canil.veterinario")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}

?>

<div class="container">
    <h3 class="centraliza-titulo">Selecione o veterinário que realizou o procedimento</h3>
    <h6 class="centraliza-intro">Visualize a lista de veterinários e selecione qual realizou</h6>
    <br><br> 
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive"> 
                        <form action="selecionarVeterinario.php?page=0" method="post"> 
                            <input type="text" name="valueToSearch" class="input-procurar" placeholder="Procurar...">
                            <button type="submit" name="search" class="input-submit"><i class="fas fa-search"></i></button>
                            <table id="myTable" class="table table-striped table-bordered table-condensed" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>CRMV</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Contato</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($dado = $con->fetch_array()){ ?>
                                    <tr class="trData">
                                        <td><?php echo $dado["crmv"];?></td>
                                        <td><?php echo $dado["nome_veterinario"];?></td>
                                        <td><?php echo $dado["cpf"];?></td>
                                        <td><?php echo $dado["contato"];?></td>
                                        <td>
                                            <a href="finalizaConsulta.php?id=<?php echo $id_animal?>&procedimento=<?php echo $id_procedimento?>&veterinario=<?php echo $dado["id_veterinario"];?>"> <button type="button"><span>Selecionar</span></button></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>        
                            </table>
                        </form>    
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="selecionarVeterinario.php?page=0&id=<?php echo $id_animal?>&procedimento=<?php echo $id_procedimento?>">Anterior</a></li>
                                <?php for($i=0;$i<$num_total;$i++){
                                    $style = "";
                                    if($pagina_atual == $i)
                                        $style = "class=\"active\"";
                                ?>
                                <li class="active"> <a class="page-link" href="selecionarVeterinario.php?page=<?php echo ($i * $itens_por_pagina); ?>&id=<?php echo $id_animal?>&procedimento=<?php echo $id_procedimento?>"><?php echo ($i + 1); ?></a> </li>
                                <?php }?>
                                <li class="page-item"><a class="page-link" href="selecionarVeterinario.php?page=<?php echo $num_total-1; ?>&id=<?php echo $id_animal?>&procedimento=<?php echo $id_procedimento?>">Próxima</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>  
        </div>    
</div>

<?php require_once "bars/bottom_bar.php"?>