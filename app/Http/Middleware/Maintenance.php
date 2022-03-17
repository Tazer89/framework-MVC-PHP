<?php

	namespace App\Http\Middleware;

	class Maintenance{

		/**
		 * Método responsável por executar o middleware
		 * @param Request $request
		 * @param Closure $next
		 * @return Response
		 */
		public function handle($request, $next){
			// Verifica o status de manutenção do website
			if(getenv('MAINTENANCE') == 'true'){
				throw new \Exception('Página em manutenção. Tente novamente mais tarde.', 200);
			}

			// Executa o próximo nível do middleware
			return $next($request);
		}
	}
