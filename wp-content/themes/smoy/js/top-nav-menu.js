var domManager = {};

jQuery(function() {
    
    
    
    /*
    let servicesMenuItem = jQuery('#menu-item-2405');
    let palvelut_link = jQuery('#menu-item-2405 a')[0];
    let ulSubMenu = jQuery('#sub-menu')[0];
    let menuAlavalikkoContainer = jQuery('.menu-alavalikko-container')[0];
    */
    
    
    domManager = {
        isDesktop : 0,
        isMobilePortrait : 0,
        isMobileLandscape : 0,
        navRightContainer : jQuery('.nav-right-container')[0],
        servicesMenuItem : jQuery('#menu-item-2405'),
        ulSubMenu : jQuery('#sub-menu')[0],
        menuAlavalikkoContainer: jQuery('.menu-alavalikko-container')[0],
        topNavMobile : jQuery('.top-nav-mobile'),
        palvelut_link : jQuery('#menu-item-2405 a')[0],
        smoytalk_link : jQuery('#right-menu .smoytalk-link a')[0],
        english_link : jQuery('#right-menu .english-link a')[0],
        finnish_link : jQuery('#right-menu .finnish-link a')[0],
        mobileLandscapeOverlay : jQuery('#mobile-landscape-overlay')[0],
        topMenuOverlayStyleProps : {topMenuOpenDisplay : '', topMenuCloseDisplay : '', topMenuOpenOpacity : '', topMenuCloseOpacity : '', overlayHeight : ''},
        
        setFlagsDesktop: function () {
            this.isDesktop = 1;
            this.isMobilePortrait = 0;
            this.isMobileLandscape = 0;
        },
        
        setFlagsMobilePortrait: function () {
            this.isDesktop = 0;
            this.isMobilePortrait = 1;
            this.isMobileLandscape = 0;
        },
        
        setFlagsMobileLandscape: function () {
            this.isDesktop = 0;
            this.isMobilePortrait = 0;
            this.isMobileLandscape = 1;
        },
      
        setOverlayStyleProps: function () {
            this.topMenuOverlayStyleProps.topMenuOpenDisplay = document.getElementById('top-menu-open').style.display;
            this.topMenuOverlayStyleProps.topMenuCloseDisplay = document.getElementById('top-menu-overlay-close').style.display;
            this.topMenuOverlayStyleProps.topMenuOpenOpacity = document.getElementById('top-menu-open').style.opacity;
            this.topMenuOverlayStyleProps.topMenuCloseOpacity = document.getElementById('top-menu-overlay-close').style.opacity;
            this.topMenuOverlayStyleProps.overlayHeight = document.getElementById('top-menu-overlay').style.height;
        },
        
        openNav: function () {
            if(jQuery(this.navRightContainer).hasClass('visuallyhidden')){
               jQuery(this.navRightContainer).removeClass('visuallyhidden');
            }
            document.getElementById('top-menu-overlay').style.height = '100%';
            document.getElementById('top-menu-open').style.opacity = '0';
            document.getElementById('top-menu-overlay-close').style.display = 'block';
        },
        
        closeNav: function () {
            if(!jQuery(this.navRightContainer).hasClass('visuallyhidden')){
               jQuery(this.navRightContainer).addClass('visuallyhidden');
            }
            document.getElementById('top-menu-overlay').style.height = '0%';
            document.getElementById('top-menu-open').style.opacity = '100';
            document.getElementById('top-menu-overlay-close').style.display = 'none';
            
            if ( window.location.pathname === '/' ){ 
                closeSubNav(this.palvelut_link);
            }
            
        },
        
        
        
        openMobileLandscapeOverlay: function () {
            
            console.log('hello from landscape overlay open');
            /*
            if(jQuery(this.navRightContainer).hasClass('visuallyhidden')){
               jQuery(this.navRightContainer).removeClass('visuallyhidden');
            }
            */
            
            document.getElementById('mobile-landscape-overlay').style.height = '100%';
            //document.getElementById('top-menu-open').style.opacity = '0';
            document.getElementById('mobile-landscape-overlay-close').style.display = 'block';
            
        },
        
        
        closeMobileLandscapeOverlay: function () {
            
            console.log('hello from landscape overlay close');
            /*
            if(!jQuery(this.navRightContainer).hasClass('visuallyhidden')){
               jQuery(this.navRightContainer).addClass('visuallyhidden');
            }
            */
            document.getElementById('mobile-landscape-overlay').style.height = '0%';
            document.getElementById('mobile-landscape-overlay-close').style.display = 'none';
            
            closeSubNav(this.palvelut_link);
            
            
        },
        
        /*
        
        openSubNav: function () {
            if(!jQuery(this.palvelut_link).hasClass('active-link')) { 
                jQuery(this.palvelut_link).addClass('active-link');
                jQuery('.navigation-top').removeClass('nav-transparent');
                jQuery('.navigation-top').addClass('nav-black');
                setTimeout(function(){
                    jQuery('#sub-menu').addClass('second-menu-opened');
                }, 180);
            }
        },
        
        closeSubNav: function () {
            if(jQuery(this.palvelut_link).hasClass('active-link')) {
                jQuery(this.palvelut_link).removeAttr('class');
                jQuery('#sub-menu').removeClass('second-menu-opened');
                setTimeout(function(){
                    jQuery('.navigation-top').removeClass('nav-transparent');
                    jQuery('.navigation-top').addClass('nav-black');
                }, 250);
            }
        },
        */
        
        
        changeToDesktopStyles: function () {
            if(jQuery(this.navRightContainer).hasClass('visuallyhidden')){
               jQuery(this.navRightContainer).removeClass('visuallyhidden');
            }
            
            if(jQuery(this.ulSubMenu).hasClass('second-menu-landscape')){
               jQuery(this.ulSubMenu).removeClass('second-menu-landscape');
            }
            
            /*
            if(jQuery(this.palvelut_link).hasClass('active-link')) {
                closeSubnav(this.palvelut_link);
            }
            */

            if(jQuery(this.servicesMenuItem).hasClass('services-link-mobile')){
                jQuery(this.servicesMenuItem).removeClass('services-link-mobile');
            }

            if(jQuery(this.servicesMenuItem).has(this.ulSubMenu) || jQuery(this.mobileLandscapeOverlay).has(this.ulSubMenu)){
                jQuery(this.ulSubMenu).appendTo(this.menuAlavalikkoContainer);
            }

            document.getElementById('top-menu-overlay').style.height = 'auto';
            if(this.topMenuOverlayStyleProps.topMenuOpenDisplay == 'inline-block'){
               document.getElementById('top-menu-open').style.display = 'none';
            }
            if(this.topMenuOverlayStyleProps.topMenuCloseDisplay == 'block'){
               document.getElementById('top-menu-overlay-close').style.display = 'none';
            }
        },
        
        changeToMobileStylesPortrait: function () {
            console.log('portrait');
            /*
            if(jQuery(this.palvelut_link).hasClass('active-link')) {
                closeSubNav(this.palvelut_link);
            }
            */
            
            if(jQuery(this.ulSubMenu).hasClass('second-menu-landscape')){
               jQuery(this.ulSubMenu).removeClass('second-menu-landscape');
            }

            if(this.topMenuOverlayStyleProps.topMenuOpenOpacity == '0'){
               document.getElementById('top-menu-open').style.opacity = '100';
            }

            if(this.topMenuOverlayStyleProps.overlayHeight == '100%'){
               document.getElementById('top-menu-open').style.opacity = '0';
            }
            
            if(jQuery(this.mobileLandscapeOverlay ).has(this.ulSubMenu) || jQuery(this.menuAlavalikkoContainer).has(this.ulSubMenu)){
                
                if(!jQuery(this.servicesMenuItem).hasClass('services-link-mobile')){
                    jQuery(this.servicesMenuItem).addClass('services-link-mobile');
                }
                
                jQuery(this.ulSubMenu).appendTo(this.servicesMenuItem);
            }
            
            
            /*

            if(!jQuery('#menu-item-2405').hasClass('services-link-mobile')){
                jQuery('#menu-item-2405').addClass('services-link-mobile');
                jQuery(this.ulSubMenu).appendTo("#menu-item-2405");
            }
            */

            if(this.topMenuOverlayStyleProps.overlayHeight == 'auto'){
               document.getElementById("top-menu-overlay").style.height = '0%';
            }

            if(this.topMenuOverlayStyleProps.topMenuOpenDisplay == 'none' && this.topMenuOverlayStyleProps.overlayHeight == '0%'){
               document.getElementById('top-menu-open').style.display = 'inline-block';
            }
        },
        
        
        changeToMobileStylesLandscape: function () {
            console.log('landscape');
            
            
            if(jQuery(this.servicesMenuItem).has(this.ulSubMenu) || jQuery(this.menuAlavalikkoContainer).has(this.ulSubMenu)){
                
                if(!jQuery(this.servicesMenuItem).hasClass('services-link-mobile')){
                    jQuery(this.servicesMenuItem).addClass('services-link-mobile');
                }
                
                jQuery(this.ulSubMenu).appendTo(this.mobileLandscapeOverlay);
            }
            
            /*
            if(!jQuery('#menu-item-2405').hasClass('services-link-mobile')){
                //jQuery('#menu-item-2405').addClass('services-link-mobile');
                jQuery(this.ulSubMenu).appendTo(this.mobileLandscapeOverlay);
            }
            */
            
            if(jQuery(this.ulSubMenu).hasClass('second-menu-opened')){
               jQuery(this.ulSubMenu).removeClass('second-menu-opened');
            }
            
            
            if(!jQuery(this.ulSubMenu).hasClass('second-menu-landscape')){
               jQuery(this.ulSubMenu).addClass('second-menu-landscape');
            }
            
            /*
            setTimeout(function(){
                jQuery('#sub-menu').addClass('second-menu-opened');
            }, 180);
            */
            
            /*
            setTimeout(function(){
                jQuery('#sub-menu').addClass('second-menu-opened');
            }, 180);
            */
        
        }
        
        
      
    }
    
    /*
    let topMenuOpenDisplay = document.getElementById('top-menu-open').style.display;
    let topMenuCloseDisplay = document.getElementById('top-menu-overlay-close').style.display;
    let topMenuOpenOpacity = document.getElementById('top-menu-open').style.opacity;
    let topMenuCloseOpacity = document.getElementById('top-menu-overlay-close').style.opacity;
    */
    
    
    var $root = jQuery('html, body');
    var $document = jQuery(document);
    //var topNavMobile = jQuery('.top-nav-mobile');
    checkScreenWidth();
    
    
    
    //navRightContainer = jQuery('.nav-right-container')[0];
    
    
    
    
    var scroll_start = 0;
    var subHeight;
    var navSub = document.getElementsByClassName('navigation-sub');
    
    
    /*
    var smoytalkLink = jQuery('#right-menu .smoytalk-link a')[0];
    var englishLink = jQuery('#right-menu .english-link a')[0];
    var finnishLink = jQuery('#right-menu .finnish-link a')[0];
    var palvelut_link = jQuery('#menu-item-2405 a')[0];
    */
    
    
    
    
    var homepage_down_arrow = jQuery('#home-page-header-down-arrow');
    
    jQuery(homepage_down_arrow).click(function() {
        $root.animate({
            scrollTop: jQuery("#about-us").offset().top
        }, 1000);
    });
    
    if(domManager.smoytalk_link){
        jQuery(domManager.smoytalk_link).html('');
        jQuery('#right-menu .smoytalk-link').css('display', 'inline-block'); 
    }
    
    
    $document.scroll(function() {
        subHeight = navSub[0].clientHeight;
        if(subHeight === 0) {
            scroll_start = jQuery(this).scrollTop();
            if(scroll_start > 180) {
                if( window.location.pathname === '/' ){
                    jQuery('.navigation-top').addClass('nav-black').removeClass('nav-hidden');
                }else{
                    jQuery('.navigation-top').addClass('nav-black').removeClass('nav-transparent');
                }
            }else{
                if( window.location.pathname === '/' ){
                    jQuery('.navigation-top').addClass('nav-hidden').removeClass('nav-black');
                }else{
                    jQuery('.navigation-top').addClass('nav-transparent').removeClass('nav-black');
                }    
            }
       } 
    });
    
    jQuery(window).resize(checkScreenWidth);
    
    var noRedirectLinks = [];
    
    

    if(domManager.topNavMobile.length > 0){
        jQuery(noRedirectLinks[1]).parent().hide();
    }
    
    
    if(window.location.pathname !== '/eng/') {
        
        
        jQuery(domManager.palvelut_link).click(function(e) {
            e.preventDefault();
            let palvelut_link = jQuery(this);
            openSubNav(palvelut_link);
        });
        
        
        /*
        jQuery(domManager.palvelut_link).click(function(e) {
            e.preventDefault();
            //let palvelut_link = jQuery(this);
            domManager.openSubNav();
        });
        */
        
        
        if(domManager.english_link){
            jQuery(domManager.english_link).html('');
            jQuery('#right-menu .english-link').css('display', 'inline-block'); 
        }
        
    }else{
        if(domManager.finnish_link){
            jQuery(domManager.finnish_link).html('');
            jQuery('#right-menu .finnish-link').css('display', 'inline-block'); 
        }
          
    }
    
    var translatedLinkTexts;

    if ( window.location.pathname === '/' ){
        noRedirectLinks[0] = jQuery( "#top-menu a:contains('Referenssit')" )[0];
        noRedirectLinks[1] = jQuery( "#top-menu a:contains('Me')" )[0];
        noRedirectLinks[2] = jQuery( "#top-menu a:contains('Ota yhteyttä')" )[0];
    }else if (window.location.pathname === '/eng/') {
        
        let blogi_link = jQuery( "#top-menu a:contains('Blogi')" )[0];
        
        jQuery(blogi_link).parent().remove();
        
        jQuery('#right-menu .smoytalk-link').remove();
        
        translatedLinkTexts = Array(4);
        
        translatedLinkTexts[0] = 'References';
        translatedLinkTexts[1] = 'We';
        translatedLinkTexts[2] = 'Contact';
        translatedLinkTexts[3] = 'Services';
        
        noRedirectLinks[0] = jQuery( "#top-menu a:contains('Referenssit')" )[0];
        noRedirectLinks[1] = jQuery( "#top-menu a:contains('Me')" )[0]; 
        noRedirectLinks[2] = jQuery( "#top-menu a:contains('Ota yhteyttä')" )[0];
        noRedirectLinks[3] = jQuery( "#top-menu a:contains('Palvelut')" )[0];
            
    }else if (window.location.href.indexOf('blogi') > -1){
        let blogi_link = jQuery('#menu-item-2438 a')[0];
        if(blogi_link && !jQuery(blogi_link).hasClass('active-link')) { 
            jQuery(blogi_link).addClass('active-link');
        }
    }
    
    let linksArrayLength = noRedirectLinks.length;
    for(var i = 0; i < linksArrayLength; i++){
        jQuery(noRedirectLinks[i]).attr('href', 'javascript:void(0);');
    }
    
    
    if(noRedirectLinks[3]) {
        var transIndex = 0;
        jQuery(noRedirectLinks).each(function () {
            jQuery(this).text(translatedLinkTexts[transIndex]);
            transIndex++;
        });
        
       jQuery(noRedirectLinks[3]).click(function() {
            let windowWidth = window.innerWidth;
            let windowHeight = window.innerHeight;
            if(windowWidth <= 960 /*&& windowHeight >= 360*/){
                domManager.closeNav();
            }
            $root.animate({
                scrollTop: jQuery("#services").offset().top
            }, 1500);
        });
        
    }
    
    jQuery(noRedirectLinks[0]).click(function() {

        closeSubNav(domManager.palvelut_link);
        let windowWidth = window.innerWidth;
        let windowHeight = window.innerHeight;
        if(windowWidth <= 960 /*&& windowHeight >= 360*/){
            domManager.closeNav();
        }
        $root.animate({
            scrollTop: jQuery("#our-customers").offset().top
        }, 1500);
    });
    
    
    if(window.location.pathname === '/' || window.location.pathname === '/eng/') {
        if(jQuery('#our-staff').children().length === 0) {
           jQuery(noRedirectLinks[1]).parent().remove(); 
        }else{
            jQuery(noRedirectLinks[1]).click(function() {
                closeSubNav(domManager.palvelut_link);
                let windowWidth = window.innerWidth;
                let windowHeight = window.innerHeight;
                if(windowWidth <= 960 /*&& windowHeight >= 360*/){
                    domManager.closeNav();
                }
                $root.animate({
                    scrollTop: jQuery("#our-staff").offset().top
                }, 1500);
            }); 
        }
    }else{
        if(jQuery('.top-nav-mobile').length > 0) {
           jQuery( "#top-menu a:contains('Me')" ).parent().remove(); 
        }
    }

    
    jQuery(noRedirectLinks[2]).click(function() {
        closeSubNav(domManager.palvelut_link);
        let windowWidth = window.innerWidth;
        let windowHeight = window.innerHeight;
        if(windowWidth <= 960 /*&& windowHeight >= 360*/){
            domManager.closeNav();
        }
        $root.animate({
            scrollTop: jQuery("#contact-wrapper").offset().top
        }, 1500);
    });
    
    
    //jQuery('.navigation-top').addClass('nav-transparent');
    
    if( window.location.pathname !== '/' ){
        setTimeout(function(){ jQuery('.navigation-top').addClass('nav-ready') }, 600); 
    }else{
        
        if($document.scrollTop() > 180) { 
            setTimeout(function(){ 
                jQuery('.navigation-top').addClass('nav-ready');
            }, 600);
        
        }else{
            setTimeout(function(){ 
                jQuery('.navigation-top').addClass('nav-ready nav-hidden');
            }, 600); 
            
        }
         
    }
    
    
    
    
    
    
    
});


