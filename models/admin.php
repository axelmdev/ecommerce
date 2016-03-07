<?php
/**
* Page
*
* Model Admin
* 
* @package          Ecommerce
* @subpackage       Models
* @category          Admin
* @author              Axel Mainguy
*/
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/library/db.php");
/**
 * Class Model_Admin
 */
class Model_Admin {
	/**
	 * DB
	 * @var instance
	 */
	private $db;
	/**
	 * Constructeur
	 */
	public function __construct() 
	{
		$this->db = DB::getInstance();
	}
	/**
	 * Fonction permettant de se connecter au panel administration
	 * @param  string $pseudo   Pseudo
	 * @param  string $password Mot de passe
	 * @return boolean  Renvoie vrai si il existe sinon faux
	 */
	public function connectAdmin($pseudo, $password) {
		$pseudo_secu = htmlspecialchars($pseudo);
		$password_secu = sha1($password);
		$query = 'SELECT * FROM admin WHERE pseudo = "'.$pseudo_secu.'" AND password = "'.$password_secu.'"';
		$result = $this->db->get($query);
		if (!empty($result)) {
			$_SESSION['id_admin'] = $result['id_admin'];
			$_SESSION['pseudo'] = $result['pseudo'];
			$_SESSION['email'] = $result['email'];
			header('Location: /ecommerce/admin/home');
		}else {
			return false;
		}
	}
	/**
	 *
	 * Fonction permettant de selectionner tous les articles
	 *
	 */	
	public function listArticles()
	{
		$query = "SELECT * FROM articles";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	/**
	 * 
	 * Fonction permettant de selectionner toutes les news
	 * 
	 */
	public function listNews() {
		$query = "SELECT * FROM news";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	/**
	 * Compter les news
	 * @return int compter les news
	 */
	public function countNews() {
		$query = "SELECT COUNT(id_news) AS nbrNews FROM news";
		$resultat = $this->db->get($query);
		return $resultat;
	}
	/**
	 * Compter les articles
	 * @return int compter les articles
	 */
	public function countArticles() {
		$query = "SELECT COUNT(id_articles) AS nbrArticles FROM articles";
		$resultat = $this->db->get($query);
		return $resultat;
	}
	/**
	 * Compter les users
	 * @return int compter les users
	 */
	public function countUsers() {
		$query = "SELECT COUNT(id_users) AS nbrUsers FROM users";
		$resultat = $this->db->get($query);
		return $resultat;
	}
}
?>