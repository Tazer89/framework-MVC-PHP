<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;

define('URL', 'http://127.0.0.1/2023/mvc');

/* Defini o valor padrão das variáveis */
View::init([
    'URL' => URL,
]);

/* Inicia o router */
$obRouter = new Router(URL);

/* Inclui as rotas de páginas */
include __DIR__.'/routes/pages.php';

/* Imprimir o response da rota */
$obRouter->run()
    ->sendResponse();