<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */

?>
<div id="site-navigation" class="main-navigation" role="navigation">
	
	<?php wp_nav_menu( array(
		'theme_location'      => 'top',
		'menu_id'             => 'top-menu',
        'container'           => 'nav'
	)); ?>

</div><!-- #site-navigation -->
