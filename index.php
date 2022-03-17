<?php
	require __DIR__.'/includes/app.php';

	use \App\Http\Router;

	// Inicia o router
	$obRouter = new Router(URL);

	// Inclui as rotas das páginas
	include __DIR__.'/routes/pages.php';

	// Inclui as rotas do painel admin
	include __DIR__.'/routes/admin.php';

	// Imprimi o response da rota
	$obRouter->run()->sendResponse();
