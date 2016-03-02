<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/library/db.php");

class Model_Admin {
	private $db;
	public function __construct() 
	{
		$this->db = DB::getInstance();
	}
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
	public function listArticles()
	{
		$query = "SELECT * FROM articles";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	public function listNews() {
		$query = "SELECT * FROM news";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	/**
	 * Toutes les fonctions pour le Tableau de bord
	 */
	public function countNews() {
		$query = "SELECT COUNT(id_news) AS nbrNews FROM news";
		$resultat = $this->db->get($query);
		return $resultat;
	}
	public function countArticles() {
		$query = "SELECT COUNT(id_articles) AS nbrArticles FROM articles";
		$resultat = $this->db->get($query);
		return $resultat;
	}
	public function countUsers() {
		$query = "SELECT COUNT(id_users) AS nbrUsers FROM users";
		$resultat = $this->db->get($query);
		return $resultat;
	}
	/*public function countComments() {
		$query = "SELECT COUNT(id_commentaires) AS nbrComments FROM commentaires";
		$resultat = $this->db->get($query);
		return $resultat;
	}*/
	public function countCommandes() {
		$query = "SELECT COUNT(id_commandes) AS nbrCommandes FROM commandes";
		$resultat = $this->db->get($query);
		return $resultat;
	}
}
?>