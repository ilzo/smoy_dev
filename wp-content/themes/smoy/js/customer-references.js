var viewportWidth;
var topPos = -1;
var leftPos = 2.5;
var isFourCols = 0;
var isThreeCols = 0;
var isTwoCols = 0;
var customersWrapper;
var customerBoxNum = 0;
var customerBoxWidth = 0;
var customerBoxHeight = 0;
var customerBoxMarginTop = 0;
var customerBoxMarginBottom = 0;
var customerBoxMargin = '';
var isInLastRow = 0;
var isInFirstRow = 0;
var isBottomLeftSide = 0;
var isRightSide = 0;
var cloneBoxWidthDouble = 0;
var cloneBoxHeightDouble = 0;
var customerBoxMargin = '';
var customerBoxClone;
var resizeDimensions = [];

function calculateBgDimensions(){
    let bgResizeDimensions = [];
    
    for (var i = 1; i < 13; i++) {
        
        let j = i - 1;
        let thisElem = document.getElementById('customer-'+i);
        let thisWidth = thisElem.getAttribute("data-width");
        let thisHeight = thisElem.getAttribute("data-height");
        let aspectRatio = thisHeight / thisWidth;
        let bgWidth;
        let resizeWidth;
        if(aspectRatio > 0.90){
           bgWidth = 240;
            //bgWidth = 201;
            resizeWidth = 115;
        }else if(aspectRatio > 0.80  && aspectRatio <= 0.90) {    
           //bgWidth = 240;
            bgWidth = 210;
            resizeWidth = 120;
        }else if(aspectRatio > 0.75  && aspectRatio <= 0.80) {    
           //bgWidth = 300;
            bgWidth = 262.5;
            resizeWidth = 140;
        }else if(aspectRatio > 0.60  && aspectRatio <= 0.75) {
           //bgWidth = 338;
            bgWidth = 295.75;
            resizeWidth = 158;      
        }else if(aspectRatio > 0.49  && aspectRatio <= 0.60){
            //bgWidth = 360;
            bgWidth = 315;
            resizeWidth = 180;      
        }else{
            //bgWidth = 380;  
            bgWidth = 332.5;
            resizeWidth = 190;
        }
        
        let calculatedHeight = bgWidth * aspectRatio;
        let calculatedResizeHeight = resizeWidth * aspectRatio;
        let sizeObject = {width : resizeWidth, height : calculatedResizeHeight};
        jQuery(thisElem).css('background-size', '240% '+calculatedHeight+'%');
        
        bgResizeDimensions[j] = sizeObject;
        /*
        var aspectRatio = bgWidth / bgHeight;
        console.log(aspectRatio);
        
        var calculatedHeight = 200 * aspectRatio;
        */

        //function resize(){
            //var bgHeight = document.body.offsetWidth * img.height / img.width;
            //document.body.style.height = bgHeight + 'px';
        //}
        //window.onresize = resize; resize();
        
        //let imgWidth = jQuery(contentWrappers[i]).width();
        //let imgHeight = jQuery(contentWrappers[i]).height();
        
        //console.log(wrapperWidth);
        //console.log(wrapperHeight);
        
        
        //jQuery(thisElem).css('background-size', '240% '+calculatedHeight+'%');
        
      
    }
    
    return bgResizeDimensions;
    
}



