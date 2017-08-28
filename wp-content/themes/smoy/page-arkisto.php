<?php
/**
 * Template Name: Arkisto
 *
 * @package smoy
 */

$args = array(
    'posts_per_page' => '1',
    'post_type' => 'post',
    'category_name'=> 'arkisto'
);
$post = get_posts($args);
if($post){
    $url = get_permalink($post[0]->ID);
    wp_redirect( $url, 301 ); 
    exit;
}

