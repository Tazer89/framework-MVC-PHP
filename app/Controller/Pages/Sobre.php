<?php
	namespace App\Controller\Pages;

	use \App\Utils\View;
	use \App\Model\Entity\Organization;

	class Sobre extends Page {

		/**
		 * Método responsável por retornar o conteúdo (View) da nossa página Sobre
		 * @return string
		 */
		public static function getSobre(){
			$obOrganization = new Organization;

			// View da Home
			$content = View::render('pages/sobre', [
				'name' => $obOrganization->name,
				'description' => $obOrganization->description,
				'site' => $obOrganization->site,
			]);
			// Retorna a view da página
			return parent::getPage('Sobre', $content);
		}

	}
