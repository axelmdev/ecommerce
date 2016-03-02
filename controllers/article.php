<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/models/article.php");
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/models/categorie.php");
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
		$articlesAdminDetails = $articles->adminArticleView($id_articles);
		$categories = new Model_Categorie();
		$categorieOneDetails = $categories->categorieOneNews($id_articles);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/articles/view.php");
	}
	/**
	 * - Fonction permettant de créer des articles -
	 */
	public function addArticle() {
		if (!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['url']) AND !empty($_POST['prix']) AND !empty($_POST['quantite']) AND !empty($_POST['id_admin'])) {
			$errors = array();
			$nom = $_POST['title'];
			$description = $_POST['description'];
			$url = $_POST['url'];
			$prix = floatval($_POST['prix']);
			$quantite = $_POST['quantite'];
			$id_admin = $_POST['id_admin'];
			$articles = new Model_Article();
			$addArticle = $articles->createArticle($nom, $description, $url, $prix, $quantite, $id_admin, $errors);
			//header('Location: /ecommerce/admin/article/list');
		}
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/articles/create_article.php");
	}
	/**
	 * - Fonction permettant de modifier des articles -
	 */
	public function updateArticle($id_articles) {
		$articles = new Model_Article();
		$categories = new Model_Categorie();
		if(!empty($_POST)) {
			$id_articles = $_POST['id_articles'];
			$nom = $_POST['title-new'];
			$description = $_POST['description-new'];
			$url = $_POST['url-new'];
			$prix = $_POST['prix-new'];
			$quantite = $_POST['quantite-new'];
			$id_admin = $_POST['id_admin'];
			$categories_post = $_POST['categories'];
			$articles->updateArticle($nom, $description, $url, $prix, $quantite, $id_admin, $id_articles);
			foreach($categories_post as $id_categories) {
				$categories->asso_art_categ($id_articles,$id_categories);
			}
		}
		$articleDetails = $articles->loadArticle($id_articles);
		$articlesAdminDetails = $articles->adminArticleView($id_articles);
		$categorieOneDetails = $categories->categorieOneNews($id_articles);

		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/articles/update_article.php");
	}
	/**
	 * - Fonction permettant de supprimer des articles -
	 */
	public function deleteArticle($id_articles) {
		$articles = new Model_Article();
		$deleteArticle = $articles->deleteArticle($id_articles);
		header('Location: /ecommerce/admin/article/list');
	}

}

?>