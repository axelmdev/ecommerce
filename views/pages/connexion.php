<?php 
if(empty($_SESSION['id_users'])) {
$title_page = "Connexion";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php");
?>
		<div class="container">
			<div class="row">
				<div class="main col-xs-12 col-sm-12 col-md-8">
					<h1 class="page__title">Connexion</h1>
						<?php if(!empty($errors)): ?>
						<div class="alert alert-danger">
							<p>Vous n'avez pas rempli le formulaire correctement :</p>
							<ul>
								<?php foreach($errors as $error): ?>
									<li><?= $error; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>		
						<?php endif; ?>
						<form method="post">
							<div class="form-group">
								<label for="pseudo">Pseudo</label>
								<input type="text" name="pseudo" class="form-control" autocomplete="false" />
							</div>
							<div class="form-group">
								<label for="password">Mot de passe</label>
								<input type="password" name="password" class="form-control"/>
							</div>
							<button type="submit" class="form__button">Se connecter</button>
						</form>
				</div> <!-- .main -->
			<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
			</div> <!-- .row (principale) -->
		</div> <!-- .container (principale) -->
<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php");
} else{
	header('Location: /ecommerce/home');
} 
?>