</div>  <!-- END OF SITE CONTENT -->

<footer id="footer">
<div class="footer-container">
</div> 
    
</footer>
</div>  <!-- END OF PAGE WRAPPER -->


<?php wp_footer(); ?>

<script type="text/javascript"> 
var overlayHoles = document.getElementsByClassName('overlay-hole');
var w = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;
var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
    
jQuery(function() {
    checkWidth(w);
    jQuery('.wpcf7-form span.ajax-loader').replaceWith('<div class="ajax-loader">Loading...</div>');
    var scroll_start = 0;
    jQuery(document).scroll(function() { 
        scroll_start = jQuery(this).scrollTop();
        if(scroll_start > 465) {
            jQuery('.navigation-top').css('background-color', 'black');
        } else {
            jQuery('.navigation-top').css('background-color', 'transparent');
        }
    });
        
});

function delayedReplace(){
    jQuery('.wpcf7-form div.ajax-loader').replaceWith('<div class="ajax-loader">Loading...</div>');
}

var timerInit;
window.onresize = function(){
    clearTimeout(timerInit);
    timerInit = setTimeout(delayedReplace, 600);
    
    w = window.innerWidth
    || document.documentElement.clientWidth
    || document.body.clientWidth;
    
    h = window.innerHeight
    || document.documentElement.clientHeight
    || document.body.clientHeight;
    
    checkWidth(w);
     
}


