<?php
/**
 * Displays secondary navigation
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */

?>
<div id="secondary-menu-overlay">
    <?php wp_nav_menu( array(
		'theme_location' => 'secondary',
		'menu_id'        => 'secondary-menu',
        'container'      => 'nav',
        'link_before'    => '<span class="secondary-link-double-angle">&#187</span> '
	)); ?> 
</div>
