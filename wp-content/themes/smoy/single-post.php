<?php
/**
 * The template for displaying all single blog
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */

get_header('single'); ?>
<main id="main" class="site-main" role="main">
    <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'single-post' );
        endwhile;
    ?>
</main><!-- .site-main -->
<?php get_footer(); ?>