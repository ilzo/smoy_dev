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
    //add_image_size('test-thumbnail', 500, 326, true);
    //add_image_size( 'test-big', 3000, 9999);
    add_image_size( 'service-thumb', 1600, 9999);
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
    
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    
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


add_action('init', 'smoy_services');

function smoy_services() {
    
    $labels = array(
        'name' => _x('Palvelut', 'post type general name'),
        'singular_name' => _x('Palvelu', 'post type singular name'),
        'add_new_item' => _x( 'Lisää uusi palvelu', 'smoy' ),
        'set_featured_image' => _x('Aseta pääkuva', 'smoy')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-store',
        'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
        //'rewrite' => true
        'rewrite' => array(
            'slug' => 'palvelut',
            'with_front' => false
        )
    ); 

    register_post_type( 'smoy_service' , $args );
    flush_rewrite_rules();
}


//code below will remove the post_name slug from the url
/*
function smoy_remove_slug( $post_link, $post, $leavename ) {
    if ( 'smoy_service' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}
add_filter( 'post_type_link', 'smoy_remove_slug', 10, 3 );

function smoy_parse_request( $query ) {
    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'smoy_service', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'smoy_parse_request' );

*/

add_action('init', 'smoy_people');

function smoy_people() {
    
    $labels = array(
        'name' => _x('Henkilöstö', 'post type general name'),
        'singular_name' => _x('Henkilö', 'post type singular name'),
        'add_new_item' => _x( 'Lisää uusi henkilö', 'smoy' ),
        'set_featured_image' => _x('Aseta henkilökuva', 'smoy')
    );

    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'show_ui' => true,
        'query_var' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'thumbnail'),
        'rewrite' => false
    ); 

    register_post_type( 'smoy_person' , $args );
    flush_rewrite_rules();
}



/*
add_action('do_meta_boxes', 'smoy_move_person_image_meta_box');

function smoy_move_person_image_meta_box(){
    remove_meta_box( 'postimagediv', 'post', 'side' );
    add_meta_box('smoy_person_image_metabox', _x('Henkilökuva', 'smoy'), 'post_thumbnail_meta_box', 'smoy_person', 'normal', 'high');
}
*/






final class Smoy_Person_Metabox {
    // These hook into to the two core actions we need to perform; creating the metabox, and saving it's contents when it is posted
    public function __construct() {
        // http://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
        add_action( 'add_meta_boxes', array( $this, 'create_meta_box' ) );

        // http://codex.wordpress.org/Plugin_API/Action_Reference/save_post
        add_filter( 'save_post', array( $this, 'save_meta_box' ), 10, 2 );
    }

    public function create_meta_box() {
        // http://codex.wordpress.org/Function_Reference/add_meta_box
        add_meta_box(
            'person_information_meta_box', // (string) (required) HTML 'id' attribute of the edit screen section
            __( 'Henkilön tiedot', 'smoy' ), // (string) (required) Title of the edit screen section, visible to user
            array( $this, 'print_meta_box' ), // (callback) (required) Function that prints out the HTML for the edit screen section. The function name as a string, or, within a class, an array to call one of the class's methods.
            'smoy_person', // (string) (required) The type of Write screen on which to show the edit screen section ('post', 'page', 'dashboard', 'link', 'attachment' or 'custom_post_type' where custom_post_type is the custom post type slug)
            'normal', // (string) (optional) The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side')
            'high' // (string) (optional) The priority within the context where the boxes should show ('high', 'core', 'default' or 'low')
        );
        
        remove_meta_box( 'postimagediv', 'smoy_person', 'side' );
        
        add_meta_box('postimagediv', _x('Henkilökuva', 'smoy'), 'post_thumbnail_meta_box', 'smoy_person', 'normal', 'high');
    }

