<div class="container">
	<footer class="footer">
		<div class="footer-main">
			<div class="footer-logo-container">
				<a href="/">
					<img src="<?= TH_URI ?>imgs/logo-white.png" class="logo">
				</a>
			</div>

			<aside class="row footer-sidebar">
				<div class="col-12 col-lg-10 col-xl-10 offset-lg-1 offset-xl-1">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-3 col-xl-3 fsidebar-col">
							<div class="fsidebar-col-title">Кто мы</div>
							<!-- nav.fsidebar-nav>ul.fsidebar-list>li.fsidebar-nav-item>a.fsidebar-nav-link[href="#"] -->
							<nav class="fsidebar-nav">
								<ul class="fsidebar-list">
									<li class="fsidebar-nav-item"><a href="/team" class="fsidebar-nav-link">Команда</a></li>
									<li class="fsidebar-nav-item"><a href="/partners" class="fsidebar-nav-link">Партнеры</a></li>
								</ul>
							</nav>
						</div>
						<div class="col-12 col-md-6 col-lg-3 col-xl-3 fsidebar-col">
							<div class="fsidebar-col-title">Магазин</div>
							<nav class="fsidebar-nav">
								<ul class="fsidebar-list">
									<li class="fsidebar-nav-item"><a href="/comming-soon" class="fsidebar-nav-link">Площадки</a></li>
									<li class="fsidebar-nav-item"><a href="/comming-soon" class="fsidebar-nav-link">Спортивное питание</a></li>
									<li class="fsidebar-nav-item"><a href="/comming-soon" class="fsidebar-nav-link">Одежда</a></li>
									<li class="fsidebar-nav-item"><a href="/comming-soon" class="fsidebar-nav-link">Мерч</a></li>
								</ul>
							</nav>
						</div>
						<div class="col-12 col-md-6 col-lg-3 col-xl-3 fsidebar-col">
							<div class="fsidebar-col-title">Контакты</div>
							<ul class="fsidebar-list">
								<li class="fsidebar-nav-item">(000) 123 45 67</li>
								<li class="fsidebar-nav-item">(000) 123 45 67</li>
								<li class="fsidebar-nav-item">какой нибудь адрес</li>
							</ul>
						</div>
						<div class="col-12 col-md-6 col-lg-3 col-xl-3 fsidebar-col">
							<div class="subscribe">
								<div class="fsidebar-col-title">Подписаться</div>
								<form>
									<div class="form-container">
										<label class="label">Email*</label>
										<input type="text" class="input" name="subscribe-email">
									</div>
									<button class="button">Подписаться</button>
								</form>
							</div>
							<div class="static-social-bar">
								<? include TH_DIR . "html/pages/layouts/social-bar.php" ?>
							</div>
						</div>
					</div>
				</div>
			</aside>

		</div>
		<div class="footer-bottom">
			Created by best people &copy;2020
		</div>
	</footer>
</div>

<? wp_footer(); ?>
</body>
</html>