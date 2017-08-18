<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */
if ( !defined('ABSPATH') ) {
    exit;
}
get_header('single'); ?>
<div id="primary" class="content-area">
	<div id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'single' );
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
        wp_reset_postdata();
		?>
	</div>
</div>
<?php get_footer('single'); ?>
