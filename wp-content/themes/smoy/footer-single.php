<?php if(!smoy_is_mobile()): ?>
    <?php get_sidebar('social'); ?>
<?php endif; ?>
<footer id="footer">
<div class="footer-container">
    <div id="footer-content-left">
        <div id="footer-mobile-button-container">
            <button id="newsletter-button-mobile" class="newsletter-subscribe-button">Tilaa uutiskirje</button>
        </div>
        <?php do_action('smoy_get_footer_contact_info') ?>
    </div>
    <!--<div id="footer-content-center"> -->
        <div id="footer-button-container">
            <button id="newsletter-button" class="newsletter-subscribe-button">Tilaa uutiskirje</button>
        </div>
        <?php do_action('smoy_get_footer_social_icons') ?>
        
    <!--</div> -->
    <div id="footer-content-right">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo/asml-logo.png" width="102px" height="38px" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo/mtl-jasentunnus.png" width="105px" height="105px"/>
    </div>
</div>     
</footer>
</div>  <!-- END OF PAGE-WRAPPER-SINGLE -->
<?php wp_footer(); ?>
<script type="text/javascript"> 
var w = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;
var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
jQuery(function() {
    var addToAnyContainer = jQuery('.addtoany_share_save_container')[0];
    var sourcesElem = jQuery( "p:contains('Lähteet')" ).last()[0];
    if(typeof sourcesElem !== "undefined" && typeof addToAnyContainer !== "undefined"){
      jQuery(addToAnyContainer).insertBefore(sourcesElem);
    }
    
    if(addToAnyContainer !== "undefined"){ 
        jQuery(addToAnyContainer).css('display', 'block');
    }
    
    socialWidgetSidebar = jQuery('#social-sidebar');
    if(jQuery(socialWidgetSidebar).length){
        if (socialWidgetSidebar.hasClass('hidden')) {
            socialWidgetSidebar.removeClass('hidden');
            setTimeout(function () {
              socialWidgetSidebar.removeClass('visuallyhidden');
            }, 20);
        
        }
        $document.bind('scroll', function() {
            social_sidebar_detectScrollPos();
        });
    }
});
    
function social_sidebar_detectScrollPos() {
    let currentScrollPos = $window.scrollTop();
    let windowHeight = $window.height();
    let documentHeight = $document.height();
    if (currentScrollPos + windowHeight >= documentHeight - 380) {
        if (!socialWidgetSidebar.hasClass('hidden')) {
            socialWidgetSidebar.addClass('visuallyhidden');
            socialWidgetSidebar.one('transitionend', function(e) {
              socialWidgetSidebar.addClass('hidden');
            });
          }
    }else{
        if (socialWidgetSidebar.hasClass('hidden')) {
            socialWidgetSidebar.removeClass('hidden');
            setTimeout(function () {
              socialWidgetSidebar.removeClass('visuallyhidden');
            }, 20);
        
        }
    }   
}    
    
</script>
</body>
</html>