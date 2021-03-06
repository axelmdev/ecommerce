<?php
/**
 * Page Liste categories
 */
if(!empty($_SESSION['id_admin'])) {
/**
 * Titre de la page
 * @var string
 */
$title_page = "Liste des Categories";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php");
?>
		<div class="container">
			<div class="row">
			<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
				<div class="main col-xs-12 col-sm-12 col-md-9">
					<div class="row">
						<h3>Categories - <a href="/ecommerce/admin/categories/add"><button type="button" class="btn btn-success">Ajouter une categorie</button></a></h3>
						<table class="table table-bordered">
							<tr>
								<td><b>Titre de la categorie</b></td>
								<td><b>Description</b></td>
							</tr>
						<?php foreach ($listeCategories as $categories) { ?>
							<tr>		              				
				                <td><?= $categories['nom_categories']; ?></td>				            
								<td><?= substr($categories['description'], 0, 80); ?>...</td>
								<td><a href="/ecommerce/admin/categories/delete/<?= $categories['id_categories']; ?>"><btn class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></btn></a></td>
							</tr>
						<?php } ?>	
						</table>
					</div>
				</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php");
} else {
	header('Location: /ecommerce/home');
} ?>