jQuery(function() {
    let $window = jQuery(window);
    resizeDimensions = calculateBgDimensions();
    customersWrapper = jQuery("#customers-wrapper");
    viewportWidth = $window.width();
    onViewPortResize(viewportWidth);
    $window.resize(function() {
        if(customersWrapper.find('.customer-cloned-box').length != 0){
            jQuery(".customer-cloned-box").remove();
        }
        viewportWidth = $window.width();
        onViewPortResize(viewportWidth);
    });
    
    jQuery(".customer-box").click(function() {
        
        let customerWrapperHtml = jQuery('<div class="customer-content-wrapper customer-cloned-box"></div>');
        let customerOverlayWrapperHtml = jQuery('<div class="customer-overlay-wrapper-clicked"></div>');
        let customerCloseLink =  jQuery('<a href="javascript:void(0)" class="customer-box-close" style="opacity:0;">&times;</a>');
        let customerContentHtml = jQuery('<div class="customer-content"></div>');
        let customerLogoHtml = jQuery('<img />');
        customerContentHtml.append(customerLogoHtml);
        customerOverlayWrapperHtml.append(customerContentHtml);
        customerWrapperHtml.append(customerCloseLink);
        customerWrapperHtml.append(customerOverlayWrapperHtml);
        
        if(customersWrapper.find('.customer-cloned-box').length != 0){
            jQuery(".customer-cloned-box").remove();
        }
       
        customerBoxWidth = jQuery(this).width();
        customerBoxHeight = jQuery(this).height();
        customerBoxMargin = jQuery(this).css("margin");
        customerBoxNum = jQuery(".customer-box").index(this) + 1;
        
        let thisCustomerContentWrapper = jQuery(this).find(".customer-content-wrapper");
        let thisCustomerLogoImg = jQuery(this).find("img");
        
        let thisWrapperId = jQuery(thisCustomerContentWrapper).attr('id');
        let idNum = parseInt(thisWrapperId.split("-").pop()) - 1;
    
        
        if(typeof thisCustomerLogoImg[0] != "undefined"){
            var thisLogoSrc = jQuery(thisCustomerLogoImg[0]).attr('src');
            jQuery(customerLogoHtml).attr('src', thisLogoSrc);
            
            jQuery(customerLogoHtml).css({
                'opacity' : '1',
                'height' : jQuery(thisCustomerLogoImg[0]).css('height'),
                'min-width' : jQuery(thisCustomerLogoImg[0]).css('min-width'),
                'max-width' : jQuery(thisCustomerLogoImg[0]).css('max-width'),
                'min-height' : jQuery(thisCustomerLogoImg[0]).css('min-height'),
                'max-height' : jQuery(thisCustomerLogoImg[0]).css('max-height')
            });
            
        }
        
        let originalBgSize = jQuery(thisCustomerContentWrapper[0]).css('background-size');
        
        jQuery(customerWrapperHtml).css({
            'background-image' : jQuery(thisCustomerContentWrapper[0]).css('background-image'),
            'background-size': originalBgSize
        });
        
        
        
        customerBoxClone = customerWrapperHtml;
        
        if(isFourCols === 1) {
           customerBoxClickedFourCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum);
        }else if(isThreeCols === 1) {
           customerBoxClickedThreeCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum); 
        }else if(isTwoCols === 1) {
           customerBoxClickedTwoCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum);      
        }
        
        let closeLink = customerCloseLink[0];
        
        jQuery(closeLink).one('click', function() {
            //let closeLink = jQuery(this);
            
            reverseResizeCloneBox(originalBgSize, customerBoxClone, idNum, customerOverlayWrapperHtml, customerLogoHtml, closeLink)
        });
        resizeCloneBox(customerBoxClone, idNum, customerOverlayWrapperHtml, customerLogoHtml, closeLink);
    });
    
});

function onViewPortResize(width) {
    if(1264 <= width){
        isFourCols = 1;
        isThreeCols = 0;
        isTwoCols = 0;
    }else if(944 <= width && width < 1264 ){
        isThreeCols = 1;
        isFourCols = 0;
        isTwoCols = 0;
    }else if (width < 944){
        isTwoCols = 1;
        isFourCols = 0;
        isThreeCols = 0;
    }
    
}

function customerBoxClickedFourCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum) {
    
    if(5 <= customerBoxNum && customerBoxNum < 9){
        customerBoxMarginTop = -4 + customerBoxHeight;
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        if(customerBoxNum === 7 || customerBoxNum === 8){
            isRightSide = 1;
        }else{
            isRightSide= 0;
        }
        isInFirstRow = 0;
        isInLastRow = 0;
        isBottomLeftSide = 0;
    }else if(9 <= customerBoxNum){
        customerBoxMarginTop = -3 + (2 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        isInLastRow = 1;
        if(customerBoxNum === 9 || customerBoxNum === 10){
            isBottomLeftSide = 1;
        }else{
            isBottomLeftSide = 0;
        }
        isInFirstRow = 0;
        isRightSide= 0;

    }else{
        
        var customerBoxMargin = '-4px -1.5px -2px -4.5px';
        if(customerBoxNum === 3 || customerBoxNum === 4){
            isRightSide = 1;
        }else{
            isRightSide = 0;
        }
        
        isInFirstRow = 1;
        isInLastRow = 0;
        isBottomLeftSide = 0;
    }

    var remainder = customerBoxNum % 4;
    
    let originalWidth = customerBoxWidth;
    let originalHeight = customerBoxHeight;
    let cloneWidth = originalWidth + 6;
    let cloneHeight = originalHeight + 6;

    switch (remainder) {
        case 0:
            
            leftPos += (3 * customerBoxWidth) + 1;
            jQuery(customerBoxClone).width(cloneWidth);
            jQuery(customerBoxClone).height(cloneHeight);
            break;
        case 3:
            leftPos += (2 * customerBoxWidth) - 1;
            cloneWidth = originalWidth + 2;
            cloneHeight = originalHeight + 2;
            jQuery(customerBoxClone).width(cloneWidth);
            jQuery(customerBoxClone).height(cloneHeight);
            
            break;
        case 2:
            leftPos += customerBoxWidth;
            jQuery(customerBoxClone).width(customerBoxWidth);
            jQuery(customerBoxClone).height(customerBoxHeight);
            break;
        case 1:
            jQuery(customerBoxClone).width(customerBoxWidth);
            jQuery(customerBoxClone).height(customerBoxHeight);
    }
    
    jQuery(customerBoxClone).css({
        'margin' : customerBoxMargin,
        'left' : leftPos
    });

    topPos = -1;
    leftPos = 2.5;

    jQuery(customersWrapper).append(customerBoxClone);

    if(customerBoxNum === 12) { 
        isInLastCorner = 1;
    }
}

function customerBoxClickedThreeCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum) {
    
    if(customerBoxNum < 4){
        if(customerBoxNum === 3){
           isRightSide = 1;
        }else{
           isRightSide= 0;
        }
        
        var customerBoxMargin = '-4.5px -1.5px -2px -4.5px';
        isInFirstRow = 1;
        isInLastRow = 0;
        isBottomLeftSide = 0;
        
    }else if(4 <= customerBoxNum && customerBoxNum <= 6){
        if(customerBoxNum === 6){
           isRightSide = 1;
        }else{
           isRightSide = 0;
        }
        
        customerBoxMarginTop = -4.5 + customerBoxHeight;
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        isInFirstRow = 0;
        isInLastRow = 0;
        isBottomLeftSide = 0;
    
    }else if(7 <= customerBoxNum && customerBoxNum <= 9){
        
        if(customerBoxNum === 9){
           isRightSide = 1;
        }else{
           isRightSide= 0;
        }
        
        customerBoxMarginTop = -4.5 + (2 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        isInFirstRow = 0;
        isInLastRow = 0;
        isBottomLeftSide = 0;
    }else if(9 < customerBoxNum){
      
        customerBoxMarginTop = -3.5 + (3 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        isInFirstRow = 0;
        isInLastRow = 1;
        if(customerBoxNum === 10 || customerBoxNum === 11){
            isBottomLeftSide = 1;
        }else{
            isBottomLeftSide = 0;
        }

        isRightSide= 0;

    }

    var remainder = customerBoxNum % 3;
    let originalWidth = customerBoxWidth;
    let originalHeight = customerBoxHeight;
    let cloneWidth = originalWidth + 6;
    let cloneHeight = originalHeight + 6;

    switch (remainder) {
        case 0:
            leftPos += (2 * customerBoxWidth) - 1;
            jQuery(customerBoxClone).width(cloneWidth);
            jQuery(customerBoxClone).height(cloneHeight);
            break;
        case 2:
            leftPos += customerBoxWidth + 2;
            cloneWidth = originalWidth + 2;
            cloneHeight = originalHeight + 2;
            jQuery(customerBoxClone).width(cloneWidth);
            jQuery(customerBoxClone).height(cloneHeight);
            break;
        case 1:
            jQuery(customerBoxClone).width(customerBoxWidth);
            jQuery(customerBoxClone).height(customerBoxHeight);            
    }

    jQuery(customerBoxClone).css({
        'margin' : customerBoxMargin,
        'left' : leftPos
    });
    
    topPos = -1;
    leftPos = 2.5;
    
    jQuery(customersWrapper).append(customerBoxClone);

    if(customerBoxNum === 12) { 
        isInLastCorner = 1;
    }
}


function customerBoxClickedTwoCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum) {
    isInFirstRow = 0;
    if(customerBoxNum % 2 === 0){
       isRightSide = 1;
    }else{
       isRightSide= 0;
    }
    
    if(customerBoxNum === 11 || customerBoxNum === 12){
        isInLastRow = 1;
        isRightSide= 0;
        if(customerBoxNum === 11){
            isBottomLeftSide = 1;
            isInLastCorner = 0;
        }else{
           isInLastCorner = 1;
           isBottomLeftSide = 0;
        }
        
    }else{
        isInLastRow = 0;
        isInLastCorner = 0;
        isBottomLeftSide = 0;
    }
    
    if(10 < customerBoxNum && customerBoxNum <= 12) {
        let originalWidth = customerBoxWidth;
        let originalHeight = customerBoxHeight;
        
        let cloneWidth = originalWidth + 1;
        let cloneHeight = originalHeight + 1;
        
        jQuery(customerBoxClone).width(cloneWidth);
        jQuery(customerBoxClone).height(cloneHeight);
    }else{
        jQuery(customerBoxClone).width(customerBoxWidth);
        jQuery(customerBoxClone).height(customerBoxHeight);
    }
    
    
    if(customerBoxNum <= 2){
        isInFirstRow = 1;
        var customerBoxMargin = '-4px -1.5px -2px -1.5px';
    }else if(2 < customerBoxNum && customerBoxNum <= 4){
        customerBoxMarginTop = -4 + customerBoxHeight;
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -1.5px';
    }else if(4 < customerBoxNum && customerBoxNum <= 6){
        customerBoxMarginTop = -4 + (2 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -1.5px';
    }else if(6 < customerBoxNum && customerBoxNum <= 8){
        customerBoxMarginTop = -4 + (3 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -1.5px';
    }else if(8 < customerBoxNum && customerBoxNum <= 10){
        customerBoxMarginTop = -4 + (4 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -1.5px';
    }else if(10 < customerBoxNum && customerBoxNum <= 12){
        customerBoxMarginTop = -3 + (5 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -1.5px';
    }
    
    var remainder = customerBoxNum % 2;

    switch (remainder) {
        case 0:
            leftPos += customerBoxWidth;
            break;
        case 1:          
    }

    jQuery(customerBoxClone).css({
        'margin' : customerBoxMargin,
        'left' : leftPos
    });


    topPos = -1;
    leftPos = 2.5;


    jQuery(customersWrapper).append(customerBoxClone);

}

function resizeCloneBox(customerCloneContentWrapper, clickedId, customerCloneOverlay, customerCloneLogo, closeLink) {
    let whereToResize = resizeDimensions[clickedId].width+'% '+resizeDimensions[clickedId].height+'%';
    let customerTween = new TimelineMax({
        paused:true
    });
    
    cloneBoxWidthLarge = (2 * customerBoxWidth) + 2;
    cloneBoxHeightLarge = (2 * customerBoxHeight) + 2;

    if(isInLastRow === 1){

        if(isBottomLeftSide === 1){
            var cloneBoxNewMarginTop = customerBoxMarginTop - customerBoxHeight;
            /*
             jQuery(customerBoxClone).animate({
                width: cloneBoxWidthDouble,
                marginTop: cloneBoxNewMarginTop,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            
            */
            
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: cloneBoxWidthLarge,
                height: cloneBoxHeightLarge,
                marginTop: cloneBoxNewMarginTop,
                backgroundSize: whereToResize,
                autoRound:false, 
                ease: Power1.ease0ut
            }).play();
            
            
        }else{


            var cloneBoxNewMarginLeft = -2.5 - customerBoxWidth;
            var cloneBoxNewMarginTop = customerBoxMarginTop - customerBoxHeight;
            /*
            jQuery(customerBoxClone).animate({
                marginLeft: cloneBoxNewMarginLeft,
                width: cloneBoxWidthDouble,
                marginTop: cloneBoxNewMarginTop,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            
            */
            
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: cloneBoxWidthLarge,
                height: cloneBoxHeightLarge,
                marginLeft: cloneBoxNewMarginLeft,
                marginTop: cloneBoxNewMarginTop,
                backgroundSize: whereToResize,
                autoRound:false, 
                ease: Power1.ease0ut
            }).play();
            
            
        }

    }else{

        if(isRightSide){

            var cloneBoxNewMarginLeft = -2.5 - customerBoxWidth;
            
            /*
            
            jQuery(customerBoxClone).animate({
                marginLeft: cloneBoxNewMarginLeft,
                width: cloneBoxWidthDouble,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            */
            
            
            
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: cloneBoxWidthLarge,
                height: cloneBoxHeightLarge,
                marginLeft: cloneBoxNewMarginLeft,
                backgroundSize: whereToResize,
                autoRound:false, 
                ease: Power1.ease0ut
            }).play();
            
            
        }else{
            /*
            jQuery(customerBoxClone).animate({
                width: cloneBoxWidthDouble,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            */
            
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: cloneBoxWidthLarge,
                height: cloneBoxHeightLarge,
                backgroundSize: whereToResize,
                autoRound:false, 
                ease: Power1.ease0ut
            }).play();
            
            
        }

    }
    
    jQuery(closeLink).animate({
        opacity: '1',
    }, 900); 
    
    
    jQuery(customerCloneOverlay).animate({
        opacity: '0',
    }, 1250 );
    
    jQuery(customerCloneLogo).animate({
        opacity: '0',
    }, 1250 );
    
}



