</div>  <!-- END OF SITE CONTENT -->
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
var windowHeight;
var newsletterSidebar;
var newsletterWidgetWrapper;
var overlayHoles = document.getElementsByClassName('overlay-hole');
var w = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;
var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
    
jQuery(function() {
    windowHeight = $window.height();
    documentHeight = $document.height();
    var currentScrollPos = $window.scrollTop();
    newsletterSidebar = jQuery('#newsletter-sidebar');
    newsletterWidgetWrapper = jQuery('.newsletter-widget-wrapper');
    checkWidth(w);
    jQuery('.wpcf7-form span.ajax-loader').replaceWith('<div class="ajax-loader">Loading...</div>');
    jQuery('#about-us-contact').click(function() {
    jQuery('html, body').animate({
            scrollTop: jQuery("#contact-wrapper").offset().top
        }, 1500);
    });
    
    
    currentScrollPos + windowHeight == documentHeight
    
    if(newsletterSidebar){
        
        var startScrollPos = $window.scrollTop();
        //console.log(startScrollPos);
        $document.scroll(function() {
          //console.log('scrolling');
          currentScrollPos = $window.scrollTop();
          if (currentScrollPos - startScrollPos >= 1200 || startScrollPos - currentScrollPos >= 2200 || currentScrollPos + $window.height() >= $document.height() - 580) {
                //console.log('scrolled');
                setTimeout(function(){jQuery(newsletterSidebar).animate({ 'right': '+=45px' }, 1200)}, 6000);
                $document.unbind('scroll');
          }
        });
        
        
       let textNode = jQuery(newsletterWidgetWrapper)[0].firstChild;
       jQuery(textNode).wrap( "<div class='newsletter-widget-desc'></div>" );
       //console.log(textNode);
        
       jQuery( '.newsletter-widget-container' ).click(function(e) {
            e.stopPropagation();
            openNewsletterBox(newsletterSidebar);
        });

        jQuery('#newsletter-box-close').click(function(e) {
            e.stopPropagation();
            closeNewsletterBox(newsletterSidebar);
        });
    }
    
        
});
    
function openNewsletterBox(newsletterSidebar) {
    if(!jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
        jQuery(newsletterSidebar).animate({ 'right': '+=328px' }, 850);
        jQuery(newsletterSidebar).addClass('newsletter-box-opened'); 
    }   
}    
    
function closeNewsletterBox(newsletterSidebar) {
    if(jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
        jQuery(newsletterSidebar[0]).removeClass('newsletter-box-opened');
        jQuery(newsletterSidebar).animate({ 'right': '-=328px' }, 850);
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
            
            let contentPaddingTop = jQuery('#service-'+i+' .service-content').css('paddingTop');
            
            if(thisServiceTitleMobile.length > 0){
                let titleHeight = jQuery(thisServiceTitle).height();
                let mobiletitleHeight = jQuery(thisServiceTitleMobile).height();
                
                if(mobiletitleHeight > 20 && mobiletitleHeight < 50) {
                    if (contentPaddingTop === '57px' || contentPaddingTop == '20px') {
                        jQuery('#service-'+i+' .service-content').css('padding', '81px 0 0');
                    }
                }else if(mobiletitleHeight > 50  && mobiletitleHeight < 100){
                    if (contentPaddingTop === '81px' || contentPaddingTop === '20px') {
                        jQuery('#service-'+i+' .service-content').css('padding', '57px 0 0');
                    }
                }
                         
            }else{
                let titleHeight = jQuery(thisServiceTitle).height();
                if(titleHeight > 20  && titleHeight < 50) {
                    if (contentPaddingTop === '57px' || contentPaddingTop === '20px') {
                        jQuery('#service-'+i+' .service-content').css('padding', '81px 0 0');
                    }
                    
                    
                }else if(titleHeight > 50  && titleHeight < 100){
                    if (contentPaddingTop === '81px' || contentPaddingTop === '20px') {
                        jQuery('#service-'+i+' .service-content').css('padding', '57px 0 0');
                    }   
                }
            }
               
        }
        
        jQuery('#services-wrapper').css('display', 'block');
        
    }else if(w > 960){
        
        
         
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
            
            if(thisServiceContent.css('paddingTop') == '81px' || thisServiceContent.css('paddingTop') == '57px'){
               thisServiceContent.css('padding', '20px 0 0 20px');
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