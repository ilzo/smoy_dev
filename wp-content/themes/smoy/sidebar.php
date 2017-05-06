<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Smoy
 * 
 */
if ( is_active_sidebar( 'blog_posts_sidebar' ) ) : 
?>
<aside id="primary-sidebar" class="primary-sidebar widget-area" role="primary">
    <?php dynamic_sidebar( 'blog_posts_sidebar' ); ?>
</aside>
<?php endif; ?>

