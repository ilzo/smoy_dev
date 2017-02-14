<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
<!--
<meta name="theme-color" content="#ff3c46" />
<meta name="msapplication-navbutton-color" content="#ff3c46">
<meta name="apple-mobile-web-app-status-bar-style" content="#ff3c46">
-->
<title><?php wp_title( '', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body>
<div id="page-wrapper-single">
<div class="header-single">   
    
        <div class="single-title"><?php the_title(); ?></div>
             
</div>