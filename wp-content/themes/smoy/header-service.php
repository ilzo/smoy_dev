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
<?php while ( have_posts() ) : the_post();
$service_id = get_the_ID();    
$single_thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
if($service_id % 2 === 0): ?>
    <div id="page-wrapper-service" class="service-pink">
<?php else: ?>
    <div id="page-wrapper-service" class="service-orange">
<?php 
endif; 
if ( has_post_thumbnail() ): ?>    
    <div id="header-single" style="background: url('<?php echo $single_thumb_url ?>')">
<?php else:  ?>
<div id="header-single">  
<?php endif; endwhile; ?>
    <div class="navigation-top">
         <?php get_template_part( 'template-parts/navigation', 'top' ); ?>
    </div><!-- .navigation-top -->
    <div class="single-service-title"><?php the_title(); ?></div>            
</div>