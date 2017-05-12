<?php
/**
 * The template for displaying all single blog
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */

get_header('single'); ?>
<?php get_sidebar('newsletter'); ?>
<main id="single-main" class="site-main" role="main">
    <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'single-post' );
        endwhile;
    ?>
<div class="single-navigation">
    <div class="single-previous">
    <?php previous_post_link('%link', '<span class="arrow-left">&#x2190;</span>edellinen', true); ?>
    </div>
    <div class="single-next">
        <?php next_post_link('%link', 'seuraava<span class="arrow-right">&#x2192;</span>', true); ?>
    </div>
</div>
</main><!-- .site-main -->
<?php get_footer('single'); ?>