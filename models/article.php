<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/library/db.php");

class Model_Article {
	private $db;

	public function __construct() 
	{
		$this->db = DB::getInstance();
	}
	public function listArticles()
	{
		$query = "SELECT * FROM articles;";
		$resultat = $this->db->get($query);
		return $resultat;
	}
	public function loadArticle($id_articles) {
		$query = "SELECT * FROM articles WHERE id_articles=".$id_articles;
		$resultat = $this->db->get($query);
		return $resultat;
	}
	public function createArticle() {
		$query = "INSERT INTO articles (nom,description,prix,reference,quantite) VALUES (:nom, :description, :prix, :reference, :quantite)";
	}
	public function updateArticle() {

	}
	public function deleteArticle() {

	}

}
?>