<?php

	namespace Model;
	use PDO;
	use Exception;

	/**
	 * ConnectionBDD class
	 * This class is responsible for establishing a connection to the database.
	 * It uses PDO for database interactions and handles connection errors gracefully.
	 */
	class ConnectionBdd{

		private static $localhost = 'localhost';
		private static $dbname = 'myevents';
		private static $username = 'root';
		private static $password = '';

		public static function connecter(){
			$database = null;
			try{
				$bdd = new PDO("mysql:host=".self::$localhost.";dbname=".self::$dbname, self::$username, self::$password);
				if($bdd){
					$database = $bdd;
				}
			}catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
			return $database;
		}
	}
