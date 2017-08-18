jQuery(window).on('load', function() {
    var $document = jQuery(document);
    var $window = jQuery(window);
    var newsletterSidebar = jQuery('#newsletter-sidebar');
    //var newsletterSidebar = document.getElementById('newsletter-sidebar');
    var footer = document.getElementById('footer');
    var footerHeight = window.getComputedStyle(footer).getPropertyValue('height');
    var newsletterFooter = document.getElementById('newsletter-footer');
    var newsletterWidgetWrapper = jQuery('.newsletter-widget-wrapper');
    var w = Math.max( $window.width(), window.innerWidth);
    if(jQuery(newsletterSidebar).length && (w > 960)){
        var startScrollPos = $window.scrollTop();
        
        if ( window.location.pathname === '/' ){
            newsletter_detectScrollPos(startScrollPos);
        }
        
        $document.bind('scroll.newsletterScrollHandler', function() {
            newsletter_detectScrollPos(startScrollPos);
        });                               
        
        /*
       var textNode = jQuery(newsletterWidgetWrapper)[0].firstChild;
       jQuery(textNode).wrap( '<div class="newsletter-widget-desc"></div>' );
       */
        
       jQuery( '.newsletter-widget-container' ).click(function(e) {
            e.stopPropagation();
            openNewsletterBox();
        });

        jQuery('#newsletter-box-close').click(function(e) {
            e.stopPropagation();
            closeNewsletterBox();
        });
        
        if(!jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
            jQuery(newsletterSidebar[0]).addClass('newsletter-box-hover');
        }
           
    }
    /*
    var footerWidgetDescNode = jQuery( '#newsletter-footer .footer-newsletter-widget-wrapper' ).contents().get(0);
    jQuery(footerWidgetDescNode).wrap('<div class="footer-newsletter-widget-desc"></div>');
    */
    
    jQuery( '#newsletter-button, #newsletter-button-mobile, #footer-newsletter-box-close' ).click(function() {
      var viewportWidth = Math.max( $window.width(), window.innerWidth);
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
    
    var viewportWidth = Math.max($window.width(), window.innerWidth);
    var timeOutVar;
    $window.resize(function() {
       footerHeight = window.getComputedStyle(footer).getPropertyValue('height');
       var currentWidth = Math.max($window.width(), window.innerWidth);
       if(currentWidth !== viewportWidth){
            viewportWidth = currentWidth;
            initNewsletterSidebar();
            hideFooterNewsletterBox(newsletterFooter);
            clearTimeout(timeOutVar);
            timeOutVar = setTimeout(function(){
                showNewsletterBox();
                initNewsletterFooter(viewportWidth);
                if(jQuery(newsletterFooter).is(':hidden')){
                    jQuery(newsletterFooter).show();
                }
            }, 380);  
       }
    });
    
    var footerWidgetContainer = document.getElementsByClassName('footer-newsletter-widget-container')[0];
    if(footerWidgetContainer !== undefined){
       setTimeout(function(){
            footerWidgetContainer.style.display = 'block';
        }, 450);
    }
    
    var newsletter_forms = document.querySelectorAll('.newsletter-form-container .wpcf7');
    var newsletter_form_submit_value = jQuery('.newsletter-form-container .wpcf7 input[type="submit"]').val();
    
    var l = newsletter_forms.length;
    for(var i = 0; i < l; i++) {
        var newsletter_form = newsletter_forms[i].childNodes[3];
        var newsletter_form_ajaxloader = newsletter_form.childNodes[8];
        jQuery(newsletter_form_ajaxloader).empty();
        jQuery(newsletter_form).submit(function() {
            this.childNodes[7].disabled = true;
            this.childNodes[7].value = '';
        });

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
                    var result = jQuery.parseJSON(output);
                    var encrypted = result['enc'];
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
    
    initNewsletterFooter(viewportWidth);
    showNewsletterBox();
    
    function openNewsletterBox() {
        if(!jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
            jQuery(newsletterSidebar).removeClass('newsletter-box-hover');
            jQuery(newsletterSidebar).animate({ 'right': '+=328px' }, 850);
            jQuery(newsletterSidebar).addClass('newsletter-box-opened'); 
        }   
    }    

    function closeNewsletterBox() {
        if(jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
            jQuery(newsletterSidebar[0]).removeClass('newsletter-box-opened');
            jQuery(newsletterSidebar).animate({ 'right': '-=328px' }, 850, function() {
               jQuery(newsletterSidebar[0]).addClass('newsletter-box-hover');
            });
        }  
    }
    
    function newsletter_detectScrollPos (startScrollPos) {
        var windowHeight = $window.height();
        var documentHeight = $document.height();
        var currentScrollPos = $window.scrollTop();
        var header_height = jQuery('#header-home').height();
        if(jQuery(newsletterSidebar).hasClass('hiding')) {
            if ( window.location.pathname === '/' ){
                if (currentScrollPos + startScrollPos >= header_height ) {
                    setTimeout(function(){jQuery(newsletterSidebar).animate({ 'right': '+=45px' }, 1200)}, 500);
                    $document.unbind('scroll.newsletterScrollHandler');
                    jQuery(newsletterSidebar).removeClass('hiding');
                }
            }else{
                if (currentScrollPos - startScrollPos >= 1200 || startScrollPos - currentScrollPos >= 2200 || currentScrollPos + windowHeight >= documentHeight - 580) {
                    setTimeout(function(){jQuery(newsletterSidebar).animate({ 'right': '+=45px' }, 1200)}, 6000);
                    $document.unbind('scroll.newsletterScrollHandler');
                    jQuery(newsletterSidebar).removeClass('hiding');
                }
            }
        }  
    }
    
    function showNewsletterBox () {
        if(jQuery(newsletterSidebar[0]).hasClass('hidden')) {
            jQuery(newsletterSidebar[0]).removeClass('hidden'); 
        }   
    }
    
    function initNewsletterSidebar () {
        if(!jQuery(newsletterSidebar[0]).hasClass('hidden') && !jQuery(newsletterSidebar[0]).hasClass('hiding')) {
            if(jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
                jQuery(newsletterSidebar[0]).removeClass('newsletter-box-opened');
                jQuery(newsletterSidebar).animate({ 'right': '-=373px' }, 0);
            }else{
                jQuery(newsletterSidebar).animate({ 'right': '-=45px' }, 0);
            }
            jQuery(newsletterSidebar[0]).addClass('hidden hiding');
            $document.bind('scroll.newsletterScrollHandler', function() {
                newsletter_detectScrollPos(startScrollPos);
            });
        }
    }

    function toggleFooterNewsletterBox (newsletterFooter) {
        var transVal = footerHeight;
        if(!jQuery(newsletterFooter).hasClass('footer-newsletter-box-opened')) {
            jQuery(newsletterFooter).animate({ 'bottom': '+='+transVal}, 850);
            jQuery(newsletterFooter).addClass('footer-newsletter-box-opened'); 
        }else{
            jQuery(newsletterFooter).removeClass('footer-newsletter-box-opened');
            jQuery(newsletterFooter).animate({ 'bottom': '-='+transVal}, 850);     
        }
    }
    
    function hideFooterNewsletterBox (newsletterFooter) {
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
    
    function initNewsletterFooter(width) {
       
        var footerHeightInt = parseInt(footerHeight, 10);
    
        //var newsletterFooterBottom = footerHeightInt;
        newsletterFooter.style.bottom = 0;
        
        if(840 <= width) {
            newsletterFooter.style.height = footerHeightInt + 'px';
        }else if(460 <= width && width < 840) {
            newsletterFooter.style.height = (footerHeightInt * 0.85) + 'px';
        }else if(450 <= width && width < 460) {
            newsletterFooter.style.height = (footerHeightInt * 0.75) + 'px';
        }else if(300 <= width && width < 450){
            newsletterFooter.style.height = (footerHeightInt * 0.93) + 'px';
        }else if(width < 300) { 
            newsletterFooter.style.height = (footerHeightInt * 0.77) + 'px';
        }
      
    }
    
    
    /*
    function addSidebarHoverClass() {
        if(!jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
            jQuery(newsletterSidebar[0]).addClass('newsletter-box-hover');
        }
    }
    
    
    function removeSidebarHoverClass() {
        if(jQuery(newsletterSidebar).hasClass('newsletter-box-opened newsletter-box-hover')) {
            jQuery(newsletterSidebar[0]).removeClass('newsletter-box-hover');
        }
    }
    */
    

});