<?php

	namespace App\Http\Middleware;

	use App\Http\Request;
	use App\Http\Response;
	use App\Session\Admin\Login as SessionAdminLogin;

	class RequireAdminLogout{

		/**
		 * Método responsável por
		 * @param Request $request
		 * @param Closure $next
		 * @return Response
		 */
		public static function handle($request, $next){
			// Verifica se o usuário está logado
			if(SessionAdminLogin::isLogged()){
				$request->getRouter()->redirect('/admin');
			}

			// Continua a execução
			return $next($request);
		}
	}
