<?php
require_once('db.php');

class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO, BD_PORT);
    }

    public function setAnuncio($nome,$cliente,$datainicio,$datafim,$valor){
        $stmt = $this->mysqli->prepare("INSERT INTO anuncios (`nome`, `cliente`, `datainicio`, `datafim`, `valor`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome,$cliente,$datainicio,$datafim,$valor);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }
     public function getAnuncio(){
        $result = $this->mysqli->query("SELECT * FROM anuncios");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }
   

}
?>