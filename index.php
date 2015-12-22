<?php
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
} // Page A propos 
elseif ($controller == "page" && $action == "about") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/pages/about.php");
} // Page Form Contact 
elseif ($controller == "page" && $action == "contact") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/pages/contact.php");
} // Page Support technique 
elseif ($controller == "page" && $action == "support") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/pages/support.php");
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
elseif($controller == "page" && $action == "profil") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
	$controller_profiluser = new Controller_Users();
	$controller_profiluser->profiluser();
} // Page d'accueil
elseif ($controller == "" && $action == "") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/home.php");
}

?>
