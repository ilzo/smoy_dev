<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, user-scalable=1"/>
<!--
<meta name="theme-color" content="#ff3c46" />
<meta name="msapplication-navbutton-color" content="#ff3c46">
<meta name="apple-mobile-web-app-status-bar-style" content="#ff3c46">
-->
<title>Smoy Dev</title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrapper">
<header id="header-home">
    <div class="navigation-top">
        <?php get_template_part( 'template-parts/navigation', 'top' ); ?>
    </div>
    <div class="navigation-sub">
        <?php get_template_part( 'template-parts/navigation', 'sub' ); ?>
    </div>
    <section id="home-hero"></section>
</header> 
<div id="content" class="site-content">