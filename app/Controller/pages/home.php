<?php
    namespace App\Controller\Pages;

    use \App\Utils\View;
    use \App\Model\Entity\Organization;

    class Home extends Page{
        
        public static function getHome(){
            
            $obOrganization = new Organization;
            
            $content = View::render('pages/home', [
                'title' => 'MVC Mode - by Lucas Giovanni',
                'name' => $obOrganization->name,
                'description' => $obOrganization->description,
                'site' => $obOrganization->site,
            ]);
            
            /* Retorna a view da página */
            return parent::getPage('MVC Mode - by Lucas Giovanni', $content);
        }
        
    }