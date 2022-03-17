<?php

	namespace App\Session\Admin;

	use App\Model\Entity\User;

	class Login{

		/**
		 * Método responsável por iniciar a sessão
		 */
		private static function init(){
			// Verifica se já existe a sessão
			if(session_status() != PHP_SESSION_ACTIVE){
				session_start();
			}
		}

		/**
		 * Método responsável por criar a sessão do login do usuário
		 * @param User $obUser
		 * @return boolean
		 */
		public static function login($obUser){
			// Inicia a sessão
			self::init();

			// Cria a sessão do usuário
			$_SESSION['admin']['usuario'] = [
				'id' => $obUser->id,
				'name' => $obUser->name,
				'email' => $obUser->email,
			];

			// Sucesso
			return true;
		}

		/**
		 * Método responsável por verificar se o usuário está logado
		 * @return boolean
		 */
		public static function isLogged(){
			// Inicia a sessão
			self::init();

			// Retorna a verificação
			return isset($_SESSION['admin']['usuario']['id']);
		}

		/**
		 * Método responsável por executar o logout do usuário
		 * @return boolean
		 */
		public static function logout(){
			// Inicia a sessão
			self::init();

			// Deslogar o usuário
			unset($_SESSION['admin']['usuario']);

			// Sucesso
			return true;
		}

	}
