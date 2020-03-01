<nav class="navbar">
	<div class="container">
		<div class="row">
			<div class="col-2 col-lg-3 col-xl-3">
				<div class="site-logo-container">
					<a href="/">
						<img src="<?= TH_URI ?>imgs/logo-white.png" class="logo">
					</a>
				</div>
			</div>
			<div class="col-5 col-sm-5 col-md-7 col-lg-6 col-xl-6">
				<ul class="nav-list">
					<li class="nav-item"><a href="/" class="nav-link">ХАРАКТЕР</a></li>
					<li class="nav-item"><a href="/comming-soon" class="nav-link">МАГАЗИН</a></li>
					<li class="nav-item"><a href="/articles" class="nav-link">ПУБЛИКАЦИИ</a></li>
					<li class="nav-item"><a href="/comming-soon" class="nav-link">КАЛЕНДАРЬ</a></li>
					<li class="nav-item"><a href="#" class="nav-link" data-popup="login">ВОЙТИ</a></li>
				</ul>
			</div>
			<div class="col-3 col-sm-3 col-md-1 col-lg-1 col-xl-1">
				<? include TH_DIR . 'html/pages/layouts/search-bar.php' ?>
			</div>
			<div class="col-1 col-sm-1 col-md-1 col-xl-1 col-lg-1 lang-panel-container">
				<div class="lang-panel">
					<a href="#">UA</a> / <a href="#">ENG</a> / <a href="#" class="active">RU</a>
				</div>
			</div>
			<div class="col-1 adaptive-control-container">
				<a href="/comming-soon" class="go-webcams"></a>
				<button class="adaptive-control-btn sandwitch"></button>
				<button class="adaptive-control-btn close-nav"></button>
			</div>
		</div>
	</div>
</nav>