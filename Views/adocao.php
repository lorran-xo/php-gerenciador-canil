<div class="container">
    <h3 class="centraliza-titulo">Adoção</h3>
    <h6 class="centraliza-intro">Visualize os animais disponíveis  atualmente no canil e clique em adotar!</h6><br>  
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
                                      <a href="adocaoInfos.php?id=<?php echo $dado["id"];?>"> <button type="button"><span>Adotar</span></button></a>
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