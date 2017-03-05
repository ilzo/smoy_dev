<?php

/**
 * The single post view
 *
 * @package Smoy Customer References Plugin
 * @subpackage Front Page View
 * @since 1.0
 */
 
if( !class_exists( SmoyRefFrontPageHtmlView) ):
 
/**
 * class to render the html for single posts
 *
 * @package Smoy Customer References Plugin
 * @subpackage Front Page View
 * @since 1.0
 */
    class SmoyRefFrontPageHtmlView
    {
        /**
         * print the message
         *
         * @package Smoy Customer References Plugin
         * @subpackage Front Page View
         *
         * @return string $html the html for the view
         * @since 1.0
         */
        public static function render($total_posts, $latest_posts)
        {
            //$smoy_refs_total_posts = get_option('posts_per_page'); /* number of latest posts to show */

            if( !empty($total_posts) && ($total_posts > 0) ):

                    echo '<div id="customers-wrapper">';

                            //$smoy_refs_latest_loop = new WP_Query( array( 'post_type' => 'smoy_customer_refs', 'posts_per_page' => $smoy_refs_total_posts, 'order' => 'DESC','ignore_sticky_posts' => true ) );

                                /*
                                $newSlideActive = '<div class="item active">';
                                $newSlide 		= '<div class="item">';
                                */

                            $i = 0;

                            if ( !wp_is_mobile() ){

                                if ( $latest_posts->have_posts() ) :

                                    while ( $latest_posts->have_posts() ) : $latest_posts->the_post();

                                        $i++;

                                        echo '<figure id="customer-'.$i.'" class="customer-box">';


                                            echo '<a class="references-img-a" href="'.get_permalink().'" title="'.get_the_title().'">';

                                            //if ( has_post_thumbnail() ) :

                                                $attr = array(
                                                    'id' => get_the_ID()
                                                );

                                                    echo '<div class="customer-stretchy-wrapper">';

                                                        echo '<div class="customer-content-wrapper">';

                                                            //the_post_thumbnail( 'references-thumbnail', $attr );

                                                            //the_post_thumbnail( 'references-thumbnail-large', $attr );


                                                            echo '<div id="content-'.get_the_ID().'" class="customer-content">';

                                                                the_title();

                                                                if ( has_excerpt(get_the_ID()) ) {
                                                                    the_excerpt();
                                                                }

                                                            echo '</div>';

                                                        echo '</div>';

                                                    echo '</div>';
                                            /*
                                                else:
                                                    echo '<div class="thumb-overlay">';
                                                            echo '<img src="'.esc_url( get_template_directory_uri() ).'/images/latestposts_default.png" width="500" height="326"  alt="'.get_the_title().'" />';
                                                            echo '<div id="content-'.get_the_ID().'" class="references-content" style="display:none;" >';

                                                                the_title();

                                                                if ( has_excerpt(get_the_ID()) ) {
                                                                    the_excerpt();
                                                                }

                                                            echo '</div><!-- .references-content -->';

                                                    echo '</div><!-- .thumb-overlay -->';
                                                endif; 
                                            */
                                            echo '</a>';

                                        echo '</figure>';

                                    endwhile;

                                endif;	

                            } else {

                            /* Stuff for mobile devices goes here */

                            /*
                                if ( $smoy_refs_latest_loop->have_posts() ) :

                                    while ( $smoy_refs_latest_loop->have_posts() ) : $smoy_refs_latest_loop->the_post();

                                        $i++;

                                        echo '<div id="references-item-'.$i.'" class="references-item">';

                                            echo '<a class="works-img-a" href="'.get_permalink().'" title="'.get_the_title().'">';

                                                if ( has_post_thumbnail() ) :
                                                    //the_post_thumbnail();

                                                    $attr = array(
                                                        'id' => get_the_ID()
                                                    );

                                                    the_post_thumbnail( 'references-thumbnail', $attr );

                                                    echo '<div id="content-mobile-'.$i.'" class="references-content-mobile">';

                                                        the_title();

                                                        if ( has_excerpt(get_the_ID()) ) {
                                                            the_excerpt();
                                                        }

                                                    echo '</div>';

                                                else:

                                                    echo '<img src="'.esc_url( get_template_directory_uri() ).'/images/latestposts_default.png" width="500" height="326"  alt="'.get_the_title().'" />';
                                                    echo '<div id="content-mobile-'.$i.'" class="references-content-mobile" >';

                                                        //the_title();
                                                        the_title();

                                                        if ( has_excerpt(get_the_ID()) ) {
                                                            the_excerpt();
                                                        }

                                                    echo '</div><!-- .references-content-mobile" -->';


                                                endif; 
                                            echo '</a>';

                                        echo '</div><!-- .references-item" -->';

                                    endwhile;
                                endif;

                            */
                            }

                        wp_reset_postdata(); 

                    echo '</div><!-- .customers-wrapper -->';

        endif;
            
        }
         
        
    }
endif;
?>