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
    add_image_size( 'test-big', 3000, 9999);
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

/*

add_filter( 'wp_nav_menu_items', 'add_logo_to_nav', 10, 2 );

function add_logo_to_nav( $items, $args )
{
     if( $args->theme_location == 'top' ){
        $items .= '<li><a title="Admin" href="'. esc_url( admin_url() ) .'">' . __( 'Admin' ) . '</a></li>';
    }
    return $items;
}
*/


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
function smoy_custom_menu_item ($items, $args) {
    if ($args->theme_location == 'top') {
    $items .= '<li>Show whatever</li>';
    }
    
    print_r($items);
  
    return $items;
}

*/



/*
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );
*/




add_action( 'customize_register', 'smoy_customize_register' );

function smoy_customize_register( $wp_customize ) {
    
    /* ----------------------------------- */
    /* ------------- SECTIONS ------------ */
    /* ----------------------------------- */
    
    
    
    /* ------- Front-Page Customer References ----- */
    
    $wp_customize->add_section( 'smoy_customer_ref_section', array(
      'title' => __( 'Customers', 'smoy' ),
      'description' => __( 'Edit customer references here.', 'smoy' ),
      'capability' => 'edit_theme_options'
    ));
    
    
    
    /* ----------------------------------- */
    /* ------------- SETTINGS ------------ */
    /* ----------------------------------- */
    
    
   
    /* ------- Front-Page Customer References -------- */
    
    
    for ($i = 1; $i < 13; $i++) {
        
        $wp_customize->add_setting('smoy_customer_bg_img_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        ));
        
        $wp_customize->add_setting('smoy_customer_logo_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        ));
        
        $wp_customize->add_setting('smoy_customer_logo_min_height_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '0',
            'sanitize_callback' => 'absint'
        ));
        
        $wp_customize->add_setting('smoy_customer_logo_max_height_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '200',
            'sanitize_callback' => 'absint'
        ));
        
    }
    
    
    /* ----------------------------------- */
    /* ------------- CONTROLS ------------ */
    /* ----------------------------------- */
    
    

    /* ------- Front-Page Services -------- */
    
    
    for ($i = 1; $i < 13; $i++) {
        
        $wp_customize->add_control( 
            new WP_Customize_Media_Control(
                $wp_customize,'smoy_customer_logo_'.$i, array(
                    'label' => __( 'Customer logo '.$i , 'smoy'),
                    'section' => 'smoy_customer_ref_section',
                    'mime_type' => 'image',
                    'active_callback' => 'is_front_page'
                )
            )
        );
        
        $wp_customize->add_control( 
            new WP_Customize_Media_Control(
                $wp_customize,'smoy_customer_bg_img_'.$i, array(
                    'label' => __( 'Customer background image '.$i , 'smoy'),
                    'section' => 'smoy_customer_ref_section',
                    'mime_type' => 'image',
                    'active_callback' => 'is_front_page'
                )
            )
        );
        
        
        $wp_customize->add_control( 'smoy_customer_logo_min_height_'.$i, array(
          'type' => 'range',
          'section' => 'smoy_customer_ref_section',
          'label' => __( 'Logo '.$i.' min height' ),
          'description' => __( 'Adjust the logo minimun height (default 0)' ),
          'input_attrs' => array(
            'min' => 0,
            'max' => 200,
            'step' => 1,
          ),
        ));
        
        $wp_customize->add_control( 'smoy_customer_logo_max_height_'.$i, array(
          'type' => 'range',
          'section' => 'smoy_customer_ref_section',
          'label' => __( 'Logo '.$i.' max height' ),
          'description' => __( 'Adjust the logo maximum height (default 200)' ),
          'input_attrs' => array(
            'min' => 0,
            'max' => 200,
            'step' => 1,
          ),
        ));
    
    }
    
    
}


/*
function smoy_customer_references_styles() {
    $id = get_theme_mod('little_header');

    if ($id != 0) {
        $url = wp_get_attachment_url($id);

        echo '<div style="margin-bottom: 30px;">';
        echo '<img src="' . $url . '" alt="" />';
        echo '</div>';
    }
}
*/

/*

add_action( 'wp_head', 'smoy_customer_references_styles' );

function smoy_customer_references_styles(){
    
    echo "<style type=\"text/css\">";
    
    for ($i = 1; $i < 13; $i++) {
        
        //${'smoy_customer_logo_'.$i} = get_theme_mod( 'smoy_customer_logo_'.$i);
        
        ${'smoy_customer_bg_img_'.$i} = get_theme_mod( 'smoy_customer_bg_img_'.$i);
        
        if (${'smoy_customer_bg_img_'.$i} != 0) {
            $url = wp_get_attachment_url(${'smoy_customer_bg_img_'.$i});
            echo "#customer-".$i." .customer-content-wrapper {background: linear-gradient( rgba(17, 24, 27, 0.68), rgba(17, 24, 27, 0.68) ), url(\"".${'smoy_customer_bg_img_'.$i}."\");}\n";
            
        }
         
          
    }
    
    echo "</style>";
     
}
*/





add_action( 'wp_head', 'smoy_customer_references_styles');

function smoy_customer_references_styles() {

    $css = array();
    $customer_bg_imgs = array();
    $smoy_refs_logo_min_heights = array();
    $smoy_refs_logo_max_heights = array();
    $counter = 1;
    
    for($i = 0; $i < 12; $i++){
        $j = $i + 1;
        $customer_bg_imgs[$i] = get_theme_mod( 'smoy_customer_bg_img_'.$j);
    }
    
    foreach ($customer_bg_imgs as $bg_img) {
        
        $this_customer_logo_min_height = get_theme_mod( 'smoy_customer_logo_min_height_'.$counter);
        $this_customer_logo_max_height = get_theme_mod( 'smoy_customer_logo_max_height_'.$counter);
    
        if(empty($bg_img)){
            $css['#customer-'.$counter.' .customer-content-wrapper']['background'] = "linear-gradient( rgba(17, 24, 27, 0.68), rgba(17, 24, 27, 0.68) )";
        }else{
            $bg_url = wp_get_attachment_url($bg_img);
            $css['#customer-'.$counter.' .customer-content-wrapper']['background'] = "linear-gradient( rgba(17, 24, 27, 0.68), rgba(17, 24, 27, 0.68) ), url(\"".$bg_url."\")";
        }
    
        if(!empty($this_customer_logo_min_height)){
            $css['#customer-'.$counter.' .customer-content img']['min-height'] = $this_customer_logo_min_height . 'px';
        }
        
        if(!empty($this_customer_logo_max_height)){
            $css['#customer-'.$counter.' .customer-content img']['max-height'] = $this_customer_logo_max_height . 'px';
        }
        
        $counter++;
          
    }

    $final_css = '<style type="text/css">';
    foreach ( $css as $style => $style_array ) {
        $final_css .= $style . '{';
        foreach ( $style_array as $property => $value ) {
            $final_css .= $property . ':' . $value . ';';
        }
        $final_css .= '}';
    }
    
    $final_css .= '</style>';

    echo $final_css;
}

add_action('smoy_get_references', 'smoy_refs_front_page_output');

function smoy_refs_front_page_output() {
    
    $smoy_refs_logos = array();
    
    for ($i = 0; $i < 12; $i++) {
        $j = $i + 1; 
        $smoy_refs_logos[$i] = wp_get_attachment_url(get_theme_mod( 'smoy_customer_logo_'.$j));
    }
    
    ob_start();
	require_once(get_template_directory() . '/template-parts/smoy-customer-references.php' );
	$output = ob_get_clean();
	echo $output;
}





