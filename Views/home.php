<div class="container">
    <h3 class="centraliza-titulo">Início</h3>
    <h6 class="centraliza-intro">Visualize os animais do canil, edite ou clique para ver mais informações!</h6>

    <h4> Dado do banco: 
    <?php 
     
    echo '<pre>';
      print_r($this->dados2[0]["id"]);
    echo '</pre>';

    ?> 
    
    </h4>

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
                                            <th>Código</th>
                                            <th>Tipo</th>
                                            <th>Apelido</th>
                                            <th>Raça</th>                                
                                            <th>Sexo</th>  
                                            <th>Cor</th>
                                            <th>Porte</th>
                                            <th>Data do Resgate</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for($i=0; $i < count($this->dados2); $i++) 
                                        { 
                                            ?>
                                            <tr class="trData">
                                                <td><?php echo $this->dados2[$i]["codigo"];?></td>
                                                <td><?php echo $this->dados2[$i]["tipo"];?></td>
                                                <td><?php echo $this->dados2[$i]["apelido"];?></td>
                                                <td><?php echo $this->dados2[$i]["raca"];?></td>
                                                <td><?php echo $this->dados2[$i]["sexo"];?></td>
                                                <td><?php echo $this->dados2[$i]["cor"];?></td>
                                                <td><?php echo $this->dados2[$i]["porte"];?></td>
                                                <td><?php echo $this->dados2[$i]["data_resgate"];?></td>
                                                <td>
                                                <a href="home/editar?id=<?php echo $this->dados2[$i]["id"];?>"> <button type="button"><span>Editar</span></button></a>
                                                <a href="home/maisInfo?id=<?php echo $this->dados2[$i]["id"];?>"> <button type="button"><span>Mais</span></button></a>
                                                </td>
                                            </tr>
                                            <?php 
                                        } 
                                        ?>
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