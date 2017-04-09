</div>  <!-- END OF SITE CONTENT -->

<footer id="footer">
<div class="footer-container">
</div> 
    
</footer>
</div>  <!-- END OF PAGE WRAPPER -->


<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(function() {
    jQuery('.wpcf7-form span.ajax-loader').replaceWith('<div class="ajax-loader">Loading...</div>');
});

function delayedReplace(){
    jQuery('.wpcf7-form div.ajax-loader').replaceWith('<div class="ajax-loader">Loading...</div>');
}

var timerInit;
window.onresize = function(){
    clearTimeout(timerInit);
    timerInit = setTimeout(delayedReplace, 600);
}    
    
</script>

</body>
</html>    