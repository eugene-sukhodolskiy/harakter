<? list($cat) = get_the_category(get_the_ID()); ?>
<? if($cat -> slug == 'articles-cat'): ?>
	<? include TH_DIR . 'article-single.php'; ?>
<? elseif($cat -> slug == 'partners-cat'): ?>
	<? include TH_DIR . 'partner-single.php'; ?>
<? elseif($cat -> slug == 'team-cat'): ?>
	<? include TH_DIR . 'teammate-single.php'; ?>
<? endif; ?>