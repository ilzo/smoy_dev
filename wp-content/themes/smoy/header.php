<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, user-scalable=1"/>
<title>Smoy Dev</title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_head(); ?>
</head>
<?php if(is_home()): ?>
<body id="smoy-home">
<?php else: ?>
<body>
<?php endif; ?>
<div class="page-wrapper">
<?php if(is_home()): ?>
<header id="header-home">
<?php else: ?>
<header id="header-eng">
<?php endif; ?>
    <div class="navigation-top">
        <?php get_template_part( 'template-parts/navigation', 'top' ); ?>
    </div>
    <div class="navigation-sub">
        <?php get_template_part( 'template-parts/navigation', 'sub' ); ?>
    </div>
    <?php do_action( 'smoy_get_front_page_header_video_markup'); ?>
</header> 
<div id="content" class="site-content">