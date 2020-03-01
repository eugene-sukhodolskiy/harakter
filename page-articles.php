<? include TH_DIR . "html/pages/layouts/header.php" ?>
<? include TH_DIR . "html/pages/layouts/navbar.php" ?>
<? include TH_DIR . "html/pages/layouts/social-bar.php" ?>
<div class="container">
	<? the_post() ?>
	<? list($cat, $posts) = get_category_posts('articles-cat'); ?>
	<section class="site-section page articles">
		<h2 class="heading section-heading">
			<? if(!is_tag()): ?>
				<? the_title() ?>
			<? else: ?>
				<? single_tag_title() ?>
			<? endif ?>	
		</h2>
		<? if(!is_tag()): ?>
		<p class="txt-normal section-sub-heading"><?= strip_tags(get_the_content(), '<a>') ?></p>
		<? endif; ?>

		<? include TH_DIR . "html/pages/layouts/tags.php" ?>
		<div class="section-content">
			<div class="row">
				<?php if (count($posts)): ?>
					<? foreach($posts as $post): ?>
						<?php if (has_post_thumbnail($post)): ?>
							<? $thumb = get_the_post_thumbnail_url($post -> ID, 'medium') ?>
						<? else: ?>
							<? $thumb = TH_URI . '/imgs/article-placeholder.png'; ?>
						<?php endif ?>
						<div class="col-12 col-md-6 col-lg-4 col-xl-4">
							<article class="article-card" style="background-image: url(<?= $thumb ?>)">
								<a href="<?= get_permalink($post -> ID) ?>" class="article-card-link">
									<div class="article-card-content">
										<h4 class="heading article-title"><?= $post -> post_title ?></h4>
										<p class="article-excerpt"><?= $post -> post_excerpt ?></p>
									</div>
								</a>
							</article>
						</div>
					<? endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</section>
</div>
<? include TH_DIR . "html/pages/layouts/footer.php" ?>