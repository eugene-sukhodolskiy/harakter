<section class="site-section related-articles">
	<h4 class="heading section-heading">Релевантные статьи</h4>
	<div class="section-content">
		<div class="row">
			<? list($cat, $posts) = get_category_posts('articles-cat'); ?>
			<?php if (count($posts)): ?>
				<? for($i=0; $i<3 and $i<count($posts); $i++): $post = $posts[$i]; ?>
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
				<? endfor; ?>
			<?php endif ?>
		</div>
	</div>
</section>