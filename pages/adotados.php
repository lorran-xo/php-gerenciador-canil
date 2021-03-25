<?php require_once "barras/barra_superior.php" ?>
<?php 

include("./../banco/conexao.php");

$consulta = "SELECT * FROM animais";
$con = $mysqli->query($consulta) or die($mysqli->error);
?>

<div class="container">
    <h1>Histórico de adoções</h1>
    <!--<div class="container">
            <div class="row">
                <div class="col-lg-12">            
                    <a href="http://localhost/php-gerenciador-canil/pages/cadastrarAnimal.php"> <button type="button" class="btn btn-success" data-toggle="modal">Cadastrar animal</button></a>   
                </div>    
            </div>    
    </div>  -->   
        <br>  
    <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">        
                            <table class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Identificação</th>
                                    <th>Apelido</th>
                                    <th>Raça</th>                                
                                    <th>Sexo</th>  
                                    <th>Idade</th>
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
                        </div>
                    </div>
            </div>  
        </div>    
</div>

<?php require_once "barras/barra_inferior.php"?>