<?php
/**
 * Template Name: Uutiskirje
 *
 * @package smoy
 */
get_header('uutiskirje'); ?>
<div id="newsletter-page-content">
    <div id="newsletter-subscription-message-container">
        <h2 id="subscription-message-title">Kiitos!</h2>
        <div id="subscription-message-title-underline"></div>
        <p id="subscription-message-body">Sähköpostiosoitteesi on nyt rekisteröity Smoyn uutiskirjelistalle.</p>
        <p id="subscription-message-bottom">Voit myös seurata meitä sosiaalisessa mediassa</p>
        <div id="subscription-message-social-container">
        <?php do_action('smoy_get_newsletter_social_icons'); ?>
        </div>
    </div>
</div>
<?php get_footer('uutiskirje'); ?>