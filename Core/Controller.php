<?php //Controller padrao que pode ser reutilizado junto com o core

Class Controller{

    public $dados;
    public $dados2;
    
    public function __construct()
    {
        $this->dados = array();
    }

    //passa como parametro uma view e algum dado dos Models do banco. Unindo front com banco
    public function carregarTemplate($nomeView, $dadosModel = array(), $dados2 = array())
    {
        $this->dados = $dadosModel;
        $this->dados2 = $dados2;
        require 'Views/template.php';
    }

    //Extrai as variaveis do array
    public function carregarViewNoTemplate($nomeView, $dadosModel = array())
    {
        extract($dadosModel);

        require 'Views/'.$nomeView.'.php'; //dinamico
    }

}