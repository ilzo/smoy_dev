var $document = jQuery(document);
var $window = jQuery(window);
var newsletterSidebar;
var newsletterWidgetWrapper;

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

jQuery(function() { 
    newsletterSidebar = jQuery('#newsletter-sidebar');
    newsletterWidgetWrapper = jQuery('.newsletter-widget-wrapper');
    if(jQuery(newsletterSidebar).length){
        
        var startScrollPos = $window.scrollTop();
        $document.bind('scroll.newsletterScrollHandler', function() {
            newsletter_detectScrollPos(startScrollPos);
        });
        
       let textNode = jQuery(newsletterWidgetWrapper)[0].firstChild;
       jQuery(textNode).wrap( '<div class="newsletter-widget-desc"></div>' );
       jQuery( '.newsletter-widget-container' ).click(function(e) {
            e.stopPropagation();
            openNewsletterBox(newsletterSidebar);
        });

        jQuery('#newsletter-box-close').click(function(e) {
            e.stopPropagation();
            closeNewsletterBox(newsletterSidebar);
        });
    }
    
    let footerWidgetDescNode = jQuery( '#newsletter-footer .footer-newsletter-widget-wrapper' ).contents().get(0);
    jQuery(footerWidgetDescNode).wrap('<div class="footer-newsletter-widget-desc"></div>');
    
    jQuery( '#footer #newsletter-button' ).click(function() {
      jQuery( this ).toggleClass( 'active-button' );
    });
    


});

function newsletter_detectScrollPos (startScrollPos) {
    let windowHeight = $window.height();
    let documentHeight = $document.height();
    let currentScrollPos = $window.scrollTop();
    if (currentScrollPos - startScrollPos >= 1200 || startScrollPos - currentScrollPos >= 2200 || currentScrollPos + windowHeight >= documentHeight - 580) {
        setTimeout(function(){jQuery(newsletterSidebar).animate({ 'right': '+=45px' }, 1200)}, 6000);
        $document.unbind('scroll.newsletterScrollHandler');
    }
    
}