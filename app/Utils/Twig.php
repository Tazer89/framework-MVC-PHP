<?php

    namespace App\Utils;

    class Twig{
        
        private static $vars = [];
        
        public static function init($vars = []){
            self::$vars = URL;
        }
        
        public static function render($page, $params){
            
            $loader = new \Twig\Loader\FilesystemLoader(
                array(
                    __DIR__.'/../../resources/view',
                    __DIR__.'/../../resources/view/pages',
                ));            
            
            $twig = new \Twig\Environment($loader, [
                'debug' => false,
                'charset' => 'utf-8',
                'cache' => __DIR__.'/../../cache',
                'auto_reload' => true,
                'strict_variables' => 'false',
                'autoescape' => true,
                'optimizations' => '-1',
            ]);

            return $twig->render($page, $params ?? []);
        }
    }