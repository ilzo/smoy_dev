function openNav() {
    document.getElementById("top-menu-overlay").style.height = "100%";
    document.getElementById("top-menu-open").style.opacity = '0';
    document.getElementById("top-menu-overlay-close").style.display = 'block';
}

function closeNav() {
    let palvelut_link = jQuery('#menu-item-2405 a')[0];
    let ulSecondaryMenu = jQuery('#secondary-menu')[0];
    document.getElementById("top-menu-overlay").style.height = "0%";
    document.getElementById("top-menu-open").style.opacity = '100';
    document.getElementById("top-menu-overlay-close").style.display = 'none';
    closeSecondaryNav(palvelut_link);
}

function openSecondaryNav(link) {
    if(!jQuery(link).hasClass('active-link')) { 
        jQuery(link).addClass('active-link');
        jQuery('.navigation-top').css('background-color', 'black');
        setTimeout(function(){
            jQuery('#secondary-menu').addClass('second-menu-opened');
        }, 180);

        jQuery(link).unbind('click');
        jQuery(link).click(function(e) {
            e.preventDefault();
            let palvelut_link = jQuery(this);
            closeSecondaryNav(palvelut_link);                                        
        });
    
    }
    
}

function closeSecondaryNav(link) {
    if(jQuery(link).hasClass('active-link')) {
        jQuery(link).removeAttr('class');
        jQuery('#secondary-menu').removeClass('second-menu-opened');
        setTimeout(function(){
             jQuery('.navigation-top').css('background-color', 'black');
        }, 250);
        
        jQuery(link).unbind('click');
        jQuery(link).click(function(e) {
            e.preventDefault();
            let palvelut_link = jQuery(this);
            openSecondaryNav(palvelut_link);

        });
     
    }   
    
}
    
jQuery(function() {
    checkScreenWidth();
    var scroll_start = 0;
    var secondaryHeight;
    var navSecondary = document.getElementsByClassName('navigation-secondary');
    var palvelut_link = jQuery('#menu-item-2405 a')[0];
    jQuery(document).scroll(function() {
        secondaryHeight = navSecondary[0].clientHeight;
        if(secondaryHeight === 0) {
            scroll_start = jQuery(this).scrollTop();
            if(scroll_start > 465) {
                jQuery('.navigation-top').css('background-color', 'black');
            } else {
                jQuery('.navigation-top').css('background-color', 'transparent');
            }
       } 
    });
    
    jQuery(palvelut_link).click(function(e) {
        e.preventDefault();
        let palvelut_link = jQuery(this);
        openSecondaryNav(palvelut_link);
    });
    
    jQuery(window).resize(checkScreenWidth);

});


function checkScreenWidth(){
    let windowWidth = window.innerWidth;
    let servicesMenuItem = jQuery('#menu-item-2405');
    let palvelut_link = jQuery('#menu-item-2405 a')[0];
    let ulSecondaryMenu = jQuery('#secondary-menu')[0];
    let menuAlavalikkoContainer = jQuery('.menu-alavalikko-container')[0];
    let topMenuOpenDisplay = document.getElementById("top-menu-open").style.display;
    let topMenuCloseDisplay = document.getElementById("top-menu-overlay-close").style.display;
    let topMenuOpenOpacity = document.getElementById("top-menu-open").style.opacity;
    let topMenuCloseOpacity = document.getElementById("top-menu-overlay-close").style.opacity;
    
    let overlayHeight = document.getElementById("top-menu-overlay").style.height;
    
    if(windowWidth > 960){
        if(jQuery(palvelut_link).hasClass('active-link')) {
            closeSecondaryNav(palvelut_link);
        }
        
        if(jQuery(servicesMenuItem).hasClass('services-link-mobile')){
            jQuery(servicesMenuItem).removeClass('services-link-mobile');
        }
        
        if(jQuery(servicesMenuItem).has( "#secondary-menu" )){
            jQuery(ulSecondaryMenu).appendTo(menuAlavalikkoContainer);
        }

        document.getElementById("top-menu-overlay").style.height = "auto";
        if(topMenuOpenDisplay == "inline-block"){
           document.getElementById("top-menu-open").style.display = 'none';
        }
        if(topMenuCloseDisplay == "block"){
           document.getElementById("top-menu-overlay-close").style.display = 'none';
        }
    }else{
        
        if(jQuery(palvelut_link).hasClass('active-link')) {
            closeSecondaryNav(palvelut_link);
        }
        
        if(topMenuOpenDisplay == "none"){
           document.getElementById("top-menu-open").style.display = 'inline-block';
        }
        if(topMenuCloseDisplay == "none"){
           document.getElementById("top-menu-overlay-close").style.display = 'block';
        }
        if(topMenuOpenOpacity == "0"){
           document.getElementById("top-menu-open").style.opacity = '100';
        }
        if(topMenuCloseOpacity == "0"){
           document.getElementById("top-menu-overlay-close").style.opacity = '100';
        }
        
        closeSecondaryNav(palvelut_link);
        if(!jQuery('#menu-item-2405').hasClass('services-link-mobile')){
            jQuery('#menu-item-2405').addClass('services-link-mobile');
            jQuery(ulSecondaryMenu).appendTo("#menu-item-2405");
        }

        if(overlayHeight == "auto"){
           document.getElementById("top-menu-overlay").style.height = "0%";
        }
        
        if(topMenuOpenDisplay == "none" && overlayHeight == "0%"){
           document.getElementById("top-menu-open").style.display = 'inline-block';
        }
        
    }
}