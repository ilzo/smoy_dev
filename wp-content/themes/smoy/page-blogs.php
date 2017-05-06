<?php
/**
 *
 * Template Name: Blogs
 * @package WordPress
 * @subpackage Smoy
 * 
 */
get_header('blogs'); ?>
<main id="main" class="site-main" role="main">
    <?php
        $smoy_blogs_query_args = array(
          'post_type' => 'post',
          'category_name' => 'blogi',
          'posts_per_page' => 1
        );
        $smoy_blogs_loop = new WP_Query($smoy_blogs_query_args); 
        while ($smoy_blogs_loop->have_posts()) : $smoy_blogs_loop->the_post();
            get_template_part( 'template-parts/content', 'single-post' );
        endwhile; wp_reset_postdata();
    ?>
</main>

<?php get_footer('single'); ?>
