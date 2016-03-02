<?php
if(!empty($_SESSION['id_admin'])) {
$title_page = "Créer un article";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php"); ?>

<div class="container">
	<div class="row">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
		<div class="main col-xs-12 col-sm-6 col-md-8">
				<h2>Créer un article</h2>
				<small>Pour lié un article à une ou plusieurs catégories vous devrez le créée d'abord, et allez dans la partie modifier un article pour cela.</small>
				<form method="post">
					<div class="form-group">
						<label for="title">Titre de l'article</label>
						<input type="text" name="title" id="title" class="form-control">
					</div>
					<div class="form-group">
						<label for="url">Url de l'article </label>
						<small>(en minuscule et pas d'accent)</small>
						<div class="input-group">
							<span class="input-group-addon" id="url_article">localhost/ecommerce/article/view/</span>
							<input type="text" name="url" id="url" class="form-control" aria-describedby="url_article">
						</div>
					</div>
					<div class="form-group">
						<label for="description">Description de l'article</label>
						<textarea name="description" id="description"></textarea>
					</div>
					<div class="form-group">
						<label for="prix">Prix de l'article</label>
						<input type="number" name="prix" id="prix" class="form-control">
					</div>
					<div class="form-group">
						<label for="quantite">Quantité</label>
						<input type="number" name="quantite" id="quantite" class="form-control">
					</div>
					<input type="hidden" name="id_admin" value="<?= $_SESSION['id_admin']; ?>">
					<button type="submit" class="btn btn-success">Créer un article</button>
				</form>
		</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php"); 
} else {
	header('Location: /ecommerce/home');
}
?>
