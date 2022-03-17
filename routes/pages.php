<?php

	use \App\Http\Response;
	use \App\Controller\Pages;

	//Rota HOME (resources/view/pages)
	$obRouter->get('/', [
		function(){
			return new Response(200, Pages\Home::getHome());
		}
	]);

	//Rota SOBRE (resources/view/pages)
	$obRouter->get('/sobre', [
		function(){
			return new Response(200, Pages\Sobre::getSobre());
		}
	]);

	//Rota DEPOIMENTOS (resources/view/pages) -> GET
	$obRouter->get('/depoimentos', [
		function($request){
			return new Response(200, Pages\Depoimentos::getDepoimentos($request));
		}
	]);

	//Rota DEPOIMENTOS (resources/view/pages) -> INSERT
	$obRouter->post('/depoimentos', [
		function($request){
			return new Response(200, Pages\Depoimentos::insertDepoimento($request));
		}
	]);

	//Rota DINÂMICA (resources/view/pages)
	$obRouter->get('/pagina/{idPagina}/{acao}', [
		function($idPagina, $acao){
			return new Response(200, 'Página '.$idPagina.' - '.$acao);
		}
	]);
