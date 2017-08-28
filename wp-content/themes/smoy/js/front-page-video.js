jQuery(function() {
    var $root = jQuery('html, body');
    var $document = jQuery(document);
    var $window = jQuery(window);
    var smoy_video_source_tags;
    var smoy_video_src_mp4 = '';
    var smoy_video_src_webm = '';
    var currentScrollPos = $window.scrollTop();
    var w = window.innerWidth
    || document.documentElement.clientWidth
    || document.body.clientWidth;
    var header_height = jQuery('#header-home').height();
    var smoy_video = document.getElementById('smoy-home-video'); 
    if(doesItExist(smoy_video)) {
        var isIE = detectIE();
        smoy_video_source_tags = smoy_video.getElementsByTagName('source');
        smoy_video_src_mp4 = smoy_video_source_tags[0].getAttribute('src');
        smoy_video_src_webm = smoy_video_source_tags[1].getAttribute('src');
        $document.bind('scroll', function() {
            currentScrollPos = $window.scrollTop();
            smoy_video_detectScrollPos(w, currentScrollPos, header_height);
        });
        if(isIE !== false){
            if(!window.location.hash) { 
                smoy_video.addEventListener('timeupdate', videoUpdateHandler);
            }
        }else{
            smoy_video.addEventListener('timeupdate', videoUpdateHandler);
        }
        smoy_video_detectScrollPos(w, currentScrollPos, header_height); 
        smoy_video_check_width(w);    
    }
    
    jQuery(window).resize(function() {
        header_height = jQuery('#header-home').height();
        w = window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;
        smoy_video_check_width(w);
    });
    
    function smoy_video_detectScrollPos(w, currentScrollPos, header_height) {
        if(w > 960){ 
            if (currentScrollPos < (header_height - (header_height * 0.35))) {
                smoy_video_check_width(w);
            }else{
                if(doesItExist(removeSmoyVideo)){
                   removeSmoyVideo();
                   removeSmoyVideo = null;
                }
            }
        } 
    }

    function smoy_video_check_width(w) {
        if(w <= 960) {
            pauseSmoyVideo();
        }else if(w > 960){
            if(doesItExist(smoy_video)){ 
                var videoDisplay = smoy_video.currentStyle ? smoy_video.currentStyle.display : getComputedStyle(smoy_video, null).display;
                if(videoDisplay === 'none'){
                   pauseSmoyVideo();
                }else{
                   playSmoyVideo();
                }
            } 
        } 
    }

    function playSmoyVideo() {
        if(doesItExist(smoy_video) && doesItExist(smoy_video_source_tags)){
            if(smoy_video_source_tags[0].getAttribute('src') === '') {
                smoy_video_source_tags[0].setAttribute('src', smoy_video_src_mp4);
                smoy_video_source_tags[1].setAttribute('src', smoy_video_src_webm);
                smoy_video.load();
                smoy_video.addEventListener('timeupdate', videoUpdateHandler);
            }
        }
    }

    var removeSmoyVideo = function() {
        if(doesItExist(smoy_video)){
            jQuery(smoy_video).remove();
            smoy_video = null;
        }
    }

    function pauseSmoyVideo() {
        if(doesItExist(smoy_video) && doesItExist(smoy_video_source_tags)){
            if(smoy_video_source_tags[0].getAttribute('src') !== '') {
                smoy_video.pause();
                smoy_video_source_tags[0].setAttribute('src', '');
                smoy_video_source_tags[1].setAttribute('src', '');
                smoy_video.removeEventListener('timeupdate', videoUpdateHandler);
            }
        }
    }

    function doesItExist(variable) {
        var itExists = true;
        if(typeof variable === 'undefined' || variable === null){ 
            itExists = false;
        }
        return itExists; 
    }
    
    
    function videoUpdateHandler() {
        if(this.currentTime >= 21.25) {
            $root.animate({
                scrollTop: jQuery("#about-us").offset().top
            }, 1000);
            this.removeEventListener('timeupdate', videoUpdateHandler );
        }
    }
    
    /**
     * detect IE
     * returns version of IE or false, if browser is not Internet Explorer
     */
    function detectIE() {
        var ua = window.navigator.userAgent;

        var msie = ua.indexOf('MSIE ');
        if (msie > 0) {
            // IE 10 or older => return version number
            return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        }

        var trident = ua.indexOf('Trident/');
        if (trident > 0) {
            // IE 11 => return version number
            var rv = ua.indexOf('rv:');
            return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
        }

        var edge = ua.indexOf('Edge/');
        if (edge > 0) {
           // Edge (IE 12+) => return version number
           return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
        }

        // other browser
        return false;
    }
      
});