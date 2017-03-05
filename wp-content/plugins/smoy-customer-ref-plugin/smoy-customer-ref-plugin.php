<?php
/*
Plugin Name: Smoy Customer References Plugin
Plugin URI: -
Description: This plugin is for adding customizeable customer references for Wordpress theme.
Version: 1.0
Author: Ilari Juvani
Author URI: -
License: -
*/

require_once(dirname( __DIR__ ) . '/includes/smoy-ref-controller.php' );

function setup_smoy_customer_refs() {
    
    $labels = array(
        'name' => _x('References', 'post type general name'),
        'singular_name' => _x('Reference', 'post type singular name')
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
        'menu_icon' => 'dashicons-index-card',
        'supports' => array('title','editor','thumbnail', 'excerpt'),
        'rewrite' => array(
            //'slug' => 'event',
            'slug' => '',
            'with_front' => false
        )
    ); 

    register_post_type( 'smoy_customer_refs' , $args );
    
    //flush_rewrite_rules();
}

add_action('init', 'setup_smoy_customer_refs');


function smoy_refs_install()
{
    // trigger our function that registers the custom post type
    setup_smoy_customer_refs();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'smoy_refs_install' );

function smoy_refs_deactivation()
{
    // our post type will be automatically removed, so no need to unregister it
    // clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'smoy_refs_deactivation' );


//code below will remove the post_name slug from the url

function smoy_refs_remove_slug( $post_link, $post, $leavename ) {
    if ( 'smoy_customer_refs' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}
add_filter( 'post_type_link', 'smoy_refs_remove_slug', 10, 3 );

function smoy_refs_parse_request( $query ) {
    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'smoy_customer_refs', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'smoy_refs_parse_request' );




?>