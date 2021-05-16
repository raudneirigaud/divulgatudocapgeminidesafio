<?php
// ----- CARREGA A CLASSE DE CONEXÃO COM O BANCO DE DADOS
require_once('Conexao.php');
class Anuncio extends Banco{

    // ----- ATRIBUTOS NA NOSSA CLASSE ----- //

Private $nome;
Private $cliente;
Private $datainicio;
Private $datafim;
Private $valor;

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getDataInicio(){
        return $this->datainicio;
    }

    public function setDataInicio($datainicio){
        $this->datainicio = $datainicio;
    }

    public function getDataFim(){
        return $this->datafim;
    }

    public function setDataFim($datafim){
        $this->datafim = $datafim;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }
    
    public function incluir(){
        return $this->setAnuncio($this->getNome() , $this->getCliente() , $this->getDataInicio() , $this->getDataFim() , $this->getValor());
    }

  


 

}
?>