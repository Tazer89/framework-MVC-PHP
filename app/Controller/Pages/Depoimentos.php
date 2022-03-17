<?php
	namespace App\Controller\Pages;

	use \App\Utils\View;
	use \App\Model\Entity\Depoimentos as EntityDepoimentos;
	use \App\DatabaseManager\Pagination;

	class Depoimentos extends Page {

		/**
		 * Método responsável por obter a renderização dos items de depoimentos para a página
		 * @param Request $request
		 * @param Pagination $obPagination
		 * @return string
		 */
		private static function getDepoimentosItems($request, &$obPagination){
			// Depoimentos
			$items = '';

			// Quantidade total de registro (depoimentos)
			$quantidadeTotal = EntityDepoimentos::getDepoimentos(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

			// Página atual
			$queryParams = $request->getQueryParams();
			$paginaAtual = $queryParams['page'] ?? 1;

			// Instância de paginação
			$obPagination = new Pagination($quantidadeTotal, $paginaAtual, 2);

			// Resultados do select no banco de dados
			$results = EntityDepoimentos::getDepoimentos(null, 'id DESC', $obPagination->getLimit());

			// Renderiza o item
			while ($obDepoimento = $results->fetchObject(EntityDepoimentos::class)){
				// View de Depoimentos
				$items .= View::render('pages/depoimentos/item', [
					'nome' => $obDepoimento->name,
					'mensagem' => $obDepoimento->message,
					'data' => date('d/m/Y H:s:i', strtotime($obDepoimento->date)),
				]);
			}

			// Retorna os depoimentos
			return $items;
		}

		/**
		 * Método responsável por retornar o conteúdo (View) da nossa página Depoimentos
		 * @param Request $request
		 * @return string
		 */
		public static function getDepoimentos($request){
			// View de Depoimentos
			$content = View::render('pages/depoimentos', [
				'items' => self::getDepoimentosItems($request, $obPagination),
				'pagination' => parent::getPagination($request, $obPagination),
			]);

			// Retorna a view da página
			return parent::getPage('Depoimentos', $content);
		}

		/**
		 * Método responsável por cadastrar um depoimento
		 * @param Request $request
		 * @return string
		 */
		public static function insertDepoimento($request){
			// Dados do POST
			$postVars = $request->getPostVars();

			// Nova instância de depoimento
			$obDepoimento = new EntityDepoimentos;
			$obDepoimento->name = $postVars['input_name'];
			$obDepoimento->mensagem = $postVars['input_msg'];
			$obDepoimento->cadastrar();

			// Retorna a página de listagem de Depoimentos
			return self::getDepoimentos($request);
		}

	}
