<? include TH_DIR . "html/pages/layouts/header.php" ?>
<? include TH_DIR . "html/pages/layouts/navbar.php" ?>
<? include TH_DIR . "html/pages/layouts/social-bar.php" ?>
<? $back_btn_url = "/article"; ?>
<? include TH_DIR . "html/pages/layouts/back-button.php" ?>
<? the_post() ?>
<div class="container">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12 col-xl-10 offset-xl-1">
			<section class="site-section page article-single">
				<article class="article">
					<h2 class="heading article-title"><? the_title() ?></h2>
					<?php if (has_post_thumbnail($post)): ?>
						<? $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>
					<? else: ?>
						<? $thumb = TH_URI . '/imgs/article-placeholder.png'; ?>
					<?php endif ?>
					<img src="<?= $thumb ?>" class="article-thumbnail">
					<div class="article-content">
						<? the_content() ?>
					</div>
					<? include TH_DIR . "html/pages/layouts/article-social.php" ?>
				</article>
				<? include TH_DIR . "html/pages/sections/related-articles.php" ?>
			</section>
		</div>
	</div>
</div>
<? include TH_DIR . "html/pages/layouts/footer.php" ?>