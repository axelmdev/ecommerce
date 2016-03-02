<?php 
require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/models/categorie.php");
class Controller_Categorie {
	/**
	 * - Fonction permettant de lister les categories dans le panel admin -
	 */
	public function listeCategories() {
		$categories = new Model_Categorie();
		$listeCategories = $categories->listCategories();
		require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/views/admin/categories/liste_categories.php");
	}
	/** 
	 * - Fonction permettant de lister les categories ( Menu, page creation article, ... ) -
	 */
	public function listeCategoriesHome() {
		$categories = new Model_Categorie();
		$listeCategories = $categories->listCategoriesHome();
		return $listeCategories;
	}
	/**
	 * - Fonction permettant d'avoir la view d'un categorie -
	 */
	public function viewCategorie($id_articles) {
		$categories = new Model_Categorie();
		$categorieDetails = $categories->loadCategorie($id_categorie);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/categories/view_categories.php");
	}
	/**
	 * - Fonction permettant de voir les articles dans une categorie 
	 */
	public function viewCategoriesShop($nom_categories) {
		$categories = new Model_Categorie();
		$categoriesViewOneDetails = $categories->articlesInCategories($nom_categories);
		if (!empty($categoriesViewOneDetails)) {
			require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/views/categories/categories.php");
		} else {
			$categoriesViewOneDetails = array();
			header('Location: /ecommerce/home');
		}
	}
	/**
	 * - Fonction permettant de creer une categorie 
	 */
	public function createCategorie() {
		if (!empty($_POST['nom']) && !empty($_POST['description'])) {
			$categories = new Model_Categorie();
			$nom = $_POST['nom'];
			$description = $_POST['description'];
			$createCateg = $categories->createCategorie($nom, $description);
			header('Location: /ecommerce/admin/categories/list');
		}
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/categories/create_categories.php");
	}
	/**
	 * - Fonction permettant de supprimer une categorie 
	 */
	public function deleteCategories($id_categorie) {
		$categories = new Model_Categorie();
		$deleteCategories = $categories->deleteCategories($id_categorie);
		header('Location: /ecommerce/admin/categories/list');
	}
	public function deleteAsso_Art_Categ($id_categories, $id_articles) {
		$categories = new Model_Categorie();
		$deleteAsso_Art_Categ = $categories->deleteAsso_Art_Categ($id_categories, $id_articles);
		header('Location: /ecommerce/admin/article/list');
	}
}
?>