<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.jpg" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
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