function checkWidth(w) {
    let thisTranslateValues;
    let thisLeftTranslateValue;
    let thisTopTranslateValue;
    let mustChangeIntParse = 0;
    
    if(w > 1680) {
        if(jQuery('.about-mask').hasClass('middle')){ 
            jQuery('.about-mask').addClass('right').removeClass('middle');
            changeOverlayHoleLeftTrans (250);
        }else if(jQuery('.about-mask').hasClass('left')){
            jQuery('.about-mask').addClass('right').removeClass('left');
            changeOverlayHoleLeftTrans (500);
        }
        
    }else if(w > 1400 && w <= 1680){
        if(jQuery('.about-mask').hasClass('right')){ 
            jQuery('.about-mask').addClass('middle').removeClass('right');
            changeOverlayHoleLeftTrans (-250);
        }else if(jQuery('.about-mask').hasClass('left')){
            jQuery('.about-mask').addClass('middle').removeClass('left');
            changeOverlayHoleLeftTrans (250);
                 
        }
        
    }else if(w <= 1400){
        if(jQuery('.about-mask').hasClass('middle')){ 
            jQuery('.about-mask').addClass('left').removeClass('middle');
            changeOverlayHoleLeftTrans (-250);
        }else if(jQuery('.about-mask').hasClass('right')){
            jQuery('.about-mask').addClass('left').removeClass('right');
            changeOverlayHoleLeftTrans (-500);
        }
    }
    
    if(w <= 960) {
        for(let i = 1; i < 7; i++) {
            let thisService = jQuery('#service-'+i);
            let thisServiceTitle = jQuery('#service-'+i+' .service-title');
            let thisServiceTitleMobile = jQuery('#service-'+i+' .service-title-mobile');
            if(thisService.hasClass('service-box')){
                thisService.removeClass('service-box');
            }
            thisService.addClass('service-box-mobile');
            
            if(thisServiceTitleMobile.length > 0) {
                thisServiceTitle.css('display', 'none');
                thisServiceTitleMobile.css('display', 'block');
                
                
            }
            
            let contentPaddingTop = jQuery('#service-'+i+' .service-content').css('paddingTop');
            //console.log(contentPaddingTop);
        
            if(thisServiceTitleMobile.length > 0){
                let titleHeight = jQuery(thisServiceTitle).height();
                let mobiletitleHeight = jQuery(thisServiceTitleMobile).height();
                
                if(mobiletitleHeight > 20 && mobiletitleHeight < 50) {
                    if (contentPaddingTop === '57px' || contentPaddingTop == '20px') {
                        console.log("lowering title down");
                        jQuery('#service-'+i+' .service-content').css('padding', '81px 0 0');
                    }
                }else if(mobiletitleHeight > 50  && mobiletitleHeight < 100){
                    if (contentPaddingTop === '81px' || contentPaddingTop === '20px') {
                        console.log("lifting title up");
                        jQuery('#service-'+i+' .service-content').css('padding', '57px 0 0');
                    }
                }
                         
            }else{
                let titleHeight = jQuery(thisServiceTitle).height();
                if(titleHeight > 20  && titleHeight < 50) {
                    if (contentPaddingTop === '57px' || contentPaddingTop === '20px') {
                        console.log("lowering title down");
                        jQuery('#service-'+i+' .service-content').css('padding', '81px 0 0');
                    }
                    
                    
                }else if(titleHeight > 50  && titleHeight < 100){
                    if (contentPaddingTop === '81px' || contentPaddingTop === '20px') {
                        console.log("lifting title up");
                        jQuery('#service-'+i+' .service-content').css('padding', '57px 0 0');
                    }   
                }
            }
            
            /*
            if(thisServiceTitleMobile.length > 0){
               if(jQuery(thisServiceTitleMobile).height() < 90) {
                    console.log("lowering title down");
                    jQuery('#service-'+i+' .service-content').css('padding', '81px 0 0 0');
                }
            }else{
               if(jQuery(thisServiceTitle).height() < 90) {
                    console.log("lowering title down");
                    jQuery('#service-'+i+' .service-content').css('padding', '81px 0 0 0');
                    
                    
               }
            }
            */
            
            
            
            
        }
        
        jQuery('#services-wrapper').css('display', 'block');
        
        
        
        
    }else if(w > 960){
        
        
         
        for(let i = 1; i < 7; i++) {
            let thisService = jQuery('#service-'+i);
            let thisServiceTitle = jQuery('#service-'+i+' .service-title');
            let thisServiceTitleMobile = jQuery('#service-'+i+' .service-title-mobile');
            let thisServiceContent = jQuery('#service-'+i+' .service-content');
            if(thisService.hasClass('service-box-mobile')){
                thisService.removeClass('service-box-mobile');
            }
            thisService.addClass('service-box');
            
            if(jQuery('#service-'+i+' .service-title-mobile').length > 0) {
                jQuery('#service-'+i+' .service-title-mobile').css('display', 'none');
                jQuery('#service-'+i+' .service-title').css('display', 'block');
            }
            
            /*
            
            if(thisServiceTitleMobile.length > 0) {
                thisServiceTitle.css('display', 'none');
                thisServiceTitleMobile.css('display', 'block');
                
                
            */
            
            
            if(thisServiceContent.css('paddingTop') == '81px' || thisServiceContent.css('paddingTop') == '57px'){
               console.log("changing padding into original");
               thisServiceContent.css('padding', '20px 0 0 20px');
            }
            
            
            
            
        }
        
        jQuery('#services-wrapper').css('display', 'block');
    }
    
}
    
function changeOverlayHoleLeftTrans (amount) {
    for(var i = 0; i < overlayHoles.length; i++){
        thisTranslateValues = overlayHoles[i].getAttribute('transform').replace(/[^\/\d]/g,'');
        
        if(thisTranslateValues.length > 6){
            thisLeftTranslateValue = parseInt(thisTranslateValues.substring(0, 4));
            thisTopTranslateValue = thisTranslateValues.substring(4, 7);
        }else{
            thisLeftTranslateValue = parseInt(thisTranslateValues.substring(0, 3));
            thisTopTranslateValue = thisTranslateValues.substring(3, 6);
        }
        
        thisLeftTranslateValue += amount;
        thisLeftTranslateValue = String(thisLeftTranslateValue);
        overlayHoles[i].setAttribute('transform', 'translate('+thisLeftTranslateValue+','+thisTopTranslateValue+')');        
    }
}    
    
</script>

</body>
</html>    