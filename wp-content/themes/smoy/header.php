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