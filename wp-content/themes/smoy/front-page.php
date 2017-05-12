<?php
/**
 * Template Name: Front Page
 *
 * @package smoy
 */

get_header(); ?>
<?php get_sidebar('newsletter'); ?>
<section id="about-us">
    <?php do_action('smoy_get_about_us'); ?>
</section>

<section id="services" class="content-section-front">
    <?php do_action('smoy_get_content_section_header_services'); ?>
    <?php do_action('smoy_get_services'); ?>
</section>
<!-- <section id="bg-pic-1" class="bg-img-container"> -->
<!--<img class="bg-img" src="http://192.168.11.6:8081/loud_dev/wp-content/uploads/2016/08/1103-helmi_0144_bg-2400x1600.jpg" /> -->
<!-- </section> -->

<section id="our-customers" class="content-section-front">
    <?php do_action('smoy_get_content_section_header_references'); ?>
    <?php do_action('smoy_get_references'); ?>
</section>

<!-- <section id="bg-pic-2" class="bg-img-container"> -->
<!--<img class="bg-img" src="http://192.168.11.6:8081/loud_dev/wp-content/uploads/2016/08/1103-helmi_0144_bg-2400x1600.jpg" /> -->
<!-- </section> -->
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
            <!--
            <div id="blog-header-body" class="content-header-body">
                <p class="body-text-orange">Luova, vaikuttava ja tuloshakuinen mainostoimisto ja asiakassuhdemarkkinoinnin edelläkävijä.</p>
            </div>
            -->
       </div>
    </div>
    <?php get_template_part( 'template-parts/smoy-blogs-front'); ?>
</section>
<section id="contact" class="content-section-front">
    <?php do_action('smoy_get_content_section_header_contact'); ?>
    <?php do_action('smoy_get_contact_form'); ?> 
</section>

<?php get_footer(); ?>