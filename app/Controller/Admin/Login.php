<?php

	namespace App\Controller\Admin;

	use App\Http\Request;
	use App\Model\Entity\User;
	use App\Utils\View;
	use App\Session\Admin\Login as SessionAdminLogin;

	class Login extends Page{

		/**
		 * Método responsável por retornar a renderização da página de login
		 * @param Request $request
		 * @param string $errorMessage
		 * @return string
		 */
		public static function getLogin($request, $errorMessage = null){
			// Status
			$status = !is_null($errorMessage) ? View::render('admin/login/status', [
				'mensagem' => $errorMessage,
			]) : '';

			// Conteúdo da página de login
			$content = View::render('admin/login', [
				'status' => $status,
			]);

			// Retorna a página completa
			return parent::getPage('Login', $content);
		}

		/**
		 * Método responsável por definir o login do usuário
		 * @param Request $request
		 */
		public static function setLogin($request){
			// Post Vars
			$postVars = $request->getPostVars();
			$email_user = $postVars['email'] ?? '';
			$pass_user = $postVars['password'] ?? '';

			// Busca o usuário pelo E-mail
			$obUser = User::getUserbyEmail($email_user);
			if(!$obUser instanceof User){
				return self::getLogin($request, 'E-mail ou password inválidos.');
			}

			// Verifica a senha do usuário
			if(!password_verify($pass_user, $obUser->pass)){
				return self::getLogin($request, 'E-mail ou password inválidos.');
			}

			// Cria a sessão de login
			SessionAdminLogin::login($obUser);

			// Redireciona o usuário para a página principal do admin
			$request->getRouter()->redirect('/admin');
		}

		/**
		 * Método responsável por deslogar o usuário
		 * @param Request $request
		 * @return void
		 */
		public static function setLogout($request){
			// Destroi a sessão de login
			SessionAdminLogin::logout();

			// Redireciona o usuário para a página de login
			$request->getRouter()->redirect('/admin/login');
		}

	}
