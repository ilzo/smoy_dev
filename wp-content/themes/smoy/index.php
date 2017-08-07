<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package smoy
 */
if ( !defined('ABSPATH') ) {
    exit;
}
get_header(); ?>
<?php get_sidebar('newsletter'); ?>
<section id="about-us">
    <?php do_action('smoy_get_about_us'); ?>
</section>

<section id="services" class="content-section-front">
    <?php do_action('smoy_get_content_section_header_services'); ?>
    <?php do_action('smoy_get_services'); ?>
</section>
<section id="our-customers" class="content-section-front">
    <?php do_action('smoy_get_content_section_header_references'); ?>
    <?php do_action('smoy_get_references'); ?>
</section>
<section id="our-staff" class="content-section-front">
    <?php do_action('smoy_get_content_section_header_people'); ?>
    <?php do_action('smoy_get_people'); ?> 
</section>
<section id="blog" class="content-section-front">
<div class="content-section-header">
    <div class="content-header-wrapper">
        <div id="blog-heading" class="content-section-heading">
            <h1 class="heading-black">Blogi.</h1>
        </div>
   </div>
</div>
<?php get_template_part( 'template-parts/smoy-blogs-front'); ?>
</section>
<section id="contact" class="content-section-front">
    <?php do_action('smoy_get_content_section_header_contact'); ?>
    <?php do_action('smoy_get_contact_form'); ?> 
</section>
<section id="location" onclick="document.getElementById('smoy-front-page-map').style.pointerEvents='auto'">
    <?php do_action('smoy_get_front_page_google_map'); ?>
</section>
<?php get_footer(); ?>