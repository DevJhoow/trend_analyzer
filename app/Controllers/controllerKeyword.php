<?php
// criarei o controle dos modelos da classe Keyword 

namespace App\Controllers;

use App\Models\Keyword; // importei a model 

class ControllerKeyword {

    public function create($word)
    {
        $keyword = new Keyword();

        if($keyword->create($word)) {
            echo "Palavra chave $word adicionada com sucesso!";
        } else  {
            echo "Erro ao adicionar a Palavra-chave";
        }
    }

    public function listarPalavras()
    {
        $keyword = new Keyword();
        $keywords = $keyword->getAll();

        if($keywords) {
            foreach($keywords as $kw) {
                echo $kw['word']; 
            }
        } else {
            echo "nenhuma palavra encontrada ";
        }
    }

    public function getPalavra($id)
    {
        $keyword = new Keyword();
        $palavra = $keyword->getPalavraId($id);

        if($palavra) {
            echo $palavra['word'];
        } else  {
            echo 'nao é numero ou nao existe';
        }
    }

    //renderizar esse arquivo la na index.php
    public function render($view) {
        $file = __DIR__ . "/../Views/{$view}.html";

        if (file_exists($file)) {
            include $file;
        } else {
            echo "Erro: A view '{$view}' não foi encontrada!";
        }
    }

}