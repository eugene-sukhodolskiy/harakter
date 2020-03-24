<? include TH_DIR . "html/pages/layouts/header.php" ?>
<? include TH_DIR . "html/pages/layouts/navbar.php" ?>
<? include TH_DIR . "html/pages/layouts/social-bar.php" ?>
<? $back_btn_url = "/partners"; ?>
<? include TH_DIR . "html/pages/layouts/back-button.php" ?>
<? the_post() ?>
<div class="container">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12 col-xl-10 offset-xl-1">
			<section class="site-section page partner-single">
				<h2 class="heading section-heading"><? the_title() ?></h2>
				<div class="section-content">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-4 col-xl-3">
							<?php if (has_post_thumbnail($post)): ?>
								<? $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>
							<? else: ?>
								<? $thumb = TH_URI . '/imgs/partner-placeholder.png'; ?>
							<?php endif ?>
							<img src="<?= $thumb ?>" class="partner-logo">
						</div>
						<div class="col-12 col-md-6 col-lg-8 col-xl-9">
							<div class="about-partner">
								<? the_content() ?>
							</div>
							<div class="partner-links">
								<?
									$contacts = [];
									list($contacts['facebook']) = get_post_meta(get_the_ID(), 'facebook');
									list($contacts['instagram']) = get_post_meta(get_the_ID(), 'instagram');
									list($contacts['youtube']) = get_post_meta(get_the_ID(), 'youtube');
									list($contacts['telegram']) = get_post_meta(get_the_ID(), 'telegram');
								?>
								<? foreach($contacts as $contact_name => $contact_link): ?>
									<? if(!strlen(trim($contact_link))) continue; ?>
									<a href="<?= $contact_link ?>" class="partner-link <?= $contact_name ?>" target="_blank"></a>
								<? endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<? include TH_DIR . "html/pages/layouts/footer.php" ?>