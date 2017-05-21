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
    
    add_image_size( 'background-small', 640);
    add_image_size( 'background-medium', 1280);
    add_image_size( 'background-large', 1600);
    add_image_size( 'service-thumb', 1600, 9999);
    //add_image_size( 'background-large', 2400);
    //add_image_size( 'background-x-large', 3000);
    
    
    //add_image_size( 'bg-test-1', 3000, 9999);
    //add_image_size( 'bg-test-2', 5000, 9999);
    
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


add_filter( 'jpeg_quality', create_function( '', 'return 80;' ) );


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

//Custom CSS Widget
add_action('admin_menu', 'smoy_custom_css_hooks');
add_action('save_post', 'smoy_save_custom_css');
add_action('wp_head','smoy_post_insert_custom_css');
function smoy_custom_css_hooks() {
	add_meta_box('custom_css', __( 'Oma CSS', 'smoy' ), 'smoy_custom_css_input', 'post', 'normal', 'low');
}
function smoy_custom_css_input() {
	global $post;
	echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
	echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function smoy_save_custom_css($post_id) {
    if(!isset($_POST['custom_css_noncename'])) return $post_id;
	if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom_css = $_POST['custom_css'];
	update_post_meta($post_id, '_custom_css', $custom_css);
}

function smoy_post_insert_custom_css() {
	if (is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
			echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
		endwhile; endif;
		rewind_posts();
	}
}


final class Smoy_Service_Metabox {
    // These hook into to the two core actions we need to perform; creating the metabox, and saving it's contents when it is posted
    public function __construct() {
        // http://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
        add_action( 'add_meta_boxes', array( $this, 'create_service_meta_boxes' ) );

        // http://codex.wordpress.org/Plugin_API/Action_Reference/save_post
        add_filter( 'save_post', array( $this, 'save_service_meta_boxes' ), 10, 2 );
    }

    public function create_service_meta_boxes() {
        // http://codex.wordpress.org/Function_Reference/add_meta_box
        add_meta_box(
            'service_keywords_meta_box', // (string) (required) HTML 'id' attribute of the edit screen section
            __( 'Avainsanoja', 'smoy' ), // (string) (required) Title of the edit screen section, visible to user
            array( $this, 'print_service_keywords_meta_box' ), // (callback) (required) Function that prints out the HTML for the edit screen section. The function name as a string, or, within a class, an array to call one of the class's methods.
            'smoy_service', // (string) (required) The type of Write screen on which to show the edit screen section ('post', 'page', 'dashboard', 'link', 'attachment' or 'custom_post_type' where custom_post_type is the custom post type slug)
            'normal', // (string) (optional) The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side')
            'low' // (string) (optional) The priority within the context where the boxes should show ('high', 'core', 'default' or 'low')
        );
        
        add_meta_box(
            'service_color_scheme_meta_box',
            __( 'Otsikoiden taustaväri/Alleviivausten väri', 'smoy' ), 
            array( $this, 'print_service_color_scheme_meta_box' ), 
            'smoy_service', 
            'normal', 
            'low' 
        );
        
        
        add_meta_box('custom_css', __( 'Oma CSS', 'smoy' ), array( $this, 'print_service_custom_css_meta_box'), 'smoy_service', 'normal', 'low');
        //remove_meta_box( 'postimagediv', 'smoy_person', 'side' );
        
        //add_meta_box('postimagediv', _x('Henkilökuva', 'smoy'), 'post_thumbnail_meta_box', 'smoy_person', 'normal', 'high');
    }

    public function print_service_keywords_meta_box( $post, $metabox ) {
        ?>
            <!-- These hidden fields are a registry of metaboxes that need to be saved if you wanted to output multiple boxes. The current metabox ID is added to the array. -->
            <input type="hidden" name="service_keywords_meta_box_ids[]" value="<?php echo $metabox['id']; ?>" />
            <!-- http://codex.wordpress.org/Function_Reference/wp_nonce_field -->
            <?php wp_nonce_field( 'save_' . $metabox['id'], $metabox['id'] . '_nonce' ); ?>

            <!-- This is a sample of fields that are associated with the metabox. You will notice that get_post_meta is trying to get previously saved information associated with the metabox. -->
            <!-- http://codex.wordpress.org/Function_Reference/get_post_meta -->
            <table class="form-table">
            <tr><th><label for="service_keywords"><?php _e( 'Palvelun avainsanat', 'smoy' ); ?></label></th>
            <td><textarea name="service_keywords" id="service_keywords"><?php echo get_post_meta($post->ID, 'service_keywords', true); ?></textarea></td></tr>
            </table>

            <!-- These hidden fields are a registry of fields that need to be saved for each metabox. The field names correspond to the field name output above. -->
            <input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="service_keywords" />
            
        <?php
    }
    
    public function print_service_color_scheme_meta_box( $post, $metabox ) {
        ?>
            <!-- These hidden fields are a registry of metaboxes that need to be saved if you wanted to output multiple boxes. The current metabox ID is added to the array. -->
            <input type="hidden" name="service_color_meta_box_ids[]" value="<?php echo $metabox['id']; ?>" />
            <!-- http://codex.wordpress.org/Function_Reference/wp_nonce_field -->
            <?php wp_nonce_field( 'save_' . $metabox['id'], $metabox['id'] . '_nonce' ); ?>

            <!-- This is a sample of fields that are associated with the metabox. You will notice that get_post_meta is trying to get previously saved information associated with the metabox. -->
            <!-- http://codex.wordpress.org/Function_Reference/get_post_meta -->

            <?php $color_value = get_post_meta($post->ID, 'service_color', true); ?>

            <table class="form-table">
            <tr>
                <th><label for="service_color"><?php _e( 'Valitse sivun väriteema', 'smoy' ); ?></label></th>
                <td><input name="service_color" type="radio" id="service_color_orange" value="orange" class="radio-input" <?php checked( $color_value, 'orange' ); ?>>Oranssi</td>
                <td><input name="service_color" type="radio" id="service_color_pink" value="pink" class="radio-input" <?php checked( $color_value, 'pink' ); ?>>Pinkki</td>
            </tr>
            </table>

            <!-- These hidden fields are a registry of fields that need to be saved for each metabox. The field names correspond to the field name output above. -->
            <input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="service_color" />
            
        <?php
    }
    
    
    public function print_service_custom_css_meta_box($post_id) {
        global $post;
        echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
        echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
    }

    public function save_service_meta_boxes( $post_id, $post ) {
        // Check if this information is being submitted by means of an autosave; if so, then do not process any of the following code
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){ return; }

        // Determine if the postback contains any metaboxes that need to be saved
        if(empty( $_POST['service_keywords_meta_box_ids'] ) && empty($_POST['service_color_meta_box_ids']) && empty($_POST['custom_css'])){ return; }

        // Iterate through keywords metabox
        foreach( $_POST['service_keywords_meta_box_ids'] as $metabox_id ){
            // Verify thhe request to update this metabox
            if(!isset($_POST[$metabox_id . '_nonce'])){ continue; }
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
        
        // Iterate through color scheme metabox
        foreach( $_POST['service_color_meta_box_ids'] as $metabox_id ){
            // Verify thhe request to update this metabox
            if(!isset($_POST[$metabox_id . '_nonce'])){ continue; }
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
        
        if(!isset($_POST['custom_css_noncename'])){ return; }
        if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return;
        $custom_css = $_POST['custom_css'];
        update_post_meta($post_id, '_custom_css', $custom_css);
        
        return $post;
    }
    
    
    
    
    
    
}

$smoy_service_metabox = new Smoy_Service_Metabox();


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
            'person_information_meta_box',
            __( 'Henkilön tiedot', 'smoy' ),
            array( $this, 'print_meta_box' ),
            'smoy_person',
            'normal',
            'high'
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


add_action( 'init', 'smoy_register_menus' );

function smoy_register_menus() {
  register_nav_menus(
    array('top' => __( 'Main menu', 'smoy' ),
          'sub' => __( 'Sub menu', 'smoy' ),
          'right' => __( 'Right menu', 'smoy' ))
    );
}


if ( ! is_admin() ) {
    add_filter( 'wp_get_nav_menu_items', 'smoy_replace_nav_placeholder_with_latest_post_link', 10, 3 );
}
 
function smoy_replace_nav_placeholder_with_latest_post_link( $items, $menu, $args ) {
    foreach ($items as $item) {
        if ('#latestpost' != $item->url)
            continue;
 
        // Get the latest post
        $latestpost = get_posts( array(
            'numberposts' => 1,
        ));
 
        if (empty($latestpost))
            continue;
        // Replace the placeholder with the real URL
        $item->url = get_permalink( $latestpost[0]->ID );
    }
 
    return $items;
}


require_once(get_template_directory() . '/inc/smoy-recent-posts-widget.php');
require_once(get_template_directory() . '/inc/smoy-floating-social-icons-widget.php');
add_action( 'widgets_init', 'smoy_widgets_init' );

function smoy_widgets_init() {
	register_sidebar( array(
		'name'          => 'Blog page sidebar',
		'id'            => 'blog_posts_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="latest-blog-posts-title">',
		'after_title'   => '</h2>',
	));
    
    register_widget('Smoy_Recent_Posts_Widget');
    
    register_sidebar( array(
		'name'          => 'Newsletter subscription sidebar',
		'id'            => 'newsletter_subscription_sidebar',
		'before_widget' => '<div class="newsletter-widget-container"><a href="javascript:void(0)" id="newsletter-box-close">×</a>',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="newsletter-widget-title">',
		'after_title'   => '</h2><div class="newsletter-widget-title-underline"></div><div class="newsletter-widget-wrapper">',
	));
    
    
    register_sidebar( array(
		'name'          => 'Social icons widget sidebar',
		'id'            => 'social_widget_sidebar',
		'before_widget' => '<div class="social-widget-container">',
		'after_widget'  => '</div>'
	));
    
    register_widget('Smoy_Floating_Social_Icons_Widget');
     
}


add_action('admin_head', 'smoy_admin_styles');

function smoy_admin_styles() {
  echo '<style>
    #service_keywords {
        width: 100%;
    }
  </style>';
}


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



function smoy_is_mobile_phone() {
    require_once(get_template_directory() . '/inc/Mobile_Detect.php' );
    $detect = new Mobile_Detect;
    if( $detect->isMobile() && !$detect->isTablet() ){
        return true;
    }
    return false;
}


function load_scripts()
{
    
    
    wp_register_script('top-nav-menu', get_template_directory_uri() .'/js/top-nav-menu.js', array('jquery'), null, true);
    
    //wp_register_script( 'freewall', get_template_directory_uri() . '/js/freewall.js', array( 'jquery'), '1.0.6', false);
    
    
    //wp_register_script( 'scrolloverflow', get_template_directory_uri() . '/js/scrolloverflow.min.js', array(), '5.2.0', false);
    
    
    //wp_register_script( 'fullpage-js', get_template_directory_uri() . '/js/jquery.fullpage.js', array( 'jquery', 'scrolloverflow' ), '2.8.2', false);
    
    //wp_register_script( 'masonry-4.1.0', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '4.1.0', false);
    
    wp_register_script( 'gsap-tweenmax', get_template_directory_uri() .'/js/TweenMax.min.js', array(), '1.19.1', false );
    
    wp_register_script('customer-references', get_template_directory_uri() .'/js/customer-references.js', array('jquery', 'gsap-tweenmax'), null, false);
    
    wp_register_script('newsletter-widget', get_template_directory_uri() .'/js/newsletter-widget.js', array('jquery'), null, false);
    
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
    
    
    
    if(is_home() || is_page('eng')){
        wp_enqueue_script( 'gsap-tweenmax' );
        wp_enqueue_script( 'customer-references' );
    }
    
    
    
    if(is_home() || is_singular('smoy_service') || (is_singular() && in_category('blogi'))){
        wp_enqueue_script( 'newsletter-widget' );
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
    wp_enqueue_style( 'floating_social_icons_widget_styles', get_stylesheet_directory_uri() . '/css/floating-social-icons-widget.css');
    wp_enqueue_style( 'fontello', get_stylesheet_directory_uri() . '/css/fontello.css');  
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

add_action( 'wp_head', 'smoy_service_add_html_meta_tags' , 2 );

function smoy_service_add_html_meta_tags() {
    
    if ( is_singular('smoy_service')) {
        global $post;
        $keywords = get_post_meta($post->ID, 'service_keywords');
        $excerpt = get_the_excerpt($post);
        if(!empty($excerpt)) {
            echo '<meta name="description" content="' . wp_strip_all_tags($excerpt) . '" />' . "\n";
        }
        if(!empty($keywords)) {
            echo '<meta name="keywords" content="' . wp_strip_all_tags($keywords[0]) . '" />' . "\n";
        }
    }
}


add_action( 'wp_head', 'smoy_generate_responsive_background_image_styles');

function smoy_generate_responsive_background_image_styles() {
    
    if ( is_singular() ) {
        global $post;
        $image_id = get_post_thumbnail_id($post->ID); // set or grab your image id
        $img_srcset = wp_get_attachment_image_srcset( $image_id, 'full' );
        
        $sizes = explode( ", ", $img_srcset );
        
        asort($sizes, SORT_NATURAL | SORT_FLAG_CASE);
        $sizes = array_values($sizes);
        $css = '';
        $prev_size = '';
        foreach( $sizes as $size ) {
            
            // Split up the size string, into an array with [0]=>img_url, [1]=>size
            $split = explode( " ", $size );
            if( !isset( $split[0], $split[1] ) )
                continue;
            
            if(in_category('blogi')){
                $background_css = '#header-single {
                    background-image: url(' . esc_url( $split[0] ) . ')
                }';
                
            }else if (is_singular('smoy_service')) {
                $background_css = '#header-service {
                    background-image: url(' . esc_url( $split[0] ) . ')
                }';
                
            }

            // Grab the previous image size as the min-width and/or add the background css to the main css string
            if( !empty( $prev_size ) ) {
                $css .= '@media only screen and (min-width: ' . $prev_size . ') {';
                $css .= $background_css;
                $css .= "}\n";
            } else {
                $css .= $background_css;
            }

            // Set the current image size as the "previous image" size, for use with media queries
            $prev_size = str_replace( "w", "px", $split[1] );
        
        }
        // The final css, wrapped in a <style> tag
        $css = !empty( $css ) ? '<style type="text/css">' . $css . '</style>' : '';
        
        echo $css;
        
        
    }
}


add_filter('the_content', 'smoy_modify_single_content');

function smoy_modify_single_content($content) {
    
    if ( is_singular('smoy_service')) {
        global $post;
        $keywords = get_post_meta($post->ID, 'service_keywords');
        if(!empty($keywords)) {
           $keywordsContainer = '<div class="smoy-service-keywords"><span>Avainsanoja</span> '.wp_strip_all_tags($keywords[0]).'</div>'; 
        }
        
        $dom = new DOMDocument();
        $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $xpath = new DOMXPath($dom);
        //$results = $xpath->query('//div[@class="someclass"]');
        $results = $xpath->query('//h1|//h2|//h3|//h4|//h5|//h6');
        if ($results->length > 0) {
            foreach($results as $node){
                $titleUnderline = $dom->createElement('div', '');
                $titleUnderline->setAttribute('class', 'single-service-title-underline');
                //$node->parentNode->appendChild($testNode); // Insert new node after 
                $node->parentNode->insertBefore( $titleUnderline, $node->nextSibling);
                //$node->parentNode->insertBefore($testNode, $node); // Insert new node before  
            }
            $content = $dom->saveHTML();
        }
        
        $content = preg_replace('/<p([^>]+)?>/', '<p$1 class="service-lead-paragraph">', $content, 1);
        $content .= $keywordsContainer;
        return $content;
    }else if(is_singular() && in_category('blogi')){
        
        $leadParagraphStart = strpos($content, '<p>');
        $leadParagraphEnd = strpos($content, '</p>', $leadParagraphStart);
        $leadParagraph = substr($content, $leadParagraphStart, $leadParagraphEnd - $leadParagraphStart + 4);
        
        if (strpos($leadParagraph, '&nbsp;') !== false) {
            $leadParagraphStart = strpos($content, '<p>', $leadParagraphEnd);
            $leadParagraphEnd = strpos($content, '</p>', $leadParagraphStart);
            $leadParagraph = substr($content, $leadParagraphStart, $leadParagraphEnd - $leadParagraphStart + 4);
        }
        
        $content = str_replace($leadParagraph, "<div class=\"blog-post-lead-paragraph\">".$leadParagraph."</div>", $content);
        
        $sourcesString = 'Lähteet';
        $sourcesTitlePos = strrpos($content, $sourcesString);

        if($sourcesTitlePos !== false){
            $content = substr_replace($content, "<span class=\"blog-post-sources-title\">Lähteet</span>", $sourcesTitlePos, strlen($sourcesString));
        }
        
        return $content;
    }else{
       return $content; 
    } 
}



add_action('generate_responsive_background_image', 'smoy_background_image_style');

function smoy_background_image_style() {
    
    
}


/*
add_action( 'pre_get_posts', 'smoy_set_post_query_category' );

function smoy_set_post_query_category( $query ) { 
    if ($query->is_main_query()) {
        $query->set( 'cat', '2'); 
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
            
            
            
            if(is_home()){
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
            if(is_home()){
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



/*
function smoy_get_blog_attached_images() {
    global $post;
    $szPostContent = $post->post_content;
    $szSearchPattern = '~<img [^\>]*\ />~';
    // Run preg_match_all to grab all the images and save the results in $aPics
    preg_match_all( $szSearchPattern, $szPostContent, $aPics );
    return $aPics[0];
}
*/


function smoy_callback_is_eng_page() { return is_page( 'eng' ); }

/*
function smoy_callback_is_eng_page(){
    
}
*/
    
    
    /*
function is_certain_page_template(){
    // Get the page's template
    $template = get_post_meta( get_the_ID(), '_wp_page_template', true );
    $is_template = preg_match( '%fullwidth.php%', $template );
    if ( $is_template == 0 ){
        return false;
    } else {
        return true;
    }
}
*/

function smoy_callback_is_front_page_or_eng_page() { 
    if(is_home() || is_page( 'eng' )){
        return true;
    }
    return false;
}


add_action( 'customize_register', 'smoy_customize_register' );

function smoy_customize_register( $wp_customize ) {
    
    /* ----------------------------------- */
    /* ------------- SECTIONS ------------ */
    /* ----------------------------------- */
    
    /* ------- Front-Page About Us Section -------- */
    
    $wp_customize->add_section( 'smoy_about_us_section', array(
      'title' => __( 'About us', 'smoy' ),
      'description' => __( 'Edit about us section here.', 'smoy' ),
      'capability' => 'edit_theme_options'
    ));
    
    
    /* ----------- Front-Page Services ----------- */
    
    $wp_customize->add_section( 'smoy_services_section', array(
      'title' => __( 'Services', 'smoy' ),
      'description' => __( 'Edit services section here.', 'smoy' ),
      'capability' => 'edit_theme_options'
    ));
    
    
    /* ------- Front-Page Customer References ----- */
    
    $wp_customize->add_section( 'smoy_customer_ref_section', array(
      'title' => __( 'Customers', 'smoy' ),
      'description' => __( 'Edit customer references section here.', 'smoy' ),
      'capability' => 'edit_theme_options'
    ));
    
    
    
    /* ------------- Front-Page People ------------ */
    
    $wp_customize->add_section( 'smoy_people_section', array(
      'title' => __( 'People', 'smoy' ),
      'description' => __( 'Edit people section here.', 'smoy' ),
      'capability' => 'edit_theme_options'
    ));
    
    
    
    /* ------------ Front-Page Contact ------------ */
    
    $wp_customize->add_section( 'smoy_contact_section', array(
      'title' => __( 'Contact', 'smoy' ),
      'description' => __( 'Edit contact section here.', 'smoy' ),
      'capability' => 'edit_theme_options'
    ));
    
    
    
    /* ----------------- Footer ------------------- */
    
    $wp_customize->add_section( 'smoy_footer_section', array(
      'title' => __( 'Footer', 'smoy' ),
      'description' => __( 'Edit site footer here.', 'smoy' ),
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
    
    $wp_customize->add_setting('smoy_about_section_title_eng', array(
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
        
        $wp_customize->add_setting('smoy_about_content_title_eng_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_about_content_body_eng_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
           
    }
    
    for ($i = 1; $i < 5; $i++) {
        
        $wp_customize->add_setting('smoy_about_quote_circle_content_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_about_quote_circle_content_eng_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_about_quote_circle_radius_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '75',
            'sanitize_callback' => 'absint'
        ));
        
        $wp_customize->add_setting('smoy_about_quote_circle_content_margin_top_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '40',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_about_quote_circle_content_margin_sides_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '15',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_about_quote_circle_content_margin_top_eng_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '40',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_about_quote_circle_content_margin_sides_eng_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '15',
            'sanitize_callback' => 'sanitize_text_field'
        ));
           
    }
    
    
    /* ------- Front-Page Services Section -------- */
    
        $wp_customize->add_setting('smoy_services_header_title', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
        $wp_customize->add_setting('smoy_services_header_title_eng', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_services_header_desc', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
    
        $wp_customize->add_setting('smoy_services_header_desc_max_width', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
    
        $wp_customize->add_setting('smoy_services_header_desc_eng', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
    
        $wp_customize->add_setting('smoy_services_header_desc_max_width_eng', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
    
        $wp_customize->add_setting( 'smoy_services_header_text_bg_color', array(
          'capability' => 'edit_theme_options',
          'default' => 'orange',
          'sanitize_callback' => 'smoy_sanitize_radio',
        ));
    
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
        
        
        $wp_customize->add_setting('smoy_service_title_front_eng_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_service_desc_body_eng_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
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
        
        
        $wp_customize->add_setting('smoy_service_body_max_width_eng_'.$i, array(
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
    
        $wp_customize->add_setting('smoy_customer_ref_header_title', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_customer_ref_header_desc', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
    
        $wp_customize->add_setting('smoy_customer_ref_header_desc_max_width', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
        $wp_customize->add_setting('smoy_customer_ref_header_title_eng', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_customer_ref_header_desc_eng', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
    
        $wp_customize->add_setting('smoy_customer_ref_header_desc_max_width_eng', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
        $wp_customize->add_setting( 'smoy_customer_ref_header_text_bg_color', array(
          'capability' => 'edit_theme_options',
          'default' => 'orange',
          'sanitize_callback' => 'smoy_sanitize_radio',
        ));
    
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
        
        $wp_customize->add_setting('smoy_customer_logo_height_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '5',
            'sanitize_callback' => 'sanitize_text_field'
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
    
    
    /* ------------- Front-Page People ------------- */
    
        $wp_customize->add_setting('smoy_people_header_title', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_people_header_desc', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
    
        $wp_customize->add_setting('smoy_people_header_desc_max_width', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
        $wp_customize->add_setting( 'smoy_people_header_text_bg_color', array(
          'capability' => 'edit_theme_options',
          'default' => 'orange',
          'sanitize_callback' => 'smoy_sanitize_radio',
        ));
    

    /* ------------ Front-Page Contact ------------- */
    
    
        $wp_customize->add_setting('smoy_contact_header_title', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_contact_header_desc', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
    
        $wp_customize->add_setting('smoy_contact_header_desc_max_width', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
        $wp_customize->add_setting('smoy_contact_header_title_eng', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_setting('smoy_contact_header_desc_eng', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
    
        $wp_customize->add_setting('smoy_contact_header_desc_max_width_eng', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ));
    
        $wp_customize->add_setting( 'smoy_contact_header_text_bg_color', array(
          'capability' => 'edit_theme_options',
          'default' => 'orange',
          'sanitize_callback' => 'smoy_sanitize_radio',
        ));
    
    
        for($i = 1; $i < 4; $i++) {

            $wp_customize->add_setting('smoy_contact_person_name_'.$i, array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field'
            ));

            $wp_customize->add_setting('smoy_contact_person_title_'.$i, array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field'
            ));
            
            $wp_customize->add_setting('smoy_contact_person_title_eng_'.$i, array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field'
            ));

            $wp_customize->add_setting('smoy_contact_person_phone_'.$i, array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field'
            ));

        }
    
    
    $wp_customize->add_setting('smoy_contact_form_shortcode', array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_setting('smoy_contact_form_shortcode_eng', array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field'
    ));
    
    
    
    /* ------------------- Footer ------------------ */
    
    
    $wp_customize->add_setting('smoy_footer_contact_building', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_setting('smoy_footer_contact_street', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_setting('smoy_footer_contact_city', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_setting('smoy_footer_contact_phone', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_setting('smoy_footer_contact_email', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
    ));
    
    
    for($i = 1; $i < 5; $i++) {
        
        $wp_customize->add_setting('smoy_footer_social_icon_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        ));
        
        $wp_customize->add_setting('smoy_footer_social_icon_link_'.$i, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
        
    }
    
    
    
    /*
    $wp_customize->add_setting('smoy_footer_contact_business_id', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
    ));
    */
    
    
    
    
    
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
    
    $wp_customize->add_control( 'smoy_about_section_title_eng', array(
          'label' => __( 'Section title (in english)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'smoy_callback_is_eng_page'
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
        
        $wp_customize->add_control( 'smoy_about_content_title_eng_'.$i, array(
          'label' => __( 'Paragraph '.$i.' heading (in english)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
        
        $wp_customize->add_control( 'smoy_about_content_body_eng_'.$i, array(
          'label' => __( 'Paragraph '.$i.' body text (in english)', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
        
    }
    

    for ($i = 1; $i < 5; $i++) {
        
        $wp_customize->add_control( 'smoy_about_quote_circle_content_'.$i, array(
          'label' => __( 'Circle '.$i.' content text', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_about_quote_circle_content_eng_'.$i, array(
          'label' => __( 'Circle '.$i.' content text (in english)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
        
        $wp_customize->add_control( 'smoy_about_quote_circle_radius_'.$i, array(
          'label' => __( 'Circle '.$i.' radius', 'smoy'),
          'description' => __( 'Adjust the radius of circle '.$i.'. Use positive integer value somewhere around 50 - 150 (default 75)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
        ));
        
        $wp_customize->add_control( 'smoy_about_quote_circle_content_margin_top_'.$i, array(
          'label' => __( 'Circle '.$i.' text top margin', 'smoy'),
          'description' => __( 'Specify the top margin of circle '.$i.' content text. Use a single integer value (default 40)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_about_quote_circle_content_margin_sides_'.$i, array(
          'label' => __( 'Circle '.$i.' text left and right margin', 'smoy'),
          'description' => __( 'Specify the left and right margin of circle '.$i.' content text. Use a single integer value (default 15)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_about_quote_circle_content_margin_top_eng_'.$i, array(
          'label' => __( 'Circle '.$i.' text top margin', 'smoy'),
          'description' => __( 'Specify the top margin of circle '.$i.' content text. Use a single integer value (default 40)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
        
        $wp_customize->add_control( 'smoy_about_quote_circle_content_margin_sides_eng_'.$i, array(
          'label' => __( 'Circle '.$i.' text left and right margin', 'smoy'),
          'description' => __( 'Specify the left and right margin of circle '.$i.' content text. Use a single integer value (default 15)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_about_us_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
    
    }
    
    
    /* ------- Front-Page Services Section -------- */
    
       
        $wp_customize->add_control( 'smoy_services_header_title', array(
          'label' => __( 'Header title', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_services_header_desc', array(
          'label' => __( 'Header description body', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
    
        $wp_customize->add_control( 'smoy_services_header_desc_max_width', array(
          'label' => __( 'Header description max width', 'smoy'),
          'description' => __( 'Adjust the header description max width. You can use normal css units, like px, em and % (default 500px)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
    
    
        $wp_customize->add_control( 'smoy_services_header_title_eng', array(
          'label' => __( 'Header title (in english)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
        
        $wp_customize->add_control( 'smoy_services_header_desc_eng', array(
          'label' => __( 'Header description body (in english)', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_services_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
    
        $wp_customize->add_control( 'smoy_services_header_desc_max_width_eng', array(
          'label' => __( 'Header description max width', 'smoy'),
          'description' => __( 'Adjust the header description max width. You can use normal css units, like px, em and % (default 500px)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
    
        $wp_customize->add_control( 'smoy_services_header_text_bg_color', array(
          'type' => 'radio',
          'section' => 'smoy_services_section', 
          'label' => __( 'Text background', 'smoy'),
          'description' => __( 'Select header text background color', 'smoy'),
          'choices' => array(
            'orange' => __( 'Orange', 'smoy'),
            'pink' => __( 'Pink' , 'smoy')
          ),
          'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
        ));
    
    
    for ($i = 1; $i < 7; $i++) {
        
        $wp_customize->add_control( 'smoy_service_title_front_'.$i, array(
          'label' => __( 'Service '.$i.' front page heading', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_service_mobile_title_'.$i, array(
          'label' => __( 'Service '.$i.' mobile heading', 'smoy'),
          'description' => __( 'How the front page service heading should be displayed in mobile view', 'smoy'),
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
        
        $wp_customize->add_control( 'smoy_service_title_front_eng_'.$i, array(
          'label' => __( 'Service '.$i.' front page heading (in english)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
        
        $wp_customize->add_control( 'smoy_service_desc_body_eng_'.$i, array(
          'label' => __( 'Service '.$i.' english description', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_services_section',
          'active_callback' => 'smoy_callback_is_eng_page'
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
          'description' => __( 'Adjust the body text max width. You can use normal css units, like px, em and % (default 60%)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'is_front_page'
        ));
        
        
        $wp_customize->add_control( 'smoy_service_body_max_width_eng_'.$i, array(
          'label' => __( 'Service '.$i.' body text max width', 'smoy'),
          'description' => __( 'Adjust the body text max width. You can use normal css units, like px, em and % (default 60%)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_services_section',
          'active_callback' => 'smoy_callback_is_eng_page'
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
            'label' => __( 'Service '.$i.' background image position', 'smoy'),
            'description' => __( 'Adjust the background image horizontal position (default 50)', 'smoy'),
            'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
          ),
            'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
        ));
        
    }
    
    

    /* ------- Front-Page Customer References ----- */
    
        $wp_customize->add_control( 'smoy_customer_ref_header_title', array(
          'label' => __( 'Header title', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_customer_ref_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_customer_ref_header_desc', array(
          'label' => __( 'Header description body', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_customer_ref_section',
          'active_callback' => 'is_front_page'
        ));
    
        $wp_customize->add_control( 'smoy_customer_ref_header_desc_max_width', array(
          'label' => __( 'Header description max width', 'smoy'),
          'description' => __( 'Adjust the header description max width. You can use normal css units, like px, em and % (default 500px)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_customer_ref_section',
          'active_callback' => 'is_front_page'
        ));
    
        $wp_customize->add_control( 'smoy_customer_ref_header_title_eng', array(
          'label' => __( 'Header title (in english)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_customer_ref_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
        
        $wp_customize->add_control( 'smoy_customer_ref_header_desc_eng', array(
          'label' => __( 'Header description body (in english)', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_customer_ref_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
    
        $wp_customize->add_control( 'smoy_customer_ref_header_desc_max_width_eng', array(
          'label' => __( 'Header description max width', 'smoy'),
          'description' => __( 'Adjust the header description max width. You can use normal css units, like px, em and % (default 500px)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_customer_ref_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
    
        $wp_customize->add_control( 'smoy_customer_ref_header_text_bg_color', array(
          'type' => 'radio',
          'section' => 'smoy_customer_ref_section', 
          'label' => __( 'Text background', 'smoy'),
          'description' => __( 'Select header text background color', 'smoy'),
          'choices' => array(
            'orange' => __( 'Orange', 'smoy'),
            'pink' => __( 'Pink' , 'smoy')
          ),
          'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
        ));
    
    
    for ($i = 1; $i < 13; $i++) {
        
        $wp_customize->add_control( 
            new WP_Customize_Media_Control(
                $wp_customize,'smoy_customer_logo_'.$i, array(
                    'label' => __( 'Customer logo '.$i , 'smoy'),
                    'section' => 'smoy_customer_ref_section',
                    'mime_type' => 'image',
                    'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
                )
            )
        );
        
        $wp_customize->add_control( 
            new WP_Customize_Media_Control(
                $wp_customize,'smoy_customer_bg_img_'.$i, array(
                    'label' => __( 'Customer background image '.$i , 'smoy'),
                    'section' => 'smoy_customer_ref_section',
                    'mime_type' => 'image',
                    'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
                )
            )
        );
        
        $wp_customize->add_control( 'smoy_customer_logo_height_'.$i, array(
          'label' => __( 'Logo '.$i.' height', 'smoy'),
          'description' => __( 'Adjust the logo fluid height using a numeric value between 0-100 (default 5)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_customer_ref_section',
          'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
        ));
        
        
        $wp_customize->add_control( 'smoy_customer_logo_min_height_'.$i, array(
            'type' => 'range',
            'section' => 'smoy_customer_ref_section',
            'label' => __( 'Logo '.$i.' min height', 'smoy'),
            'description' => __( 'Adjust the logo minimun height (default 0)', 'smoy'),
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
                'step' => 1,
            ),
            'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
        ));
        
        $wp_customize->add_control( 'smoy_customer_logo_max_height_'.$i, array(
            'type' => 'range',
            'section' => 'smoy_customer_ref_section',
            'label' => __( 'Logo '.$i.' max height', 'smoy'),
            'description' => __( 'Adjust the logo maximum height (default 200)', 'smoy'),
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
                'step' => 1,
            ),
            'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
        ));
    
    }
    
    
    
    /* ------------- Front-Page People -------------- */
    
       $wp_customize->add_control( 'smoy_people_header_title', array(
          'label' => __( 'Header title', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_people_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_people_header_desc', array(
          'label' => __( 'Header description body', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_people_section',
          'active_callback' => 'is_front_page'
        ));
    
        $wp_customize->add_control( 'smoy_people_header_desc_max_width', array(
          'label' => __( 'Header description max width', 'smoy'),
          'description' => __( 'Adjust the header description max width. You can use normal css units, like px, em and % (default 500px)' ),
          'type' => 'text',
          'section' => 'smoy_people_section',
          'active_callback' => 'is_front_page'
        ));
    
        $wp_customize->add_control( 'smoy_people_header_text_bg_color', array(
          'type' => 'radio',
          'section' => 'smoy_people_section', 
          'label' => __( 'Text background', 'smoy'),
          'description' => __( 'Select header text background color', 'smoy'),
          'choices' => array(
            'orange' => __( 'Orange', 'smoy'),
            'pink' => __( 'Pink' , 'smoy')
          ),
          'active_callback' => 'is_front_page'
        ));
    
    /* ------------- Front-Page Contact ------------- */
    
        $wp_customize->add_control( 'smoy_contact_header_title', array(
          'label' => __( 'Header title', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_contact_section',
          'active_callback' => 'is_front_page'
        ));
        
        $wp_customize->add_control( 'smoy_contact_header_desc', array(
          'label' => __( 'Header description body', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_contact_section',
          'active_callback' => 'is_front_page'
        ));
    
        $wp_customize->add_control( 'smoy_contact_header_desc_max_width', array(
          'label' => __( 'Header description max width', 'smoy'),
          'description' => __( 'Adjust the header description max width. You can use normal css units, like px, em and % (default 500px)' ),
          'type' => 'text',
          'section' => 'smoy_contact_section',
          'active_callback' => 'is_front_page'
        ));
    
        $wp_customize->add_control( 'smoy_contact_header_title_eng', array(
          'label' => __( 'Header title (in english)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_contact_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
        
        $wp_customize->add_control( 'smoy_contact_header_desc_eng', array(
          'label' => __( 'Header description body (in english)', 'smoy'),
          'type' => 'textarea',
          'section' => 'smoy_contact_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
    
        $wp_customize->add_control( 'smoy_contact_header_desc_max_width_eng', array(
          'label' => __( 'Header description max width', 'smoy'),
          'description' => __( 'Adjust the header description max width. You can use normal css units, like px, em and % (default 500px)' ),
          'type' => 'text',
          'section' => 'smoy_contact_section',
          'active_callback' => 'smoy_callback_is_eng_page'
        ));
    
        $wp_customize->add_control( 'smoy_contact_header_text_bg_color', array(
          'type' => 'radio',
          'section' => 'smoy_contact_section', 
          'label' => __( 'Text background', 'smoy'),
          'description' => __( 'Select header text background color', 'smoy'),
          'choices' => array(
            'orange' => __( 'Orange', 'smoy'),
            'pink' => __( 'Pink' , 'smoy')
          ),
          'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
        ));
    
    
    
        for($i = 1; $i < 4; $i++) {

            $wp_customize->add_control('smoy_contact_person_name_'.$i, array(
              'label' => __( 'Contact person '.$i.' name', 'smoy'),
              'type' => 'text',
              'section' => 'smoy_contact_section',
              'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
            ));
            
            $wp_customize->add_control('smoy_contact_person_title_'.$i, array(
              'label' => __( 'Contact person '.$i.' title', 'smoy'),
              'type' => 'text',
              'section' => 'smoy_contact_section',
              'active_callback' => 'is_front_page'
            ));
            
            $wp_customize->add_control('smoy_contact_person_title_eng_'.$i, array(
              'label' => __( 'Contact person '.$i.' title (in english)', 'smoy'),
              'type' => 'text',
              'section' => 'smoy_contact_section',
              'active_callback' => 'smoy_callback_is_eng_page'
            ));
            
            $wp_customize->add_control('smoy_contact_person_phone_'.$i, array(
              'label' => __( 'Contact person '.$i.' phone number', 'smoy'),
              'type' => 'text',
              'section' => 'smoy_contact_section',
              'active_callback' => 'smoy_callback_is_front_page_or_eng_page'
            ));
             
        }
    
    $wp_customize->add_control('smoy_contact_form_shortcode', array(
              'label' => __( 'Contact form shortcode', 'smoy'),
              'description' => __( 'Place the contact form shortcode here', 'smoy'),
              'type' => 'text',
              'section' => 'smoy_contact_section',
              'active_callback' => 'is_front_page'
    ));
    
    $wp_customize->add_control('smoy_contact_form_shortcode_eng', array(
              'label' => __( 'Contact form shortcode for english page', 'smoy'),
              'description' => __( 'Place the contact form shortcode here', 'smoy'),
              'type' => 'text',
              'section' => 'smoy_contact_section',
              'active_callback' => 'smoy_callback_is_eng_page'
    ));
    
    
    /* ------------------ Footer -------------------- */
    
     $wp_customize->add_control( 'smoy_footer_contact_building', array(
          'label' => __( 'Building name', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_footer_section'
    ));
    
    $wp_customize->add_control( 'smoy_footer_contact_street', array(
          'label' => __( 'Street address', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_footer_section'
    ));
    
    $wp_customize->add_control( 'smoy_footer_contact_city', array(
          'label' => __( 'City', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_footer_section'
    ));
    
    $wp_customize->add_control( 'smoy_footer_contact_phone', array(
          'label' => __( 'Phone', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_footer_section'
    ));
    
    $wp_customize->add_control( 'smoy_footer_contact_email', array(
          'label' => __( 'E-mail', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_footer_section'
    ));
    
    for ($i = 1; $i < 5; $i++) {
        
        $wp_customize->add_control( 
            new WP_Customize_Media_Control(
                $wp_customize, 'smoy_footer_social_icon_'.$i, array(
                    'label' => __( 'Social icon '.$i , 'smoy'),
                    'section' => 'smoy_footer_section',
                    'mime_type' => 'image'
                )
            )
        );
        
        $wp_customize->add_control( 'smoy_footer_social_icon_link_'.$i, array(
              'label' => __( 'Social icon link/url '.$i, 'smoy'),
              'type' => 'text',
              'section' => 'smoy_footer_section'
        ));
        
    }
    
    /*
    $wp_customize->add_control( 'smoy_footer_contact_business_id', array(
          'label' => __( 'Business id (Y-tunnus)', 'smoy'),
          'type' => 'text',
          'section' => 'smoy_footer_section'
    ));
    */
    
    
    
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


function smoy_sanitize_radio( $input, $setting ) {
  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


function replace_textarea_linebreaks( $textarea ){
    return str_replace("\n", '<span class="header-desc-linebreak"></span>', $textarea); 
}



add_action( 'wp_head', 'smoy_about_us_styles');

function smoy_about_us_styles() {
    
    if(is_home() || is_page( 'eng' )) {
        
        $quote_circle_middle_positions = array(
              array(130, 1026),
              array(247, 1158),
              array(436, 1050),
              array(608, 1170)
        );
        

        $css = array();
        $j = 1;
        //$heightCss = array();
        //$media_queries = array();
        
        
        /*
        $media_queries[0] = '@media screen and (max-width: 1280px) {';
        $media_queries[1] = '@media screen and (max-width: 960px) {';
        $media_queries[2] = '@media screen and (max-width: 630px) {';
        */

        for($i = 0; $i < 4; $i++){
            
            
            //$this_quote_circle_content = get_theme_mod( 'smoy_about_quote_circle_content_'.$j);
            $this_quote_circle_radius = get_theme_mod( 'smoy_about_quote_circle_radius_'.$j);
            
            if(is_home()){
                $this_quote_circle_content_margin_top = get_theme_mod( 'smoy_about_quote_circle_content_margin_top_'.$j);
                $this_quote_circle_content_margin_sides = get_theme_mod( 'smoy_about_quote_circle_content_margin_sides_'.$j);
            }else{
                $this_quote_circle_content_margin_top = get_theme_mod( 'smoy_about_quote_circle_content_margin_top_eng_'.$j);
                $this_quote_circle_content_margin_sides = get_theme_mod( 'smoy_about_quote_circle_content_margin_sides_eng_'.$j);
            }
            

            /*
            $num = "20";
            if ( (int)$num == $num && (int)$num > 0 )
            */
            
            $this_vertical_pos_right = $quote_circle_middle_positions[$i][1] + 250;
            
            $this_vertical_pos_left = $quote_circle_middle_positions[$i][1] - 250;
                
                
                
            $css['#filler-shape-'.$j]['top'] = $quote_circle_middle_positions[$i][0] . 'px';
            
            $css['#filler-shape-'.$j.'.middle']['left'] = $quote_circle_middle_positions[$i][1] . 'px';
            
            $css['#filler-shape-'.$j.'.left']['left'] = $this_vertical_pos_left . 'px';
            
            $css['#filler-shape-'.$j.'.right']['left'] = $this_vertical_pos_right . 'px';
                
               
            
            
            /*
            if(!empty($this_quote_circle_content)){
                $css['#customer-'.$j.' .customer-content img']['min-height'] = $this_customer_logo_min_height . 'px';
            }
            */
            
            
            if(!empty($this_quote_circle_radius) && (int)$this_quote_circle_radius == $this_quote_circle_radius && (int)$this_quote_circle_radius > 0 ){
                $this_quote_circle_radius = intval($this_quote_circle_radius);
                $this_quote_circle_diameter = $this_quote_circle_radius * 2;
                $css['#filler-shape-'.$j]['width'] = $this_quote_circle_diameter . 'px';
                $css['#filler-shape-'.$j]['height'] = $this_quote_circle_diameter . 'px';
                $css['#filler-shape-'.$j]['border-radius'] = $this_quote_circle_radius . 'px';
            }else{
                $css['#filler-shape-'.$j]['width'] = '150px';
                $css['#filler-shape-'.$j]['height'] = '150px';
                $css['#filler-shape-'.$j]['border-radius'] = '75px';
            }
            
            if(!empty($this_quote_circle_content_margin_top) && is_numeric($this_quote_circle_content_margin_top)){
                $css['#filler-shape-'.$j.' p']['margin-top'] = $this_quote_circle_content_margin_top . 'px';
            }else{
                $css['#filler-shape-'.$j.' p']['margin-top'] = '40px';
            }

            if(!empty($this_quote_circle_content_margin_sides) && is_numeric($this_quote_circle_content_margin_sides)){
                $css['#filler-shape-'.$j.' p']['margin-left'] = $this_quote_circle_content_margin_sides . 'px';
                $css['#filler-shape-'.$j.' p']['margin-right'] = $this_quote_circle_content_margin_sides . 'px';
            }else{
                $css['#filler-shape-'.$j.' p']['margin-left'] = '15px';
                $css['#filler-shape-'.$j.' p']['margin-right'] = '15px';
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
        
        /*
        $media_queries_length = count($media_queries);
        foreach ( $heightCss as $style => $style_array ) {
            $prev_val = 0.0;
            for($i = 0; $i < $media_queries_length; $i++) {
                $final_css .= $media_queries[$i];
                $final_css .= $style . '{';
                foreach ( $style_array as $property => $value ) {

                 $floatval = floatval($value);
                 if($prev_val === 0.0) {
                     $newval = $floatval * 1.25;
                 }else{
                     $newval = $prev_val * 1.25;
                 }   
                    $final_css .= $property . ':' . $newval . 'vw;';
                }
                $final_css .= '}';
                $final_css .= '}';
                $prev_val = $newval;
            }
        }
        */
        
        $final_css .= '</style>';

        echo $final_css;
        
    }
}


add_action( 'smoy_get_about_us', 'smoy_about_us_output');

function smoy_about_us_output() {
    
    if(is_home() || is_page( 'eng' )) {
        
        $overlay_hole_middle_translate_positions = array(
              array(1026, 130),
              array(1158, 247),
              array(1050, 436),
              array(1170, 608)
        );
        
        //print_r($overlay_hole_middle_translate_positions);
        if(is_home()){
            $smoy_about_section_title = get_theme_mod( 'smoy_about_section_title');
        }else{
            $smoy_about_section_title = get_theme_mod( 'smoy_about_section_title_eng');
        }
        
        
        $smoy_about_content_titles = array();
        $smoy_about_content_body_texts = array();
        $smoy_about_quote_ball_body_texts = array();
        $smoy_about_radius_array = array();
    
        for ($i = 0; $i < 3; $i++) {
            $j = $i + 1;
            if(is_home()){
                $smoy_about_content_titles[$i] = get_theme_mod( 'smoy_about_content_title_'.$j);
                $smoy_about_content_body_texts[$i] = get_theme_mod( 'smoy_about_content_body_'.$j);
            }else{
                $smoy_about_content_titles[$i] = get_theme_mod( 'smoy_about_content_title_eng_'.$j);
                $smoy_about_content_body_texts[$i] = get_theme_mod( 'smoy_about_content_body_eng_'.$j);
            }
            
        }
        
        for($i = 0; $i < 4; $i++){
            $j = $i + 1;
            $this_quote_circle_radius = get_theme_mod( 'smoy_about_quote_circle_radius_'.$j);
            
            if(is_home()){
                $smoy_about_quote_ball_body_texts[$i] = get_theme_mod( 'smoy_about_quote_circle_content_'.$j);
            }else{
                $smoy_about_quote_ball_body_texts[$i] = get_theme_mod( 'smoy_about_quote_circle_content_eng_'.$j);
            }
            
            if(!empty($this_quote_circle_radius) && (int)$this_quote_circle_radius == $this_quote_circle_radius && (int)$this_quote_circle_radius > 0 ){
                $smoy_about_radius_array[$i] = $this_quote_circle_radius;
                $overlay_hole_middle_translate_positions[$i][0] = $overlay_hole_middle_translate_positions[$i][0] + $this_quote_circle_radius;
                $overlay_hole_middle_translate_positions[$i][1] = $overlay_hole_middle_translate_positions[$i][1] + $this_quote_circle_radius;
            }else{
                $smoy_about_radius_array[$i] = 75;
                $overlay_hole_middle_translate_positions[$i][0] = $overlay_hole_middle_translate_positions[$i][0] + 75;
                $overlay_hole_middle_translate_positions[$i][1] = $overlay_hole_middle_translate_positions[$i][1] + 75;
            }
              
        }
        
        //print_r($overlay_hole_middle_translate_positions);
        
        ob_start();
        require_once(get_template_directory() . '/template-parts/smoy-about-us.php' );
        $output = ob_get_clean();
        echo $output;
    
    }
}


add_action( 'wp_head', 'smoy_services_styles');

function smoy_services_styles() { 
    if(is_home() || is_page( 'eng' )) {
        
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
                
                if(is_home()){
                    $body_text_max_width = get_theme_mod( 'smoy_service_body_max_width_'.$j);
                }else{
                    $body_text_max_width = get_theme_mod( 'smoy_service_body_max_width_eng_'.$j);
                }
                
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


add_action( 'smoy_get_content_section_header_services', 'smoy_section_header_services_output');

function smoy_section_header_services_output() {
    if(is_home() || is_page( 'eng' )) {
        $this_section_header_id_prefix = 'services';
    
        if(is_home()){
            $smoy_section_header_title = get_theme_mod( 'smoy_services_header_title');
            $smoy_section_header_body = get_theme_mod( 'smoy_services_header_desc');
            $smoy_section_header_desc_max_width = get_theme_mod( 'smoy_services_header_desc_max_width' );
        }else{
            $smoy_section_header_title = get_theme_mod( 'smoy_services_header_title_eng');
            $smoy_section_header_body = get_theme_mod( 'smoy_services_header_desc_eng');
            $smoy_section_header_desc_max_width = get_theme_mod( 'smoy_services_header_desc_max_width_eng' );
        }
        
        $smoy_section_header_body = trim($smoy_section_header_body);
        $smoy_section_header_body = replace_textarea_linebreaks($smoy_section_header_body);
        
        if(empty($smoy_section_header_desc_max_width)){
            $smoy_section_header_desc_max_width = '500px';
        }
        $smoy_section_header_text_background = get_theme_mod( 'smoy_services_header_text_bg_color');
        
        ob_start();
        include get_template_directory() . '/template-parts/smoy-content-section-header.php';
        $output = ob_get_clean();
        echo $output;
    
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
             //public $featured_img = null;

             public function __construct($id, $title, $excerpt, $url/*, $featured_img*/) {
                 $this->id = $id;
                 $this->title = $title;
                 $this->excerpt = $excerpt;
                 $this->url = $url;
                 /*
                 if(!empty($featured_img)){
                    $this->featured_img = $featured_img;
                 }
                 */
                 
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
            //$this_service_featured_img = get_the_post_thumbnail_url($post->ID, 'service-thumb');
            
            
            
            $this_service = new Smoy_Service($post->ID, $post->post_title, get_the_excerpt($post), $this_service_permalink/*, $this_service_featured_img*/);
            $servicesArray[$i] = $this_service;
            $i++;
    
        }
        
        
        

        ob_start();
        require_once(get_template_directory() . '/template-parts/smoy-services-front.php' );
        $output = ob_get_clean();
        echo $output;
        
        wp_reset_postdata();     
        
    }else if(is_page( 'eng' )){
        
        
        $j = 1;
        for($i = 0; $i < 6; $i++) {
            
            $smoy_services_titles_front[$i] = get_theme_mod( 'smoy_service_title_front_eng_'.$j);
            $smoy_services_desc_bodies_eng[$i] = get_theme_mod( 'smoy_service_desc_body_eng_'.$j);
            
            $j++;
        }
        
        ob_start();
        require_once(get_template_directory() . '/template-parts/smoy-services-front-eng.php' );
        $output = ob_get_clean();
        echo $output;
        
        
    }
    
      
}

/*
function multiKeyExists(array $arr, $key) {

    // is in base array?
    if (array_key_exists($key, $arr)) {
        return true;
    }

    // check arrays contained in this array
    foreach ($arr as $element) {
        if (is_array($element)) {
            if (multiKeyExists($element, $key)) {
                return true;
            }
        }

    }

    return false;
}
*/

add_action( 'wp_head', 'smoy_customer_references_styles');

function smoy_customer_references_styles() {
    
    if(is_home() || is_page( 'eng' )) {

        $css = array();
        $heightCss = array();
        $media_queries = array();
        $j = 1;
        
        $media_queries[0] = '@media screen and (max-width: 1280px) {';
        $media_queries[1] = '@media screen and (max-width: 960px) {';
        $media_queries[2] = '@media screen and (max-width: 630px) {';

        for($i = 0; $i < 12; $i++){
            $bg_img = get_theme_mod( 'smoy_customer_bg_img_'.$j);
            
            $this_customer_logo_height = get_theme_mod( 'smoy_customer_logo_height_'.$j);
            $this_customer_logo_min_height = get_theme_mod( 'smoy_customer_logo_min_height_'.$j);
            $this_customer_logo_max_height = get_theme_mod( 'smoy_customer_logo_max_height_'.$j);

            if(!empty($bg_img)){
                $bg_url = wp_get_attachment_url($bg_img);
                $css['#customer-'.$j]['background-image'] = "url(\"".$bg_url."\")";
                
            }
            
            if(!empty($this_customer_logo_height)){
                $css['#customer-'.$j.' .customer-content img']['height'] = $this_customer_logo_height . 'vw';
                $heightCss['#customer-'.$j.' .customer-content img']['height'] = $this_customer_logo_height . 'vw';
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
        
        $media_queries_length = count($media_queries);
        foreach ( $heightCss as $style => $style_array ) {
            $prev_val = 0.0;
            for($i = 0; $i < $media_queries_length; $i++) {
                $final_css .= $media_queries[$i];
                $final_css .= $style . '{';
                foreach ( $style_array as $property => $value ) {

                 $floatval = floatval($value);
                 if($prev_val === 0.0) {
                     $newval = $floatval * 1.25;
                 }else{
                     $newval = $prev_val * 1.25;
                 }   
                    $final_css .= $property . ':' . $newval . 'vw;';
                }
                $final_css .= '}';
                $final_css .= '}';
                $prev_val = $newval;
            }
        }
        
        $final_css .= '</style>';

        echo $final_css;
        
    }
}


//'smoy_get_content_section_header_references'

add_action( 'smoy_get_content_section_header_references', 'smoy_section_header_ref_output');

function smoy_section_header_ref_output() {
    if(is_home() || is_page( 'eng' )) {
        
        $this_section_header_id_prefix = 'customers';
        
        if(is_home()) {
            $smoy_section_header_title = get_theme_mod( 'smoy_customer_ref_header_title');
            $smoy_section_header_body = get_theme_mod( 'smoy_customer_ref_header_desc');
            $smoy_section_header_desc_max_width = get_theme_mod( 'smoy_customer_ref_header_desc_max_width' );
        }else{
            $smoy_section_header_title = get_theme_mod( 'smoy_customer_ref_header_title_eng');
            $smoy_section_header_body = get_theme_mod( 'smoy_customer_ref_header_desc_eng');
            $smoy_section_header_desc_max_width = get_theme_mod( 'smoy_customer_ref_header_desc_max_width_eng' );
        }
        
        $smoy_section_header_body = trim($smoy_section_header_body);
        $smoy_section_header_body = replace_textarea_linebreaks($smoy_section_header_body);
        
        if(empty($smoy_section_header_desc_max_width)){
            $smoy_section_header_desc_max_width = '500px';
        }
        $smoy_section_header_text_background = get_theme_mod( 'smoy_customer_ref_header_text_bg_color');
        
        ob_start();
        include get_template_directory() . '/template-parts/smoy-content-section-header.php';
        $output = ob_get_clean();
        echo $output;
        
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


add_action( 'smoy_get_content_section_header_people', 'smoy_section_header_people_output');

function smoy_section_header_people_output() {
    if(is_home() && !wp_is_mobile()) {
        $this_section_header_id_prefix = 'staff';
        $smoy_section_header_title = get_theme_mod( 'smoy_people_header_title');
        $smoy_section_header_body = get_theme_mod( 'smoy_people_header_desc');
        $smoy_section_header_body = trim($smoy_section_header_body);
        $smoy_section_header_body = replace_textarea_linebreaks($smoy_section_header_body);
        $smoy_section_header_desc_max_width = get_theme_mod( 'smoy_people_header_desc_max_width' );
        if(empty($smoy_section_header_desc_max_width)){
            $smoy_section_header_desc_max_width = '500px';
        }
        $smoy_section_header_text_background = get_theme_mod( 'smoy_people_header_text_bg_color');
        
        ob_start();
        include get_template_directory() . '/template-parts/smoy-content-section-header.php';
        $output = ob_get_clean();
        echo $output;
    
    }
}


add_action('smoy_get_people', 'smoy_staff_front_page_output');

function smoy_staff_front_page_output() {
    
    if(is_home() && !wp_is_mobile()){
        
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


add_action( 'smoy_get_content_section_header_contact', 'smoy_section_header_contact_output');

function smoy_section_header_contact_output() {
    if(is_home() || is_page( 'eng' )) {
        $this_section_header_id_prefix = 'contact';
        
        if(is_home()) {
            $smoy_section_header_title = get_theme_mod( 'smoy_contact_header_title');
            $smoy_section_header_body = get_theme_mod( 'smoy_contact_header_desc');
            $smoy_section_header_desc_max_width = get_theme_mod( 'smoy_contact_header_desc_max_width' );
        }else{
            $smoy_section_header_title = get_theme_mod( 'smoy_contact_header_title_eng');
            $smoy_section_header_body = get_theme_mod( 'smoy_contact_header_desc_eng');
            $smoy_section_header_desc_max_width = get_theme_mod( 'smoy_contact_header_desc_max_width_eng' );
        }
        
        $smoy_section_header_body = trim($smoy_section_header_body);
        $smoy_section_header_body = replace_textarea_linebreaks($smoy_section_header_body);
        
        if(empty($smoy_section_header_desc_max_width)){
            $smoy_section_header_desc_max_width = '500px';
        }
        $smoy_section_header_text_background = get_theme_mod( 'smoy_contact_header_text_bg_color');
        
        ob_start();
        include get_template_directory() . '/template-parts/smoy-content-section-header.php';
        $output = ob_get_clean();
        echo $output;
    
    }
}


add_action('smoy_get_contact_form', 'smoy_contact_form_output');

function smoy_contact_form_output() {
    if(is_home() || is_page( 'eng' )) {
    
        class Smoy_Contact_Person {
             public $name = '';
             public $title = null;
             public $phone = null;

             public function __construct($name, $title, $phone) {
                 $this->name = $name;
                 if(!empty($title)){
                     $this->title = $title;
                 }

                 if(!empty($phone)){
                    $this->phone = $phone;
                 }

             }

        }
        
        if(is_home()){
            $contact_form_shortcode = get_theme_mod( 'smoy_contact_form_shortcode' );
        }else{
            $contact_form_shortcode = get_theme_mod( 'smoy_contact_form_shortcode_eng' );
        }

        if(empty($contact_form_shortcode)) {
            $contact_form_shortcode = '';
        }

        $contact_ppl_array = array();

        for ($i = 0; $i < 3; $i++) {
            $j = $i + 1;
            $thisPersonName = get_theme_mod( 'smoy_contact_person_name_'.$j);
            if(is_home()){
                $thisPersonTitle = get_theme_mod( 'smoy_contact_person_title_'.$j);
            }else{
                $thisPersonTitle = get_theme_mod( 'smoy_contact_person_title_eng_'.$j);
            }
            
            $thisPersonPhone = get_theme_mod( 'smoy_contact_person_phone_'.$j);

            $thisPerson = new Smoy_Contact_Person($thisPersonName, $thisPersonTitle, $thisPersonPhone);
            $contact_ppl_array[$i] = $thisPerson;

        }


        ob_start();
        require_once(get_template_directory() . '/template-parts/smoy-contact-form-front.php' );
        $output = ob_get_clean();
        echo $output;
        
    }
    

}


add_action('smoy_get_footer_contact_info', 'smoy_footer_contact_output');

function smoy_footer_contact_output() { 
    
    
    $smoy_footer_contact_building = get_theme_mod('smoy_footer_contact_building');
    $smoy_footer_contact_street = get_theme_mod('smoy_footer_contact_street');
    $smoy_footer_contact_city = get_theme_mod('smoy_footer_contact_city');
    $smoy_footer_contact_phone = get_theme_mod('smoy_footer_contact_phone');
    $smoy_footer_contact_email = get_theme_mod('smoy_footer_contact_email');
    
    ob_start();
    require_once(get_template_directory() . '/template-parts/smoy-footer-contact-info.php' );
    $output = ob_get_clean();
    echo $output;
    

}



add_action('smoy_get_footer_social_icons', 'smoy_footer_social_icons_output');

function smoy_footer_social_icons_output() { 
    
    $iconArr = array();
    $iconUrlArr = array();
    $linkArr = array();
    
    $iconArr[0] = get_theme_mod('smoy_footer_social_icon_1');
    $iconArr[1] = get_theme_mod('smoy_footer_social_icon_2');
    $iconArr[2] = get_theme_mod('smoy_footer_social_icon_3');
    $iconArr[3] = get_theme_mod('smoy_footer_social_icon_4');
    
    $linkArr[0] = get_theme_mod('smoy_footer_social_icon_link_1');
    $linkArr[1] = get_theme_mod('smoy_footer_social_icon_link_2');
    $linkArr[2] = get_theme_mod('smoy_footer_social_icon_link_3');
    $linkArr[3] = get_theme_mod('smoy_footer_social_icon_link_4');
    
    $iconArrLength = count($iconArr);
    
    for($i = 0; $i < $iconArrLength; $i++){
        
        if(!empty($iconArr[$i])){
            $icon_url = wp_get_attachment_url($iconArr[$i]);
            $iconUrlArr[$i] = $icon_url;    
        }
        
        /*
        
        if(empty($linkArr[$i])){
            $linkArr[$i] = '#';    
        }else{
            
        }
        */
        
        
        
    }
    
    $iconUrlArrLength = count($iconUrlArr);
    
    
    ob_start();
    require_once(get_template_directory() . '/template-parts/smoy-footer-social-icons.php' );
    $output = ob_get_clean();
    echo $output;
    

}



