jQuery(window).on('load', function() {
    var $document = jQuery(document);
    var $window = jQuery(window);
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
    var newsletterSidebar = jQuery('#newsletter-sidebar');
    //var newsletterSidebar = document.getElementById('newsletter-sidebar');
    
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
           
    }
    /*
    var footerWidgetDescNode = jQuery( '#newsletter-footer .footer-newsletter-widget-wrapper' ).contents().get(0);
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
    
    var viewportWidth = Math.max($window.width(), window.innerWidth);
    var timeOutVar;
    $window.resize(function() {
       var currentWidth = Math.max($window.width(), window.innerWidth);
       if(currentWidth !== viewportWidth){
            viewportWidth = currentWidth;
            initNewsletterSidebar();
            hideFooterNewsletterBox(newsletterFooter);
            clearTimeout(timeOutVar);
            timeOutVar = setTimeout(function(){
                showNewsletterBox();
                initNewsletterFooterBottomValue(newsletterFooter, viewportWidth);
                if(jQuery(newsletterFooter).is(':hidden')){
                    jQuery(newsletterFooter).show();
                }
                //newsletter_detectScrollPos (startScrollPos);
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
    
    showNewsletterBox();
    
    function openNewsletterBox() {
        if(!jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
            jQuery(newsletterSidebar).animate({ 'right': '+=328px' }, 850);
            jQuery(newsletterSidebar).addClass('newsletter-box-opened'); 
        }   
    }    

    function closeNewsletterBox() {
        if(jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
            jQuery(newsletterSidebar[0]).removeClass('newsletter-box-opened');
            jQuery(newsletterSidebar).animate({ 'right': '-=328px' }, 850);
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
            //jQuery(newsletterSidebar[0]).addClass('hidden');
            if(jQuery(newsletterSidebar).hasClass('newsletter-box-opened')) {
                jQuery(newsletterSidebar[0]).removeClass('newsletter-box-opened');
                jQuery(newsletterSidebar).animate({ 'right': '-=373px' }, 0);
            }else{
                jQuery(newsletterSidebar).animate({ 'right': '-=45px' }, 0);
            }
            jQuery(newsletterSidebar[0]).addClass('hidden hiding');
            //startScrollPos = $window.scrollTop();
            $document.bind('scroll.newsletterScrollHandler', function() {
                newsletter_detectScrollPos(startScrollPos);
            });
        }
    }

    function toggleFooterNewsletterBox (newsletterFooter, width) {
        var transVal = getTransitionValue(width);
        if(!jQuery(newsletterFooter).hasClass('footer-newsletter-box-opened')) {
            jQuery(newsletterFooter).animate({ 'bottom': '+='+transVal+'px' }, 850);
            jQuery(newsletterFooter).addClass('footer-newsletter-box-opened'); 
        }else{
            jQuery(newsletterFooter).removeClass('footer-newsletter-box-opened');
            jQuery(newsletterFooter).animate({ 'bottom': '-='+transVal+'px' }, 850);     
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

    function getTransitionValue (width) {
        var transVal = '';
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
        var newsletterFooterBottom = newsletterFooter.style.bottom;
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
});