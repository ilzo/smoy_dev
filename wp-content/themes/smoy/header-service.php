<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
<title><?php wp_title( '', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body>
<?php while ( have_posts() ) : the_post();
$service_id = get_the_ID();    
$single_thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$color_value = get_post_meta($service_id, 'service_color', true);    
if($color_value === 'orange'): ?>
    <div id="page-wrapper-service" class="service-orange">
<?php elseif($color_value === 'pink'): ?>
    <div id="page-wrapper-service" class="service-pink">
<?php elseif(empty($color_value)): ?>
    <div id="page-wrapper-service" class="service-orange">
<?php endif; endwhile; ?>  
<div id="header-service"> 
    <div class="navigation-top">
        <?php get_template_part( 'template-parts/navigation', 'top' ); ?>
    </div>
    <div class="navigation-sub">
        <?php get_template_part( 'template-parts/navigation', 'sub' ); ?>
    </div>
    <div class="single-service-title"><?php the_title(); ?></div>            
</div>