<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/models/article.php");
class Controller_Article {
	/**
	 * - Fonction permettant de lister des articles -
	 */
	public function listArticle() {
		$articles = new Model_Article();
		$listeArticles = $articles->listArticles();
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/articles/list.php");
	}
	/**
	 * - Fonction permettant d'avoir la view d'un article -
	 */
	public function viewArticle($id_articles) {
		$articles = new Model_Article();
		$articleDetails = $articles->loadArticle($id_articles);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/articles/view.php");
	}
	/**
	 * - Fonction permettant de créer des articles -
	 */
	public function addArticle() {
		$articles = new Model_Article();
		$addArticle = $articles->addArticle();
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/admin/articles/create_article.php");
	}
	/**
	 * - Fonction permettant de modifier des articles -
	 */
	public function updateArticle() {
		$articles = new Model_Article();
		$updateArticle = $articles->updateArticle();
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/admin/articles/update_article.php");
	}
	/**
	 * - Fonction permettant de supprimer des articles -
	 */
	public function deleteArticle($id_articles) {
		$articles = new Model_Article();
		$deleteArticle = $articles->deleteArticle($id_articles);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/admin/articles/delete_article.php");
	}

}

?>