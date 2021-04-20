<div class="container">
    <h3 class="centraliza-titulo">Histórico</h3>
    <h6 class="centraliza-intro">Visualize os animais que já foram adotados até hoje no Histórico de Adoções!</h6> 
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
                                <tr class="trData">
                                   
                                </tr>
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