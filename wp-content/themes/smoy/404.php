<?php
/**
 * Template Name: 404
 *
 * @package smoy
 */
get_header('message'); ?>
    <div id="smoy-message-container" class="error-message-container">
        <h2 id="error-message-title">Hups!</h2>
        <div id="message-title-underline" class="error-page-title-underline"></div>
        <p id="error-message-body">Hakemaasi sivua ei löytynyt. Palaa etusivulle <a href="<?php echo esc_url( home_url( '/' ) ); ?>">tästä</a>.</p>
        <p id="error-message-bottom">Voit myös seurata meitä sosiaalisessa mediassa</p>
        <div id="message-page-social-container" class="error-message-social-container">
        <?php do_action('smoy_get_message_page_social_icons'); ?>
        </div>
    </div>
<?php get_footer('message'); ?>