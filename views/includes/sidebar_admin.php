<div class="col-xs-12 col-sm-4 col-md-3">
	<ul class="list-group">
		<li class="list-group-item <?php if ($title_page == 'Tableau de bord') {echo 'active';} ?>"><a href="/ecommerce/admin/home">Tableau de bord</a></li>
		<li class="list-group-item <?php if ($title_page == 'Liste des News') {echo 'active';} ?>"><a href="/ecommerce/admin/news/list">Gestion News</a></li>
		<li class="list-group-item <?php if ($title_page == 'Liste d\'utilisateurs') {echo 'active';} ?>"><a href="/ecommerce/admin/users/list">Gestion Utilisateurs</a></li>
		<li class="list-group-item <?php if ($title_page == 'Liste des Articles') {echo 'active';} ?>"><a href="/ecommerce/admin/article/list">Gestion Articles</a></li>
		<li class="list-group-item <?php if ($title_page == 'Liste des Categories') {echo 'active';} ?>"><a href="/ecommerce/admin/categories/list">Gestion Categories</a></li>
	</ul>
</div>