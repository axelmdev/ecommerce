<?php
/**
 * Page View Articles
 */
if ($articleDetails['url'] != $_GET['url'] AND $articleDetails['id_articles'] != $_GET['id']) {
	header('Location: /ecommerce/article/view/'.$articleDetails['url'].'-'.$articleDetails['id_articles'].'');
}
/**
 * Titre de la page
 * @var string
 */
$title_page = "View Article";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php"); 
?>
<div class="container">
	<div class="row">
		<div class="main col-xs-12 col-sm-12 col-md-8">
				<br>
				<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title"><?= $articleDetails['nom']; ?></h3>
					  </div>
				  	<div class="panel-body">
				  	<img class="img-responsive" src="/ecommerce/assets/images/shop/<?= $articleDetails['id_articles']; ?>.jpg" alt="<?= $articleDetails['nom'];?>">
					<p>Vendu par <?= $articlesAdminDetails['pseudo']; ?></p>
					<blockquote>					
						<b>Categories associées à l'article :</b><br>
						<?php
						$nb = count($categorieOneDetails);
						for($i=0;$i<$nb;$i++){
	  						echo $categorieOneDetails[$i]['nom_categories']."<br>";
						}
						?>
					</blockquote>

					<hr>
					<p><?= $articleDetails['description']; ?></p>
					<hr>
				  	</div>
				    <ul>
				  		<li><b>Prix HT : <?= number_format($articleDetails['prix'],2,',',' '); ?> €</b></li>
				  		<li><b>Prix avec Tva : <?= number_format($articleDetails['prix']*1.20,2,',',' '); ?> €</b>
						<li><p>Référence :<?= $articleDetails['reference']; ?></p></li>
				    </ul>
				  </div>
				  <h4 class="module_paiement_title">Module de paiement :</h4>
				  <?php if(!empty($_SESSION['id_users']) || !empty($_SESSION['id_admin'])) { ?>
					  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
						<input type='hidden' value="<?= $articleDetails['prix']*1.20; ?>" name="amount" />
						<input name="currency_code" type="hidden" value="EUR" />
						<input name="shipping" type="hidden" value="0.00" />
						<input name="tax" type="hidden" value="0.00" />
						<input name="return" type="hidden" value="http://votredomaine/paiementValide.php" />
						<input name="cancel_return" type="hidden" value="http://votredomaine/paiementAnnule.php" />
						<input name="notify_url" type="hidden" value="http://votredomaine/validationPaiement.php" />
						<input name="cmd" type="hidden" value="_xclick" />
						<input name="business" type="hidden" value="contact.axel.pro@gmail.com" />
						<input name="item_name" type="hidden" value="<?= $articleDetails['nom']; ?>" />
						<input name="no_note" type="hidden" value="1" />
						<input name="lc" type="hidden" value="FR" />
						<input name="bn" type="hidden" value="PP-BuyNowBF" />
						<input name="custom" type="hidden" value="ID_ACHETEUR" />
						<input alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" name="submit" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_buynow_LG.gif" type="image" /><img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" />
					  </form>
				  <?php } else { ?>
				  <div class="alert alert-danger">
				  	<p>Vous devez être connecter pour pouvoir acheter ce produit</p>
				  </div>
				  <?php } ?>
			</div> <!-- .main -->
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php"); ?>
