<?php 
$title_page = "Accueil";
require_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/header.php") 
?>
<br>
<div class="container">
	<div class="row">
      <div class="col-xs-12 col-sm-6 col-md-8">
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
                  Slide 1
                </div>
              </div>
              <div class="item">
                <img src="assets/images/sliders/slide2.jpg" alt="slide2">
                <div class="carousel-caption">
                  Slide 2
                </div>
              </div>
              <div class="item">
                <img src="assets/images/sliders/slide3.jpg" alt="slide3">
                <div class="carousel-caption">
                  Slide 3
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
        <div class="col-xs-6 col-md-4">
          
        </div>
      </div>
    </div>
<div class="container">
  <div class="row">
		<div class="main col-xs-12 col-sm-12 col-md-8">
			<div class="col-xs-12">
				Bonjour, bienvenue sur mon site.
        <hr>
        <h2>- Titre de l'article -</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius dolorum excepturi molestias nisi natus numquam magni, suscipit aliquid quibusdam eligendi doloremque commodi repellendus, a eum, corporis atque. Autem, voluptatibus, adipisci?</p>
			  <hr>
        <h2>- Titre de l'article -</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius dolorum excepturi molestias nisi natus numquam magni, suscipit aliquid quibusdam eligendi doloremque commodi repellendus, a eum, corporis atque. Autem, voluptatibus, adipisci?</p>
      </div>
		</div> <!-- .main -->
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/sidebar.php"); ?>
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/footer.php") ?>