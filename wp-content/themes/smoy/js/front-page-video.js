var $root = jQuery('html, body');
var smoy_video;
var smoy_video_source_tags;
var smoy_video_src_mp4 = '';
var smoy_video_src_webm = '';


var playPromise;
var loadPromise;

jQuery(function() {
    var w = window.innerWidth
    || document.documentElement.clientWidth
    || document.body.clientWidth;
    var header_height = jQuery('#header-home').height();
    smoy_video = document.getElementById('smoy-home-video'); 
    if(doesItExist(smoy_video)){
        smoy_video_source_tags = smoy_video.getElementsByTagName('source');
        smoy_video_src_mp4 = smoy_video_source_tags[0].getAttribute('src');
        smoy_video_src_webm = smoy_video_source_tags[1].getAttribute('src');
        
        $document.bind('scroll', function() {
            smoy_video_detectScrollPos(w, header_height);
        });
        
        smoy_video.addEventListener('timeupdate', videoUpdateHandler);
        //smoy_video.addEventListener('ended', videoEndHandler);
        //smoy_video_check_width(w);
        smoy_video_detectScrollPos(w, header_height); 
    }
    
    jQuery(window).resize(function() {
        header_height = jQuery('#header-home').height();
        w = window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;
        smoy_video_check_width(w);
    });
});


function smoy_video_detectScrollPos(w, header_height) {
    let currentScrollPos = $window.scrollTop();
    if(w > 960){ 
        if (currentScrollPos < (header_height - (header_height * 0.35))) {
            smoy_video_check_width(w);
        }else{
            removeSmoyVideo();
            //pauseSmoyVideo();
        }
    } 
}


function smoy_video_check_width(w) {
    if(w <= 960) {
        //removeSmoyVideo();
        pauseSmoyVideo();
    }else if(w > 960){
        if(doesItExist(smoy_video)){ 
            let videoDisplay = smoy_video.currentStyle ? smoy_video.currentStyle.display : getComputedStyle(smoy_video, null).display;
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
            console.log('video now playing');
        }
    }
}

function removeSmoyVideo() {
    if(doesItExist(smoy_video)){
        jQuery(smoy_video).remove();
        smoy_video = null;
        console.log('video removed');
    }
}

function pauseSmoyVideo() {
    if(doesItExist(smoy_video) && doesItExist(smoy_video_source_tags)){
        if(smoy_video_source_tags[0].getAttribute('src') !== '') {
            playPromise = smoy_video.play();
            if (playPromise !== undefined) {
                playPromise.then(_ => {
                  smoy_video.pause();
                }).catch(error => {});
            }
            smoy_video_source_tags[0].setAttribute('src', '');
            smoy_video_source_tags[1].setAttribute('src', '');
            
            if (playPromise !== undefined) {
                playPromise.then(_ => {
                  smoy_video.load();
                }).catch(error => {});
            }
            
            console.log('video now paused');
        }
    }
}

function doesItExist(variable) {
    let itExists = true;
    if(typeof variable === 'undefined' || variable === null){ 
        itExists = false;
    }
    return itExists; 
}



//function videoEndHandler() {
    //console.log('The video has ended');
    //jQuery(this).addClass('video-ended');
    //jQuery(this).fadeOut(300, function() { jQuery(this).remove(); });
    //removeSmoyVideo();
//}

function videoUpdateHandler() {
    if(this.currentTime >= 21.5) {
        console.log('hello from videoUpdateHandler!');
        $root.animate({
            scrollTop: jQuery("#about-us").offset().top
        }, 1000);
        this.removeEventListener('timeupdate', videoUpdateHandler );
    }
}

