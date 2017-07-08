<?php
/**
 * The template for displaying all single service
 *
 * @package WordPress
 * @subpackage smoy
 * 
 */
get_header('service'); ?>
<?php get_sidebar('newsletter'); ?>
<main id="main" class="site-main" role="main">
    <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'single-smoy-service' );
        endwhile;
    ?>
</main>
<?php get_footer('service'); ?>