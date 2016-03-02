<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/models/admin.php");
class Controller_Admin {
	/**
	 * Fonction permettant de se connecter au panel admin
	 */
	public function connectAdmin() {
			$errors = array();
			if(!empty($_POST)) {
				$pseudo = $_POST['pseudo'];
				$password = $_POST['password'];
				$admin = new Model_Admin();
				$connect_admin = $admin->connectAdmin($pseudo, $password);
				if(empty($connect_admin)) {
					$errors['dontexist'] = "Vous n'existez pas";
				}
			}
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/login.php");
	}
	/**
	 * Fonction permettant de se deconneter du panel admin
	 */
	public function deconnectAdmin() {
		unset($_SESSION['id_admin']);
		unset($_SESSION['pseudo']);
		header('Location: /ecommerce/home');
	}
	/**
	 * Fonction permettant la liste d'articles dans le panel admin
	 */
	public function listeArticles(){
		$articles = new Model_Admin();
		$listeArticles = $articles->listArticles();
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/articles/liste_article.php");
	}
	/**
	 * Fonction permettant la liste des news dans le panel admin 
	 */
	public function listeNews(){
		$news = new Model_Admin();
		$listeNews = $news->listNews();
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/news/liste_news.php");
	}
	/**
	 * Fonction permettant d'effectuer le comptage sur le dashboard 
	 */
	public function dashboard() {
		$admin = new Model_Admin();
		$dashboardCountNews = $admin->countNews();
		$dashboardCountArticles = $admin->countArticles();
		$dashboardCountUsers = $admin->countUsers();
		/*$dashboardCountComments = $admin->countComments();*/
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/home.php");
	}
 


}
?>