    public function print_meta_box( $post, $metabox ) {
        ?>
            <!-- These hidden fields are a registry of metaboxes that need to be saved if you wanted to output multiple boxes. The current metabox ID is added to the array. -->
            <input type="hidden" name="meta_box_ids[]" value="<?php echo $metabox['id']; ?>" />
            <!-- http://codex.wordpress.org/Function_Reference/wp_nonce_field -->
            <?php wp_nonce_field( 'save_' . $metabox['id'], $metabox['id'] . '_nonce' ); ?>

            <!-- This is a sample of fields that are associated with the metabox. You will notice that get_post_meta is trying to get previously saved information associated with the metabox. -->
            <!-- http://codex.wordpress.org/Function_Reference/get_post_meta -->
            <table class="form-table">
            <tr><th><label for="person_title"><?php _e( 'Henkilön nimike', 'smoy' ); ?></label></th>
            <td><input name="person_title" type="text" id="person_title" value="<?php echo get_post_meta($post->ID, 'person_title', true); ?>" class="regular-text"></td></tr>
            <tr><th><label for="person_phone"><?php _e( 'Henkilön puhelinnumero', 'smoy' ); ?></label></th>
            <td><input name="person_phone" type="text" id="person_phone" value="<?php echo get_post_meta($post->ID, 'person_phone', true); ?>" class="regular-text"></td></tr>
            </table>

            <!-- These hidden fields are a registry of fields that need to be saved for each metabox. The field names correspond to the field name output above. -->
            <input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="person_title" />
            <input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="person_phone" />
        <?php
    }

    public function save_meta_box( $post_id, $post ) {
        // Check if this information is being submitted by means of an autosave; if so, then do not process any of the following code
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){ return; }

        // Determine if the postback contains any metaboxes that need to be saved
        if( empty( $_POST['meta_box_ids'] ) ){ return; }

        // Iterate through the registered metaboxes
        foreach( $_POST['meta_box_ids'] as $metabox_id ){
            // Verify thhe request to update this metabox
            if( ! wp_verify_nonce( $_POST[ $metabox_id . '_nonce' ], 'save_' . $metabox_id ) ){ continue; }

            // Determine if the metabox contains any fields that need to be saved
            if( count( $_POST[ $metabox_id . '_fields' ] ) == 0 ){ continue; }

            // Iterate through the registered fields        
            foreach( $_POST[ $metabox_id . '_fields' ] as $field_id ){
                // Update or create the submitted contents of the fiels as post meta data
                // http://codex.wordpress.org/Function_Reference/update_post_meta
                update_post_meta($post_id, $field_id, $_POST[ $field_id ]);
            }
        }

        return $post;
    }
}

$smoy_person_metabox = new Smoy_Person_Metabox();




add_filter( 'enter_title_here', 'smoy_person_title' );

