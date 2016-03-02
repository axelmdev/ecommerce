<?php 
$title_page = "Panier";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php");
?>
		<div class="container">
			<div class="row">
				<div class="main col-xs-12 col-sm-12 col-md-12">
					<div class="col-xs-12">
						<?php if (!empty($_SESSION['id_users']) || !empty($_SESSION['id_admin'])){ ?>
						<h2 class="page__title">Panier :
						<?php if ($this->count() < 2 && $this->count() > 0) {?>
							<small>Il y a <?= $this->count(); ?> article dans votre panier.</small></h2>
						<?php } elseif($this->count() > 1) { ?>
							<small>Il y a <?= $this->count(); ?> articles dans votre panier.</small></h2>		
						<?php } ?>
						</h2>
								

							<?php if(!empty($errors)): ?>
							<div class="alert alert-danger">
								<ul>
									<?php foreach($errors as $error): ?>
										<li><?= $error; ?></li>
									<?php endforeach; ?>
								</ul>
							</div>		
							<?php endif; 
							if(empty($products)) {
									echo "<div class='alert alert-info'>Il n'a rien dans votre panier</div>";
							} else {
							?>
							<hr>
							<form method="post">
							<div class="table-responsive">
								<table class="table table-bordered">
								<tr>
									<td></td>
									<td>Nom</td>
									<td>Description</td>
									<td>Prix (€)</td>
									<td>Quantité</td>
									<td></td>
									<td>Prix avec Tva (€)</td>
								</tr>
							<?php
								foreach($products as $product){
						    ?>
								<tr>
						          	<td><img src="/ecommerce/assets/images/shop/<?= $product->id_articles; ?>_min.jpg"></td>
						          	<td><?= $product->nom; ?></td>
						          	<td><?= $product->description; ?></td>
						        	<td><?= number_format($product->prix,2,',',' '); ?></td>
						          	<td><input type="number" name="panier[quantity][<?= $product->id_articles; ?>]" value="<?= $_SESSION['panier'][$product->id_articles]; ?>" min="1" required></td>
						          	<td><a href="?delPanier=<?= $product->id_articles; ?>">Supprimer</a></td>
						        	<td><?= number_format($product->prix*1.20,2,',',' '); ?></td>
					      	<?php } ?>
					      		</tr>
								</table>
							</div>
						      <div class="totals">
						        <div class="totals-item totals-item-total">
						          <label>Total HT (€)</label>
						          <div class="totals-value" id="cart-total"><?= number_format($this->total(),2,',',' '); ?></div>
						        </div>
						        <div class="totals-item">
						          <label>Total TTC (€)</label>
						          <div class="totals-value" id="cart-tax"><?= number_format($this->total()*1.20,2,',',' '); ?></div>
						        </div>
						        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
								  Valider le Panier
								</button>
						      	<button type="submit" class="btn btn-success btn-lg">Recalculer</button>
						      </div>
						      
						      </form>
							
					<?php } } else { ?>
						<br>
						<div class="alert alert-danger">
							<p>Vous devez être connecté pour pouvoir utiliser le panier.</p>
						</div>		
						<?php } ?>
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Commande</h4>
						      </div>
						      <div class="modal-body">
						      	<p>Le total TTC est de <?= number_format($this->total()*1.20,2,',',' '); ?> €</p>
						        <form method="post">
						        	<div class="form-group">
						        		<label for="num_card">Numéro de carte :</label>
						        		<input type="text" pattern="[0-9]*" name="num_card" id="num_card" class="form-control" required>
						        	</div>
						        	<div class="form-group">
						        		<label>Adresse de livraison :</label>
						        		<p><?= $_SESSION['adresse']; ?> - <?= $_SESSION['code_postal'] ?></p>
						        	</div>
						  	  </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
						        <button type="submit" class="btn btn-primary">Valider ma commande</button>
						      </div>
						      </form>
						    </div>
						  </div>
						</div>
					</div>
				</div> <!-- .main -->
			</div> <!-- .row (principale) -->
		</div> <!-- .container (principale) -->
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php"); ?>
