<?php $title_page = "Connexion";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/header.php");
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
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="password">Mot de passe</label>
								<input type="password" name="password" class="form-control"/>
							</div>
							<button type="submit" class="form__button">Se connecter</button>
						</form>
				</div> <!-- .main -->
			<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/sidebar.php"); ?>
			</div> <!-- .row (principale) -->
		</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/footer.php"); ?>