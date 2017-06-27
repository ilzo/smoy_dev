<?php
/**
 * The sidebar containing the newsletter subscription widget
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Smoy
 * 
 */
if ( is_active_sidebar( 'newsletter_subscription_sidebar' ) ) : ?>
<?php if(!smoy_is_mobile_phone()) : ?>
<div id="newsletter-sidebar" class="widget-area" role="secondary">
    <?php dynamic_sidebar( 'newsletter_subscription_sidebar' ); ?>
</div>
<?php endif; ?>
<div id="newsletter-footer" class="widget-area">
    <?php dynamic_sidebar( 'newsletter_subscription_footer' ); ?>
</div>
<?php endif; ?>

