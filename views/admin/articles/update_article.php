<?php
if (!empty($_SESSION['id_admin'])) {
if ($articleDetails['url'] != $_GET['url'] AND $articleDetails['id_articles'] != $_GET['id']) {
	header('Location: /ecommerce/admin/article/update/'.$articleDetails['url'].'-'.$articleDetails['id_articles'].'');
}
$title_page = "Modifier un article";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php"); ?>

<div class="container">
	<div class="row">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
		<div class="main col-xs-12 col-sm-6 col-md-8">
				<h2>Modifier un article</h2>
				<form method="post">
					<div class="form-group">
						<label for="title">Titre de l'article</label>
						<input type="text" name="title-new" id="title" class="form-control" value="<?= $articleDetails['nom']; ?>">
					</div>
					<div class="form-group">
						<label for="description">Description de l'article</label>
						<textarea name="description-new" id="description"><?= $articleDetails['description']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="url">Permalien de l'article</label>
						<input type="text" name="url-new" id="url" class="form-control" value="<?= $articleDetails['url']; ?>">
					</div>
					<div class="form-group">
						<label>Categorie associé à l'article</label>
						<ul>
						<?php foreach ($categorieOneDetails as $categorie): ?>
							<li><?= $categorie['nom_categories']; ?> - <a href="/ecommerce/admin/articlecateg/delete/<?= $categorie['id_categories']; ?>-<?= $articleDetails['id_articles']; ?>"><btn class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></btn></a></li><br>
						<?php endforeach ?>
						</ul>
					</div>
					<div class="form-group">
						<label for="categorie">Selectionner une ou plusieurs categories <small>(Ctrl + Clic souris pour en selectonner plusieurs)</small></label>
						<select multiple class="form-control" name="categories[]">
				            <?php 
					            require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/controllers/categorie.php");
					            $controller_categorie = new Controller_Categorie();
					            $listeCategories = $controller_categorie->listeCategoriesHome();
					            foreach($listeCategories as $categorie) {
					              echo '<option value="'.$categorie['id_categories'].'">'.$categorie['nom_categories'].'</option>';
					            }
					         ?>
						</select>
					</div>
					<div class="form-group">
						<label for="prix">Prix de l'article</label>
						<input type="number" name="prix-new" id="prix" step="any" class="form-control" value="<?= $articleDetails['prix']; ?>">
					</div>
					<div class="form-group">
						<label for="quantite">Quantité</label>
						<input type="number" name="quantite-new" id="quantite" class="form-control" value="<?= $articleDetails['quantite']; ?>">
					</div>
					<input type="hidden" name="id_articles" value="<?= $articleDetails['id_articles']; ?>">
					<input type="hidden" name="id_admin" value="<?= $_SESSION['id_admin']; ?>">
					<button type="submit" class="btn btn-success">Modifier</button>
				</form>
		</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php"); 
} else {
	header('Location: /ecommerce/home');
}
?>
