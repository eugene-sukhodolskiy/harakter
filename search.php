<? include TH_DIR . "html/pages/layouts/header.php" ?>
<? include TH_DIR . "html/pages/layouts/navbar.php" ?>
<? $back_btn_url = "/"; ?>
<? include TH_DIR . "html/pages/layouts/back-button.php" ?>
<div class="container">
	<div class="row">
		<div class="col-10 offset-1">
			<section class="site-section page search">
				<h4 class="heading section-heading">
					Результаты поиска "<?= $_GET['s'] ?>"
				</h4>
				<div class="count-results">
					Найдено
					<? 
						global $wp_query;
						echo $wp_query -> found_posts; 
					?>
					результатов
				</div>
				<div class="search-results-container">
					<? while(have_posts()): the_post(); ?>
						<div class="search-result-item">
							<? if(has_post_thumbnail()): ?>
								<div style="background-image: url('<?= get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?>');" class="post-thumbnail"></div>
							<? endif ?>
							<article class="post-content">
								<h4 class="heading">
									<a href="<?= get_permalink(get_the_ID()) ?>" class="link-to-search-result-page"><? the_title() ?></a>
								</h4>
								<p class="desc"><? the_excerpt() ?></p>
							</article>
						</div>
					<? endwhile ?>
				</div>
			</section>
		</div>
	</div>
</div>
<? include TH_DIR . "html/pages/layouts/footer.php" ?>