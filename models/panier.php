<?php 
require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/library/db.php");

Class Model_Panier {
	private $db;
	public function __construct() 
	{
		$this->db = DB::getInstance();
	}
	/**
	 * Fonction permettant a un utilisateur d'ajouter un produit a son panier
	 */
	public function addPanier($id_articles) {
		$query = 'SELECT id_articles FROM articles WHERE id_articles = '.$id_articles;
		$resultat = $this->db->getPanierAll($query);
		return $resultat;
	}
	public function listPanier($ids) {
		$query = 'SELECT * FROM articles WHERE id_articles IN ('.implode(',',$ids).')';
		$resultat = $this->db->getPanier($query);
		return $resultat;
	}
	
} 




 ?>