<?php
/**
 * Page A propos
 */
/**
 * Titre de la page
 * @var string
 */
$title_page = "A propos";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php");
?>
		<div class="container">
			<div class="row">
				<div class="main col-xs-12 col-sm-6 col-md-8">
					<div class="col-xs-12">
						<h2 class="page__title">A propos :</h2>
						<hr>
						<p>MyShopCMS crée en 2015 par Axel Mainguy, est un Système de vente Ecommerce.</p>
					</div>
				</div> <!-- .main -->
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
			</div> <!-- .row (principale) -->
		</div> <!-- .container (principale) -->
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php"); ?>
