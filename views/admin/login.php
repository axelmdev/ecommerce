<?php 
/**
 * Page Login Admin
 */
if(empty($_SESSION['id_admin'])) { ?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyShopCMS - Login Admin</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/bootstrap.css">
	<!-- Style Admin CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/style_admin.css">
	<!-- Slider CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/carousel.css">
	<!-- Animation CSS -->
	<link rel="stylesheet" href="/ecommerce/assets/css/animate.css">
</head>
<body class="login-box">
	<div class="container">
		<div class="row">
			<div class="main">
					<?php if(!empty($errors)){ ?>
					<div class="col-xs-4 box animated bounceIn">
					<h4 class="login_title">Login Admin</h4>
					<div class="alert alert-danger">
					<?php foreach($errors as $error): ?>
						<?= $error; ?>
					<?php endforeach; ?>
					</div>		
					<?php }else { ?>
					<div class="col-xs-4 box">
					<h4 class="login_title">Login Admin</h4>
					<?php } ?>
					<form method="post">
						<div class="form-group">
							<label for="pseudo">Pseudo :</label>
							<input type="text" class="form-control" name="pseudo" id="pseudo">						
						</div>
						<div class="form-group">
							<label for="password">Mot de passe :</label>
							<input type="password" class="form-control" name="password" id="password">
						</div>
						<button class="btn btn-success" type="submit">Se connecter</button>
					</form>
					</div>
				</div>
			</div> <!-- .main -->
		</div> <!-- .row (principale) -->
	</div> <!-- .container (principale) -->
</body>
</html>
<?php } else {
	header('Location: /ecommerce/admin/home');
} ?>