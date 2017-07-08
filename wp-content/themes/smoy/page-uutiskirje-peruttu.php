<?php
/**
 * Template Name: Uutiskirje
 *
 * @package smoy
 */
get_header('message'); ?>
    <div id="smoy-message-container" class="newsletter-subscription-message-container">
        
        <h2 id="unsubscription-message-title">Tilaus peruttu</h2>
        <div id="message-title-underline"></div>
        <p id="unsubscription-message-body">Uutiskirjeen tilauksen peruuttaminen onnistui.</p>
        <p id="unsubscription-message-body">Harmi kun lähdit!</p>
        <p id="unsubscription-message-bottom">Voit kuitenkin seurata meitä myös sosiaalisessa mediassa</p>
        <div id="message-page-social-container">
        <?php do_action('smoy_get_message_page_social_icons'); ?>
        </div>
    </div>
<?php get_footer('message'); ?>