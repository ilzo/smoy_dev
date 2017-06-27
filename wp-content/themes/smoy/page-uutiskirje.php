<?php
/**
 * Template Name: Uutiskirje
 *
 * @package smoy
 */
get_header('message'); ?>
    <div id="smoy-message-container" class="newsletter-subscription-message-container">
        <h2 id="subscription-message-title">Kiitos!</h2>
        <div id="message-title-underline"></div>
        <p id="subscription-message-body">Sähköpostiosoitteesi on nyt rekisteröity Smoyn uutiskirjelistalle.</p>
        <p id="subscription-message-bottom">Voit myös seurata meitä sosiaalisessa mediassa</p>
        <div id="message-page-social-container">
        <?php do_action('smoy_get_message_page_social_icons'); ?>
        </div>
    </div>
<?php get_footer('message'); ?>