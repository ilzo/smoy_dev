</div>  <!-- END OF SITE CONTENT -->
<?php if(!smoy_is_mobile()): ?>
    <?php get_sidebar('social'); ?>
<?php endif; ?> 
<?php if(is_home()): ?>
<footer id="footer">
<?php else: ?>
<footer id="footer" class="footer-eng-page">    
<?php endif; ?>
<div class="footer-container">
    <div id="footer-content-left">
        <?php if(is_home()): ?>
        <div id="footer-mobile-button-container">
            <button id="newsletter-button-mobile" class="newsletter-subscribe-button hover">Tilaa uutiskirje</button>
        </div>
        <?php endif; ?>
        <?php do_action('smoy_get_footer_contact_info') ?>
    </div>
        <?php if(is_home()): ?>
        <div id="footer-content-left-second">
            <button id="newsletter-button" class="newsletter-subscribe-button">Tilaa uutiskirje</button>
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo/gold-AAA-logo-2017-fi.png" width="196px" height="109px" />
        </div>
        <?php else: ?>
        <div id="footer-content-left-second" style="margin-top: 7px;">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo/gold-AAA-logo-2017-eng.png" width="196px" height="109px" />
        </div>
        <?php endif; ?>
        <?php do_action('smoy_get_footer_social_icons') ?>
    <div id="footer-content-right">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo/asml-logo.png" width="102px" height="38px" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo/mtl-jasentunnus.png" width="105px" height="105px"/>
    </div>
