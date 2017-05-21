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
<?php 
    /*
        $smoy_single_post_thumbnail_url = the_post_thumbnail_url( 'large' );
        $test = '#header-single{ background: url("'.$smoy_single_post_thumbnail_url.'");}';
        $smoy_single_header_css = '<style type="text/css">';
        $smoy_single_header_css .= $smoy_single_post_thumbnail_url;
        $smoy_single_header_css .= $test;
        $smoy_single_header_css .= '</style>';

        echo $smoy_single_header_css;
        */
    
    ?>
<?php wp_head(); ?>
</head>

<body>
<div id="page-wrapper-single">
<div id="header-single">
    <div class="navigation-top">
        <?php get_template_part( 'template-parts/navigation', 'top' ); ?>
    </div>
    <div class="navigation-sub">
        <?php get_template_part( 'template-parts/navigation', 'sub' ); ?>
    </div>         
</div>