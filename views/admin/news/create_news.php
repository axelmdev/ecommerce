<?php
if(!empty($_SESSION['id_admin'])) {
$title_page = "Créer une news";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php"); ?>

<div class="container">
	<div class="row">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
		<div class="main col-xs-12 col-sm-6 col-md-8">
				<h2>Créer une news</h2>
				<form method="post">
					<div class="form-group">
						<label for="title">Titre</label>
						<input type="text" name="title" id="title" class="form-control">
					</div>
					<div class="form-group">
						<label for="url">Url </label>
						<small>(en minuscule et pas d'accent)</small>
						<div class="input-group">
							<span class="input-group-addon" id="url_news">localhost/ecommerce/news/view/</span>
							<input type="text" name="url" id="url" class="form-control" aria-describedby="url_news">
						</div>
					</div>
					<div class="form-group">
						<label for="contenu">Contenu de la news</label>
						<textarea name="content" id="contenu"></textarea>
					</div>
					<input type="hidden" name="id_admin" value="<?= $_SESSION['id_admin']; ?>">
					<button type="submit" class="btn btn-success">Créer une news</button>
				</form>
		</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php"); 
} else {
	header('Location: /ecommerce/home');
}
?>
