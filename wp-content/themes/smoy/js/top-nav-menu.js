/* Open */
    function openNav() {
        document.getElementById("top-menu-overlay").style.height = "100%";
        document.getElementById("top-menu-open").style.cssText = 'visibility:hidden !important';
        
        
    }

    /* Close */
    function closeNav() {
        document.getElementById("top-menu-overlay").style.height = "0%";
        document.getElementById("top-menu-open").style.cssText = 'visibility:visible !important';
    }
    
    jQuery(function() {
    
        jQuery( window ).resize(function() {
            windowWidth = window.innerWidth;
            if(windowWidth > 960){
                document.getElementById("top-menu-overlay").style.height = "auto";
                if(topMenuOpenVisibility== "hidden"){
                   document.getElementById("top-menu-open").style.cssText = 'visibility:visible !important';
                }
                
            }else{
                var overlayHeight = document.getElementById("top-menu-overlay").style.height;
                var topMenuOpenVisibility = document.getElementById("top-menu-open").style.visibility;
                if(overlayHeight == "auto"){
                   document.getElementById("top-menu-overlay").style.height = "0%";
                }
                
                if(topMenuOpenVisibility== "hidden" && overlayHeight == "0%"){
                   document.getElementById("top-menu-open").style.cssText = 'visibility:visible !important';
                }
                
            }
            
        });
        
    });