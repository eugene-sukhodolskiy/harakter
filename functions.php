<?php

define("TH_DIR", __DIR__ . '/');
define('TH_URI', '/wp-content/themes/harakter/');

include "utils.php";

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

add_action('after_setup_theme', 'th_setup');
add_action('wp_enqueue_scripts', 'harakter_scripts');
function harakter_scripts() {
	// Libs of css
	wp_enqueue_style('normalize', TH_URI . "libs/normalize.min.css");
	wp_enqueue_style('bootstrap-grid', TH_URI . "libs/bootstrap/css/bootstrap-grid.min.css");
	wp_enqueue_style('slick-css', TH_URI . "libs/slick-1.8.1/slick/slick.css");

	// Theme css
	wp_enqueue_style('theme', TH_URI . "css/theme.css");
	wp_enqueue_style('elements', TH_URI . "css/elements.css");
	
	// Libs of js
	wp_enqueue_script('jquery-min', TH_URI . 'libs/jquery.min.js');
	wp_enqueue_script('slick-js', TH_URI . 'libs/slick-1.8.1/slick/slick.min.js');

	// Theme scripts
	wp_enqueue_script('search', TH_URI . 'js/search.js');
	wp_enqueue_script('video-player', TH_URI . 'js/video-player.js');
	wp_enqueue_script('app', TH_URI . 'js/app.js');
}

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

add_action('wp_ajax_th_share_counter_plus', 'th_share_counter_plus');
add_action('wp_ajax_nopriv_th_share_counter_plus', 'th_share_counter_plus');

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

function th_share_counter_plus(){
	$post_id = intval($_POST['post_id']);
	
	$shares = get_option('th_shares');
	if(!$shares){
		$shares = '[]';
	}

	$shares = json_decode($shares, true);

	$search_flag = false;
	foreach($shares as $i => $share){
		if($share['pid'] == $post_id){
			$shares[$i]['c'] += 1;
			$search_flag = true;
		}
	}

	if(!$search_flag){
		$shares[] = ['pid' => $post_id, 'c' => 1];
	}

	$shares = json_encode($shares);
	update_option('th_shares', $shares);

	exit;
}

function get_share_counter($post_id){
	$shares = get_option('th_shares');
	// dd($shares);
	if(!$shares){
		$shares = '[]';
	}

	$shares = json_decode($shares, true);

	foreach($shares as $i => $share){
		if($share['pid'] == $post_id){
			return $share['c'];
		}
	}

	return 0;
}