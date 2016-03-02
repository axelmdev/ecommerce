<?php 
$title_page = "Profil";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php"); 
?>
<div class="container">
	<div class="row">
		<div class="main col-xs-12 col-sm-12 col-md-8">
				<div class="col-xs-12">
				<?php if(!empty($_SESSION['id_users'])) {?> 
					<h2>Profil de <?= $profilUser['username']; ?></h2>
					<form method="post">
						<table class="table">							
							<tr>
								<td>Pseudo</td>
								<td><input class="form-control" type="text" name="pseudo_new" value="<?= $profilUser['username']; ?>"></td>
							</tr>
							<tr>
								<td>Nom</td>
								<td><input class="form-control" type="text" name="nom_new" value="<?= $profilUser['nom'] ?>"></td>
							</tr>
							<tr>
								<td>Prenom</td>
								<td><input class="form-control" type="text" name="prenom_new" value="<?= $profilUser['prenom'] ?>"></td>
							</tr>
							<tr>
								<td>Adresse</td>
								<td><input class="form-control" type="text" name="adresse_new" value="<?= $profilUser['adresse'] ?>"></td>
							</tr>
							<tr>
								<td>Code postal</td>
								<td><input class="form-control" type="text" name="code_postal_new" value="<?= $profilUser['code_postal'] ?>"></td>
							</tr>
							<tr>
								<td><input type="hidden" name="id_users" value="<?= $_SESSION['id_users'];?>"></td>
								<td><button class="btn btn-success">Modifier votre profil</button></td>
							</tr>
						</table>
					</form>
					<?php } else { ?>
					<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-alert"></span>&nbsp;-&nbsp;Vous devez être connecté pour pouvoir aller sur cette page - <a href="/ecommerce/connect">Connexion</a></div>
					<?php } ?>
				</div>
			</div> <!-- .main -->
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php"); ?>
