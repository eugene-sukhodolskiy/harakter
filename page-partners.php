<? include TH_DIR . "html/pages/layouts/header.php" ?>
<? include TH_DIR . "html/pages/layouts/navbar.php" ?>
<? include TH_DIR . "html/pages/layouts/social-bar.php" ?>
<? the_post(); ?>
<div class="container">
	<section class="site-section page partners">
		<h2 class="heading section-heading"><? the_title() ?></h2>
		<p class="txt-normal section-sub-heading"><?= strip_tags(get_the_content(), '<a>') ?></p>
		<div class="section-content">
			<div class="row">
				<? list($cat, $posts) = get_category_posts('partners-cat'); ?>
				<?php if (count($posts)): ?>
					<? foreach($posts as $post): ?>
						<?php if (has_post_thumbnail($post)): ?>
							<? $thumb = get_the_post_thumbnail_url($post -> ID, 'medium') ?>
						<? else: ?>
							<? $thumb = TH_URI . '/imgs/partner-placeholder.png'; ?>
						<?php endif ?>
						<div class="col-12 col-md-6 col-lg-4 col-xl-3">
							<a href="<?= get_permalink($post -> ID) ?>" class="link-partner-single">
								<div class="partner-card">
									<img src="<?= $thumb ?>" class="partner-logo">
									<h4 class="heading partner-name"><?= $post -> post_title ?></h4>
								</div>
							</a>
						</div>
					<? endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</section>
</div>
<? include TH_DIR . "html/pages/layouts/footer.php" ?>