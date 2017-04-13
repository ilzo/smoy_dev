<?php
/**
 * Template Name: Front Page
 *
 * @package smoy
 */

get_header(); ?>

<section id="about-us">
    <?php do_action('smoy_get_about_us'); ?>
</section>

<section id="services" class="content-section-front">
    <div class="content-section-header">
        <div class="content-header-wrapper">
            <div id="services-heading" class="content-section-heading">
                <h1 class="heading-pink">Palvelut.</h1>
            </div>
            <div id="services-header-body" class="content-header-body">
                <div class="body-text-pink">
                    <p>Meiltä löydät monipuolisten mainostoimistopalvelujen lisäksi palveluasennetta, joka ei ole kiinni markkinointibudjettisi koosta.</p>
                </div>
            </div>
       </div>
    </div>
    <div id="services-wrapper">
        <!--<div class="service-row"> -->
        
            <figure id="service-1" class="service-box">
                <div class="service-stretchy-wrapper">
                    <a href="#">
                        <div class="service-content-wrapper">
                            <div class="service-content">
                                Konsepti- ja kampanjasuunnittelu
                                <div class="title-underline-pink"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </figure>
        
        
            <figure id="service-2" class="service-box">
                <div class="service-stretchy-wrapper">
                    <a href="#">
                        <div class="service-content-wrapper">
                            <div class="service-content">
                                <span class="service-title-desktop">Asiakkuus-<br/>markkinointi</span>
                                <div class="title-underline-pink"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </figure>
        
        
            <figure id="service-3" class="service-box">
                <div class="service-stretchy-wrapper">
                    <a href="#">
                        <div class="service-content-wrapper">
                            <div class="service-content">
                                Graafinen suunnittelu
                                <div class="title-underline-pink"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </figure>
        
        
        <!--</div>-->
        <!-- <div class="service-row"> -->
        
            <figure id="service-4" class="service-box">
               <div class="service-stretchy-wrapper">
                   <a href="#">
                       <div class="service-content-wrapper">
                            <div class="service-content">
                                Digitaaliset ratkaisut
                                <div class="title-underline-pink"></div>
                           </div>
                        </div>
                    </a>
                </div>
            </figure>
        
        
             <figure id="service-5" class="service-box">
                <div class="service-stretchy-wrapper">
                    <a href="#">
                        <div class="service-content-wrapper">
                            <div class="service-content">
                                Jakelutie
                                <div class="title-underline-pink"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </figure> 
        
        
            <figure id="service-6" class="service-box">
                <div class="service-stretchy-wrapper">
                    <a href="#">
                        <div class="service-content-wrapper">
                            <div class="service-content">
                                Kuvauspalvelut ja käännökset
                                <div class="title-underline-pink"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </figure>
        
       <!-- </div> -->
    </div>
</section>
<!-- <section id="bg-pic-1" class="bg-img-container"> -->
<!--<img class="bg-img" src="http://192.168.11.6:8081/loud_dev/wp-content/uploads/2016/08/1103-helmi_0144_bg-2400x1600.jpg" /> -->
<!-- </section> -->

<section id="our-customers" class="content-section-front">
    <div class="content-section-header">
        <div class="content-header-wrapper">
            <div id="customers-heading" class="content-section-heading">
                <h1 class="heading-orange">Referenssit.</h1>
            </div>
            <div id="customers-header-body" class="content-header-body">
                <div class="body-text-orange">
                    <p>Olemme ylpeitä saadessamme tehdä töitä asiakkaille, jotka toimivat monilla eri toimialoilla – näin saamme puhutella lukuisia kiinnostavia kohderyhmiä.</p>
                </div>
            </div>
       </div>
    </div>
    <?php do_action('smoy_get_references'); ?>
</section>

<!-- <section id="bg-pic-2" class="bg-img-container"> -->
<!--<img class="bg-img" src="http://192.168.11.6:8081/loud_dev/wp-content/uploads/2016/08/1103-helmi_0144_bg-2400x1600.jpg" /> -->
<!-- </section> -->
<section id="our-staff" class="content-section-front">
    <div class="content-section-header">
        <div class="content-header-wrapper">
            <div id="staff-heading" class="content-section-heading">
                <h1 class="heading-pink">Me.</h1>
            </div>
            <div id="staff-header-body" class="content-header-body">
                <div class="body-text-pink">
                    <p>Monipuolisuudestamme ja kokemuksestamme markkinointiviestinnän parissa on sinulle takuulla hyötyä. Sovitaanko heti starttipalaveri?</p>
                </div>
            </div>
       </div>
    </div>
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
    <div class="content-section-header">
        <div class="content-header-wrapper">
            <div id="contact-heading" class="content-section-heading">
                <h1 class="heading-orange">Ota yhteyttä.</h1>
            </div>
            <div id="contact-header-body" class="content-header-body">
                <div class="body-text-orange">
                    <p>Soita, meilaa, tule käymään tai pyydä tarjous yhteydenottolomakkeella.</p>
                    <hr class="text-divider"/>
                    <p>Sähköpostit: etunimi.sukunimi(at)smoy.com</p>
                </div>
            </div>
       </div>
    </div>
    <?php get_template_part( 'template-parts/smoy-contact-form-front'); ?>
</section>

<?php get_footer(); ?>