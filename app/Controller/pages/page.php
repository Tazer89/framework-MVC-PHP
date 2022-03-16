<?php
    namespace App\Controller\Pages;

    use \App\Utils\Twig;

    class Page{
        
        /*
        * Método responsável por retornar o conteúdo (view) da página genérica
        * @return string
        */
        public static function getPage($page, $params){
            echo Twig::render($page, $params);
        }
        
    }