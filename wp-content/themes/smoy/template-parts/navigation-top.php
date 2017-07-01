<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */
?>
<div id="nav-logo-container-outer" class="nav-logo-container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
       <img id="smoy-top-nav-logo" src="<?php echo get_template_directory_uri(); ?>/img/logo/mainostoimisto_SMOY_logo_white.png" alt="Smoy navigation logo" width="99.5px" height="33px" />
    </a>
</div>
<div id="top-menu-overlay">
<div id="nav-logo-container-inner" class="nav-logo-container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
       <img id="smoy-top-nav-logo" src="<?php echo get_template_directory_uri(); ?>/img/logo/mainostoimisto_SMOY_logo_white.png" alt="Smoy navigation logo" width="99.5px" height="33px" />
    </a>
</div>
<a href="javascript:void(0)" id="top-menu-overlay-close" class="closebtn" onclick="domManager.closeNav()">&times;</a> 
<?php 
if(wp_is_mobile()) {
    wp_nav_menu( array(
        'theme_location'      => 'top',
        'menu_id'             => 'top-menu',
        'container'           => 'nav',
        'container_class'     => 'top-nav-mobile'
    )); 
}else{
   wp_nav_menu( array(
        'theme_location'      => 'top',
        'menu_id'             => 'top-menu',
        'container'           => 'nav'
    ));  
}
    
wp_nav_menu( array(
        'theme_location'      => 'right',
        'menu_id'             => 'right-menu',
        'container'           => 'div',
        'container_class'     => 'nav-right-container'
));    
    
    
?> 
</div>
<div id="mobile-landscape-overlay">
<a href="javascript:void(0)" id="mobile-landscape-overlay-close" class="closebtn" onclick="domManager.closeMobileLandscapeOverlay()">&times;</a>
</div>
<div id="open-button-container">
    <span id="top-menu-open" class="dashicons dashicons-menu" onclick="domManager.openNav()"></span>
</div>

