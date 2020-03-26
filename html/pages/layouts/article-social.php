<div class="article-social">
	<!-- <button class="like"> (123)</button> -->
	<div class="share-container" tabindex="0">
		<div class="share-list">
			<a href="https://www.facebook.com/sharer.php?u=<?= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>&t=<? the_title() ?>&text=<?= strip_tags(get_the_excerpt()) ?><? if(isset($thumb)): ?>&picture=<?= $thumb ?><? endif ?>" 
				class="share-btn facebook" 
				target="_blank" 
				data-counter-container=".share" 
				data-post-id="<? the_ID() ?>"></a>

			<a href="https://t.me/share/url?url=<?= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>&text=<? the_title() ?>" 
				class="share-btn telegram" 
				target="_blank" 
				data-counter-container=".share" 
				data-post-id="<? the_ID() ?>"></a>
		</div>
		<? $scounter = get_share_counter(get_the_ID()); ?>
		<div class="share" data-counter="<?= $scounter ?>"> (<?= $scounter ?>)</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.share-container .share-btn').on('click', shareCounterPlus);
	});
</script>