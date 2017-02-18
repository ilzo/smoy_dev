<?php


define('MAINTENANCE', false); //set to true to enable maintenance mode
if (!is_admin() && !current_user_can( 'manage_options' ) && MAINTENANCE) { //envoke maintenance if set
    if ( file_exists( WP_CONTENT_DIR . '/maintenance.php' ) ) {
        require_once( WP_CONTENT_DIR . '/maintenance.php' );
        die();
    }
}

function smoy_setup() {
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
    load_theme_textdomain( 'smoy' );

    /*
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
    
    */
    
    //remove_filter( 'the_content', 'wpautop' );

	
	add_theme_support( 'post-thumbnails' );
    /* Set the image size by cropping the image */
    add_image_size('test-thumbnail', 500, 326, true);
    /*
    add_image_size('works-thumbnail-large', 1250, 815, true ); 
    add_image_size( 'single-big-test', 3000, 9999);
    add_image_size( 'single-big-test-2', 1024, 9999);
    add_image_size( 'front-bg-small', 1200, 800, false);
    add_image_size( 'front-bg-medium', 1800, 1200, false );
    add_image_size( 'front-bg-large', 2400, 1600, false );
    add_image_size('front-bg-mobile', 1920, 1600, true);
    
    
    add_image_size( 'front-bg-small-crop', 1200, 800, true);
    */
    
    /* Some predefined image sizes for front-page masonry-grid */
    
    /*
    add_image_size( 'works-test-1', 450, 300, true );
    add_image_size( 'works-test-2', 280, 345, true );
    add_image_size( 'works-test-3', 300, 450, true );
    add_image_size( 'works-test-4', 400, 520, true );
    add_image_size( 'works-test-5', 600, 320, true );
    
    */
    
    
	/* set_post_thumbnail_size( 1200, 9999 );*/
    
    

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
    /*
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    */

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
    
    

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	//add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	//add_theme_support( 'customize-selective-refresh-widgets' );
    
    if ( ! isset( $content_width ) ) {
        $content_width = 800;
    }
  
    
        
}

function smoy_register_menus() {
  register_nav_menus(
    array('top' => __( 'Main menu', 'smoy' ))
  );
}

add_action( 'init', 'smoy_register_menus' );

function load_scripts()
{
    
    /*
    if (!is_admin()) {
        wp_deregister_script('masonry');
    }
    */
    
    wp_register_script( 'font-awesome', 'https://use.fontawesome.com/e06db2cf19.js', array(), '4.6.3', false );
    
    
    //wp_register_script( 'scrolloverflow', get_template_directory_uri() . '/js/scrolloverflow.min.js', array(), '5.2.0', false);
    
    //wp_register_script( 'slimscroll', get_template_directory_uri() . '/js/jquery.slimscroll.js', array( 'jquery'), '1.3.8', false);
    
    //wp_register_script( 'fullpage-js', get_template_directory_uri() . '/js/jquery.fullpage.js', array( 'jquery', 'scrolloverflow' ), '2.8.2', false);
    
    //wp_register_script( 'masonry-4.1.0', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '4.1.0', false);
    
    //wp_register_script( 'gsap-tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js', array(), '1.18.5', false );
    
    //wp_register_script( 'gsap-timelinelite', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TimelineLite.min.js', array(), '1.18.5', false );
    
    //wp_register_script( 'scroll-magic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array( 'gsap-tweenmax' ), '2.0.5', false);
    

    //wp_register_script( 'scroll-magic-gsap-plugin', get_template_directory_uri() . '/js/animation.gsap.min.js', array( 'gsap-tweenmax', 'scroll-magic' ), '2.0.5', false);
    
    /*
    wp_register_script( 'smoy-animations-home', get_template_directory_uri() . '/js/smoyAnimationsHome.js', array( 'jquery', 'gsap-tweenmax', 'scroll-magic', 'scroll-magic-gsap-plugin'), '1.0.0', true );
    */
    
    
    //wp_register_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.js', array('salvattore'), '2.8.2', true);
    
    //wp_register_script( 'custom-juicer', get_template_directory_uri() . '/js/customJuicer.js', array( 'jquery'), '1.0.0', true );
   
    // Enqueue the registered scripts 
    wp_enqueue_script( 'font-awesome' );
    
    //wp_enqueue_script( 'gsap-tweenmax' );
    
    //wp_enqueue_script( 'gsap-timelinelite' );
    
    //wp_enqueue_script( 'scroll-magic' );
    
    //wp_enqueue_script( 'scroll-magic-gsap-plugin' );
    
    //wp_enqueue_script( 'nav-menu');
    
    
    /*
    if (!is_singular('smoy_project')) {
        
    }
    
    if (!wp_is_mobile() && !is_singular('loud_project')) {
        wp_enqueue_script('masonry-4.1.0');
    }
    */
    
    /*
    if (is_singular('smoy_project')) {
       
        wp_enqueue_script( 'smoy-animations-single' );
        
    }
    */
    
    /*
    if (wp_is_mobile() && !is_singular('smoy_project')) {
        wp_enqueue_script( 'smoy-animations-home-mobile' );
    }
    */
    
}

