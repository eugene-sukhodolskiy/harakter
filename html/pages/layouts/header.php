<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?= str_replace("  &#8212;  ", "", wp_title(" - ", false)); ?> <? if(!is_front_page()): ?>-<? endif ?> <?php bloginfo('name'); ?>. <?php bloginfo('description'); ?></title>
	
	<? wp_head() ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="x-rim-auto-match" content="none">

</head>
<body <?php body_class(); ?>>

	<div class="popup-back"></div>
	<? include TH_DIR . 'html/pages/popups/login.php' ?>
	<? include TH_DIR . 'html/pages/popups/signup.php' ?>
	<? include TH_DIR . 'html/pages/layouts/adaptive-search-bar.php' ?>