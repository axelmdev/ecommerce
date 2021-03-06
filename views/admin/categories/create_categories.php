<?php
/**
 * Page Create Categorie
 */
if(!empty($_SESSION['id_admin'])) {
/**
 * Titre de la page
 * @var string
 */
$title_page = "Créer une categorie";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php"); ?>

<div class="container">
	<div class="row">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
		<div class="main col-xs-12 col-sm-6 col-md-8">
				<h2>Créer une categorie</h2>
				<form method="post">
					<div class="form-group">
						<label for="title">Nom</label>
						<input type="text" name="nom" id="title" class="form-control">
					</div>
					<div class="form-group">
						<label for="contenu">Description</label>
						<textarea name="description" id="contenu"></textarea>
					</div>
					<input type="hidden" name="id_admin" value="<?= $_SESSION['id_admin']; ?>">
					<button type="submit" class="btn btn-success">Créer une categorie</button>
				</form>
		</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php"); 
} else {
	header('Location: /ecommerce/home');
}
?>
