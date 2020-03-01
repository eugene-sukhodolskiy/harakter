<section class="site-section latest-articles">
	<h2 class="heading section-heading">Наша команда</h2>
	<p class="txt-normal section-sub-heading">Социальный проект, цель которого популяризация спорта и здорового образа жизни</p>
	<div class="section-content articles">
		<div class="row">
			<? list($cat, $posts) = get_category_posts('team-cat'); ?>
			<?php if (count($posts)): ?>
				<? for($i=0; $i<6 and $i<count($posts); $i++): $post = $posts[$i]; ?>
					<?php if (has_post_thumbnail($post)): ?>
						<? $thumb = get_the_post_thumbnail_url($post -> ID, 'medium') ?>
					<? else: ?>
						<? $thumb = TH_URI . '/imgs/team-placeholder.png'; ?>
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

		<div class="section-footer">
			<a href="/team" class="button">
				Вся команда
			</a>	
		</div>
	</div>
</section>