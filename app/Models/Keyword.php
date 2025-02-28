<?php 
namespace App\Models; // nome desse arquivo 

//importar class Database 
use App\Config\Database;
use PDO;

class Keyword extends Database {

    public $nome = "chegou"; 
    private $table_name = "keywords";

    //atribultos da palavra chave 
    public $id;
    public $word;
    public $created_at;

    //metodo para criar a palavra chave 
    public function create($word)
    {
        $query = "INSERT INTO " . $this->table_name . " (word) VALUES (:word)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':word', $word);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    //metodo para pegar todas as palavras chaves 
    public function getAll()
    {
    $query = "SELECT * FROM " . $this->table_name;

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    //depois de preparar , execute e retorne 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //pegar uma palavra pelo ID
    public function getPalavraId($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
