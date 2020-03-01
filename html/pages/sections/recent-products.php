<section class="site-section recent-products">
	<h2 class="heading section-heading">МАГАЗИН «ХАРАКТЕР»</h2>
	<p class="txt-normal section-sub-heading">Социальный проект, цель которого популяризация спорта и здорового образа жизни</p>
	<div class="section-content products">
		<div class="row">
			<? for($i=0; $i<4; $i++): ?>
				<div class="col-12 col-md-6 col-lg-4 col-xl-3 pd-card-wrap">
					<article class="product-card">
						<div class="product-image" style="background-image: url('<?= TH_URI ?>imgs/product-placeholder.png')"></div>
						<div class="product-card-content">
							<h4 class="heading product-title">Недетские ПЛОЩАДКИ</h4>
							<p class="product-excerpt">Социальный проект, цель которого
	популяризация спорта и здорового образа жизни </p>
						</div>
						<a href="/comming-soon" class="button chevron main link-to-product-page">Собрать свою</a>
					</article>
				</div>
			<? endfor ?>

		</div>

		<div class="section-footer">
			<a href="/comming-soon" class="button">
				Дальше лучше
			</a>	
		</div>
	</div>
</section>