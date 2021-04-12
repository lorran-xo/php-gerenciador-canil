<div class="container">
    <h3 class="centraliza-titulo">Histórico</h3>
    <h6 class="centraliza-intro">Visualize os animais que já foram adotados até hoje!</h6> 
    <br>  
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">     
                    <form action="historicoAdocao.php" method="post"> 
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
                            <?php 
                                    for($i=0; $i < count($this->dados2); $i++) 
                                    {
                                    
                                ?>
                                    <tr class="trData">
                                        <td><?php echo $this->dados2[$i]["codigo"];?></td>
                                        <td><?php echo $this->dados2[$i]["apelido"];?></td>
                                        <td><?php echo $this->dados2[$i]["tipo"];?></td>
                                        <td><?php echo $this->dados2[$i]["raca"];?></td>
                                        <td><?php echo $this->dados2[$i]["sexo"];?></td>
                                        <td><?php echo $this->dados2[$i]["cor"];?></td>
                                        <td><?php echo $this->dados2[$i]["nome_responsavel_adocao"];?></td>
                                        <td><?php echo $this->dados2[$i]["cpf_responsavel_adocao"];?></td>
                                        <td><?php echo $this->dados2[$i]["data_adocao"];?></td>
                                        <td>
                                        <a href="devolucaoAdotado?id=<?php echo $this->dados2[$i]["id"];?>"> <button type="button"><span>Devolução</span></button></a>
                                        </td>
                                    </td>
                                    </tr>
                                <?php } ?>
                            </tbody>        
                        </table>   
                    </form>     
                    <nav aria-label="Page navigation example">
                      
                    </nav>            
                </div>
            </div>
        </div>  
    </div>    
</div>