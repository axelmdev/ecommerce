<?php 
$title_page = "Categories : ".$categoriesViewOneDetails[0]['nom_categories'];
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php"); 
?>
<div class="container">
	<div class="row">
		<div class="main col-xs-12 col-sm-12 col-md-8">
			<br>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?= $categoriesViewOneDetails[0]['nom_categories']; ?></h3>
				</div>
				<p><?= $categoriesViewOneDetails[0]['content_categories'];?></p>
				<div class="panel-body">
					<p><?= $categoriesViewOneDetails[0]['nom']; ?></p>
					<hr>
					<p><?= $categoriesViewOneDetails[0]['description']; ?></p>
					<hr>
				</div>
			</div>
		</div> <!-- .main -->
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php"); ?>
