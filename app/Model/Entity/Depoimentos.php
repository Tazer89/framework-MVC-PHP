<?php
	namespace App\Model\Entity;

	use \App\DatabaseManager\Database;

	class Depoimentos{

		/**
		 * ID do Depoimento
		 * @var integer
		 */
		public $id;

		/**
		 * Nome do usuário que fez o depoimento
		 * @var string
		 */
		public $name;

		/**
		 * Mensagem do depoimento
		 * @var string
		 */
		public $mensagem;

		/**
		 * Data da publicação do depoimento
		 * @var string
		 */
		public $data;

		/**
		 * Método responsável por cadastrar a instância atual no banco de dados
		 * @return boolean
		 */
		public function cadastrar(){
			// Defini a data
			$this->data = date('Y-m-d H:i:s');

			// Inseri o depoimento no banco de dados
			$this->id = (new Database('depoimentos'))->insert([
				'name' => $this->name,
				'message' => $this->mensagem,
				'date' => $this->data,
			]);

			// Sucesso
			return true;
		}

		/**
		 * Método responsável por retornar Depoimentos
		 * @param string $where
		 * @param string $order
		 * @param string $limit
		 * @param string $fields
		 * @return PDOStatement
		 */
		public static function getDepoimentos($where = null, $order = null, $limit = null, $fields = '*'){
			return (new Database('depoimentos'))->select($where, $order, $limit, $fields);
		}

	}
