<?php
/**
 * Template Name: Front Page
 *
 * @package smoy
 */

get_header(); ?>

<section id="about-us">
    <div id="about-heading">
        <h1 class="heading-orange">Moro.</h1>
    </div>
    <div class="about-container">
        <h3 class="about-section-title">Keitä me olemme?</h3>
        <div class="title-underline-orange"></div>
        <p>Luova, vaikuttava ja tuloshakuinen mainostoimisto ja asiakassuhdemarkkinoinnin edelläkävijä.</p>
        <h3 class="about-section-title">Mitä teemme?</h3>
        <div class="title-underline-orange"></div>
        <p>Suunnittelemme ja toteutamme monikanavaista markkinointiviestintää asiakkaidemme tavoitteiden saavuttamiseksi. Palveluihimme kuuluu konsepti- ja kampanjasuunnittelu, graafinen ja digitaalinen suunnittelu ja tuotanto, asiakkuusmarkkinoinnin kehittäminen, sekä kääntäminen ja kuvaukset.</p>
        <h3 class="about-section-title">Miten me teemme sen?</h3>
        <div class="title-underline-orange"></div>
        <p>Pitkään kokemukseen ja tuoreeseen näkemykseen perustuvalla tiedolla ja taidolla, sekä erittäin hyvällä palveluasenteella. Panostamme työssämme luovuuteen, laadukkaaseen designiin ja tarkkaan tuotantoon.</p>
    </div>
    <div class="contact-button-container">
        <!--<a href="#">Ota yhteyttä</a>-->
        <button class="contact-us-button">Ota yhteyttä.</button>
    </div>
</section>

<section id="services" class="content-section-front">
    <div class="content-section-header">
        <div class="content-header-wrapper">
            <div id="services-heading" class="content-section-heading">
                <h1 class="heading-pink">Palvelut.</h1>
            </div>
            <div id="services-header-body" class="content-header-body">
                <p class="body-text-pink">Luova, vaikuttava ja tuloshakuinen mainostoimisto ja asiakassuhdemarkkinoinnin edelläkävijä.</p>
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
                <h1 class="heading-orange">Referenssit</h1>
            </div>
            <div id="customers-header-body" class="content-header-body">
                <p class="body-text-orange">Luova, vaikuttava ja tuloshakuinen mainostoimisto ja asiakassuhdemarkkinoinnin edelläkävijä.</p>
            </div>
       </div>
    </div>
    <?php do_action('smoy_get_references'); ?>
    
    <!--
    
    <div id="customers-wrapper">
        <figure id="customer-1" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                    
                </div>
                </a>
        </figure>
        <figure id="customer-2" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                    
                </div>
                </a>
        </figure>
        <figure id="customer-3" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                    
                </div>
                </a>
        </figure>
        <figure id="customer-4" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                    
                </div>
                </a>
        </figure>
        <figure id="customer-5" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                    
                </div>
                </a>
        </figure>
        <figure id="customer-6" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                   
                </div>
                 </a>
        </figure>
        <figure id="customer-7" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                    
                </div>
                </a>
        </figure>
        <figure id="customer-8" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                   
                </div>
                 </a>
        </figure>
        <figure id="customer-9" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                    
                </div>
                </a>
        </figure>
        <figure id="customer-10" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                    
                </div>
                </a>
        </figure>
        <figure id="customer-11" class="customer-box">
            <a href="#">
                <div class="customer-stretchy-wrapper">
                    
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                    
                </div>
                </a>
        </figure>
        <figure id="customer-12" class="customer-box">
             <a href="#">
                <div class="customer-stretchy-wrapper">
                   
                        <div class="customer-content-wrapper">
                            <div class="customer-content">
                            </div>
                        </div>
                   
                </div>
                  </a>
        </figure>
        
    </div>
-->
</section>

<!-- <section id="bg-pic-2" class="bg-img-container"> -->
<!--<img class="bg-img" src="http://192.168.11.6:8081/loud_dev/wp-content/uploads/2016/08/1103-helmi_0144_bg-2400x1600.jpg" /> -->
<!-- </section> -->
<section id="blog" class="content-section-front">
    <h3 class="section-title">Blogi</h3>
    <div>
    <p>Tähän tulee blogiupote/-feedi</p>
    </div>
</section>
<section id="our-staff" class="content-section-front">
    <h3 class="section-title">Me</h3>
    <div>
    <p>Tähän tulee henkilöstökuvat</p>
    </div>
    
</section>
<section id="contact" class="content-section-front">
    <h3 class="section-title">Ota yhteyttä</h3>
    <div>
    <p>Tähän tulee yhteydenottolomake</p>
    </div>
</section>
<!-- <section id="bg-pic-3" class="bg-img-container"> -->
<!--<img class="bg-img" src="http://192.168.11.6:8081/loud_dev/wp-content/uploads/2016/08/1103-helmi_0144_bg-2400x1600.jpg" /> -->
<!-- </section> -->

<!-- <section id="bg-pic-4" class="bg-img-container"> -->
<!--<img class="bg-img" src="http://192.168.11.6:8081/loud_dev/wp-content/uploads/2016/08/1103-helmi_0144_bg-2400x1600.jpg" /> -->
<!-- </section> -->

<!-- <section id="bg-pic-5" class="bg-img-container"> -->
<!--<img class="bg-img" src="http://192.168.11.6:8081/loud_dev/wp-content/uploads/2016/08/1103-helmi_0144_bg-2400x1600.jpg" /> -->
<!-- </section> -->


<?php get_footer(); ?>