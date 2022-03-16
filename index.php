<?php

require __DIR__.'/vendor/autoload.php';

use App\DotEnv\Environment;
use \App\Http\Router;
use \App\Utils\View;

use App\DatabaseManager\Database;
use App\DatabaseManager\Pagination;

/* Carrega variáveis de ambiente */
Environment::load(__DIR__);

/* Define a constante de URL do projeto */
define('URL', getenv('URL'));

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