</div> 
</footer>
</div>  <!-- END OF PAGE WRAPPER -->
<?php wp_footer(); ?>
<script type="text/javascript">
jQuery(function() {
    var socialWidgetSidebar;
    var newsletterSidebar;
    var serviceClass = '';
    var overlayHoles = document.getElementsByClassName('overlay-hole');
    var w = window.innerWidth
    || document.documentElement.clientWidth
    || document.body.clientWidth;
    var $document = jQuery(document);
    var $root = jQuery('html, body');
    var $window = jQuery(window);
    if(window.location.pathname === '/eng') { 
        serviceClass = 'service-box-eng';
    }else if(window.location.pathname === '/') {
        serviceClass = 'service-box';     
    }
    
    checkWidth(w);
    jQuery('.wpcf7-form span.ajax-loader').replaceWith('<div class="ajax-loader">Loading...</div>');
    jQuery('#about-us-contact').click(function() {
    jQuery('html, body').animate({
            scrollTop: jQuery("#contact-wrapper").offset().top
        }, 1500);
    });
    
    socialWidgetSidebar = jQuery('#social-sidebar');
    newsletterSidebar = jQuery('#newsletter-sidebar');
    
    if(jQuery(socialWidgetSidebar).length){
        $document.bind('scroll', function() {
            social_sidebar_detectScrollPos();
        });
    }
    
    var timerInit;
    window.onresize = function(){
        clearTimeout(timerInit);
        timerInit = setTimeout(delayedReplace, 600);
        w = window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;
        
        checkWidth(w);
    }
    
    var down_arrow_wrapper = jQuery('#header-down-arrow-wrapper');
    if(jQuery(down_arrow_wrapper).length > 0) {
        jQuery(down_arrow_wrapper).click(function() {
            $root.animate({
                scrollTop: jQuery("#about-us").offset().top
            }, 1000);
        });
    }
    
   function social_sidebar_detectScrollPos() {
        var currentScrollPos = $window.scrollTop();
        var windowHeight = $window.height();
        var documentHeight = $document.height();
        if (currentScrollPos + windowHeight >= documentHeight - 380 || currentScrollPos < 300) {
            if (!socialWidgetSidebar.hasClass('hidden')) {
                socialWidgetSidebar.addClass('visuallyhidden');
                socialWidgetSidebar.one('transitionend', function(e) {
                  socialWidgetSidebar.addClass('hidden');
                });
              }
        }else{
            if (socialWidgetSidebar.hasClass('hidden')) {
                socialWidgetSidebar.removeClass('hidden');
                setTimeout(function () {
                  socialWidgetSidebar.removeClass('visuallyhidden');
                }, 20);

            }
        }   
    }

    function delayedReplace(){
        jQuery('.wpcf7-form div.ajax-loader').replaceWith('<div class="ajax-loader">Loading...</div>');
    }

    function checkWidth(w) {
        var thisTranslateValues;
        var thisLeftTranslateValue;
        var thisTopTranslateValue;
        var mustChangeIntParse = 0;
        if(w > 1680) {
            if(jQuery('.about-mask').hasClass('middle')){ 
                jQuery('.about-mask').addClass('right').removeClass('middle');
                changeOverlayHoleLeftTrans (250);
            }else if(jQuery('.about-mask').hasClass('left')){
                jQuery('.about-mask').addClass('right').removeClass('left');
                changeOverlayHoleLeftTrans (500);
            }

        }else if(w > 1400 && w <= 1680){
            if(jQuery('.about-mask').hasClass('right')){ 
                jQuery('.about-mask').addClass('middle').removeClass('right');
                changeOverlayHoleLeftTrans (-250);
            }else if(jQuery('.about-mask').hasClass('left')){
                jQuery('.about-mask').addClass('middle').removeClass('left');
                changeOverlayHoleLeftTrans (250);
            }

        }else if(w <= 1400){
            if(jQuery('.about-mask').hasClass('middle')){ 
                jQuery('.about-mask').addClass('left').removeClass('middle');
                changeOverlayHoleLeftTrans (-250);
            }else if(jQuery('.about-mask').hasClass('right')){
                jQuery('.about-mask').addClass('left').removeClass('right');
                changeOverlayHoleLeftTrans (-500);
            }
        }

        if(w <= 960) {
            if(newsletterSidebar) {
                if(jQuery(newsletterSidebar).is(':visible')) {  
                  jQuery(newsletterSidebar).hide();
                }
            }

            for(var i = 1; i < 7; i++) {
                var thisService = jQuery('#service-'+i);
                var thisServiceTitle = jQuery('#service-'+i+' .service-title');
                var thisServiceTitleMobile = jQuery('#service-'+i+' .service-title-mobile');
                if(thisService.hasClass(serviceClass)){
                    thisService.removeClass(serviceClass);
                }
                thisService.addClass('service-box-mobile');

                if(thisServiceTitleMobile.length > 0) {
                    thisServiceTitle.css('display', 'none');
                    thisServiceTitleMobile.css('display', 'block');
                }     
            }
            jQuery('#services-wrapper').css('display', 'block');

        }else if(w > 960){
            if(newsletterSidebar) {
               if(!jQuery(newsletterSidebar).is(':visible')) { 
                  jQuery(newsletterSidebar).show();
                }
            }

            for(var i = 1; i < 7; i++) {
                var thisService = jQuery('#service-'+i);
                var thisServiceTitle = jQuery('#service-'+i+' .service-title');
                var thisServiceTitleMobile = jQuery('#service-'+i+' .service-title-mobile');
                var thisServiceContent = jQuery('#service-'+i+' .service-content');
                if(thisService.hasClass('service-box-mobile')){
                    thisService.removeClass('service-box-mobile');
                }
                thisService.addClass(serviceClass);
                if(jQuery('#service-'+i+' .service-title-mobile').length > 0) {
                    jQuery('#service-'+i+' .service-title-mobile').css('display', 'none');
                    jQuery('#service-'+i+' .service-title').css('display', 'block');
                }
            } 
            jQuery('#services-wrapper').css('display', 'block');
        }
    }

    function changeOverlayHoleLeftTrans(amount) {
        for(var i = 0; i < overlayHoles.length; i++){
            thisTranslateValues = overlayHoles[i].getAttribute('transform').replace(/[^\/\d]/g,'');
            if(thisTranslateValues.length > 6){
                thisLeftTranslateValue = parseInt(thisTranslateValues.substring(0, 4));
                thisTopTranslateValue = thisTranslateValues.substring(4, 7);
            }else{
                thisLeftTranslateValue = parseInt(thisTranslateValues.substring(0, 3));
                thisTopTranslateValue = thisTranslateValues.substring(3, 6);
            }

            thisLeftTranslateValue += amount;
            thisLeftTranslateValue = String(thisLeftTranslateValue);
            overlayHoles[i].setAttribute('transform', 'translate('+thisLeftTranslateValue+','+thisTopTranslateValue+')');        
        }
    } 
      
});
</script>
</body>
</html>    