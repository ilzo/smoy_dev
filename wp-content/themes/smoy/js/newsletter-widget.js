var $document = jQuery(document);
var $window = jQuery(window);
var newsletterSidebar;
var newsletterFooter;
var newsletterWidgetWrapper;
/*
var newsletterBottomValues = ['47px', '36px', '51px', '83px', '120px', '20px', '35px', '20px', '38px', '102px', '149px'];
var newsLetterTransitionValues = ['295', '296', '397', '396', '343', '335', '335', '300', '292', '248', '219'];
*/
/*
var newsletterBottomValues = ['27px', '16px', '51px', '83px', '120px', '20px', '35px', '20px', '38px', '102px', '149px'];
var newsLetterTransitionValues = ['315', '315', '397', '396', '343', '335', '335', '300', '292', '248', '219'];
*/

var newsletterBottomValues = ['27px', '16px', '50px', '50px', '90px', '20px', '35px', '20px', '38px', '95px', '124px'];
var newsLetterTransitionValues = ['315', '315', '397', '396', '343', '335', '335', '315', '292', '241', '214'];

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

jQuery(window).on('load', function() {
    newsletterSidebar = jQuery('#newsletter-sidebar');
    newsletterFooter = document.getElementById('newsletter-footer');
    newsletterWidgetWrapper = jQuery('.newsletter-widget-wrapper');
    
    let w = Math.max( $window.width(), window.innerWidth);
    
    if(jQuery(newsletterSidebar).length && (w > 960)){
        var startScrollPos = $window.scrollTop();
        $document.bind('scroll.newsletterScrollHandler', function() {
            newsletter_detectScrollPos(startScrollPos);
        });
        /*
       let textNode = jQuery(newsletterWidgetWrapper)[0].firstChild;
       jQuery(textNode).wrap( '<div class="newsletter-widget-desc"></div>' );
       */
        
       jQuery( '.newsletter-widget-container' ).click(function(e) {
            e.stopPropagation();
            openNewsletterBox(newsletterSidebar);
        });

        jQuery('#newsletter-box-close').click(function(e) {
            e.stopPropagation();
            closeNewsletterBox(newsletterSidebar);
        });
           
    }
    /*
    let footerWidgetDescNode = jQuery( '#newsletter-footer .footer-newsletter-widget-wrapper' ).contents().get(0);
    jQuery(footerWidgetDescNode).wrap('<div class="footer-newsletter-widget-desc"></div>');
    */
    
    jQuery( '#newsletter-button, #newsletter-button-mobile, #footer-newsletter-box-close' ).click(function() {
      let viewportWidth = Math.max( $window.width(), window.innerWidth);
      jQuery('#newsletter-button, #newsletter-button-mobile').toggleClass( 'active-button' );
      if(this.id === 'newsletter-button' || this.id === 'newsletter-button-mobile') {
         if(!jQuery(newsletterSidebar).hasClass('newsletter-sidebar-disabled')){
             if(!jQuery(newsletterSidebar).hasClass('newsletter-box-opened')){
                jQuery(newsletterSidebar).animate({ 'right': '-=45px' }, 850);
             }else{
                jQuery(newsletterSidebar).animate({ 'right': '-=373px' }, 850);
             }
             jQuery(newsletterSidebar).addClass('newsletter-sidebar-disabled');   
         } 
      }
      toggleFooterNewsletterBox (newsletterFooter, viewportWidth);
    });
    
    var viewportWidth = Math.max( $window.width(), window.innerWidth);
    var timeOutVar;
    $window.resize(function() {
       let currentWidth = Math.max( $window.width(), window.innerWidth);
       if(currentWidth !== viewportWidth){
            viewportWidth = currentWidth;
            hideFooterNewsletterBox(newsletterFooter, viewportWidth);
           
            clearTimeout(timeOutVar);
            timeOutVar = setTimeout(function(){
                initNewsletterFooterBottomValue(newsletterFooter, viewportWidth);
                if(jQuery(newsletterFooter).is(':hidden')){
                    jQuery(newsletterFooter).show();
                }
            }, 380);  
       }
    });
    
    let footerWidgetContainer = document.getElementsByClassName('footer-newsletter-widget-container')[0];
    if(footerWidgetContainer !== undefined){
       setTimeout(function(){
            footerWidgetContainer.style.display = 'block';
        }, 450);
    }
    
    var newsletter_forms = document.querySelectorAll('.newsletter-form-container .wpcf7');
    var newsletter_form_submit_value = jQuery('.newsletter-form-container .wpcf7 input[type="submit"]').val();
    
    var l = newsletter_forms.length;
    for(var i = 0; i < l; i++) {
        //classname[i].addEventListener('click', myFunction, false);
        var newsletter_form = newsletter_forms[i].childNodes[3];
        //var newsletter_form_submit = newsletter_form.childNodes[7];
        var newsletter_form_ajaxloader = newsletter_form.childNodes[8];
        
        
        jQuery(newsletter_form_ajaxloader).empty();
        
        jQuery(newsletter_form).submit(function() {
            this.childNodes[7].disabled = true;
            this.childNodes[7].value = '';
        });

        /*
        newsletter_forms.addEventListener('wpcf7submit', function(e){
        }, false);
        */

        newsletter_forms[i].addEventListener('wpcf7invalid', function(e){
            this.childNodes[3].childNodes[7].disabled = false;
            this.childNodes[3].childNodes[7].value = newsletter_form_submit_value;
        }, false);

        newsletter_forms[i].addEventListener('wpcf7mailsent', function(e){
            var theme_path = WPURLS.theme_path;
            var email = this.childNodes[3].childNodes[5].childNodes[0].childNodes[0].value;
            jQuery.ajax({ 
                url: theme_path + '/inc/smoy-simple-crypt.php',
                data: { 'user_email' : email},
                type: 'post',
                success: function(output) {
                    let result = jQuery.parseJSON(output);
                    let encrypted = result['enc'];
                    location = '/uutiskirje/?email='+email+'&n='+encrypted;
                }
            }); 
        }, false);

        newsletter_forms[i].addEventListener('wpcf7mailfailed', function(e){
            var responseOutput = e.target.childNodes[3].childNodes[9];
            jQuery(responseOutput).one('DOMSubtreeModified', function(){
              alert(this.textContent);
            });
            this.childNodes[3].childNodes[7].disabled = false;
            this.childNodes[3].childNodes[7].value = newsletter_form_submit_value;
        }, false);
        
        
    }
    
});

