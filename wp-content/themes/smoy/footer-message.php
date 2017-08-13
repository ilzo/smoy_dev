</div><!-- END OF MESSAGE-PAGE-CONTENT -->
<footer id="footer" class="footer-message-page">
<div class="footer-container">
    <div id="footer-content-left">
        <?php do_action('smoy_get_footer_contact_info') ?>
    </div>
    <?php do_action('smoy_get_footer_social_icons') ?>
    <div id="footer-content-right">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo/asml-logo.png" width="102px" height="38px" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo/mtl-jasentunnus.png" width="105px" height="105px"/>
    </div>
</div>     
</footer>
</div>  <!-- END OF PAGE-WRAPPER-MESSAGE -->
<?php wp_footer(); ?>
</body>
</html>