<?php 

Class resgateController extends Controller{
    public function index()
    {
        /*try {
            // 1 - chama a funcao na model animais, conectando-se com o banco e trazendo dados
            $animais = new Animais();
            $result = $animais->getAvaiableAnimals();

            // 2 - Com esses dados do banco, o controller pega, trata se precisar e manda pra view exibir pro usuário
            $this->carregarTemplate('home', array(), $result); //segundo parametro tem restrição de passagem, entao usa o terceiro pro momento

        } catch (Exception $error){
            echo $error->getMessage();
        }*/
        $this->carregarTemplate('resgate'/*,$animais*/); //nome da view
    }

    public function insertAnimal()
    {
        try {
            $animais = new Animais();
            $result = $animais->insertAnimal($_POST);
            echo '<script>alert("Cadastro realizado com sucesso!")</script>';
            echo '<script>location.href="http://localhost/php-gerenciador-canil/home"</script>';
        } catch(Exception $error){
            echo '<script>alert("'.$error->getMessage().'")</script>';
            echo '<script>location.href="http://localhost/php-gerenciador-canil/resgate"</script>';
        }
    }
}