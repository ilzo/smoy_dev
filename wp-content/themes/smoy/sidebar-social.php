<?php
/**
 * The sidebar containing the floating social icons widget
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Smoy
 * 
 */
if ( is_active_sidebar( 'social_widget_sidebar' )) : 
?>
<div id="social-sidebar" class="widget-area" role="secondary">
    <?php dynamic_sidebar( 'social_widget_sidebar' ); ?>
</div>
<?php endif; ?>