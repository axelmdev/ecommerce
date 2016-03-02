<?php 
require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/library/db.php");

class Model_Categorie {
	private $db;

	public function __construct() {
		$this->db = DB::getInstance();
	}
	public function listCategories() {
		$query = "SELECT * FROM categories;";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	public function listCategoriesHome() {
		$query = "SELECT nom_categories, id_categories FROM categories;";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	public function loadCategorie($id_categories) {
		$query = "SELECT * FROM categories WHERE id_categories=".$id_categories;
		$resultat = $this->db->get($query);
		return $resultat;
	}
	public function categorieOneNews($id_articles) {
		$query= "SELECT categories.id_categories, categories.nom_categories FROM articles INNER JOIN asso_art_categ ON articles.id_articles = asso_art_categ.id_articles INNER JOIN categories ON asso_art_categ.id_categories = categories.id_categories WHERE articles.id_articles = ".$id_articles;
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	public function countArticlesInCategories($id_categories) {
		$query = "SELECT COUNT(articles.id_articles) AS nbr, categories.id_categories, categories.nom_categories FROM articles INNER JOIN asso_art_categ ON articles.id_articles = asso_art_categ.id_articles INNER JOIN categories ON asso_art_categ.id_categories = categories.id_categories WHERE categories.id_categories = ".$id_categories;
		$resultat = $this->db->getAll($query);
		var_dump($resultat);
		return $resultat;
	}
	public function articlesInCategories($nom_categories) {
		$query = "SELECT articles.nom, articles.description, articles.prix, articles.quantite, articles.reference, articles.id_admin, categories.nom_categories, categories.description as content_categories FROM articles INNER JOIN asso_art_categ ON articles.id_articles = asso_art_categ.id_articles INNER JOIN categories ON asso_art_categ.id_categories = categories.id_categories WHERE categories.nom_categories = '" .$nom_categories. "' ;";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	public function createCategorie($nom, $description) {
		if(empty($errors)) {
			$query = "INSERT INTO categories (nom_categories,description) VALUES (:nom, :description)";
			$tab = array(
				'nom' => $nom,
				'description' => $description,
			);
			$this->db->execute($query, $tab);
		}		
	}
	public function deleteCategories($id_categories) {
		$query = 'DELETE FROM categories WHERE id_categories = :id';
		$tab = array(
			'id' => $id_categories
		);
		$resultat = $this->db->execute($query, $tab);
	}
	public function asso_art_categ($id_articles, $id_categories) {
		$requete = "SELECT * FROM asso_art_categ WHERE id_articles = ".$id_articles." AND id_categories = ".$id_categories;
		$exist = $this->db->getPanier($requete);
		if (!empty($exist)) {
			return false;
		} else {
			$query = "INSERT INTO asso_art_categ (id_articles,id_categories) VALUES (:id_articles,:id_categories)";
			$tab = array(
				'id_articles' => $id_articles,
				'id_categories' => $id_categories
			);
			$this->db->execute($query, $tab);
		}
	}
	public function deleteAsso_Art_Categ($id_categories, $id_articles) {
		$query = "DELETE FROM asso_art_categ WHERE id_categories = :id_categories AND id_articles = :id_articles";
		$tab = array(
			'id_categories' => $id_categories,
			'id_articles' => $id_articles
		);
		$this->db->execute($query, $tab);
	}
}
?>