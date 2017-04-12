<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */

?>
<!--
<div id="site-navigation" class="main-navigation" role="navigation">
-->
    
<div id="nav-logo-container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
       <img src="<?php echo get_template_directory_uri(); ?>/img/logo/mainostoimisto_SMOY_logo_white.png" alt="Smoy navigation logo" width="99.5px" height="33px" />
    </a>
</div>

<div id="top-menu-overlay">
    
    <a href="javascript:void(0)" id="top-menu-overlay-close" class="closebtn" onclick="closeNav()">&times;</a>
	<?php wp_nav_menu( array(
		'theme_location'      => 'top',
		'menu_id'             => 'top-menu',
        'container'           => 'nav'
	)); ?>
    
    
</div>	
<div id="open-button-container">
    <span id="top-menu-open" class="dashicons dashicons-menu" onclick="openNav()"></span>
</div>


<!--
</div>
-->
