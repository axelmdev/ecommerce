<?php
/**
 * Page Listes des users
 */
if(!empty($_SESSION['id_admin'])) {
/**
 * Titre de la page
 * @var string
 */
$title_page = "Liste d'utilisateurs";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php");
?>
		<div class="container">
			<div class="row">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
				<div class="main col-xs-12 col-sm-12 col-md-8">
					<div class="row">
						<h3>Utilisateurs - <a href="/ecommerce/admin/users/add"><button type="button" class="btn btn-success">Ajouter un utilisateur</button></a></h3>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<td><b>Pseudo</b></td>
									<td><b>Adresse email</b></td>
									<td><b>Nom</b></td>
									<td><b>Prenom</b></td>
									<td><b>Adresse</b></td>
									<td><b>Code postal</b></td>
								</tr>
								<?php foreach ($listeUsers as $user) { ?>
									<tr>
									<?php $id = $user['id_users']; ?>
										<td><a href="/ecommerce/admin/users/<?= $user['username']; ?>-<?php echo $id; ?>"><?php echo $user['username']; ?></a></td>
										<td><?= $user['email']; ?></td>
										<td><?= $user['nom']; ?></td>
										<td><?= $user['prenom']; ?></td>
										<td><?= substr($user['adresse'], 0, 10); ?>...</td>
										<td><?= $user['code_postal']; ?></td>
										<td><a href="/ecommerce/admin/users/delete/<?= $id; ?>"><btn class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></btn></a></td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>
			</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php"); 
} else {
	header('Location: /ecommerce/home');
}
?>