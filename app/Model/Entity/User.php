<?php
	namespace App\Model\Entity;

	use \App\DatabaseManager\Database;

	class User{

		/**
		 * ID do Usuário
		 * @var integer
		 */
		public $id;

		/**
		 * Nome do Usuário
		 * @var string
		 */
		public $name;

		/**
		 * E-mail do usuário
		 * @var string
		 */
		public $email;

		/**
		 * Password do Usuário
		 * @var string
		 */
		public $pass;

		/**
		 * Método responsável por retornar um usuário com base no email do input
		 * @param $email
		 * @return User
		 */
		public static function getUserbyEmail($email){
			return (new Database('users'))->select('email = "'.$email.'"')->fetchObject(self::class);
		}

	}
