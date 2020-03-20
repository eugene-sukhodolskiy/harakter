<?php

define("TH_DIR", __DIR__ . '/');
define('TH_URI', '/wp-content/themes/harakter/');

function th_setup(){
	add_theme_support( 'post-thumbnails' );
	add_theme_support('widgets');

	register_nav_menus(
		array(
			'main' => __( 'Primary', 'harakter' ),
			'social' => __( 'Social Links Menu', 'harakter' ),
		)
	);
}

add_action( 'after_setup_theme', 'th_setup' );

function get_category_posts($cat_slug){
	$cat = get_category_by_slug($cat_slug);

	$args = array(
		'numberposts' => 12,
		'category'    => $cat -> cat_ID,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	);

	if(is_tag()){
		list($tag) = get_the_terms( 0, 'post_tag');
		$args['tag'] = $tag -> slug;
	}
	$posts = get_posts($args);

	return [$cat, $posts];
}


function the_category_html($cat_slug){
	$cat = get_category_by_slug($cat_slug);
	$cat_link = get_category_link($cat);
	$cat_thumb = get_field("cat_thumbnail", $cat);

	$posts = get_posts( array(
		'numberposts' => 12,
		'category'    => $cat -> cat_ID,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	));

	ob_start();
	include __DIR__ . "/template-parts/content/block-category.php";
	$html = ob_get_clean();
	echo $html;
}

add_action('wp_ajax_nopriv_th_signup', 'th_signup');
add_action('wp_ajax_th_signup', 'th_signup');

add_action('wp_ajax_nopriv_th_login', 'th_login');
add_action('wp_ajax_th_login', 'th_login');

add_action('wp_ajax_th_ajax_search', 'th_ajax_search');
add_action('wp_ajax_nopriv_th_ajax_search', 'th_ajax_search');

function th_signup(){
	// dd($_POST);
	$email = $_POST['email'];
	list($username) = explode('@', $email);
	$password = $_POST['password'];
	$password_repeat = $_POST['password_repeat'];
	if($password != $password_repeat or !strlen($password) or !strlen($email) or !strlen($username)){
		echo '{"signup": 0}';
	}else{
		$user_id = wp_create_user( $username, $password, $email );

		echo '{"signup": ' . $user_id . '}';
	}
	exit;
}

function th_login(){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$data = array(
		'user_login'    => $email,
		'user_password' => $password
	);

	$u = wp_signon($data);

	// авторизация не удалась
	if ( is_wp_error($u) ) {
		echo json_encode(["error" => $user->get_error_message()]);
	}else{
		echo json_encode(["user" => $u]);
	}
	exit;
}

function th_ajax_search(){
	$args = array(
		's' => $_POST['term'],
		'posts_per_page' => 5
	);
	$the_query = new WP_Query($args);
	$posts = [];
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$posts[] = [
			"title" => get_the_title(),
			"link" => get_the_permalink(),
			"excerpt" => get_the_excerpt()
		];
	}

	echo json_encode($posts);
	exit;
}


