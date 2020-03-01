<section class="site-section partners-carousel-section">
	<? list($cat, $posts) = get_category_posts('partners-cat'); ?>
	<h2 class="heading section-heading">ПАРТНЕРЫ</h2>
	<p class="txt-normal section-sub-heading">Социальный проект, цель которого популяризация спорта и здорового образа жизни 
Социальный проект, цель которого популяризация спорта и здорового образа жизни Социальный проект, цель которого популяризация спорта и здорового образа жизни </p>
	<div class="section-content">
		<div class="partners-carousel">
			<?php if (count($posts)): ?>
				<? foreach($posts as $post): ?>
					<?php if (has_post_thumbnail($post)): ?>
						<? $thumb = get_the_post_thumbnail_url($post -> ID, 'medium') ?>
					<? else: ?>
						<? $thumb = TH_URI . '/imgs/partner-placeholder.png'; ?>
					<?php endif ?>
						<div class="partner-container">
							<a href="<?= get_permalink($post -> ID) ?>" class="link-partner-single">
								<div class="partner-card">
									<img src="<?= $thumb ?>" class="partner-logo">
								</div>
							</a>
						</div>
				<? endforeach ?>
			<?php endif ?>
		</div>
		<div class="section-footer">
			<a href="/partners" class="button">Познакомиться со всеми</a>
		</div>
	</div>
</section>