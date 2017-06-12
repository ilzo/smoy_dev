<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage smoy
 *
 */
?>

<article id="service-<?php echo get_the_ID() ?>" <?php post_class('single-post-article'); ?>>
    <div class="single-post-content-wrapper">
        <div class="single-post-content-header">
            <h1 class="single-post-title"><?php the_title(); ?></h1>
            <?php the_date('F Y', '<h2 class="single-blog-post-month">', '</h2>'); ?>
        <div class="single-post-header-bottom-border"></div>
        </div>
        <div class="single-post-content">
            <?php
                the_content();
            ?>
        </div>
    </div>
    <?php get_sidebar('blogs'); ?>
</article>