<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */
get_header('single'); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'single' );
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
        wp_reset_postdata();
		?>
	</main>
</div>
<?php get_footer('single'); ?>
