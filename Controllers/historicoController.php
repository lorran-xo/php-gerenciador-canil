<?php 

Class historicoController extends Controller{
    public function index()
    {
        try {
            // 1 - chama a funcao na model animais, conectando-se com o banco e trazendo dados
            $animais = new Animais();
            $result = $animais->getAdoptionsHistory();

            // 2 - Com esses dados do banco, o controller pega, trata se precisar e manda pra view exibir pro usuário
            $this->carregarTemplate('historico', array(), $result); //segundo parametro tem restrição de passagem, entao usa o terceiro pro momento
        } catch (Exception $error){
            echo $error->getMessage();
        }
    }
}