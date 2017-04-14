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