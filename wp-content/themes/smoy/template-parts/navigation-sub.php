<?php
/**
 * Displays sub navigation
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */

?>
<div id="sub-menu-overlay">
    <?php wp_nav_menu( array(
		'theme_location' => 'sub',
		'menu_id'        => 'sub-menu',
        'container'      => 'nav',
        'link_before'    => '<span class="sub-link-double-angle">&#187</span> '
	)); ?> 
</div>
