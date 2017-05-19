</div>  <!-- END OF SITE CONTENT -->
<?php get_sidebar('social'); ?>
<footer id="footer">  
<div class="footer-container">
    <div id="footer-content-left">
        <div id="footer-mobile-button-container">
            <button id="newsletter-button-mobile" class="newsletter-subscribe-button">Tilaa uutiskirje</button>
        </div>
        <?php do_action('smoy_get_footer_contact_info') ?>
    </div>
    <div id="footer-content-center">
        <?php do_action('smoy_get_footer_social_icons') ?>
        <div id="footer-button-container">
            <button id="newsletter-button" class="newsletter-subscribe-button">Tilaa uutiskirje</button>
        </div>
    </div>
    <div id="footer-content-right">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo/asml-logo.png" width="102px" height="38px" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo/mtl-jasentunnus.png" width="105px" height="105px"/>
    </div>
</div> 
</footer>
</div>  <!-- END OF PAGE WRAPPER -->
<?php wp_footer(); ?>
<script type="text/javascript">
var $document = jQuery(document);
var $window = jQuery(window);    
var socialWidgetSidebar;
var newsletterSidebar;
var overlayHoles = document.getElementsByClassName('overlay-hole');
var w = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;
var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
    
jQuery(function() {
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
        var startScrollPos = $window.scrollTop();
        $document.bind('scroll', function() {
            social_sidebar_detectScrollPos();
        });
    }     
});
    
function social_sidebar_detectScrollPos () {
    let currentScrollPos = $window.scrollTop();
    let windowHeight = $window.height();
    let documentHeight = $document.height();
    if (currentScrollPos + windowHeight >= documentHeight - 380) {
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

var timerInit;
window.onresize = function(){
    clearTimeout(timerInit);
    timerInit = setTimeout(delayedReplace, 600);
    
    w = window.innerWidth
    || document.documentElement.clientWidth
    || document.body.clientWidth;
    
    h = window.innerHeight
    || document.documentElement.clientHeight
    || document.body.clientHeight;
    
    checkWidth(w);
     
}

function checkWidth(w) {
    let thisTranslateValues;
    let thisLeftTranslateValue;
    let thisTopTranslateValue;
    let mustChangeIntParse = 0;
    
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
        
        for(let i = 1; i < 7; i++) {
            let thisService = jQuery('#service-'+i);
            let thisServiceTitle = jQuery('#service-'+i+' .service-title');
            let thisServiceTitleMobile = jQuery('#service-'+i+' .service-title-mobile');
            if(thisService.hasClass('service-box')){
                thisService.removeClass('service-box');
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
        
        for(let i = 1; i < 7; i++) {
            let thisService = jQuery('#service-'+i);
            let thisServiceTitle = jQuery('#service-'+i+' .service-title');
            let thisServiceTitleMobile = jQuery('#service-'+i+' .service-title-mobile');
            let thisServiceContent = jQuery('#service-'+i+' .service-content');
            if(thisService.hasClass('service-box-mobile')){
                thisService.removeClass('service-box-mobile');
            }
            thisService.addClass('service-box');
            
            if(jQuery('#service-'+i+' .service-title-mobile').length > 0) {
                jQuery('#service-'+i+' .service-title-mobile').css('display', 'none');
                jQuery('#service-'+i+' .service-title').css('display', 'block');
            }
            
        }
        
        jQuery('#services-wrapper').css('display', 'block');
    }
    
}
    
function changeOverlayHoleLeftTrans (amount) {
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
</script>
</body>
</html>    