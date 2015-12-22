<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
						<div class="header__logo animated infinite tada">
							<a href="/">~~ MyShopCMS ~~</a>
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
					            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Accueil</a></li>
					            <li><a href="index.php?c=page&a=about"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;A propos</a></li>
					            <li class="dropdown">
						          <a href="index.php?c=article&a=list" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Shop <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						            <li><a href="#">Action</a></li>
						            <li><a href="#">Aventure</a></li>
						            <li><a href="#">FreeWorld</a></li>
						            <li role="separator" class="divider"></li>
						            <li><a href="#"></a></li>
						            <li role="separator" class="divider"></li>
						            <li><a href="#"></a></li>
						          </ul>
						        </li>
					            <li><a href="index.php?c=page&a=contact"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Contact</a></li>
					          </ul>
					          <ul class="nav navbar-nav navbar-right">
					          <?php if(empty($_SESSION)) ?>
					          	<li><a href="index.php?c=page&a=connexion">Se connecter</a></li>
					          	<li><a href="index.php?c=page&a=inscription">S'inscrire</a></li>
					          </ul>
					        </div><!--/.nav-collapse -->
					      </div>
					    </nav>
		            </div>
		        </div>
		    </div>
	    </header>