function smoy_person_title( $input ) {
    if ( 'smoy_person' === get_post_type() ) {
        return __( 'Kirjoita henkilön nimi', 'smoy' );
    }

    return $input;
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
    
    wp_register_script('top-nav-menu', get_template_directory_uri() .'/js/top-nav-menu.js', array('jquery'), null, true);
    
    
    
    //wp_register_script( 'freewall', get_template_directory_uri() . '/js/freewall.js', array( 'jquery'), '1.0.6', false);
    
    
    //wp_register_script( 'scrolloverflow', get_template_directory_uri() . '/js/scrolloverflow.min.js', array(), '5.2.0', false);
    
    
    //wp_register_script( 'fullpage-js', get_template_directory_uri() . '/js/jquery.fullpage.js', array( 'jquery', 'scrolloverflow' ), '2.8.2', false);
    
    //wp_register_script( 'masonry-4.1.0', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '4.1.0', false);
    
    wp_register_script( 'gsap-tweenmax', get_template_directory_uri() .'/js/TweenMax.min.js', array(), '1.19.1', false );
    
    wp_register_script('customer-references', get_template_directory_uri() .'/js/customer-references.js', array('jquery', 'gsap-tweenmax'), null, false);
    
    //wp_register_script( 'gsap-tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js', array(), '1.18.5', false );
    
    //wp_register_script( 'gsap-timelinelite', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TimelineLite.min.js', array(), '1.18.5', false );
    
    //wp_register_script( 'scroll-magic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array( 'gsap-tweenmax' ), '2.0.5', false);
    

    //wp_register_script( 'scroll-magic-gsap-plugin', get_template_directory_uri() . '/js/animation.gsap.min.js', array( 'gsap-tweenmax', 'scroll-magic' ), '2.0.5', false);
    
    /*
    wp_register_script( 'smoy-animations-home', get_template_directory_uri() . '/js/smoyAnimationsHome.js', array( 'jquery', 'gsap-tweenmax', 'scroll-magic', 'scroll-magic-gsap-plugin'), '1.0.0', true );
    */
    
    
    //wp_register_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.js', array('salvattore'), '2.8.2', true);
    
    //wp_register_script( 'custom-juicer', get_template_directory_uri() . '/js/customJuicer.js', array( 'jquery'), '1.0.0', true );
   
    wp_enqueue_script( 'top-nav-menu' );
    
    
    
    
    //wp_enqueue_script( 'gsap-timelinelite' );
    
    //wp_enqueue_script( 'scroll-magic' );
    
    //wp_enqueue_script( 'scroll-magic-gsap-plugin' );
    
    //wp_enqueue_script( 'nav-menu');
    
    
    
    if(is_home()){
        wp_enqueue_script( 'gsap-tweenmax' );
        wp_enqueue_script( 'customer-references' );
    }
    
    
    
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

function smoy_load_dashicons_front_end() {
    wp_enqueue_style( 'dashicons' );
}



add_action( 'after_setup_theme', 'smoy_setup' );

add_action( 'wp_enqueue_scripts', 'smoy_styles' );

add_action( 'wp_enqueue_scripts', 'load_scripts' );

add_action( 'wp_enqueue_scripts', 'smoy_load_dashicons_front_end' );



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



function smoy_blog_excerpts($content = false) {
        global $post;
        $excerpt_length = 42;
        $double_angle_html = '<div class="read-more-symbol">&#187</div>';    
        $read_more_html = sprintf( '%s', __( 'Lue lisää ', 'smoy' ) .  $double_angle_html);
        
        if ( $post->post_excerpt ) {
            
            
            
            if(is_home() || is_page('blogi')){
                $content = get_the_excerpt();
                function custom_excerpt_length( $length ) {
                    return 20;
                }
                add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
                
                function excerpt_readmore($more) {
                    return '... <a title="' . the_title_attribute('echo=0') . '" href="'. get_permalink($post->ID) . '" class="more-link"><p class="more-text"></p>' . __( $read_more_html, 'smoy' ) . '</a>';
                }

                add_filter('excerpt_more', 'excerpt_readmore');
                
            }
            
        }else{
            
            if(is_home() || is_page('blogi')){
                
                $content = $post->post_content;
                $words = explode(' ', $content, $excerpt_length + 1);
                if(count($words) > $excerpt_length) {
                    array_pop($words);
                    $content = implode(' ', $words);
                }
                
                $content = strip_tags($content);
                $content = '<p class="blog-excerpt-content">' . $content . ' ...</p>';
                
                /*
                function output_readmore_content($post) {
                    return '<a title="' . the_title_attribute('echo=0') . '" href="'. get_permalink($post->ID) . '" class="more-link"><p class="more-text"></p>' . __( $read_more_html, 'smoy' ) . '</a>';
                }

                add_action('smoy_get_readmore_content', 'output_readmore_content');
                
                
                $content .= '<a title="' . the_title_attribute('echo=0') . '" href="'. get_permalink($post->ID) . '" class="more-link"><p class="more-text"></p>' . __( $read_more_html, 'smoy' ) . '</a>';
                */
                
                
                
                
            }
            
            
            
        }
        

        return $content;
    
}


add_filter('the_content', 'smoy_blog_excerpts');


function smoy_custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default queries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }
    
    
  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
    $pagination_args = array(
        'base'            => get_pagenum_link(1) . '%_%',
        'format'          => 'page/%#%',
        'total'           => $numpages,
        'current'         => $paged,
        'show_all'        => False,
        'end_size'        => 1,
        'mid_size'        => $pagerange,
        'prev_next'       => True,
        'prev_text'       => __('&laquo;'),
        'next_text'       => __('&raquo;'),
        'type'            => 'plain',
        'add_args'        => false,
        'add_fragment'    => ''
    );
    
    
    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        echo "<nav class='custom-pagination'>";
        echo $paginate_links;
        echo "</nav>";
    }
    
    

}


/*
add_action( 'wp_head', 'output_single_header_style');

function output_single_header_style() {
    
    if(!is_single()){
        return;
    }
    
    global $post;
        
    $smoy_single_post_thumbnail_url = get_the_post_thumbnail_url( $post, 'large' );
        
    $header_css_line = '#header-single{ background: url("'.$smoy_single_post_thumbnail_url.'");}';
    $smoy_single_header_css = '<style type="text/css">';
    $smoy_single_header_css .= $header_css_line;
    $smoy_single_header_css .= '</style>';

    echo $smoy_single_header_css;
        
    
    
}
*/




