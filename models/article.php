<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/library/db.php");

class Model_Article {
	private $db;

	public function __construct() {
		$this->db = DB::getInstance();
	}
	public function listArticles() {
		$query = "SELECT * FROM articles;";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	public function adminArticleView($id_articles) {
		$query = "SELECT pseudo FROM admin INNER JOIN articles ON admin.id_admin = articles.id_admin WHERE id_articles =".$id_articles;
		$resultat = $this->db->get($query);
		return $resultat;
	}
	public function loadArticle($id_articles) {
		$query = "SELECT * FROM articles WHERE id_articles=".$id_articles;
		$resultat = $this->db->get($query);
		return $resultat;
	}
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
	public function deleteArticle($id_articles) {
		$query = 'DELETE FROM articles WHERE id_articles = :id';
		$tab = array(
			'id' => $id_articles
		);
		$this->db->execute($query, $tab);
	}
}
?>