function newsletter_detectScrollPos (startScrollPos) {
    let windowHeight = $window.height();
    let documentHeight = $document.height();
    let currentScrollPos = $window.scrollTop();
    let header_height = jQuery('#header-home').height();
    if ( window.location.pathname === '/' ){
        if (currentScrollPos - startScrollPos <= header_height ) {
            setTimeout(function(){jQuery(newsletterSidebar).animate({ 'right': '+=45px' }, 1200)}, 500);
            $document.unbind('scroll.newsletterScrollHandler');
        }
    }else{
        if (currentScrollPos - startScrollPos >= 1200 || startScrollPos - currentScrollPos >= 2200 || currentScrollPos + windowHeight >= documentHeight - 580) {
            setTimeout(function(){jQuery(newsletterSidebar).animate({ 'right': '+=45px' }, 1200)}, 6000);
            $document.unbind('scroll.newsletterScrollHandler');
        }
    }   
}

function toggleFooterNewsletterBox (newsletterFooter, width) {
    let transVal = getTransitionValue(width);
    if(!jQuery(newsletterFooter).hasClass('footer-newsletter-box-opened')) {
        jQuery(newsletterFooter).animate({ 'bottom': '+='+transVal+'px' }, 850);
        jQuery(newsletterFooter).addClass('footer-newsletter-box-opened'); 
    }else{
        jQuery(newsletterFooter).removeClass('footer-newsletter-box-opened');
        jQuery(newsletterFooter).animate({ 'bottom': '-='+transVal+'px' }, 850);     
    }

}

