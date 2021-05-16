<?php

require_once('../model/Anuncio.php');  // ----- CARREGA A CLASSE USUARIO  ----- //

class ControllerAnuncio {

private $cadastro;

 public function __construct(){
        $this->cadastro = new Anuncio();
        $this->incluir();
    }

private function incluir(){

    $this->cadastro->setNome($_POST['nome']);
    $this->cadastro->setCliente($_POST['cliente']);
    $this->cadastro->setDataInicio(date('Y-m-d',strtotime($_POST['datainicio'])));
    $this->cadastro->setDataFim(date('Y-m-d',strtotime($_POST['datafim'])));
    $this->cadastro->setValor($_POST['valor']);
     $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cadastraranuncio.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }

}



}
new ControllerAnuncio();



