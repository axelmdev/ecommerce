<?php 
class DB {
	private static $_instance = null;
	public $test = "";

	private function __construct() {
		$this->connexionBDD = new PDO("mysql:host=localhost;dbname=ecommerce", "root", "");
		$this->connexionBDD->exec('SET NAMES utf8');
		$this->connexionBDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public static function getInstance() {
		if(is_null(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}
	public function getAll($query) {
		$reponse = self::$_instance->connexionBDD->query($query);
		$resultat = $reponse->fetchAll();
		return $resultat;
	}
	public function get($query) {
		$reponse = self::$_instance->connexionBDD->query($query);
		$resultat = $reponse->fetch();
		return $resultat;
	}
	public function getPanierAll($query) {
		$reponse = self::$_instance->connexionBDD->query($query);
		$resultat = $reponse->fetchAll(PDO::FETCH_OBJ);
		return $resultat;
	}
	public function getPanier($query) {
		$reponse = self::$_instance->connexionBDD->query($query);
		$resultat = $reponse->fetchAll(PDO::FETCH_OBJ);
		return $resultat;
	}
	public function execute($query, $tab) {
		$response = self::$_instance->connexionBDD->prepare($query);
		$result = $response->execute($tab);
		return $result;
	}

}
?>