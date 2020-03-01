<? include TH_DIR . "html/pages/layouts/header.php" ?>
<? include TH_DIR . "html/pages/layouts/navbar.php" ?>
<? include TH_DIR . "html/pages/layouts/social-bar.php" ?>
<? the_post() ?>
<div class="container">
	<section class="site-section page team">
		<h2 class="heading section-heading"><? the_title() ?></h2>
		<p class="txt-normal section-sub-heading"><?= strip_tags(get_the_content(), '<a>') ?></p>
		<div class="section-content">
			<div class="row">
				<? list($cat, $posts) = get_category_posts('team-cat'); ?>
				<?php if (count($posts)): ?>
					<? for($i=0; $i<count($posts); $i++): $post = $posts[$i]; ?>
						<?php if (has_post_thumbnail($post)): ?>
							<? $thumb = get_the_post_thumbnail_url($post -> ID, 'medium') ?>
						<? else: ?>
							<? $thumb = TH_URI . '/imgs/team-placeholder.png'; ?>
						<?php endif ?>
						<div class="col-12 col-md-6 col-lg-4 col-xl-3">
							<div class="team-item">
								<a href="<?= get_permalink($post -> ID) ?>">
									<div class="thumbnail" style="background-image: url('<?= $thumb ?>')"></div>
									<h4 class="heading name"><?= $post -> post_title ?></h4>
									<p class="excerpt"><?= strip_tags($post -> post_content) ?></p>
								</a>
							</div>
						</div>
				<? endfor; ?>
			<?php endif ?>
			</div>
		</div>
	</section>
</div>
<? include TH_DIR . "html/pages/layouts/footer.php" ?>