<?php
/**
 * Template Name: Briefly in English
 *
 * @package smoy
 */

get_header(); ?>
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
<section id="contact" class="content-section-front">
    <?php do_action('smoy_get_content_section_header_contact'); ?>
    <?php do_action('smoy_get_contact_form'); ?> 
</section>
<section id="location" onclick="document.getElementById('smoy-front-page-map').style.pointerEvents='auto'">
    <?php do_action('smoy_get_front_page_google_map'); ?>
</section>
<?php get_footer(); ?>