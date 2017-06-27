var smoy_video;
var smoy_video_source_tags;
var smoy_video_src_mp4 = '';
var smoy_video_src_webm = '';
var header_height = 0;
var onplaying = true;
var onpause = false;
var playPromise;
var loadPromise;

function smoy_video_detectScrollPos(w) {
    let currentScrollPos = $window.scrollTop();
    if(w > 960){ 
        if (currentScrollPos < (header_height + 100)) { 
            playSmoyVideo();
        }else{
            pauseSmoyVideo();
        }
    } 
}

function smoy_video_check_width(w) {
    if(w <= 960) {
        pauseSmoyVideo();
    }else if(w > 960){
        playSmoyVideo();
    }
    
}

function playSmoyVideo() {
    if(doesItExist(smoy_video) && doesItExist(smoy_video_source_tags)){
        if(smoy_video_source_tags[0].getAttribute('src') === '') {
            smoy_video_source_tags[0].setAttribute('src', smoy_video_src_mp4);
            smoy_video_source_tags[1].setAttribute('src', smoy_video_src_webm);
            smoy_video.load();
            //console.log('video now playing');
        }
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
            
            //console.log('video now paused');
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


jQuery(function() {
    var w = window.innerWidth
    || document.documentElement.clientWidth
    || document.body.clientWidth;
    smoy_video = document.getElementById('smoy-home-video');
    header_height = jQuery('#header-home').height();
    smoy_video_check_width(w);
    
    if(doesItExist(smoy_video)){
        
        
        /*
        smoy_video.onplaying = function() {
            onplaying = true;
            onpause = false;
        };
        smoy_video.onpause = function() {
            onplaying = false;
            onpause = true;
        };
        */
        
        
        
        smoy_video_source_tags = smoy_video.getElementsByTagName('source');
        smoy_video_src_mp4 = smoy_video_source_tags[0].getAttribute('src');
        smoy_video_src_webm = smoy_video_source_tags[1].getAttribute('src');
        
        $document.bind('scroll', function() {
            smoy_video_detectScrollPos(w);
        });
    }
    
    window.onresize = function(){
        header_height = jQuery('#header-home').height();
        w = window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;
        smoy_video_check_width(w);
    }
});



