<?php
/**
* Page
*
* Model Article
* 
* @package          Ecommerce
* @subpackage       Models
* @category          Article
* @author              Axel Mainguy
*/
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/library/db.php");
/**
 * Class Model_Article
 */
class Model_Article {
	/**
	 * DB
	 * @var instance
	 */
	private $db;
	/**
	 * Constructeur de la class
	 */
	public function __construct() {
		$this->db = DB::getInstance();
	}
	/**
	 * Fonction permettant de selectionner tous les articles
	 * @return array Renvoie tous les articles
	 */
	public function listArticles() {
		$query = "SELECT * FROM articles;";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	/**
	 * Fonction permettant de selectionner le pseudo admin avec la new en question
	 * @param  Int $id_articles Id de l'article
	 * @return array Renvoie le pseudo de l'admin en question
	 */
	public function adminArticleView($id_articles) {
		$query = "SELECT pseudo FROM admin INNER JOIN articles ON admin.id_admin = articles.id_admin WHERE id_articles =".$id_articles;
		$resultat = $this->db->get($query);
		return $resultat;
	}
	/**
	 * Fonction permettant de selectionner tous les composants d'une news en particulier avec son id
	 * @param  Int $id_articles Id de l'article
	 * @return array Données de l'article
	 */
	public function loadArticle($id_articles) {
		$query = "SELECT * FROM articles WHERE id_articles=".$id_articles;
		$resultat = $this->db->get($query);
		return $resultat;
	}
	/**
	 * Fonction permettant de créer des articles
	 * @param  Varchar $nom         Nom de l'article
	 * @param  Text $description Description de l'article
	 * @param  Int $prix        Prix de l'article
	 * @param  Int $quantite    Quantité de l'article
	 * @param  Varchar $url         Permalien de l'article
	 * @param  Int $id_admin    Id de l'admin qui crée l'article
	 * @param  array $errors      Tableau d'erreurs
	 */
	public function createArticle($nom, $description, $prix, $quantite, $url, $id_admin, $errors) {
		if(empty($errors)) {
			$nom_secu = htmlspecialchars($nom);
			$prix_secu = htmlspecialchars($prix);
			$quantite_secu = htmlspecialchars($quantite);
			$reference = rand(100,1000);
			$url_secu = htmlspecialchars($url);
			$query = "INSERT INTO articles (nom,description,prix,reference,quantite,url,id_admin) VALUES (:nom, :description, :prix, :reference, :quantite, :url, :id_admin)";
			$tab = array(
				'nom' => $nom_secu,
				'description' => $description,
				'prix' => $prix,
				'reference' => $reference,
				'quantite' => $quantite,
				'url' => $url_secu,
				'id_admin' => $id_admin
			);
			$this->db->execute($query, $tab);
		}
	}
	/**
	 * Fonction permettant de mettre à jour un article
	 * @param  Varchar $nom         Nom de l'article
	 * @param  Text $description Description de l'article 
	 * @param  Varchar $url         Permalien de l'article
	 * @param  Float $prix        Prix de l'article
	 * @param  Int $quantite    Quantite de l'article
	 * @param  Int $id_admin    Id de l'admin qui crée l'article
	 * @param  Int $id_articles Id de l'article
	 */
	public function updateArticle($nom, $description, $url, $prix, $quantite, $id_admin, $id_articles) {
		$nom_secu = htmlspecialchars($nom);
		$query = 'UPDATE articles SET nom = :nom, description = :description, prix = :prix, quantite = :quantite, url = :url, id_admin = :id_admin WHERE id_articles = :id';
		$tab = array(
			'nom' => $nom_secu,
			'description' => $description,
			'prix' => $prix,
			'quantite' => $quantite,
			'url' => $url,
			'id_admin' => $id_admin,
			'id' => $id_articles
		);
		$resultat = $this->db->execute($query,$tab);
	}
	/**
	 * Fonction permettant de supprimer un article avec son id
	 * @param Int $id_articles ID de l'article
	 */
	public function deleteArticle($id_articles) {
		$query = 'DELETE FROM articles WHERE id_articles = :id';
		$tab = array(
			'id' => $id_articles
		);
		$this->db->execute($query, $tab);
	}
}
?>