function smoy_styles() {
    /*
    if (is_singular('smoy_project')) {
        wp_enqueue_style( 'fullpage-css', get_stylesheet_directory_uri() . '/css/jquery.fullpage.min.css');
    }
    
    if (wp_is_mobile() && is_singular('smoy_project')) {
        
    }
    */
    
    
}



add_action( 'after_setup_theme', 'smoy_setup' );

add_action( 'wp_enqueue_scripts', 'smoy_styles' );

add_action( 'wp_enqueue_scripts', 'load_scripts' );

//add_filter( 'pre_get_posts', 'smoy_get_posts' );


/*
function smoy_get_posts( $query ) {

	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'projects' ) );

	return $query;
}
*/


/*

add_filter( 'the_content', 'modify_single_content', 10, 1 );

function modify_single_content($content) 
{
    if ( !is_home()) {
         
         $content = str_replace('</p>', '</div></section>', $content);
        
         $string = '';

         return preg_replace_callback(
             '|<p>|',
             function ( $matches )
             {
                 static $i = 1;
                 return sprintf( '<section id="single-section-%1$d" class="single-section"><div id="single-container-%1$d" class="single-container">', $i++ );
             },
             $content
         );
     }
}

*/

/*


add_filter('the_content', 'modify_single_content');


function modify_single_content($content) {
    
    if ( !is_home()) {
        
        $counter = substr_count($content, '<p>');
        
        
        $content = str_replace('<p>', '<section class="single-content-section"><div class="single-container">', $content);
        $content = str_replace('</p>', '</div></section>', $content);
        return $content;
    } 
}
*/

/*

add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return  esc_url( get_stylesheet_directory_uri() ) . '/images/ajax-loader-contact.gif';
}


add_filter('next_post_link', 'posts_link_next_class');

function posts_link_next_class($format){
     $format = str_replace('href=', 'class="animsition-link" href=', $format);
     return $format;
}

add_filter('previous_post_link', 'posts_link_prev_class');

function posts_link_prev_class($format) {
     $format = str_replace('href=', 'class="animsition-link" href=', $format);
     return $format;
}
*/

/*
function getImages() {
    global $post;
    $szPostContent = $post->post_content;
    $szSearchPattern = '~<img [^\>]*\ />~';
    // Run preg_match_all to grab all the images and save the results in $aPics
    preg_match_all( $szSearchPattern, $szPostContent, $aPics );
    return $aPics[0];
}
*/



//add_filter('the_content', 'strip_images_and_gallery');


//function strip_images_and_gallery($content){
    /*
    $content = preg_replace('/<img[^>]+./', '', $content);
    $content = preg_replace('/<a[^>]+./', '', $content);
    */
/*
    
    $content = str_replace('<p>', '<p class="single-text">', $content);
    $content = strip_tags($content, '<p><a><h1><h2><blockquote><code><ul><li><i><em><strong>');
    
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;    
}
*/


/*
add_filter( 'the_content', 'strip_shortcode_gallery', 10, 1 );

function strip_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;
}
*/



/*
add_filter( 'wp_nav_menu_items', 'smoy_custom_menu_item', 10, 2 );
function smoy_custom_menu_item ($items) {
    
    $items .= '<li>Show whatever</li>';
  
    return $items;
}
*/


/*
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );
*/