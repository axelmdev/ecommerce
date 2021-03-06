<?php
/**
 * Page Creation users
 */
if(!empty($_SESSION['id_admin'])) {
/**
 * Titre de la page
 * @var string
 */
$title_page = "Créer un utilisateur";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php"); ?>

<div class="container">
	<div class="row">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
		<div class="main col-xs-12 col-sm-6 col-md-8">
			<h2>Créer un utilisateur</h2>
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
					<input type="text" name="username" class="form-control"/>
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
				<button type="submit" class="btn btn-success">S'inscrire</button>
			</form>
		</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php"); 
} else {
	header('Location: /ecommerce/home');
}
?>