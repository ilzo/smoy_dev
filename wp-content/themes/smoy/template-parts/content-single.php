<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage smoy
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php if(has_post_thumbnail()){the_post_thumbnail('large');} ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	<div class="entry-content">
		<?php
			the_content();
		?>
	</div>
	<footer class="entry-footer">
	</footer>
</article>
