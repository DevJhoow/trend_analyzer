<?php
//namespace deste arquivo sera :
namespace App\Config;

use PDO;
use PDOException;

//clase para nos conectar com o banco de dados 
class Database {
    //atribultos privados p/ somente a classe pode modificalos 
    private $host = "localhost";
    private $db_name = "analyzer";
    private $username = "root";
    private $password = "";

    protected $conn;

    // toda vez que a classe for instanciada , ira chamar a coneciton 
    public function __construct()
    {
        $this->getConnection();
    }

    //metodo para nos conectarmos 
    public function getConnection()
    {
        try {
            //tudo ok 
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name , $this->username, $this->password);
            //erro
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erro de Conexao: " . $exception->getMessage();
        }
        return $this->conn; 
    }
}