/*
function openNav() {
    if(jQuery(domManager.navRightContainer).hasClass('visuallyhidden')){
       jQuery(domManager.navRightContainer).removeClass('visuallyhidden');
    }
    document.getElementById('top-menu-overlay').style.height = '100%';
    document.getElementById('top-menu-open').style.opacity = '0';
    document.getElementById('top-menu-overlay-close').style.display = 'block';
}

function closeNav() {
    if(!jQuery(domManager.navRightContainer).hasClass('visuallyhidden')){
       jQuery(domManager.navRightContainer).addClass('visuallyhidden');
    }
    let palvelut_link = jQuery('#menu-item-2405 a')[0];
    let ulSubMenu = jQuery('#sub-menu')[0];
    document.getElementById('top-menu-overlay').style.height = '0%';
    document.getElementById('top-menu-open').style.opacity = '100';
    document.getElementById('top-menu-overlay-close').style.display = 'none';
    closeSubNav(palvelut_link);
}

function openSubNav(link) {
    if(!jQuery(link).hasClass('active-link')) { 
        jQuery(link).addClass('active-link');
        
        jQuery('.navigation-top').removeClass('nav-transparent');
        jQuery('.navigation-top').addClass('nav-black');
        
        //jQuery('.navigation-top').css('background-color', 'black');
        
        
        
        setTimeout(function(){
            jQuery('#sub-menu').addClass('second-menu-opened');
        }, 180);

        jQuery(link).unbind('click');
        jQuery(link).click(function(e) {
            e.preventDefault();
            let palvelut_link = jQuery(this);
            closeSubNav(palvelut_link);                                        
        });
    
    }
    
}

function closeSubNav(link) {
    if(jQuery(link).hasClass('active-link')) {
        jQuery(link).removeAttr('class');
        jQuery('#sub-menu').removeClass('second-menu-opened');
        setTimeout(function(){
            
            jQuery('.navigation-top').removeClass('nav-transparent');
            jQuery('.navigation-top').addClass('nav-black');
            
             //jQuery('.navigation-top').css('background-color', 'black');
            
            
        }, 250);
        
        jQuery(link).unbind('click');
        jQuery(link).click(function(e) {
            e.preventDefault();
            let palvelut_link = jQuery(this);
            openSubNav(palvelut_link);

        });
     
    }   
    
}

*/





