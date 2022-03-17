<?php
	namespace App\Controller\Pages;

	use App\DatabaseManager\Pagination;
	use App\Http\Request;
	use \App\Utils\View;

class Page{

	/**
	 * Método responsável por renderizar o topo da página
	 * @return string
	 */
	private static function getHeader(){
		return View::render('pages/header');
	}

	/**
	 * Método responsável por renderizar o rodapé da página
	 * @return string
	 */
	private static function getFooter(){
		return View::render('pages/footer');
	}

	/**
	 * Método responsável por renderizar o layout de paginação
	 * @param Request $request
	 * @param Pagination $obPagination
	 * @return string
	 */
	public static function getPagination($request, $obPagination){
		// Páginas
		$pages = $obPagination->getPages();

		// Verifica a quantidade de páginas
		if(count($pages) <= 1) return '';

		// Links
		$links = '';

		// Url atual (sem GETS)
		$url = $request->getRouter()->getCurrentUrl();

		// GET
		$queryParams = $request->getQueryParams();

		// Renderizando os links
		foreach ($pages as $page){
			// Altera página
			$queryParams['page'] = $page['page'];

			// Link
			$link = $url.'?'.http_build_query($queryParams);

			// View
			$links .= View::render('pages/pagination/link', [
				'page' => $page['page'],
				'link' => $link,
				'active' => $page['current'] ? 'active' : '',
			]);
		}

		// Renderiza box de páginação
		return View::render('pages/pagination/box', [
			'links' => $links,
		]);
	}

	/**
	 * Método responsável por retornar o conteúdo (View) da nossa página genérica
	 * @return string
	 */
	public static function getPage($title, $content){
		return View::render('pages/page', [
			'header' => self::getHeader(),
			'title' => $title,
			'content' => $content,
			'footer' => self::getFooter(),
		]);
	}

}
