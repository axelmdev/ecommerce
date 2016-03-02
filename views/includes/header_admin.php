<?php 
if (!empty($_SESSION['id_users']) || !empty($_SESSION['id_admin']) AND !empty($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $default = "http://www.gravatar.com/avatar/00000000000000000000000000000000";
  $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=10";
}  ?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
	<meta charset="utf-8">
  <link rel="shortcut icon" href="/ecommerce/assets/images/favicon.ico" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyShopCMS - <?php echo $title_page; ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/bootstrap.css">
	<!-- Style Admin CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/style_admin.css">
	<!-- Slider CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/carousel.css">
	<!-- Animation CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/animate.css">
</head>
<body id="top">
	  <nav class="navbar navbar-inverse navbar-fixed-top">
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
            <li class="active"><a href="/ecommerce/home">Retourner sur le site&nbsp;<span class="glyphicon glyphicon-new-window"></span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">&nbsp;Profil <span class="caret"></span></a>
	          <ul class="dropdown-menu">
              <li><img width="30px" height="30px" src="<?php if(!empty($_SESSION['id_admin'])) { echo $grav_url; } else { echo ""; } ?>" alt="" />&nbsp;Bonjour, <?= $_SESSION['pseudo']; ?></li>
	            <li><a href="/ecommerce/admin/deconnect">Deconnexion</a></li>
	          </ul>
	        </li>
          </ul>
        </div>
      </div>
    </nav>