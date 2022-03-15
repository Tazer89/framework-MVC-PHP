<?php

use \App\Http\Response;
use \App\Controller\Pages;

/* Rota HOME */
$obRouter->get('/', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);

/* Rota SOBRE */
$obRouter->get('/sobre', [
    function(){
        return new Response(200, Pages\About::getAbout());
    }
]);

/* Rota DINÂMICA */
$obRouter->get('/user/{idPage}/{action}', [
    function($idPage, $action){
        return new Response(200, 'Página'.$idPage.' - '.$action);
    }
]);