function reverseResizeCloneBox(originalBgSize, customerCloneContentWrapper, clickedId, customerCloneOverlay, customerCloneLogo, closeLink) {
    
    let customerTween = new TimelineMax({
        paused:true
    });
    
    cloneBoxWidthLarge = (2 * customerBoxWidth) + 2;
    cloneBoxHeightLarge = (2 * customerBoxHeight) + 2;
    
    
    let toBeResizedWith = cloneBoxWidthLarge - (customerBoxWidth);
    
    let toBeResizedHeight = cloneBoxHeightLarge -( customerBoxHeight - 0.5);
    
    let toBeResizedMarginTop = customerBoxMarginTop - 2;
    
    var reverseResizeComplete = function () {
        jQuery(customerCloneContentWrapper).remove();
    };

    if(isInLastRow === 1){

        if(isBottomLeftSide === 1){
            //var cloneBoxNewMarginTop = customerBoxMarginTop - customerBoxHeight;
            /*
             jQuery(customerBoxClone).animate({
                width: cloneBoxWidthDouble,
                marginTop: cloneBoxNewMarginTop,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            
            */
            
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                marginTop: toBeResizedMarginTop,
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();
            
            
        }else{


            var toBeResizedMarginLeft = '-2px';
            //var cloneBoxNewMarginTop = customerBoxMarginTop - customerBoxHeight;
            /*
            jQuery(customerBoxClone).animate({
                marginLeft: cloneBoxNewMarginLeft,
                width: cloneBoxWidthDouble,
                marginTop: cloneBoxNewMarginTop,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            
            */
            
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                marginLeft: toBeResizedMarginLeft,
                marginTop: toBeResizedMarginTop,
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();
            
            
        }

    }else if(isInFirstRow === 1){
        
        if(isRightSide){

            //var cloneBoxNewMarginLeft = -2.5 - customerBoxWidth;
            
            /*
            
            jQuery(customerBoxClone).animate({
                marginLeft: cloneBoxNewMarginLeft,
                width: cloneBoxWidthDouble,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            */
            
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                marginTop: '-2px',
                marginLeft: '-3.5px',
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();
            
            
        }else{
            /*
            jQuery(customerBoxClone).animate({
                width: cloneBoxWidthDouble,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            */
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                marginTop: '-2.5px',
                marginLeft: '-3.5px',
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();
            
            
        }
        
    }else{
        
        if(isRightSide){

            //var cloneBoxNewMarginLeft = -2.5 - customerBoxWidth;
            
            /*
            
            jQuery(customerBoxClone).animate({
                marginLeft: cloneBoxNewMarginLeft,
                width: cloneBoxWidthDouble,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            */
            toBeResizedMarginTop = customerBoxMarginTop + 0.5;
            
            
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                marginTop: toBeResizedMarginTop,
                marginLeft: '-4px',
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();
            
            
        }else{
            /*
            jQuery(customerBoxClone).animate({
                width: cloneBoxWidthDouble,
                height: cloneBoxHeightDouble,
                backgroundSize: '169%'
            }, 1250 );
            */
            
            
            toBeResizedMarginTop = customerBoxMarginTop + 0.5;
            
            customerTween.to(customerCloneContentWrapper, 1.25, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                marginTop: toBeResizedMarginTop,
                marginLeft: '-5.5px',
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();
            
            
        }
        
        
    }
    
    jQuery(customerCloneOverlay).removeClass('customer-overlay-wrapper-clicked');
    jQuery(customerCloneOverlay).addClass('customer-overlay-wrapper-closed');
    
    jQuery(closeLink).animate({
        opacity: '0',
    }, 450, function() {
        jQuery(closeLink[0]).css('display', 'none');
    }); 
    
    jQuery(customerCloneOverlay).animate({
                opacity: '1',
    }, 1250 );
    
    jQuery(customerCloneLogo).animate({
                opacity: '1',
    }, 1250 );
    
    
    
}