function openSubNav(link) {
    if(!jQuery(link).hasClass('active-link')) { 
        jQuery(link).addClass('active-link');
        
        jQuery('.navigation-top').removeClass('nav-transparent');
        jQuery('.navigation-top').addClass('nav-black');
        
        
        
        if(domManager.isMobileLandscape === 1) {
            
            console.log('mobile landscape: must open landscape overlay');
            domManager.openMobileLandscapeOverlay();
            
            
        }else{
            
            setTimeout(function(){
                jQuery('#sub-menu').addClass('second-menu-opened');
            }, 180);
            
            jQuery(link).unbind('click');
            
            jQuery(link).click(function(e) {
                e.preventDefault();
                let palvelut_link = jQuery(this);
                closeSubNav(palvelut_link);                                        
            });
            
         }
         
        
        
            
            
       

        
    
    }
    
    
}

function closeSubNav(link) {
    if(jQuery(link).hasClass('active-link')) {
        jQuery(link).removeAttr('class');
        jQuery('#sub-menu').removeClass('second-menu-opened');
        setTimeout(function(){
            
            jQuery('.navigation-top').removeClass('nav-transparent');
            jQuery('.navigation-top').addClass('nav-black');
            
             //jQuery('.navigation-top').css('background-color', 'black');
            
            
        }, 250);
        
        jQuery(link).unbind('click');
        jQuery(link).click(function(e) {
            e.preventDefault();
            let palvelut_link = jQuery(this);
            openSubNav(palvelut_link);

        });
     
    }   
    
}