function smoy_get_blog_attached_images() {
    global $post;
    $szPostContent = $post->post_content;
    $szSearchPattern = '~<img [^\>]*\ />~';
    // Run preg_match_all to grab all the images and save the results in $aPics
    preg_match_all( $szSearchPattern, $szPostContent, $aPics );
    return $aPics[0];
}







add_action( 'customize_register', 'smoy_customize_register' );

function smoy_customize_register( $wp_customize ) {
    
    /* ----------------------------------- */
    /* ------------- SECTIONS ------------ */
    /* ----------------------------------- */
    
    /* ------- Front-Page About Us Section -------- */
    
    $wp_customize->add_section( 'smoy_about_us_section', array(
      'title' => __( 'About us', 'smoy' ),
      'description' => __( 'Edit about us section content here.', 'smoy' ),
      'capability' => 'edit_theme_options'
    ));
    
    
    /* ----------- Front-Page Services ----------- */
    
    $wp_customize->add_section( 'smoy_services_section', array(
      'title' => __( 'Services', 'smoy' ),
      'description' => __( 'Edit services here.', 'smoy' ),
      'capability' => 'edit_theme_options'
    ));
    
    
    /* ------- Front-Page Customer References ----- */
    
    $wp_customize->add_section( 'smoy_customer_ref_section', array(
      'title' => __( 'Customers', 'smoy' ),
      'description' => __( 'Edit customer references here.', 'smoy' ),
      'capability' => 'edit_theme_options'
    ));
    
    
    
    
    
    /* ----------------------------------- */
    /* ------------- SETTINGS ------------ */
    /* ----------------------------------- */
    
    
   
    /* ------- Front-Page About Us Section -------- */
    
    $wp_customize->add_setting('smoy_about_section_title', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
    ));
    
    for ($i = 1; $i < 4; $i++) {
        
        $wp_customize->add_setting('smoy_about_content_title_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_about_content_body_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
           
    }
    
    
    /* ------- Front-Page Services Section -------- */
    
    for ($i = 1; $i < 7; $i++) {
        
        
        
        $wp_customize->add_setting('smoy_service_title_front_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        
        $wp_customize->add_setting('smoy_service_mobile_title_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_service_hyphen_checkbox_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'smoy_sanitize_checkbox' 
        ));
        
        /*
        
        $wp_customize->add_setting('smoy_service_content_body_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        */
        
        $wp_customize->add_setting('smoy_service_body_max_width_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        
        /*
        $wp_customize->add_setting('smoy_service_bg_img_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        ));
        */
        
        $wp_customize->add_setting('smoy_service_bg_img_position_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '50',
            'sanitize_callback' => 'absint'
        ));
           
    }
    
    
    /* ------- Front-Page Customer References ----- */
    
    
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
    
    /* ------- Front-Page About Us Section -------- */
    
    $wp_customize->add_control( 'smoy_about_section_title', array(
          'label' => __( 'Section title', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'is_front_page'
    ));
    
    for ($i = 1; $i < 4; $i++) {
        
        $wp_customize->add_control( 'smoy_about_content_title_'.$i, array(
          'label' => __( 'Paragraph '.$i.' heading', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_about_content_body_'.$i, array(
          'label' => __( 'Paragraph '.$i.' body text', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'is_front_page'
        ));
        
    }
    
    
    /* ------- Front-Page Services Section -------- */
    
    
    for ($i = 1; $i < 7; $i++) {
        
        $wp_customize->add_control( 'smoy_service_title_front_'.$i, array(
          'label' => __( 'Service '.$i.' front page heading', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
        
        
        $wp_customize->add_control( 'smoy_service_mobile_title_'.$i, array(
          'label' => __( 'Service '.$i.' mobile heading', 'smoy'),
          'description' => __( 'How the front page service heading should be displayed in mobile view' ),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_service_hyphen_checkbox_'.$i, array(
          'label' => __( 'Insert line break after hyphen (-) character in front page heading?', 'smoy'),
          'type' => 'checkbox',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
        
        /*
        $wp_customize->add_control( 'smoy_service_content_body_'.$i, array(
          'label' => __( 'Service '.$i.' body text', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
        */
        
        $wp_customize->add_control( 'smoy_service_body_max_width_'.$i, array(
          'label' => __( 'Service '.$i.' body text max width', 'smoy'),
          'description' => __( 'Adjust the body text max width. You can use normal css units, like px, em and % (default 60%)' ),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
        
        /*
        
        $wp_customize->add_control( 
            new WP_Customize_Media_Control(
                $wp_customize,'smoy_service_bg_img_'.$i, array(
                    'label' => __( 'Service background image '.$i , 'smoy'),
                    'section' => 'smoy_services_section',
                    'mime_type' => 'image',
                    'active_callback' => 'is_front_page'
                )
            )
        );
        */
        
        $wp_customize->add_control( 'smoy_service_bg_img_position_'.$i, array(
          'type' => 'range',
          'section' => 'smoy_services_section',
          'label' => __( 'Service '.$i.' background image position' ),
          'description' => __( 'Adjust the background image horizontal position (default 50)' ),
          'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ),
        ));
        
    }
    
    

    /* ------- Front-Page Customer References ----- */
    
    
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


function smoy_sanitize_checkbox( $input ) {
	return ( $input === true ) ? true : false;
}


add_action( 'smoy_get_about_us', 'smoy_about_us_output');

function smoy_about_us_output() {
    if(is_home()) {
        $smoy_about_section_title = get_theme_mod( 'smoy_about_section_title');
        $smoy_about_content_titles = array();
        $smoy_about_content_body_texts = array();
    
        for ($i = 0; $i < 3; $i++) {
            $j = $i + 1; 
            $smoy_about_content_titles[$i] = get_theme_mod( 'smoy_about_content_title_'.$j);
            $smoy_about_content_body_texts[$i] = get_theme_mod( 'smoy_about_content_body_'.$j);
        }

        ob_start();
        require_once(get_template_directory() . '/template-parts/smoy-about-us.php' );
        $output = ob_get_clean();
        echo $output;
    
    }
}


add_action( 'wp_head', 'smoy_services_styles');

function smoy_services_styles() { 
    if(is_home()) {
        
        /*
        
            class Smoy_Service {
                 public $id;
                 public $title = '';
                 public $excerpt = '';
                 public $url;
                 public $featured_img = null;

                 public function __construct($id, $title, $excerpt, $url, $featured_img) {
                     $this->id = $id;
                     $this->title = $title;
                     $this->excerpt = $excerpt;
                     $this->url = $url;
                     if(!empty($featured_img)){
                        $this->featured_img = $featured_img;
                     }

                 }

             }
             */

            //$smoy_services_titles = array();
            //$smoy_services_mobile_titles = array();
            //$smoy_services_checkboxes = array();
            //$smoy_services_body_texts = array();

            //$servicesArray = array();

            $smoy_services_query = new WP_Query( array( 'post_type' => 'smoy_service', 'order' => 'DESC', 'posts_per_page'=> 6) );

            $smoy_service_posts = $smoy_services_query->posts;
            $css = array();
            //$services_bg_imgs = array();
            
            $i = 0;
            foreach($smoy_service_posts as $post) {
                $j = $i + 1; 
                
                $bg_img_url = get_the_post_thumbnail_url($post->ID, 'service-thumb');
                //$this_service_featured_img = get_the_post_thumbnail_url($post->ID, 'service-thumb');
                if(!empty($bg_img_url)){
                    
                    $bg_img_pos = get_theme_mod( 'smoy_service_bg_img_position_'.$j); 
                    //$bg_url = wp_get_attachment_url($bg_img);
                    //$css['#service-'.$j.' .service-content-wrapper']['background-image'] = "url(\"".$bg_img_url."\")";
                    $css['#service-'.$j.' .service-image-wrapper']['background-image'] = "url(\"".$bg_img_url."\")";
                    
                    //$css['#service-'.$j.' .service-content-wrapper']['background-color'] = "rgba(4, 20, 30, 0.75)";
                    
                    
                    
                    if(empty($bg_img_pos)){
                        //$css['#service-'.$j.' .service-content-wrapper']['background-position'] = "50% !important";
                        $css['#service-'.$j.' .service-image-wrapper']['background-position'] = "50% !important";
                    }else{
                        //$css['#service-'.$j.' .service-content-wrapper']['background-position'] = $bg_img_pos . "% !important";
                        $css['#service-'.$j.' .service-image-wrapper']['background-position'] = $bg_img_pos . "% !important";
                    }    
                }
                
                $body_text_max_width = get_theme_mod( 'smoy_service_body_max_width_'.$j);
                
                if(empty($body_text_max_width)) {
                    $css['#service-'.$j.' .service-body-text']['max-width'] = "60%";
                }else{
                    $css['#service-'.$j.' .service-body-text']['max-width'] = $body_text_max_width;
                }
                
                $i++;

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
            wp_reset_postdata();  
    }


}



add_action('smoy_get_services', 'smoy_services_front_page_output');

function smoy_services_front_page_output() {
    if(is_home()) {
        
        class Smoy_Service {
             public $id;
             public $title = '';
             public $excerpt = '';
             public $url;
             public $featured_img = null;

             public function __construct($id, $title, $excerpt, $url, $featured_img) {
                 $this->id = $id;
                 $this->title = $title;
                 $this->excerpt = $excerpt;
                 $this->url = $url;
                 if(!empty($featured_img)){
                    $this->featured_img = $featured_img;
                 }
                 
             }
             
         }
        
        $smoy_services_titles_front = array();
        $smoy_services_mobile_titles = array();
        $smoy_services_checkboxes = array();
        //$smoy_services_body_texts = array();
        
        $servicesArray = array();
    
        $smoy_services_query = new WP_Query( array( 'post_type' => 'smoy_service', 'order' => 'DESC', 'posts_per_page'=> 6) );

        $smoy_service_posts = $smoy_services_query->posts;
        
        $i = 0;
        foreach($smoy_service_posts as $post) {
            $j = $i + 1; 
            $smoy_services_titles_front[$i] = get_theme_mod( 'smoy_service_title_front_'.$j);
            $smoy_services_mobile_titles[$i] = get_theme_mod( 'smoy_service_mobile_title_'.$j);
            $smoy_services_checkboxes[$i] = get_theme_mod( 'smoy_service_hyphen_checkbox_'.$j);
            //$smoy_this_service_title = $post->post_title;

            if ($smoy_services_checkboxes[$i] === true) {
                
                $dash_pos = strpos($smoy_services_titles_front[$i],"-");
                if($dash_pos !== false){
                    $dash_pos++;
                    $smoy_services_titles_front[$i] = substr_replace($smoy_services_titles_front[$i], '<br/>', $dash_pos, 0);
                }
                
            }
            
            //$smoy_services_body_texts[$i] = get_theme_mod( 'smoy_service_content_body_'.$j);
            
            $this_service_permalink = esc_url(get_permalink($post));
            $this_service_featured_img = get_the_post_thumbnail_url($post->ID, 'service-thumb');
            
            
            
            $this_service = new Smoy_Service($post->ID, $post->post_title, get_the_excerpt($post), $this_service_permalink, $this_service_featured_img);
            $servicesArray[$i] = $this_service;
            $i++;
    
        }
        
        
        

        ob_start();
        require_once(get_template_directory() . '/template-parts/smoy-services-front.php' );
        $output = ob_get_clean();
        echo $output;
        
        wp_reset_postdata();     
        
    }
    
      
}




add_action( 'wp_head', 'smoy_customer_references_styles');

function smoy_customer_references_styles() {
    
    if(is_home()) {

        $css = array();
        $j = 1;

        for($i = 0; $i < 12; $i++){
            $bg_img = get_theme_mod( 'smoy_customer_bg_img_'.$j);
            
            $this_customer_logo_min_height = get_theme_mod( 'smoy_customer_logo_min_height_'.$j);
            $this_customer_logo_max_height = get_theme_mod( 'smoy_customer_logo_max_height_'.$j);

            
            if(!empty($bg_img)){
                $bg_url = wp_get_attachment_url($bg_img);
                $css['#customer-'.$j]['background-image'] = "url(\"".$bg_url."\")";
                
            }

            if(!empty($this_customer_logo_min_height)){
                $css['#customer-'.$j.' .customer-content img']['min-height'] = $this_customer_logo_min_height . 'px';
            }

            if(!empty($this_customer_logo_max_height)){
                $css['#customer-'.$j.' .customer-content img']['max-height'] = $this_customer_logo_max_height . 'px';
            }
            
            $j++;
               
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
}

add_action('smoy_get_references', 'smoy_refs_front_page_output');

function smoy_refs_front_page_output() {
    
    $smoy_refs_logos = array();
    $smoy_bg_img_widths = array();
    $smoy_bg_img_heights = array();
    
    
    for ($i = 0; $i < 12; $i++) {
        
        
        $j = $i + 1; 
        $smoy_refs_logos[$i] = wp_get_attachment_url(get_theme_mod( 'smoy_customer_logo_'.$j));
        $bg_img = get_theme_mod( 'smoy_customer_bg_img_'.$j);
        $bg_url = wp_get_attachment_url($bg_img);
        
        list($width, $height) = getimagesize($bg_url);
        
        $smoy_bg_img_widths[$i] = $width;
        $smoy_bg_img_heights[$i] = $height;
        //echo "<img src=\"img/flag.jpg\" $attr alt=\"getimagesize() example\" />";
        //echo $width . "<br/>";
        //echo $height . "<br/>";
    }
    
    ob_start();
	require_once(get_template_directory() . '/template-parts/smoy-customer-references.php' );
	$output = ob_get_clean();
	echo $output;
}


add_action('smoy_get_people', 'smoy_staff_front_page_output');

function smoy_staff_front_page_output() {
    
    if(is_home()){
        
         class Smoy_Person {
             public $id;
             public $name = '';
             public $title = null;
             public $phone = null;
             public $thumbnail = null;

             public function __construct($id, $name, $title, $phone, $thumbnail) {
                 $this->id = $id;
                 $this->name = $name;
                 if(!empty($title)){
                     $this->title = $title;
                 }

                 if(!empty($phone)){
                    $this->phone = $phone;
                 }
                 
                 if(!empty($thumbnail)){
                    $this->thumbnail = $thumbnail;
                 }

             }
             
         }   

        $arrIndex = 0;
        $pplArray = array();
        $metaArray = array();
        
        $smoy_people_query = new WP_Query( array( 'post_type' => 'smoy_person', 'order' => 'ASC', 'posts_per_page'=> -1) );

        $posts = $smoy_people_query->posts;

        foreach($posts as $post) {
            $thisPersonTitle = get_post_meta($post->ID, 'person_title');
            $thisPersonPhone = get_post_meta($post->ID, 'person_phone');
            $thisPersonThumb = get_the_post_thumbnail_url($post->ID, 'full');
            $thisPerson = new Smoy_Person($post->ID, $post->post_title, $thisPersonTitle[0], $thisPersonPhone[0], $thisPersonThumb);
            $pplArray[$arrIndex] = $thisPerson;
            $arrIndex++;
            
        }
        
        $arrLength = count($pplArray);
        
        //$remainder = count($pplArray) % 8;
        
        
        if($arrLength % 8 !== 0){
            $remainder = $arrLength % 8;
            $blackBoxNum = 8 - $remainder;
            
            $currentPos = ($arrLength - 1) - ($blackBoxNum * 2);
            
            for($i = 0; $i < $blackBoxNum; $i++){
                
                $blackBox = 'black_box';
                
                //$original = array( 'a', 'b', 'c', 'd', 'e' );
                //$inserted = array( 'x' ); // Not necessarily an array

                array_splice( $pplArray, $currentPos, 0, $blackBox); // splice in at position 3
                
                $currentPos += 2;
                // $original is now a b c x d e
                
            }
            
              
        }
        
        
        //print_r($pplArray);
        //var_dump($metaArray);
        
        ob_start();
        require_once(get_template_directory() . '/template-parts/smoy-people.php' );
        $output = ob_get_clean();
        echo $output;
        

        /*    
        if ( $smoy_people_loop->have_posts() ) :
        while ( $smoy_people_loop->have_posts() ) : $smoy_people_loop->the_post();

        $pplArray[$arrIndex] = 


        $arrIndex++;
        endwhile;
        endif;
        */


        wp_reset_postdata();     
        
    }
    
    /*
    
    $smoy_refs_logos = array();
    
    for ($i = 0; $i < 12; $i++) {
        $j = $i + 1; 
        $smoy_refs_logos[$i] = wp_get_attachment_url(get_theme_mod( 'smoy_customer_logo_'.$j));
    }
    
    ob_start();
	require_once(get_template_directory() . '/template-parts/smoy-customer-references.php' );
	$output = ob_get_clean();
	echo $output;
    */
}



