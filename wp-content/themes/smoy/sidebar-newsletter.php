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
if ( is_active_sidebar( 'newsletter_subscription_sidebar' ) && !smoy_is_mobile_phone()) : 
?>
<div id="newsletter-sidebar" class="widget-area" role="secondary">
    <?php dynamic_sidebar( 'newsletter_subscription_sidebar' ); ?>
</div>
<?php endif; ?>

