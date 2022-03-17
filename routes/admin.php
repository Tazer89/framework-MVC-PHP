<?php

	use \App\Http\Response;
	use \App\Controller\Admin;

	//Rota ADMIN HOME (resources/view/pages)
	$obRouter->get('/admin', [
		'middlewares' => [
			'required-admin-login'
		],
		function(){
			return new Response(200, 'Admin :D');
		}
	]);

	//Rota LOGIN (resources/view/pages)
	$obRouter->get('/admin/login', [
		'middlewares' => [
			'required-admin-logout'
		],
		function($request){
			return new Response(200, Admin\Login::getLogin($request));
		}
	]);

	//Rota LOGIN (resources/view/pages)
	$obRouter->post('/admin/login', [
		'middlewares' => [
			'required-admin-logout'
		],
		function($request){
			return new Response(200, Admin\Login::setLogin($request));
		}
	]);

	//Rota LOGOUT (resources/view/pages)
	$obRouter->get('/admin/logout', [
		'middlewares' => [
			'required-admin-login'
		],
		function($request){
			return new Response(200, Admin\Login::setLogout($request));
		}
	]);
