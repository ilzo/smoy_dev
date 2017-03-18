<?php
/**
 *
 * Template Name: Blogs
 * @package WordPress
 * @subpackage Smoy
 * 
 */

get_header('blogs'); ?>

	<div class="blogs-wrapper">

		<?php 
		//$temp = $wp_query; $wp_query= null;
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $smoy_blogs_query_args = array(
          'post_type' => 'post',
          'category_name' => 'blogi',
          'posts_per_page' => 5,
          'paged' => $paged,
          'order' => 'DESC'
        );
        
		$smoy_blogs_loop = new WP_Query($smoy_blogs_query_args); 
        
		while ($smoy_blogs_loop->have_posts()) : $smoy_blogs_loop->the_post(); ?>

		
        <article class="blog-preview-content">
            <div class="wrap">
                <header class="blog-header">
                        <?php the_title( '<h2 class="blog-front-title">', '</h2>' ); ?>
                </header>
                <?php 
                //the_post_thumbnail('test-big');
                the_post_thumbnail('large'); 
                ?>
                <div class="blog-content">
                        <?php the_content(); ?>
                </div>
            </div>
        </article>
        
        
		<?php endwhile; 
        
        smoy_custom_pagination($smoy_blogs_loop->max_num_pages,"",$paged);
        
        ?>
        
        
        
       <?php wp_reset_postdata(); ?>

	</div>

<?php get_footer('single'); ?>