function dd($var, $die_flag = true){
	ob_start();
	var_dump($var);
	$dump = ob_get_clean();

	// style
	$style = '
		<style type="text/css">
			.dd-container{
				width: 100%;
				box-sizing: border-box;
				height: auto;
				padding: 20px 10px;
				background-color: #333;
				color: white;
			}
			.dd-container *{
		    font-family: Arial;
  			letter-spacing: .8px;
			}
			.dd-line{
				padding: 5px 20px;
			}
			.dd-margin{
				margin-left: 30px;
			}
			.dd-arrow{
				font-weight: bold;
				padding: 0 10px;
				color: #D9CB04;
			}
			.dd-key{
				font-weight: bold;
				padding: 0 3px;
				color: #038C8C;
			}
			.dd-key-border{
				color: #026873;
			}
			.dd-keyword{
				font-weight: bold;
				color: #D9B504;
				margin-right: 5px;
			}
			.dd-brackets-content{
				font-weight: bold;
				padding: 0 3px;
				color: #F28D77;
			}
			.dd-block{
				display: none;
			}
			.dd-block.show{
				display: block;
			}
			.dd-btn{
		    display: inline-block;
		    color: #7ED955;
		    background: transparent;
		    padding: 0;
		    width: 20px;
		    height: 20px;
		    cursor: pointer;
		    text-align: center;
		    outline: none;
		    font-size: 16px;
		    line-height: 18px;
		    border: 2px solid #7ED955;
			}
			.dd-block-show,
			.dd-block-hide{
        margin-top: -29px;
		    position: relative;
		    left: -10px;
		    float: right;
			}
			.dd-block-hide{
				line-height: 16px;
				color: #F28D77;
				border-color: #F28D77;
			}
		</style>
	';

	// JAVASCRIPT
	$js = '<script>
		let ddJS = function(){
			let btnsShow = document.getElementsByClassName("dd-block-show");
			for(let i in btnsShow){
				let btn = btnsShow[i];
				btn.onclick = function(){
					this.style.display = "none";
					let block = document.getElementsByClassName("dd-block-id-" + this.dataset.blockShow)[0];
					block.classList.add("show");
				}
			}
			let btnsHide = document.getElementsByClassName("dd-block-hide");
			for(let i in btnsHide){
				let btn = btnsHide[i];
				btn.onclick = function(){
					document.querySelector("[data-block-show=\"" + this.dataset.blockHide + "\"]").style.display = "inline-block";
					let block = document.getElementsByClassName("dd-block-id-" + this.dataset.blockHide)[0];
					block.classList.remove("show");
				}
			}
		}
		ddJS();
	</script>';

	$lines = explode("\n", $dump);
	$prev_lvl = 0;
	$cur_lvl = 1;
	foreach ($lines as $inx => $line) {
		$two_space = '<span class="dd-margin"></span>';
		$len = strlen($line);
		$count_spaces = 0;		

		for($i=0; $i<$len; $i++){
			if($line[$i] != " "){
				$count_spaces = $i;
				break;
			}
		}

		$line = mb_substr($line, $count_spaces, $len);
		for($i=0; $i<$count_spaces / 2; $i++){
			$line = $two_space . $line;
		}

		$lines[$inx] = '<div class="dd-line">' . $line . '</div>';

		$cur_lvl = $count_spaces / 2;
		if($prev_lvl < $cur_lvl){
			$bid = uniqid('', $inx);
			$lines[$inx] = '
			<button class="dd-btn dd-block-show" data-block-show="' . $bid . '">+</button>
			<div class="dd-block dd-block-lvl-
			' . $cur_lvl . ' dd-block-id-' . $bid . '">
			<button class="dd-btn dd-block-hide" data-block-hide="' . $bid . '">-</button>
			' . $lines[$inx];
		}

		if($prev_lvl > $cur_lvl){
			$lines[$inx] .= '</div>';
		}

		$prev_lvl = $cur_lvl;

	}

	$dump = implode('', $lines);

	$dump = str_replace('=>', '<span class="dd-arrow">>></span>', $dump);
	$dump = str_replace('["', '<span class="dd-key-border">["</span><span class="dd-key">', $dump);
	$dump = str_replace('"]', '</span><span class="dd-key-border">"]</span>', $dump);

	// keywords
	$keywords = ['array', 'string', 'int', 'float', 'double', 'object'];
	$formating_keywords = array_map(function($item){
		return '<span class="dd-keyword">' . $item . '</span>';
	}, $keywords);
	$dump = str_replace($keywords, $formating_keywords, $dump);

	// brackets content
	$dump = str_replace('(', '(<span class="dd-brackets-content">', $dump);
	$dump = str_replace(')', '</span>)', $dump);

	// Print data forming
	$dump = $style . '<div class="dd-container">' . $dump;
	$dump .= '</div>' . $js;

	echo $die_flag ? die($dump) : $dump;
}