function hideFooterNewsletterBox (newsletterFooter, width) {
    let transVal = getTransitionValue(width);
    if(jQuery('#newsletter-button, #newsletter-button-mobile').hasClass('active-button')){
       jQuery('#newsletter-button, #newsletter-button-mobile').removeClass( 'active-button' );
    }
    if(jQuery(newsletterFooter).hasClass('footer-newsletter-box-opened')) {
        jQuery(newsletterFooter).removeClass('footer-newsletter-box-opened');
    }
    
    if(jQuery(newsletterFooter).is(':visible')){
       jQuery(newsletterFooter).hide();
    }
           
}

function getTransitionValue (width) {
    let transVal = '';
    if(1280 < width) {
        transVal = newsLetterTransitionValues[0];
    }else if(840 < width && width <= 1280 ) {
        transVal = newsLetterTransitionValues[1];
    }else if (511 < width && width <= 840) {
        transVal = newsLetterTransitionValues[2];
    }else if(460 < width && width <= 511) {
        transVal = newsLetterTransitionValues[3];   
    }else if(450 < width && width <= 460) {
        transVal = newsLetterTransitionValues[4];
    }else if(387 < width && width <= 450) {
        transVal = newsLetterTransitionValues[5];     
    }else if(360 < width && width <= 387) {
        transVal = newsLetterTransitionValues[6];
    }else if(300 < width && width <= 360) { 
        transVal = newsLetterTransitionValues[7];
    }else if(260 < width && width <= 300) { 
        transVal = newsLetterTransitionValues[8];
    }else if(223 < width && width <= 260) { 
        transVal = newsLetterTransitionValues[9];
    }else if(width <= 223) { 
        transVal = newsLetterTransitionValues[10];
    }
    return transVal;
}

function initNewsletterFooterBottomValue (newsletterFooter, width) { 
    let newsletterFooterBottom = newsletterFooter.style.bottom;
    if(1280 < width) {
        if(newsletterFooterBottom !== newsletterBottomValues[0]){
           newsletterFooter.style.bottom = newsletterBottomValues[0];
        }
    }else if(840 < width && width <= 1280 ) {
        if(newsletterFooterBottom !== newsletterBottomValues[1]){
           newsletterFooter.style.bottom = newsletterBottomValues[1];
        }
    }else if (511 < width && width <= 840) {
        if(newsletterFooterBottom !== newsletterBottomValues[2]){
           newsletterFooter.style.bottom = newsletterBottomValues[2];
        }
    }else if(460 < width && width <= 511) {
        if(newsletterFooterBottom !== newsletterBottomValues[3]){
           newsletterFooter.style.bottom = newsletterBottomValues[3];
        }   
    }else if(450 < width && width <= 460) {
        if(newsletterFooterBottom !== newsletterBottomValues[4]){
           newsletterFooter.style.bottom = newsletterBottomValues[4];
        }
    }else if(387 < width && width <= 450) {
        if(newsletterFooterBottom !== newsletterBottomValues[5]){
           newsletterFooter.style.bottom = newsletterBottomValues[5];
        }     
    }else if(360 < width && width <= 387) {
        if(newsletterFooterBottom !== newsletterBottomValues[6]){
           newsletterFooter.style.bottom = newsletterBottomValues[6];
        }
    }else if(300 < width && width <= 360) { 
        if(newsletterFooterBottom !== newsletterBottomValues[7]){
           newsletterFooter.style.bottom = newsletterBottomValues[7];
        }
    }else if(260 < width && width <= 300) { 
        if(newsletterFooterBottom !== newsletterBottomValues[8]){
           newsletterFooter.style.bottom = newsletterBottomValues[8];
        }
    }else if(223 < width && width <= 260) { 
        if(newsletterFooterBottom !== newsletterBottomValues[9]){
           newsletterFooter.style.bottom = newsletterBottomValues[9];
        }
    }else if(width <= 223) { 
        if(newsletterFooterBottom !== newsletterBottomValues[10]){
           newsletterFooter.style.bottom = newsletterBottomValues[10];
        }
    }
}