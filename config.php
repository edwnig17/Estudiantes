<?php


ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("db.php");

class Config{


    private $id;
    private $nombres;
    private $dirrecion;
    private $logros;
    protected $dbCnx;

    public function __construct($id = 0, $nombres = "", $dirrecion ="", $logros =""){

        $this->id = $id;
        $this->nombres = $nombres;
        $this->dirrecion = $dirrecion;
        $this->logros = $logros;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]); 

    }
    public function setID($id){
    $this->id = $id;
    }

    public function getID(){
         return $this->id;
     }
    
     public function setNombres($nombres){
        $this->nombres = $nombres;
     }

     public function getNombres(){
        return $this->nombres;
    }
    public function setDireccion($dirrecion){
        $this->dirrecion = $dirrecion;
     }
     
     public function getDireccion(){
        return $this->dirrecion ;
    }
    public function setLogros($logros){
        $this->logros = $logros;
     }
     public function getLogros(){
        return $this->logros;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx -> prepare("INSERT INTO campersv2 (nombres,dirrecion,logros) values(?,?,?)");
            $stm-> execute([$this->nombres, $this->dirrecion, $this->logros]);
        } catch (Exception $e) {
            return  $e->getMessage();
        }

    }
}
?>