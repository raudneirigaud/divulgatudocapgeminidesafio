<?php
require_once('../model/Conexao.php');  // ----- CARREGA A CLASSE USUARIO  ----- //
class ControllerLista{

    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarLista();

    }

    private function criarLista(){
        $row = $this->lista->getAnuncio();
        foreach ($row as $value){
            echo "<tr>";
            echo "<th>".$value['nome'] ."</th>";
            echo "<td>".$value['cliente'] ."</td>";
            echo "<td>".$value['datainicio'] ."</td>";   
            echo "<td>".$value['datafim'] ."</td>";
            echo "<td>".$value['valor'] ."</td>";
            echo "</tr>";
        }
    }
}

