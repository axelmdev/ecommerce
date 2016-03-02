<?php
require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/library/db.php");
class Model_News {
	private $db;
	public function __construct() 
	{
		$this->db = DB::getInstance();
	}
	public function listNews() {
		$query = "SELECT * FROM news ORDER BY id_news DESC";
		$resultat = $this->db->getAll($query);
		return $resultat;
	}
	public function adminListNews() {
		$query = "SELECT pseudo FROM admin INNER JOIN news ON admin.id_admin = news.id_admin";
		$resultat = $this->db->get($query);
		return $resultat;
	}
	public function adminNewsView($id_news) {
		$query = "SELECT pseudo FROM admin INNER JOIN news ON admin.id_admin = news.id_admin WHERE id_news =".$id_news;
		$resultat = $this->db->get($query);
		return $resultat;
	}
	public function loadNews($id_news) {
		$query = "SELECT * FROM news WHERE id_news=".$id_news;
		$resultat = $this->db->get($query);
		return $resultat;
	}
	public function addNews($title, $content, $url, $id_admin) {
		$nom_secu = htmlspecialchars($title);
		$url_secu = htmlspecialchars($url);
		$query = "INSERT INTO news (title,content,url,id_admin) VALUES (:title, :content, :url, :id_admin)";
		$tab = array(
			'title' => $nom_secu,
			'content' => $description,
			'url' => $url_secu,
			'id_admin' => $id_admin
		);
		$this->db->execute($query, $tab);
	}
	public function deleteNews($id_news) {
		$query = 'DELETE FROM news WHERE id_news = :id';
		$tab = array(
			'id' => $id_news
		);
		$resultat = $this->db->execute($query, $tab);
	}
	public function updateNews($title, $content, $url, $id_admin, $id_news) {
		$title_secu = htmlspecialchars($title);
		$query = 'UPDATE news SET title = :title, content = :content, url = :url, id_admin = :id_admin WHERE id_news = :id';
		$tab = array(
			'title' => $title_secu,
			'content' => $content,
			'url' => $url,
			'id_admin' => $id_admin,
			'id' => $id_news
		);
		$resultat = $this->db->execute($query,$tab);
	}
}
?>