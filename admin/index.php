<?php
session_start();
$controller = "";
$action = "";
if(!empty($_GET['c']) && !empty($_GET['a'])) {
	$controller = $_GET['c'];
	$action = $_GET['a'];
}
if($controller == "article" && $action == "add") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/article.php");
	$controller_admin_addArticle = new Controller_Article();
	$controller_admin_addArticle->addArticle();
	// Page Ajout d'article
} elseif($controller == "article" && $action == "list") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/admin.php");
	$controller_admin_listArticle = new Controller_Admin();
	$controller_admin_listArticle->listeArticles();
	// Page Liste d'article
} elseif($controller == "article" && $action == "delete") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant du produit pour pouvoir supprimer l'article</p>";
	} else {
		$id_articles = intval($_GET['id']);
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/article.php");
		$controller_admin_deleteArticle = new Controller_Article();
		$controller_admin_deleteArticle->deleteArticle($id_articles);
	}
	// Page de suppression d'article
} elseif($controller == "article" && $action == "update") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant du produit</p>";
	} else {
		$id_articles = intval($_GET['id']);
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/article.php");
		$controller_admin_updateArticle = new Controller_Article();
		$controller_admin_updateArticle->updateArticle($id_articles);
	}

	// Page Modifier un article
}
elseif ($controller == "users" && $action == "add") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
	$controller_admin_addUser = new Controller_Users();
	$controller_admin_addUser->addUser();
	// Page Ajout de membre
}
elseif ($controller == "users" && $action == "list") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
	$controller_user = new Controller_Users();
	$controller_user->listUser();
	// Page Liste des membres
}
elseif ($controller == "users" && $action == "delete") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant de l'utilisateur</p>";
	} else {
		$id_users = intval($_GET['id']);
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
		$controller_user = new Controller_Users();
		$controller_user->deleteUser($id_users);
	}
	// Page Suppression des membres
}
elseif ($controller == "news" && $action == "add") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/news.php");
	$controller_admin_addNews = new Controller_News();
	$controller_admin_addNews->addNews();
	// Page Ajout d'Actualité
} elseif ($controller == "news" && $action == "list") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/admin.php");
	$controller_news = new Controller_Admin();
	$controller_news->listeNews();
	// Page Liste des Actualités
}
elseif ($controller == "news" && $action == "delete") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant de la news</p>";
	} else {
		$id_news = intval($_GET['id']);
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/news.php");
		$controller_news = new Controller_News();
		$controller_news->deleteNews($id_news);
	}
	// Page Suppression des news
}
elseif ($controller == "news" && $action == "update") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant de la news</p>";
	} else {
		$id_news = intval($_GET['id']);
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/news.php");
		$controller_news = new Controller_News();
		$controller_news->updateNews($id_news);
	}
	// Page Modification des news
}
elseif ($controller == "categories" && $action == "list") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/categorie.php");
	$controller_categorie = new Controller_Categorie();
	$controller_categorie->listeCategories();
	// Page Liste des categories
}
elseif ($controller == "categories" && $action == "add") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/categorie.php");
	$controller_admin_createCateg = new Controller_Categorie();
	$controller_admin_createCateg->createCategorie();
	// Page Ajout de categorie
}
elseif ($controller == "categories" && $action == "delete") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant de la categorie</p>";
	} else {
		$id_categories = intval($_GET['id']);
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/categorie.php");
		$controller_categorie = new Controller_Categorie();
		$controller_categorie->deleteCategories($id_categories);
	}
	// Page Suppression des categories
}
elseif ($controller == "articlecateg" && $action == "delete") {
	if(empty($_GET['id_articles']) AND empty($_GET['id_categories'])) {
		echo "<p>Il manque l'identifiant de la categorie ou de l'article ou les deux</p>";
	} else {
		$id_categories = intval($_GET['id_categories']);
		$id_articles = intval($_GET['id_articles']);
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/categorie.php");
		$controller_categorie = new Controller_Categorie();
		$controller_categorie->deleteAsso_Art_Categ($id_categories, $id_articles);
	}
	// Page Suppression des association articles et categories
}
elseif ($controller == "admin" && $action == "home") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/admin.php");
	$controller_admin = new Controller_Admin();
	$controller_admin->dashboard();	
} // Page Tableau de bord
elseif ($controller == "admin" && $action == "deconnexion") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/admin.php");
	$controller_deconnectadmin = new Controller_Admin();
	$controller_deconnectadmin->deconnectAdmin();
} // Page Deconnexion
elseif ($controller == "" && $action == "") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/admin.php");
	$controller_admin = new Controller_Admin();
	$controller_admin->connectAdmin();
} // Page de Connexion Admin
?>
