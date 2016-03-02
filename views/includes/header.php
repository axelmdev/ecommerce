<?php
if (!empty($_SESSION['id_users']) || !empty($_SESSION['id_admin']) AND !empty($_SESSION['email'])) {
	$email = $_SESSION['email'];
	$default = "http://www.gravatar.com/avatar/00000000000000000000000000000000";
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=10";
} 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="/ecommerce/assets/images/favicon.ico" type="image/x-icon" />
	<title>MyShopCMS - <?php echo $title_page; ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/bootstrap.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/style.css">
	<!-- Slider CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/carousel.css">
	<!-- Animation CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/animate.css">
</head>
	<body id="top">
		<header class="header">
		    <div class="container">
		        <div class="row">
		            <div class="col-xs-12">
						<div class="header__logo animated">
							<a href="/ecommerce/home"><img src="/ecommerce/assets/images/logo.png" alt="logo">&nbsp;MyShopCMS&nbsp;<img src="/ecommerce/assets/images/logo.png" alt="logo"></a>
						</div>
					    <nav class="navbar-inverse navbar navbar-static-top">
					      <div class="container-fluid">
					        <div class="navbar-header">
					          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					            <span class="sr-only">Toggle navigation</span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					            <span class="icon-bar"></span>
					          </button>
					        </div>
					        <div id="navbar" class="navbar-collapse collapse">
					          <ul class="nav navbar-nav">
					            <li<?php if ($title_page == 'Accueil') {echo ' class="active"';} ?>><a href="/ecommerce/home"><span class="glyphicon glyphicon-home"></span>&nbsp;Accueil</a></li>
					            <li<?php if ($title_page == 'A propos') {echo ' class="active"';} ?>><a href="/ecommerce/about"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;A propos</a></li>
					            <li class="dropdown">
						          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Catalogue <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						            <?php 
							            require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/controllers/categorie.php");
							            $controller_categorie = new Controller_Categorie();
							            $listeCategories = $controller_categorie->listeCategoriesHome();
							            foreach($listeCategories as $categorie) {
							              echo '<li><a href="/ecommerce/article/categorie/'.strtolower($categorie['nom_categories']).'">'.$categorie['nom_categories'].'</a></li>';
							            }
							         ?>
						            <li><a href="/ecommerce/shop/list">Voir tous les articles</a></li>
						          </ul>
						        </li>
					            <li<?php if ($title_page == 'Contact') {echo ' class="active"';} ?>><a href="/ecommerce/contact"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Contact</a></li>
					          </ul>
					          <ul class="nav navbar-nav navbar-right">
					          <?php if(empty($_SESSION['id_users'])) { ?>
					          	<li><a href="/ecommerce/connect">Se connecter</a></li>
					          	<li><a href="/ecommerce/signin">S'inscrire</a></li>
					          <?php } else { ?>
					          <li class="dropdown">
						          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>&nbsp;Espace Membre <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						          	<li><a href=""><img width="30px" height="30px" src="<?php if(!empty($_SESSION['id_users'])) { echo $grav_url; } else { echo ""; } ?>" alt="" />&nbsp;Bonjour <?=$_SESSION['username']; ?></a>
						            <li><a href="/ecommerce/user/profil/<?= $_SESSION['id_users']; ?>">Mon profil</a></li>
						            <li><a href="/ecommerce/user/commande">Mes commandes</a></li>
						            <li><a href="/ecommerce/deconnect">Deconnexion</a></li>
						          </ul>
						        </li>
						      <?php } ?>
						      	<li>
						      	<?php if(!empty($_SESSION['id_users']) || !empty($_SESSION['id_admins'])) { ?>
						      		<a href="/ecommerce/shop/panier">
						      			<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Panier&nbsp;
							      		<span class="badge" id="count">
									      	<?php 
									      		if(!empty($_SESSION['id_users'])) {
									      		require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/controllers/panier.php");
									      		$controller_panier = new Controller_Panier();
									      		$count = $controller_panier->count();
									      		echo $count;
									      		} else {
									      			echo "0";
									      		}	
									      	?>
									    </span>
								    </a>
								<?php } else { ?>
									<a onclick="alert('Vous devez être connecter pour pouvoir utiliser le panier')">
						      			<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Panier&nbsp;
							      		<span class="badge" id="count">0</span>
							      	</a>
							    <?php } ?>
								</li>
					          	<?php if(!empty($_SESSION['id_admin'])) { ?>
								<li class="dropdown">
						          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tasks"></span>&nbsp;Administration <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						          	<li><a href=""><img width="30px" height="30px" src="<?php if(!empty($_SESSION['id_admin'])) { echo $grav_url; } else { echo ""; } ?>" alt="" />&nbsp;Bonjour <?=$_SESSION['pseudo']; ?></a></li>
						            <li><a href="/ecommerce/admin/home"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Tableau de bord</a></li>
						            <li><a href="/ecommerce/admin/deconnect">Deconnexion</a></li>
						          </ul>
						        </li>
					          	<?php } ?>
					          </ul>
					        </div><!--/.nav-collapse -->
					      </div>
					    </nav>
		            </div>
		        </div>
		    </div>
	    </header>