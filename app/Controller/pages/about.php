<?php
    namespace App\Controller\Pages;

    use \App\Utils\Twig;
    use \App\Model\Entity\Organization;

    class About extends Page{
        
        public static function getAbout(){
            
            $obOrganization = new Organization;
            
            $params = array(
                'url' => URL,
                'title' => 'MVC Mode - by Lucas Giovanni',
                'name' => $obOrganization->name,
                'description' => $obOrganization->description,
                'site' => $obOrganization->site,
            );
            $tag = '.html.twig';
            echo Twig::render('about.html.twig', $params);
        }
        
    }