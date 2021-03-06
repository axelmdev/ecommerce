<?php
/**
 * Page Accueil Admin
 */
if(!empty($_SESSION['id_admin'])) {
/**
 * Titre de la page
 * @var string
 */
$title_page = "Tableau de bord";
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/header_admin.php"); 
?>

<div class="container">
	<div class="row">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/sidebar_admin.php"); ?>
		<div class="main col-xs-12 col-sm-8 col-md-8">
			<div class="col-lg-6 col-md-12">
				<div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <img class="img-responsive" src="data:image/png;base64,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"/>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $dashboardCountNews['nbrNews']; ?></div>
                                <div>News</div>
                            </div>
                        </div>
                    </div>
                    <a href="/ecommerce/admin/news/list">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les news</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <img class="img-responsive" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAEd0lEQVR4Xu1ai3EUMQyVKgAqIKkAUgGkAkIFkAoIFRAqIFQAqQBSAUkFhAq4qwCoQMzbkXe8jncl+zZ7B2fPZO4ma8vW08dP2mPa88F7rj81AJoH7DkCLQT23AFaEmwh0EJgYQRE5BURnRDRcyJ6qNuviOiaiC6ZGZ+LjcVCQESeEtEnIsLn1AAAL5n59xIoLAKAiMDaXyKLW7pB+WNmvrUmbvr83gFQy38rUD7oBBAO79sTigEQEcTtC43jEMMhfhHL/dC534nooNJS18x8nK4VEch7E4VTyCFXpYAVASAiSF6I46B4erb3zHwe/iki+P6uUvmw7JSZP0cyEUo4R27AazD/q3dPNwAi8lqVn5L9lpkvMEGt/7PC9VP5K2Y+jACAcvDAqTEAbWqiCwC1PJC3BmK2CwMnYJa88PwoJMQCubhJTE8wASiw5JqZ+1gXEY+lvAD0oaXxD8+yhiuJegDwxvENM+O664aI/JrB/YM4JLc+7kVELO31+SAn5dZ4AEAWt8gLZNce0qNLCq4XgFtmPqrOAer+sKRnxG6KW8K7ziM7BQDX7jPPQiJ6NHU1TnqAMjiQGM/4yMxnUQh4reSRXesBkA1GOVpfzAlAekgkoQce7RxzNgmvxQAYxJuIlLiphUHNLRBkbgRAaSz38SYiCIcPlmbO5zEPwG3g4SRBdH0O0OsMxOax86A9+Si4ry3RKb8ALUZPwTMGa2uvQVBbFB6ekcbqHGQorS9K+MUsPADszsO8AkAxHS5dm4K8BgcJ11gBDYacP7p2UKGmG5hESMOgJJ7R1kLh1I0Nc8EggYkIDOEtrfvCbMp1XQCoIt7YA/IHMfkQEe/a+KxpGQya7eUkAyPMAoCCYOUDuOxJrpWlnoC6wuIGABAy7pAXJWbIK1My3MpDpxIPgAXQ3OgLnghZKH4eNy5i1PVGwNo+NIyMCuWRwHIg4GpGSOIvBwRiHme59GRtEwBtY2OzXEH0g4guJhSfAs1zPgAA+Ve5yZoU4VW5axpAwGPhEaMd5iwAUd8PwnNJ50ZRznJsEUHHBqDlvMWjeDpn0qoGEFAeQKBWuQPEAABVHHc+Dp/r+8HiZ2PFhXrLGGg1itcAAWVzoZEFogMg6rIiRscangOSE11zmA/QsNZ7RW0KxqhHqBHhmU9GNgEQSKTIMSt23tMDQhKBBko65i2bKulZn7WqvotAI8capwDAQy0HpEJEUOT0tb+1ywLPAQTOGLfPPTS88wBP46JnZIV0dAHdB1vEVaOLvboAYOY+WVayuqWAiN9LuJhjDQBzNjrmBiZunDQAPLVD8wBPEkxyQAuBgp783DFuyWs5ILye977TaDlARMyu73+cA9bwANT53Y8axkby1vdfSYKmXl1la2WV9PnMb3xKt7fmm23wVEANADUNTuvgcz13dYLjzWoA8PxWaC6FSuX0xZB3YTEA2guwusPe/eeah04yGqGTuSy3WRUAc516F+Q0AHbBCts8Q/OAbaK/C3s3D9gFK2zzDM0Dton+Luy99x7wF/tkVX6A8/DvAAAAAElFTkSuQmCC"/>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $dashboardCountUsers['nbrUsers']; ?></div>
                                <div>Utilisateurs</div>
                            </div>
                        </div>
                    </div>
                    <a href="/ecommerce/admin/users/list">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les utilisateurs</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <img class="img-responsive" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAEJElEQVR4Xu1b/1FUMRDerwKlAqECpQKlAqECtQKlArUCoQKlArECpQKhAqECsYJ1vpu8mbDm7u3mXuK7ucs/DHebZPfL/k4O0nmo6r6IvBWRFyLyLG1/LSI/ROQcwG1PltBzM1V9LSKfROTxkn3vReQUwJdefHUDQFXP0sl7ZKMmvPMQrkvTBYB08p8LzN6kz54WvnvTQxOaA6CqVPdfRu0p+PFg78kvXIpIDgTN4QAA/zYbPQCgPb/KJLgBMDi/B4KpKp1hDsIFAPqNZqMpAOlkefr54KkWPX2UfgpUWgPwQUTeZ4yOOjdVtXM+AuBnTUZrAHj6jPvDWHr6A0FBC24BHDSRXkSaAaCqtPOfGeNXAJj8jA5VpUN8mREeAqB/mHy0BIBxnEnPMJjgMBcYHapq5zYzg5YA2FMcVf8VZuDWnlF0DUFLAH5nsf8PgGXpb5FnVWWkeJK+vAewFxXOQ98EgIIjC59gwQ+4Ncgj+EDTCgA6u+8ZI2EbLoTDEwA0q0lHKwBsLA/n9ap6LCJf1wHRg1QrAGzldwSA9b57qKrVoiZpcSsAKOzzTNq9mqJGVTVbI+xHPGh3AQBA1T4GgGsAhx6hIjRVjNkNUtb3KPuczmoIeyxnac81g5Vknko/yCQBXNUsms9ZCwBVZaHTrFBxCncG4NRJ+w9ZNQDBFlctf955lwBOvMRra0DBQ9fsPfWcqjyhSgMKWdrUwtSsV+UkwwCkHh/z/DmOcLpcAwB7dKUO7xwAcZfcA7M1ANgmpxWcHjnvA5yLCEHLw6QHrDsRYTjlLdIwuFb+v10nnCzVAGDbXDkTdwD2TQJDphnL8w6PBwDOYw6R9xSZCOVdJrtOuGwOAeCw/wUDpr3N8MQOT54aewC4EBFq21BVlsAtrRPyA1EAbIFSYoAmQMaZ/Q19vFWntgwMnv5R+pL9RZoDgcw1ojQ3VHhFAbC9umXMEwAKT9Wn/Ye6QdmiBIGVJbtDBNSTUoccYRQAW+d7VLk3Taj5EgXANjp7C+fZ7xsAj6Ys1ooCYOt8D0O9aUKhcAdA5HhUdes1IG9RRbDrSRsqiqImsAkASKQFtwMgopsmx49M7UrbUgPsE5augjk3C91DRk1g66PADoCKstapuZOR7TJB71OcmlpgE6rB0CVq1AluAgBNy+GtB8DTEpvMm1UuFHqMETWBTQCgaU/QPn6sPKSm09oBQLY3oB4IvUYJmcAmABAphMJ5QAJgzunw4vIkYmA1GjBnAEJpcK0GRH78FDmMKWi7ADDnZCiUBdZqgH3BOcXJTbVGFwDmnAyFcoAqDUiRgJeW0QcPU53yqnVCV+PrADD2SqSHsHaP0J3gMDkcBpMGMNayQTonLaj6XVEVAAmEOT2WCr0JyFWnGoAEAh0iwyKLpP+hDXwrzKey1T+k+AvsDbVQAKq81wAAAABJRU5ErkJggg=="/>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $dashboardCountArticles['nbrArticles']; ?></div>
                                <div>Articles</div>
                            </div>
                        </div>
                    </div>
                    <a href="/ecommerce/admin/article/list">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les articles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
				</div>
			</div>
            <div class="col-lg-6 col-md-12">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <img class="img-responsive" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADeklEQVR4Xu2bwW0UQRBF/48AiABz44YdAXDgDI4AHAF2BEAExhGwGWBHgImA5cgJZ2C4IxX6Uo80Gu3s7HZX17R2t06WPNtT9bqquruqh3AUMzsC8AHAGwAPASwBLEheOb7GdSh6jWZmxwC+AZCx1ySXZvYCwGcAv0meer3LcxwXAGam2f4B4ALAHYCvSclPJBdmdgvgluRHT+U9xvIC8A7AOcljM5MXaOY7OUuhIK9QiDQlXgC6mV3I3QcW/gHwBMA9SZf3eRJ0UcjMBEBhcJ3ywFBHhcblLgNQApTx8gCtAkO5AXCkEPGcPY+xXDxAiqRE9wDAKiP/AXhFUsmwKfEE0K37j1dY+Ivk06YsT8q4AUheoFywKgTuSCoRNidRANBiAtRsHAB4+mRaDleFgF5zou2x5/s8xgrzAAAvd3oVmEiC+vfeA7ggqZNhUxIZAjoZ7uZpsJvSiSS49wBuSKpS1JREhsB3kv06QRMgvAHoRPh6xLK9AKDT3vOxqW1xO+ztAQcA6zxApTGSKpo2I6Ee0OJuMBpAVyF+32ueqGiqUpr2Cfo7VKIByP3HSuNLkieh1leoB9yn6nCuHaoeyxu0lHagtHxWqyV6e4DlWp5+pxBQbXEoAnBaI0TcAKT2mDygllyRPPce3BOA2mNfvBUcjOe+jHoCUHO0duNDSVThoD6jmi3F4gIg3QsY9gSLlZsYQDBUZNH5I1u8ACg2L7O1KPuhLmBof5ElXgAi3H+dgWe6h5BDoBhAQPbfxK7szpMHgIjsvwmErBXCA8C6Isgmins9k1V2LwIwU/YfAzYLgLmTXx+GtspbL4nZHjBRAvdy623GySq7lwAoPfltY9wmz8YBMDPV97u7gJsoF/FMKICxmyARho694wAgp/eYlQP2PgTkg+la3GgTZIZYiAuBBEBnf+0DWpGsA1FWCHQWN7YXiN8JJk/QxadnDbjBbACaCIXcxmtRCPRCYc6KkNT4S3JVOX3SMV0ApFCY81icfffAE4BmQBXbOfJB1hKoiXMD0FsaBUHX5iMlKwG6A0gQwktkuQmwCoAEIfKwVHT7zDUE+j5vZipTvw2Ig6wdYKdXTQARSTF7+asOIIXCus9oPJwjO/uHAAhYGR6V3hmoFgKDfFCjhPbT4zO8EADJE0pvjwxDptj9qy2DQ01TA2WqebltccXlE5z/AUReUIHbmJIAAAAASUVORK5CYII="/>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">26</div>
                                <div>Commandes</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Voir les commandes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div> 
		</div> <!-- .main -->
	</div> <!-- .row (principale) -->
</div> <!-- .container (principale) -->
<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/ecommerce/views/includes/footer_admin.php");
} else {
	header('Location: /ecommerce/home');
}
?>
