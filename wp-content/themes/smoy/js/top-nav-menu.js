var navRightContainer;

function openNav() {
    if(jQuery(navRightContainer).hasClass('visuallyhidden')){
       jQuery(navRightContainer).removeClass('visuallyhidden');
    }
    document.getElementById('top-menu-overlay').style.height = '100%';
    document.getElementById('top-menu-open').style.opacity = '0';
    document.getElementById('top-menu-overlay-close').style.display = 'block';
}

function closeNav() {
    if(!jQuery(navRightContainer).hasClass('visuallyhidden')){
       jQuery(navRightContainer).addClass('visuallyhidden');
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
        jQuery('.navigation-top').css('background-color', 'black');
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
             jQuery('.navigation-top').css('background-color', 'black');
        }, 250);
        
        jQuery(link).unbind('click');
        jQuery(link).click(function(e) {
            e.preventDefault();
            let palvelut_link = jQuery(this);
            openSubNav(palvelut_link);

        });
     
    }   
    
}
    
jQuery(function() {
    let $root = jQuery('html, body');
    let $document = jQuery(document);
    var topNavMobile = jQuery('.top-nav-mobile');
    checkScreenWidth();
    navRightContainer = jQuery('.nav-right-container')[0];
    var scroll_start = 0;
    var subHeight;
    var navSub = document.getElementsByClassName('navigation-sub');
    var smoytalkLink = jQuery('#right-menu .smoytalk-link a');
    var englishLink = jQuery('#right-menu .english-link a');
    var palvelut_link = jQuery('#menu-item-2405 a')[0];
    
    if(smoytalkLink[0]){
        jQuery(smoytalkLink[0]).html('');
        jQuery('#right-menu .smoytalk-link').css('display', 'inline-block'); 
    }
    
    if(englishLink[0]){
        jQuery(englishLink[0]).html('');
        jQuery('#right-menu .english-link').css('display', 'inline-block'); 
    }
    
    $document.scroll(function() {
        subHeight = navSub[0].clientHeight;
        if(subHeight === 0) {
            scroll_start = jQuery(this).scrollTop();
            if(scroll_start > 180) {
                jQuery('.navigation-top').css('background-color', 'black');
            } else {
                jQuery('.navigation-top').css('background-color', 'transparent');
            }
       } 
    });
    
    jQuery(palvelut_link).click(function(e) {
        e.preventDefault();
        let palvelut_link = jQuery(this);
        openSubNav(palvelut_link);
    });
    
    jQuery(window).resize(checkScreenWidth);
    
    var noRedirectLinks = [];
    
    noRedirectLinks[0] = jQuery( "#top-menu a:contains('Referenssit')" )[0];
    noRedirectLinks[1] = jQuery( "#top-menu a:contains('Me')" )[0];
    noRedirectLinks[2] = jQuery( "#top-menu a:contains('Ota yhteyttä')" )[0];

    if(topNavMobile.length > 0){
        jQuery(noRedirectLinks[1]).parent().hide();
    }
    
    
    if ( window.location.pathname == '/' ){
        let linksArrayLength = noRedirectLinks.length;
        for(var i = 0; i < linksArrayLength; i++){
            jQuery(noRedirectLinks[i]).attr('href', 'javascript:void(0);');
        }
    }
    
    jQuery(noRedirectLinks[0]).click(function() {
        closeSubNav(palvelut_link);
        let windowWidth = window.innerWidth;
        if(windowWidth <= 960){
            closeNav();
        }
        $root.animate({
            scrollTop: jQuery("#our-customers").offset().top
        }, 1500);
    });
    
    jQuery(noRedirectLinks[1]).click(function() {
        closeSubNav(palvelut_link);
        let windowWidth = window.innerWidth;
        if(windowWidth <= 960){
            closeNav();
        }
        $root.animate({
            scrollTop: jQuery("#our-staff").offset().top
        }, 1500);
    });
    
    jQuery(noRedirectLinks[2]).click(function() {
        closeSubNav(palvelut_link);
        let windowWidth = window.innerWidth;
        if(windowWidth <= 960){
            closeNav();
        }
        $root.animate({
            scrollTop: jQuery("#contact-wrapper").offset().top
        }, 1500);
    });
    
});

function checkScreenWidth(){
    let windowWidth = window.innerWidth;
    let servicesMenuItem = jQuery('#menu-item-2405');
    let palvelut_link = jQuery('#menu-item-2405 a')[0];
    let ulSubMenu = jQuery('#sub-menu')[0];
    let menuAlavalikkoContainer = jQuery('.menu-alavalikko-container')[0];
    let topMenuOpenDisplay = document.getElementById('top-menu-open').style.display;
    let topMenuCloseDisplay = document.getElementById('top-menu-overlay-close').style.display;
    let topMenuOpenOpacity = document.getElementById('top-menu-open').style.opacity;
    let topMenuCloseOpacity = document.getElementById('top-menu-overlay-close').style.opacity;
    
    let overlayHeight = document.getElementById('top-menu-overlay').style.height;
    
    if(windowWidth > 960){
        
        if(jQuery(navRightContainer).hasClass('visuallyhidden')){
           jQuery(navRightContainer).removeClass('visuallyhidden');
        }
        
        if(jQuery(palvelut_link).hasClass('active-link')) {
            closeSubNav(palvelut_link);
        }
        
        if(jQuery(servicesMenuItem).hasClass('services-link-mobile')){
            jQuery(servicesMenuItem).removeClass('services-link-mobile');
        }
        
        if(jQuery(servicesMenuItem).has( '#sub-menu' )){
            jQuery(ulSubMenu).appendTo(menuAlavalikkoContainer);
        }

        document.getElementById('top-menu-overlay').style.height = 'auto';
        if(topMenuOpenDisplay == 'inline-block'){
           document.getElementById('top-menu-open').style.display = 'none';
        }
        if(topMenuCloseDisplay == 'block'){
           document.getElementById('top-menu-overlay-close').style.display = 'none';
        }
    }else{
        if(jQuery(palvelut_link).hasClass('active-link')) {
            closeSubNav(palvelut_link);
        }
        
        if(topMenuOpenOpacity == '0'){
           document.getElementById('top-menu-open').style.opacity = '100';
        }
        
        if(overlayHeight == '100%'){
           document.getElementById('top-menu-open').style.opacity = '0';
        }
        
        if(!jQuery('#menu-item-2405').hasClass('services-link-mobile')){
            jQuery('#menu-item-2405').addClass('services-link-mobile');
            jQuery(ulSubMenu).appendTo("#menu-item-2405");
        }

        if(overlayHeight == 'auto'){
           document.getElementById("top-menu-overlay").style.height = '0%';
        }
        
        if(topMenuOpenDisplay == 'none' && overlayHeight == '0%'){
           document.getElementById('top-menu-open').style.display = 'inline-block';
        }
        
    }
}