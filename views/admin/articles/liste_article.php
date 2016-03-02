<?php
if (!empty($_SESSION['id_admin'])) {
$title_page = "Liste des Articles";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php");
?>
		<div class="container">
			<div class="row">
			<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
				<div class="main col-xs-12 col-sm-12 col-md-8">
					<div class="row">
						<h3>Articles - <a href="/ecommerce/admin/article/add"><button type="button" class="btn btn-success">Ajouter un article</button></a></h3>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<td><b>Titre de l'article</b></td>
									<td><b>Prix de l'article</b></td>
									<td><b>Prix + TVA</b></td>
									<td><b>Référence de l'article</b></td>
								</tr>
							<?php foreach ($listeArticles as $article) { ?>
								<tr>		              				
					                <td><?= $article['nom']; ?></td>				            
					                <td><?= number_format($article['prix'],2,',',' '); ?></td>
					                <td><?= number_format($article['prix']*1.20,2,',',' ')?>
									<td><?= $article['reference']; ?></td>
									<td><a href="/ecommerce/admin/article/update/<?= $article['url']; ?>-<?= $article['id_articles']; ?>"><btn class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></btn></a>
									<a href="/ecommerce/admin/article/delete/<?= $article['url']; ?>-<?= $article['id_articles']; ?>"><btn class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></btn></a></td>
								</tr>
							<?php } ?>	
							</table>
						</div>
					</div>
				</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php"); 
} else {
	header('Location: /ecommerce/home');
}
?>