<?php
/**
* Page
*
* library DB
* 
* @package          Ecommerce
* @subpackage       library
* @category          DB
* @author              Axel Mainguy
*/
/**
 * Class DB
 */
class DB {
	/**
	 * Instance
	 * @var null
	 */
	private static $_instance = null;
	
	/**
	 * Constructeur
	 */
	private function __construct() {
		$this->connexionBDD = new PDO("mysql:host=localhost;dbname=ecommerce", "root", "");
		$this->connexionBDD->exec('SET NAMES utf8');
		$this->connexionBDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	/**
	 * Fonction qui recupère l'instance de connexion
	 * @return string Retourne l'instance
	 */
	public static function getInstance() {
		if(is_null(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}
	/**
	 * Permet de récup toutes les valeurs
	 * @param  array $query la requete
	 * @return array Retourne toutes les valeurs de la requete
	 */
	public function getAll($query) {
		$reponse = self::$_instance->connexionBDD->query($query);
		$resultat = $reponse->fetchAll();
		return $resultat;
	}
	/**
	 * Permet de recup une valeur par une valeur
	 * @param  array $query La requete
	 * @return array Retourne le resultat
	 */
	public function get($query) {
		$reponse = self::$_instance->connexionBDD->query($query);
		$resultat = $reponse->fetch();
		return $resultat;
	}
	/**
	 * Permet de recup toutes les valeurs en objet
	 * @param  [type] $query [description]
	 * @return [type]        [description]
	 */
	public function getPanierAll($query) {
		$reponse = self::$_instance->connexionBDD->query($query);
		$resultat = $reponse->fetchAll(PDO::FETCH_OBJ);
		return $resultat;
	}
	/**
	 * Permet de recup une valeur par une valeur en objet
	 * @param  object $query requete
	 * @return object resultat requete
	 */
	public function getPanier($query) {
		$reponse = self::$_instance->connexionBDD->query($query);
		$resultat = $reponse->fetchAll(PDO::FETCH_OBJ);
		return $resultat;
	}
	/**
	 * Permet d'executer requete avec un tableau
	 * @param  array $query Requete
	 * @param  array $tab  Valeur de la requete
	 * @return array       Resultat requete
	 */
	public function execute($query, $tab) {
		$response = self::$_instance->connexionBDD->prepare($query);
		$result = $response->execute($tab);
		return $result;
	}

}
?>