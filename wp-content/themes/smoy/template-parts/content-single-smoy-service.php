<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage smoy
 *
 */
?>
<article id="service-<?php echo get_the_ID() ?>" <?php post_class(); ?>>
	<div class="single-service-content">
		<?php the_content(); ?>
	</div>
</article>