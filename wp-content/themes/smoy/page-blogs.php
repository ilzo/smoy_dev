<?php
/**
 *
 * Template Name: Blogs
 * @package WordPress
 * @subpackage Smoy
 * 
 */

get_header('single'); ?>

	<article>

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
        //$wp_query->query('posts_per_page=5' . '&paged='.$paged);
        
        //$smoy_blogs_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 5, 'order' => 'DESC', 'cat' => 2, 'ignore_sticky_posts' => true ) );
        
        
		while ($smoy_blogs_loop->have_posts()) : $smoy_blogs_loop->the_post(); ?>

		<h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
		<?php //the_excerpt(); ?>

		<?php endwhile; 
        
        smoy_custom_pagination($smoy_blogs_loop->max_num_pages,"",$paged);
        
        ?>
        
        
        
       <?php wp_reset_postdata(); ?>

	</article>

<?php get_footer(); ?>
