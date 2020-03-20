<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?= str_replace("  &#8212;  ", "", wp_title(" - ", false)); ?> <? if(!is_front_page()): ?>-<? endif ?> <?php bloginfo('name'); ?>. <?php bloginfo('description'); ?></title>
	
	<? wp_head() ?>

	<link rel="stylesheet" type="text/css" href="<?= TH_URI ?>libs/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="<?= TH_URI ?>libs/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?= TH_URI ?>libs/slick-1.8.1/slick/slick.css">

	<link rel="stylesheet" type="text/css" href="<?= TH_URI ?>css/theme.css">
	<link rel="stylesheet" type="text/css" href="<?= TH_URI ?>css/elements.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<script src="<?= TH_URI ?>libs/jquery.min.js"></script>
	<script src="<?= TH_URI ?>libs/slick-1.8.1/slick/slick.min.js"></script>
	<script src="<?= TH_URI ?>js/search.js"></script>
	<script src="<?= TH_URI ?>js/app.js"></script>
</head>
<body>

	<div class="popup-back"></div>
	<? include TH_DIR . 'html/pages/popups/login.php' ?>
	<? include TH_DIR . 'html/pages/popups/signup.php' ?>
	<? include TH_DIR . 'html/pages/layouts/adaptive-search-bar.php' ?>