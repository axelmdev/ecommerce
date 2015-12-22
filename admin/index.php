<?php
$controller = "";
$action = "";
if(!empty($_GET['c']) && !empty($_GET['a'])) {
	$controller = $_GET['c'];
	$action = $_GET['a'];
}
if($controller == "article" && $action == "add") 
{
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/article.php");
} elseif ($controller == "users" && $action == "list") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/users.php");
	$controller_user = new Controller_Users();
	$controller_user->listUser();
} elseif ($controller == "admin" && $action == "home") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/admin/home.php");
} elseif ($controller == "" && $action == "") {
	require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/controllers/admin.php");
	$controller_user = new Controller_Admin();
	$controller_user->connectAdmin();
}
?>
