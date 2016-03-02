<?php
if (!empty($_SESSION['id_admin'])) {
if ($newsDetails['id_news'] != $_GET['id']) {
	header('Location: /ecommerce/admin/news/update/'.$newsDetails['id_news'].'');
}
$title_page = "Modifier une news";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php"); ?>

<div class="container">
	<div class="row">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
		<div class="main col-xs-12 col-sm-6 col-md-8">
				<h2>Modifier une news</h2>
				<form method="post">
					<div class="form-group">
						<label for="title">Titre de la News</label>
						<input type="text" name="title-new" id="title" class="form-control" value="<?= $newsDetails['title']; ?>">
					</div>
					<div class="form-group">
						<label for="description">Contenu</label>
						<textarea name="content-new" id="description"><?= $newsDetails['content']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="url">Permalien de la news</label>
						<input type="text" name="url-new" id="url" class="form-control" value="<?= $newsDetails['url']; ?>">
					</div>
					<input type="hidden" name="id_news" value="<?= $newsDetails['id_news']; ?>">
					<input type="hidden" name="id_admin" value="<?= $_SESSION['id_admin']; ?>">
					<button type="submit" name="modifier" class="btn btn-success">Modifier</button>
				</form>
		</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php"); 
} else {
	header('Location: /ecommerce/home');
}
?>
