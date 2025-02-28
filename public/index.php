<?php

require_once '../vendor/autoload.php';

use App\Controllers\ControllerKeyword;

$kw = new ControllerKeyword();

$kw->render('index');

// $kw->create('teclado');
// $kw->listarPalavras();
// $kw->getPalavra(1);




