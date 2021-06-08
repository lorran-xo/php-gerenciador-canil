<?php require_once "bars/side_bar.php" ?>
<?php 

include("./../banco/conexao.php");

$itens_por_pagina = 7;
$pagina_atual = $_GET['page'];

if(isset($_POST['search']))
{
    //Funcao de pesquisar na tabela
    $valueToSearch = $_POST['valueToSearch'];

    $consulta = "SELECT an.codigo, an.nome_animal, an.id_animal, pe.nome, pe.cpf, ad.id_adocao, ad.data_adocao FROM canil.animal an 
    JOIN canil.adocao ad 
    ON an.id_animal = ad.id_animal
    JOIN canil.pessoa pe
    ON ad.id_pessoa = pe.id_pessoa
    WHERE ad.data_retorno = 0 AND CONCAT(`codigo`, `nome_animal`, `nome`, `cpf`, `data_adocao`) LIKE '%".$valueToSearch."%'
    order by an.codigo";
    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT an.codigo, an.nome_animal, an.id_animal, pe.nome, pe.cpf, ad.id_adocao, ad.data_adocao FROM canil.animal an 
    JOIN canil.adocao ad 
    ON an.id_animal = ad.id_animal
    JOIN canil.pessoa pe
    ON ad.id_pessoa = pe.id_pessoa
    WHERE ad.data_retorno = 0
    order by an.codigo")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}
else 
{
    //Consulta normal com paginação, sem ser filtrando pela pesquisa da tabela
    $consulta = "SELECT an.codigo, an.nome_animal, an.id_animal, pe.nome, pe.cpf, ad.id_adocao, ad.data_adocao FROM canil.animal an 
    JOIN canil.adocao ad 
    ON an.id_animal = ad.id_animal
    JOIN canil.pessoa pe
    ON ad.id_pessoa = pe.id_pessoa
    WHERE ad.data_retorno = 0
    order by an.codigo LIMIT $pagina_atual, $itens_por_pagina";

    $con = $mysqli->query($consulta) or die($mysqli->error);

    //pega o numero total de linhas que retornou da pesquisa pra paginação da tabela
    $num_total = $mysqli->query("SELECT an.codigo, an.nome_animal, an.id_animal, pe.nome, pe.cpf, ad.id_adocao, ad.data_adocao FROM canil.animal an 
    JOIN canil.adocao ad 
    ON an.id_animal = ad.id_animal
    JOIN canil.pessoa pe
    ON ad.id_pessoa = pe.id_pessoa
    WHERE ad.data_retorno = 0
    order by an.codigo")->num_rows;

    $num_total = ceil($num_total/$itens_por_pagina);
}

?>

<div class="container">
    <h3 class="centraliza-titulo">Histórico</h3>
    <h6 class="centraliza-intro">Visualize os animais que já foram adotados até hoje no Histórico de Adoções!</h6> 
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
                                    <th>Código do Animal</th>
                                    <th>Nome do Animal</th>
                                    <th>Nome do Responsável</th>
                                    <th>CPF do Responsável</th>
                                    <th>Data da adoção</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($dado = $con->fetch_array()){ ?>
                                <tr class="trData">
                                    <td><?php echo $dado["codigo"];?></td>
                                    <td><?php echo $dado["nome_animal"];?></td>
                                    <td><?php echo $dado["nome"];?></td>
                                    <td><?php echo $dado["cpf"];?></td>
                                    <td><?php echo $dado["data_adocao"];?></td>
                                    <td>
                                        <a href="devolverAdotado.php?id=<?php echo $dado["id_adocao"];?>&animal=<?php echo $dado["id_animal"];?>"> <button type="button"><span>Devolver</span></button></a>
                                    </td>
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

<?php require_once "bars/bottom_bar.php"?>