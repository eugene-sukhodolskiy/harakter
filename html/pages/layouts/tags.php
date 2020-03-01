<? $postIDs = get_objects_in_term(6, 'category'); ?>
<? if (!empty($postIDs) && !is_wp_error($postIDs)) {
	$tags = wp_get_object_terms($postIDs, 'post_tag');
} ?>
<? if(isset($tags) and count($tags)): ?>
<div class="tags">
	<ul>
		<li class="tag <? if(!is_tag()): ?>active<? endif ?>"><a href="/articles" class="tag-link">Все</a></li>
		<? foreach($tags as $tag): ?>
			<li class="tag <? if(is_tag($tag)): ?>active<? endif ?>"><a href="<?= get_term_link($tag, 'post_tag') ?>" class="tag-link"><?= $tag -> name ?></a></li>
		<? endforeach ?>
	</ul>
</div>
<? endif ?>