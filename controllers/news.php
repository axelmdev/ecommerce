<?php
require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/models/news.php");
Class Controller_News {
	/**
	 * - Fonction permettant de lister des news -
	 */
	public function listNews() {
		$news = new Model_News();
		$listeNews = $news->listNews();
		$admListeNews = $news->adminListNews();
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/home.php");
	}
	/**
	 * - Fonction permettant d'avoir la view d'une news -
	 */
	public function viewNews($id_news) {
		$news = new Model_News();
		$newsDetails = $news->loadNews($id_news);
		$newsAdminDetails = $news->adminNewsView($id_news);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/news/view.php");
	}
	public function addNews() {
		if (!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['url']) AND !empty($_POST['id_admin'])) {
			$title = $_POST['title'];
			$content = $_POST['content'];
			$url = $_POST['url'];
			$id_admin = $_POST['id_admin'];
			$news = new Model_News();
			$addNews = $news->addNews($title, $content, $url, $id_admin);
			header('Location: /ecommerce/admin/news/list');
		}
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/news/create_news.php");
	}
	public function deleteNews($id_news) {
		$news = new Model_News();
		$deleteNews = $news->deleteNews($id_news);
		header('Location: /ecommerce/admin/news/list');
	}
	public function updateNews($id_news) {
		$news = new Model_News();
		if(!empty($_POST)) {
			$id_news = $_POST['id_news'];
			$title = $_POST['title-new'];
			$content = $_POST['content-new'];
			$url = $_POST['url-new'];
			$id_admin = $_POST['id_admin'];
			$news->updateNews($title, $content, $url, $id_admin, $id_news);
		}
		$newsDetails = $news->loadNews($id_news);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/news/update_news.php");
	}
} 
?>