<?php 

Class historicoController extends Controller{
    public function index() //pagina principal de adocao (index)
    {
        //chama model (informaçoes do banco)
        //chama view 
        //fazer juncao do back com o front

       /* $a = new animal();
        $animais = $a->getAnimais();*/
        // /\ passo1

        $this->carregarTemplate('historico'/*,$animais*/); //nome da view

    }
}