<?php 
/**
 * Page Contact
 */
/**
 * Titre de la page
 * @var string
 */
$title_page = "Contact";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php");
?>
		<div class="container">
			<div class="row">
				<div class="main col-xs-12 col-sm-12 col-md-8">
					<div class="col-xs-12">
						<h2 class="page__title"><img class="glyphicon glyphicon-envelope" aria-hidden="true">Formulaire de contact</h2>
						<p class="form__description">Veuillez bien inscrire vos informations dans le formulaire de contact, merci.</p>
						<form action="mailto:contact.axel.pro@gmail.com" method="post">
							<div class="form-group">
							    <label for="Nom">Nom :</label>
								<input type="text" class="form-control" name="nom" id="Nom" placeholder="Votre nom">
							</div>
							<div class="form-group">
							    <label for="Prenom">Prenom :</label>
							    <input type="text" class="form-control" name="prenom"id="Prenom" placeholder="Votre prenom">
							</div>
							<div class="form-group">
							    <label for="Email">Adresse Email</label>
							    <input type="email" class="form-control" name="email" id="Email" placeholder="Email">
							</div>
							<div class="form-group">
							    <label for="Message">Message :</label>
							    <textarea class="form-control" id="Message" name="message" cols="30" rows="10"></textarea>
							</div>
							<button type="submit" class="form__button">Envoyer votre message</button>
						</form>
					</div>
				</div> <!-- .main -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php"); ?>