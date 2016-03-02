<?php 
if(empty($_SESSION['id_users'])) {
$title_page = "Inscription";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php");
 ?>
		<div class="container">
			<div class="row">
				<div class="main col-xs-12 col-sm-12 col-md-8">
					<h1 class="page__title">Inscription</h1>
						
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
								<input type="text" id="pseudo" name="username" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="password">Mot de passe</label>
								<input type="password" name="password" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="password">Confirmez votre mot de passe</label>
								<input type="password" name="password_confirm" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="nom">Nom</label>
								<input type="text" name="nom" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="prenom">Prenom</label>
								<input type="text" name="prenom" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="adresse">Adresse</label>
								<input type="text" name="adresse" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="code_postal">Code postal</label>
								<input type="text" name="code_postal" class="form-control" maxlength="5"/>
							</div>
							<button type="submit" class="form__button">S'inscrire</button>
						</form>
				</div> <!-- .main -->
			<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
			</div> <!-- .row (principale) -->
		</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php"); 
} else {
	header('Location: /ecommerce/home');
}
?>