/*

function handleSubNavOpen(link) {
    domManager.openSubNav();
    jQuery(link).unbind('click');
    jQuery(link).click(function(e) {
        e.preventDefault();
        let palvelut_link = jQuery(this);
        handleSubNavClose(palvelut_link);                                        
    });
    
}
    
function handleSubNavClose(link) {
    domManager.closeSubNav();
    jQuery(link).unbind('click');
    jQuery(link).click(function(e) {
        e.preventDefault();
        let palvelut_link = jQuery(this);
        handleSubNavOpen(palvelut_link);
    });
     
}
*/


function checkScreenWidth(){
    let windowWidth = window.innerWidth;
    let windowHeight = window.innerHeight;
    domManager.setOverlayStyleProps();
    
    if(windowWidth > 960) {
       domManager.setFlagsDesktop();
       domManager.changeToDesktopStyles();
       
    }else{
        if(windowHeight >= 360) {
            domManager.setFlagsMobilePortrait();
            domManager.changeToMobileStylesPortrait();
        }else{
            domManager.setFlagsMobileLandscape();
            domManager.changeToMobileStylesLandscape(); 
        }
         
    }
    
    

    /*
    if(windowHeight >= 360) {
        
        if(windowWidth > 960){
            domManager.changeToDesktopStyles();
        }else{
            domManager.changeToMobileStylesPortrait(); 
        }
        
        
        
    }else{
        
        if(windowWidth > 960){
            domManager.changeToDesktopStyles();
        }else{
            domManager.changeToMobileStylesLandscape(); 
        }
        
       
    }
    */
    
}



















