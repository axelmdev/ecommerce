<?php 
$title_page = "Articles";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/header.php");
?>
		<div class="container">
			<div class="row">
				<div class="main col-xs-12 col-sm-12 col-md-8">
					<div class="shops row">
					<?php ?>
			            <div class="col-xs-12 col-sm-6 col-md-4">
			              <div class="shop_article">
			                <h3 class="shop_title"><a href="index.php?c=article&a=view&id=<?php echo $id; ?>"><?php echo $article['nom']; ?></a></h3>
			                <p class="shop_descriptions">
			                  	<?php echo $article['description']; ?>
			                  	<?php echo $article['prix']; ?>
								<?php echo $article['reference']; ?>
			                </p>
			              </div>
			            </div>
						<?php } ?>
					</div>
				</div> <!-- .main -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/footer.php"); ?>