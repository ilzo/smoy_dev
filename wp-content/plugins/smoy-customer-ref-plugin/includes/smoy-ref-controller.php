<?php
 
/**
 * The main plugin controller
 *
 * @package Smoy Customer References Plugin
 * @subpackage Main Plugin Controller
 * @since 1.0
 */
class SmoyRefController
{
    
    private static $smoy_refs_total_posts;
    
    private static $smoy_refs_latest_loop;
    
    /**
     * the class constructor
     *
     * @package Smoy Customer References Plugin
     * @subpackage Main Plugin Controller
     *
     * @since 1.0
     */
    public function __construct()
    {
        if( !is_admin() ):
            add_action( 'wp', array( $this, 'init' ) );
        endif;
    }


    /**
     * callback for the 'wp' action
     *
     * In this function, we determine what WordPress is doing and add plugin actions depending upon the results.
     * This helps to keep the plugin code as light as possible, and reduce processing times.
     *
     * @package MVC Example
     * @subpackage Main Plugin Controller
     *
     * @since 0.1
     */
    public function init()
    {
        if( is_home() )
            
            self::$smoy_refs_total_posts = get_option('posts_per_page'); /* number of latest posts to show */
            self::$smoy_refs_latest_loop = new WP_Query( array( 'post_type' => 'smoy_customer_refs', 'posts_per_page' => $smoy_refs_total_posts, 'order' => 'DESC','ignore_sticky_posts' => true ) );
        
            
            add_action('wp_enqueue_scripts', 'smoy_refs_load_front_page_styles');
            add_action( 'wp_head', 'smoy_refs_box_background_styles');
            add_action('smoy_get_references', array(&$this, 'smoy_refs_front_page_output' ));

    }
    
    function smoy_refs_load_front_page_styles() 
    {
        wp_enqueue_style('smoy_customer_references_front', plugin_dir_url( __FILE__ ) . 'public/css/smoy-customer-references-front.css' );
    }


    public function smoy_refs_front_page_output()
    {
        
        //include our view
        require_once(dirname( __DIR__ ) . 'views/smoy-ref-front-page-html.php' );

        //render the view
        $content = SmoyRefFrontPageHtmlView::render(self::$smoy_refs_total_posts, self::$smoy_refs_latest_loop);

        //return the result
        return $content;
    }
    
    public function smoy_refs_box_background_styles()
    {
        $total_posts = self::$smoy_refs_total_posts;
        
        $latest_posts = self::$smoy_refs_latest_loop;
        
        
        if( !empty($total_posts) && ($total_posts > 0) ):
        
            echo '<style type="text/css">\n';
                $i = 0;

                if ( $latest_posts->have_posts() ) :

                    while ( $latest_posts->have_posts() ) : $latest_posts->the_post();

                    $i++;

                    echo '#customer-'.$i.' .customer-content-wrapper {background: linear-gradient( rgba(17, 24, 27, 0.68), rgba(17, 24, 27, 0.68) ), url("'.the_post_thumbnail_url().'");}\n';

                    endwhile;

                endif;
            echo '</style>';
        endif;
          
    }

}


$smoyRefController = new SmoyRefController();

?>