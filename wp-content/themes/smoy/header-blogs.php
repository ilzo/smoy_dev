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
<div id="page-wrapper-blogs">
<?php    
$smoy_blogs_query_args = array(
  'post_type' => 'post',
  'category_name' => 'blogi',
  'posts_per_page' => 1
);

$smoy_blogs_loop = new WP_Query($smoy_blogs_query_args); 
while ($smoy_blogs_loop->have_posts()) : $smoy_blogs_loop->the_post();
$latest_blog_thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'bg-test-2', true);     
?>
<div id="header-blogs" style="background-image: url('<?php echo esc_url($latest_blog_thumb_url[0])?>')">
<?php endwhile; wp_reset_postdata(); ?>    
    <div class="navigation-top">
        <?php get_template_part( 'template-parts/navigation', 'top' ); ?>
    </div>
    <div class="navigation-secondary">
        <?php get_template_part( 'template-parts/navigation', 'secondary' ); ?>
    </div>          
</div>