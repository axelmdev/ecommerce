<?php 
$title_page = "View Article";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/header_admin.php"); ?>

<div class="container">
	<div class="row">
		<div class="main col-xs-12 col-sm-12 col-md-8">
				<div class="col-xs-12">
					<div id="myfirstchart" style="height: 250px;"></div>
				</div>
			</div> <!-- .main -->
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/footer.php"); ?>
