var $document = jQuery(document);
var $window = jQuery(window);
var windowHeight;
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
    windowHeight = $window.height();
    documentHeight = $document.height();
    var currentScrollPos = $window.scrollTop();
    newsletterSidebar = jQuery('#newsletter-sidebar');
    newsletterWidgetWrapper = jQuery('.newsletter-widget-wrapper');
    
    if(!jQuery(newsletterSidebar).length){ 
      console.log('ei ole sidebaria');
    }
    
    
    if(jQuery(newsletterSidebar).length){
        
        var startScrollPos = $window.scrollTop();
        
        
        $document.bind('scroll.newsletterScrollHandler', function() {
            detectScrollPos(startScrollPos);
        });
        
        /*
        $document.scroll(function() {
            detectScrollPos(startScrollPos);                        
        });
        */
        
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


function detectScrollPos (startScrollPos) {
    let currentScrollPos = $window.scrollTop();
    console.log(currentScrollPos);
    if (currentScrollPos - startScrollPos >= 1200 || startScrollPos - currentScrollPos >= 2200 || currentScrollPos + $window.height() >= $document.height() - 580) {
        console.log('scrolled');
        setTimeout(function(){jQuery(newsletterSidebar).animate({ 'right': '+=45px' }, 1200)}, 6000);
        $document.unbind('scroll.newsletterScrollHandler');
    }
    
}