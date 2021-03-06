<?php
/**
 * Page Commande User
 */
/**
 * Titre de la page
 * @var string
 */
$title_page = "Commandes";
require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/views/includes/header.php"); 
?>
<div class="container">
	<div class="row">
		<div class="main col-xs-12 col-sm-12 col-md-8">
				<div class="col-xs-12">
				<?php if(!empty($_SESSION)) { ?> 
					<h2 class="sub-header">Commandes en cours </h2>
			          <div class="table-responsive">
			            <table class="table table-striped">
			              <thead>
			                <tr>
			                  <th>#</th>
			                  <th>Header</th>
			                  <th>Header</th>
			                  <th>Header</th>
			                  <th>Header</th>
			                </tr>
			              </thead>
			              <tbody>
			                <tr>
			                  <td>1,001</td>
			                  <td>Lorem</td>
			                  <td>ipsum</td>
			                  <td>dolor</td>
			                  <td>sit</td>
			                </tr>
			                <tr>
			                  <td>1,002</td>
			                  <td>amet</td>
			                  <td>consectetur</td>
			                  <td>adipiscing</td>
			                  <td>elit</td>
			                </tr>
			                <tr>
			                  <td>1,003</td>
			                  <td>Integer</td>
			                  <td>nec</td>
			                  <td>odio</td>
			                  <td>Praesent</td>
			                </tr>
			                <tr>
			                  <td>1,003</td>
			                  <td>libero</td>
			                  <td>Sed</td>
			                  <td>cursus</td>
			                  <td>ante</td>
			                </tr>
			                <tr>
			                  <td>1,004</td>
			                  <td>dapibus</td>
			                  <td>diam</td>
			                  <td>Sed</td>
			                  <td>nisi</td>
			                </tr>
			                <tr>
			                  <td>1,005</td>
			                  <td>Nulla</td>
			                  <td>quis</td>
			                  <td>sem</td>
			                  <td>at</td>
			                </tr>
			                <tr>
			                  <td>1,006</td>
			                  <td>nibh</td>
			                  <td>elementum</td>
			                  <td>imperdiet</td>
			                  <td>Duis</td>
			                </tr>
			                <tr>
			                  <td>1,007</td>
			                  <td>sagittis</td>
			                  <td>ipsum</td>
			                  <td>Praesent</td>
			                  <td>mauris</td>
			                </tr>
			                <tr>
			                  <td>1,008</td>
			                  <td>Fusce</td>
			                  <td>nec</td>
			                  <td>tellus</td>
			                  <td>sed</td>
			                </tr>
			                <tr>
			                  <td>1,009</td>
			                  <td>augue</td>
			                  <td>semper</td>
			                  <td>porta</td>
			                  <td>Mauris</td>
			                </tr>
			                <tr>
			                  <td>1,010</td>
			                  <td>massa</td>
			                  <td>Vestibulum</td>
			                  <td>lacinia</td>
			                  <td>arcu</td>
			                </tr>
			                <tr>
			                  <td>1,011</td>
			                  <td>eget</td>
			                  <td>nulla</td>
			                  <td>Class</td>
			                  <td>aptent</td>
			                </tr>
			                <tr>
			                  <td>1,012</td>
			                  <td>taciti</td>
			                  <td>sociosqu</td>
			                  <td>ad</td>
			                  <td>litora</td>
			                </tr>
			                <tr>
			                  <td>1,013</td>
			                  <td>torquent</td>
			                  <td>per</td>
			                  <td>conubia</td>
			                  <td>nostra</td>
			                </tr>
			                <tr>
			                  <td>1,014</td>
			                  <td>per</td>
			                  <td>inceptos</td>
			                  <td>himenaeos</td>
			                  <td>Curabitur</td>
			                </tr>
			                <tr>
			                  <td>1,015</td>
			                  <td>sodales</td>
			                  <td>ligula</td>
			                  <td>in</td>
			                  <td>libero</td>
			                </tr>
			              </tbody>
			            </table>
			          </div>
					<?php } else { ?>
					<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-alert"></span>&nbsp;-&nbsp;Vous devez être connecté pour pouvoir aller sur cette page - <a href="index.php?c=page&a=connexion">Connexion</a></div>
					<?php } ?>
				</div>
			</div> <!-- .main -->
		<?php require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/views/includes/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."ecommerce/views/includes/footer.php"); ?>
