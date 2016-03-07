<?php
/**
 * Page Accueil
 */
/**
 * Titre de la page
 * @var string
 */
$title_page = "Accueil";
require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header.php");
?>
<br>
<div class="container">
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="assets/images/sliders/slide1.jpg" alt="slide1">
                <div class="carousel-caption">
                  The Last of Us
                </div>
              </div>
              <div class="item">
                <img src="assets/images/sliders/slide2.jpg" alt="slide2">
                <div class="carousel-caption">
                  GTA
                </div>
              </div>
              <div class="item">
                <img src="assets/images/sliders/slide3.jpg" alt="slide3">
                <div class="carousel-caption">
                  Mirror's Edge
                </div>
              </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
<div class="container">
  <div class="row">
		<div class="main col-xs-12 col-sm-12 col-md-8">
			<div class="col-xs-12">
        <?php if(empty($listeNews)) { ?>
        <h2 class="news_title">Bienvenue sur MyshopCMS</h2>
        <hr>
        <p class="news_content">Afin d'utiliser en toute simplicité le système ecommerce, vous devez vous inscrire <a href="/signin">ici</a></p>
        <hr>
        <small>Crée par admin</small>
        <?php } ?>
        <?php foreach ($listeNews as $news) { ?>
        <h2 class="news_title"><a href="/ecommerce/news/view/<?= $news['id_news'];?>-<?= $news['url']; ?>"><?= $news['title']; ?></a></h2>
        <hr>
        <p class="news_content"><?= $news['content']; ?></p>
        <hr>
        <small>Crée par <?= $admListeNews['pseudo']; ?></small>
        <?php } ?>
      </div>
		</div> <!-- .main -->
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer.php");
?>