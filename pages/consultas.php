<?php require_once "bars/side_bar.php" ?>

<?php 

include("./../banco/conexao.php");

$itens_por_pagina = 7;
$pagina_atual = $_GET['page'];

if(isset($_POST['search']))
{
    //Funcao de pesquisar na tabela
    $valueToSearch = $_POST['valueToSearch'];

    $consulta = "SELECT an.codigo, an.nome_animal, pr.nome, pr.descricao, ve.nome_veterinario, ac.data_acompanhamento FROM canil.animal an 
    JOIN canil.acompanhamento ac ON an.id_animal = ac.id_animal JOIN canil.procedimento pr ON ac.id_procedimento = pr.id_procedimento 
    JOIN canil.veterinario ve ON ac.id_veterinario = ve.id_veterinario WHERE CONCAT(`codigo`, `nome_animal`, `nome`, `descricao`, `nome_veterinario`, `data_acompanhamento`) LIKE '%".$valueToSearch."%'";
    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT an.codigo, an.nome_animal, pr.nome, pr.descricao, ve.nome_veterinario, ac.data_acompanhamento FROM canil.animal an 
    JOIN canil.acompanhamento ac ON an.id_animal = ac.id_animal JOIN canil.procedimento pr ON ac.id_procedimento = pr.id_procedimento 
    JOIN canil.veterinario ve ON ac.id_veterinario = ve.id_veterinario order by an.codigo")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}
else 
{
    //Consulta normal com paginação, sem ser filtrando pela pesquisa da tabela
    $consulta = "SELECT an.codigo, an.nome_animal, pr.nome, pr.descricao, ve.nome_veterinario, ac.data_acompanhamento FROM canil.animal an 
    JOIN canil.acompanhamento ac ON an.id_animal = ac.id_animal JOIN canil.procedimento pr ON ac.id_procedimento = pr.id_procedimento 
    JOIN canil.veterinario ve ON ac.id_veterinario = ve.id_veterinario order by an.codigo LIMIT $pagina_atual, $itens_por_pagina";

    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT an.codigo, an.nome_animal, pr.nome, pr.descricao, ve.nome_veterinario, ac.data_acompanhamento FROM canil.animal an 
    JOIN canil.acompanhamento ac ON an.id_animal = ac.id_animal JOIN canil.procedimento pr ON ac.id_procedimento = pr.id_procedimento 
    JOIN canil.veterinario ve ON ac.id_veterinario = ve.id_veterinario order by an.codigo")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}

?>

<div class="container">
    <h3 class="centraliza-titulo">Consultas</h3>
    <h6 class="centraliza-intro">Visualize o histórico de consultas realizadas ou registre outra!</h6>
    <br><br> 
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive"> 
                        <form action="consultas.php?page=0" method="post"> 
                            <input type="text" name="valueToSearch" class="input-procurar" placeholder="Procurar...">
                            <button type="submit" name="search" class="input-submit"><i class="fas fa-search"></i></button>
                            <a href="consultar.php?page=0"><button type="button" class="input-submit">Consultar</button></a>
                            <table id="myTable" class="table table-striped table-bordered table-condensed" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>Código do animal</th>
                                        <th>Nome do animal</th>
                                        <th>Procedimento</th>
                                        <th>Descrição</th>
                                        <th>Veterinário responsável</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($dado = $con->fetch_array()){ ?>
                                    <tr class="trData">
                                        <td><?php echo $dado["codigo"];?></td>
                                        <td><?php echo $dado["nome_animal"];?></td>
                                        <td><?php echo $dado["nome"];?></td>
                                        <td><?php echo $dado["descricao"];?></td>
                                        <td><?php echo $dado["nome_veterinario"];?></td>
                                        <td><?php echo $dado["data_acompanhamento"];?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>        
                            </table>
                        </form>    
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="consultas.php?page=0">Anterior</a></li>
                                <?php for($i=0;$i<$num_total;$i++){
                                    $style = "";
                                    if($pagina_atual == $i)
                                        $style = "class=\"active\"";
                                ?>
                                <li class="active"> <a class="page-link" href="consultas.php?page=<?php echo ($i * $itens_por_pagina); ?>"><?php echo ($i + 1); ?></a> </li>
                                <?php }?>
                                <li class="page-item"><a class="page-link" href="consultas.php?page=<?php echo $num_total-1; ?>">Próxima</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>  
        </div>    
</div>

<?php require_once "bars/bottom_bar.php"?>