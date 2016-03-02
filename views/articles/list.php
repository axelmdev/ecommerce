<?php 
$title_page = "Articles";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php");
?>
		<div class="container">
			<div class="row">
				<div class="main col-xs-12 col-sm-12 col-md-8">
					<?php if(empty($_SESSION['id_users'])): ?>
					<div class="alert alert-danger">
					<p>Vous devez être connecté pour pouvoir ajouter des articles a votre panier</p>
					</div>
					<?php endif; ?>
					<div class="shops row">
					<?php foreach ($listeArticles as $article) {?>
						<?php $id_articles = $article['id_articles']; ?>
			            <div class="col-xs-12 col-sm-6 col-md-4">
			              <div class="shop_article">
			              	<img class="img-thumbnail img-responsive" src="/ecommerce/assets/images/shop/<?= $id_articles; ?>_min.jpg" alt="<?= $article['nom'];?>">
			                <h3 class="shop_title"><a href="/ecommerce/article/view/<?= $article['url']; ?>-<?= $id_articles; ?>"><?= $article['nom']; ?></a></h3>
			                <p class="shop_descriptions">  
			                  	<b><?= number_format($article['prix'],2,',',' '); ?> €</b><br>
								Référence : <?= $article['reference']; ?><br>
			                	<b>Quantite : <?= $article['quantite']; ?></b><br>
								<?php if (!empty($_SESSION['id_users']) || !empty($_SESSION['id_admin'])): ?>
									<a class="add_panier" href="/ecommerce/panier/add/<?= $id_articles;?>"><span class="glyphicon glyphicon-plus"></span></a>
								<?php endif ?>
								<?php if(empty($article['quantite'])) { ?>
								<span class="rupture_stock"><b>Rupture de stock</b></span>
								<?php } ?>
			                </p>
			              </div>
			            </div>
						<?php } ?>
					</div>
				</div> <!-- .main -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php"); ?>