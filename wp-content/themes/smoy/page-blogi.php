<?php
/**
 * Template Name: Blogi
 *
 * @package smoy
 */

$args = array(
    'posts_per_page' => '1',
    'post_type' => 'post',
    'category_name'=> 'blogi'
);
$post = get_posts($args);
if($post){
    $url = get_permalink($post[0]->ID);
    wp_redirect( $url, 301 ); 
    exit;
}
