function openNav() {
    document.getElementById("top-menu-overlay").style.height = "100%";
    document.getElementById("top-menu-open").style.opacity = '0';
    document.getElementById("top-menu-overlay-close").style.opacity = '100';
}

function closeNav() {
    document.getElementById("top-menu-overlay").style.height = "0%";
    document.getElementById("top-menu-open").style.opacity = '100';
    document.getElementById("top-menu-overlay-close").style.opacity = '0';
}
    
jQuery(function() {
    jQuery( window ).resize(function() {
        windowWidth = window.innerWidth;
        if(windowWidth > 960){
            document.getElementById("top-menu-overlay").style.height = "auto";
            if(topMenuOpenOpacity == "0"){
               document.getElementById("top-menu-open").style.opacity = '100';
            }
        }else{
            var overlayHeight = document.getElementById("top-menu-overlay").style.height;
            var topMenuOpenOpacity = document.getElementById("top-menu-open").style.opacity
            if(overlayHeight == "auto"){
               document.getElementById("top-menu-overlay").style.height = "0%";
            }
            if(topMenuOpenOpacity == "0" && overlayHeight == "0%"){
               document.getElementById("top-menu-open").style.opacity = '100';
            }

        }

    });

});