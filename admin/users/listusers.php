<?php 
$title_page = "Liste d'utilisateurs";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/header.php");
?>
		<div class="container">
			<div class="row">
				<div class="main col-xs-12 col-sm-12 col-md-8">
				<?php foreach ($listeUsers as $user) { ?>
					<div class="col-xs-12">
					<?php $id = $user['id_users']; ?>
						<h2 class="article_title"><a href="index.php?c=article&a=view&id=<?php echo $id; ?>"><?php echo $user['username']; ?></a></h2>
						<hr>
						<p class="article_description"><?php echo $article['description']; ?></p>
						<?php echo $article['nom']; ?>
						<?php echo $article['prenom']; ?>
					</div>
				<?php } ?>
				</div> <!-- .main -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/footer.php"); ?>