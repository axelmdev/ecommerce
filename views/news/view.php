<?php
/**
 * Page View News
 */
if ($newsDetails['url'] != $_GET['url'] AND $newsDetails['id_news'] != $_GET['id']) {
	header('Location: /ecommerce/news/view/'.$newsDetails['id_news'].'-'.$newsDetails['url'].'');
}
/**
 * Titre de la page
 * @var string
 */
$title_page = "News - ".$newsDetails['url'];
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php"); 
?>
<div class="container">
	<div class="row">
		<div class="main col-xs-12 col-sm-12 col-md-8">
				<br>
				<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title"><?= $newsDetails['title']; ?></h3>
					  </div>
				  	<div class="panel-body">
					<p>Crée par <?= $newsAdminDetails['pseudo']; ?></p>
					<hr>
					<p><?= $newsDetails['content']; ?></p>
					<hr>
				  	</div>
				  </div>
			</div> <!-- .main -->
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php"); ?>
