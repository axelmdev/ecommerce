<?php
/**
* Page
*
* Controller Admin
* 
* @package          Ecommerce
* @subpackage       ./
* @category          Routeur Index
* @author              Axel Mainguy
*/
/**
 * Routeur Index Public
 */
session_start();
$controller = "";
$action = "";

if(!empty($_GET['c']) && !empty($_GET['a'])) {
	$controller = $_GET['c'];
	$action = $_GET['a'];
}

// Page Liste des articles
if($controller == "article" && $action == "list") {
	require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/article.php");
	$controller_article = new Controller_Article();
	$controller_article->listArticle();
} // Page View d'une article
elseif ($controller == "article" && $action == "view") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant du produit</p>";
	} else {
		$idProduit = intval($_GET['id']);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/article.php");
		$controller_article = new Controller_Article();
		$controller_article->viewArticle($idProduit);
	}
} // Page Conditions générales de vente 
elseif ($controller == "article" && $action == "cgv") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/articles/cgv.php");
} // Page Categories + Liste d'articles
elseif ($controller == "article" && $action == "categorie") {
	if(empty($_GET['nom'])) {
		echo "<p>Il manque l'identifiant de la categorie</p>";
	} else {
		$nom_categories = $_GET['nom'];
		require_once ($_SERVER['DOCUMENT_ROOT']."ecommerce/controllers/categorie.php");
		$controller_categorie = new Controller_Categorie();
		$controller_categorie->viewCategoriesShop($nom_categories);
	}
} 
// Page A propos 
elseif ($controller == "page" && $action == "about") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/pages/about.php");
} // Page Form Contact 
elseif ($controller == "page" && $action == "contact") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/pages/contact.php");
} // Page Support technique 
elseif ($controller == "user" && $action == "support") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/support/support.php");
} // Page Inscription 
elseif ($controller == "page" && $action == "inscription") {
	require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
	$controller_newuser = new Controller_Users();
	$controller_newuser->newUser();
} // Page Connexion
elseif ($controller == "page" && $action == "connexion") {
	require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
	$controller_connectuser = new Controller_Users();
	$controller_connectuser->connectUser();
} // Page Deconnexion 
elseif ($controller == "page" && $action == "deconnexion") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
	$controller_deconnectuser = new Controller_Users();
	$controller_deconnectuser->disconnetUser();
} // Page Profil membre
elseif($controller == "user" && $action == "profil") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant de la news</p>";
	} else {
		$id_users = intval($_GET['id']);
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
		$controller_profiluser = new Controller_Users();
		$controller_profiluser->profiluser($id_users);
	}
} // Page Liste commandes membre
elseif($controller == "user" && $action == "commande") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
	$controller_commandeuser = new Controller_Users();
	$controller_commandeuser->commandeuser();
} // Page Panier
elseif($controller == "shop" && $action == "panier") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/panier.php");
	$controller_listpanier = new Controller_Panier();
	$controller_listpanier->viewPanier();
}
// Page Ajout au Panier
elseif($controller == "panier" && $action == "add") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant du produit</p>";
	} else {
		$id_articles = intval($_GET['id']);
		require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/panier.php");
		$controller_listpanier = new Controller_Panier();
		$controller_listpanier->addPanier($id_articles);
	}
} // Page d'accueil
elseif ($controller == "" && $action == "") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/news.php");
	$controller_news = new Controller_News();
	$controller_news->listNews();
}
// Page Views news
elseif ($controller == "news" && $action == "view") {
	if(empty($_GET['id'])) {
		echo "<p>Il manque l'identifiant de la news</p>";
	} else {
		$id_news = intval($_GET['id']);
		require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/news.php");
		$controller_article = new Controller_News();
		$controller_article->viewNews($id_news);
	}
}

?>
