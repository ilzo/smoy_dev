jQuery(function() {
    var topPos = -2;
    var topPos = 0;
    var leftPos = 0.0;
    var customerBoxNum = 0;
    var customerBoxWidth = 0;
    var customerBoxHeight = 0;
    var customerBoxMarginTop = 0;
    var customerBoxMarginBottom = 0;
    var customerBoxMargin = '';
    var cloneBoxWidthDouble = 0;
    var cloneBoxHeightDouble = 0;
    var customerBoxMargin = '';
    var resizeDimensions = [];
    var gridTracker = {
        fourCols: 0,
        threeCols: 0,
        twoCols: 0,
        clickedBoxPos: {top: 0, left: 0.0},
        openDir: {up: 0, down: 0, left: 0, right: 0},
        closeDir: {up: 0, down: 0, left: 0, right: 0},
        openAnimPos: {top: '', left: ''},
        closeAnimPos: {top: '', left: ''},
        setFourCols: function () {
            this.fourCols = 1; 
            this.threeCols = 0; 
            this.twoCols = 0;
        },
        setThreeCols: function () {
            this.fourCols = 0; 
            this.threeCols = 1; 
            this.twoCols = 0;
        },
        setTwoCols: function () {
            this.fourCols = 0; 
            this.threeCols = 0; 
            this.twoCols = 1;
        },
        isFourCols: function () {
            if(this.fourCols === 1){
               return 1;
            }else{
               return 0;
            }
        },
        isThreeCols: function () {
            if(this.threeCols === 1){
               return 1;
            }else{
               return 0;
            }
        },
        isTwoCols: function () {
            if(this.twoCols === 1){
               return 1;
            }else{
               return 0;
            }
        },
        whichWayToOpen: function (num) {
            this.openDir.up = 0;
            this.openDir.down = 0;
            this.openDir.left = 0;
            this.openDir.right = 0;
            if(this.isFourCols() === 1){
                if(num === 0 || num === 1 || num === 4 || num === 5){
                    this.openDir.down = 1;
                    this.openDir.right = 1;
                }else if(num === 2 || num === 3 || num === 6 || num === 7) {
                    this.openDir.down = 1;
                    this.openDir.left = 1;     
                }else if(num === 8 || num === 9 ) {
                    this.openDir.up = 1;
                    this.openDir.right = 1;
                }else if(num === 10 || num === 11){
                    this.openDir.up = 1;
                    this.openDir.left = 1;
                }
            }else if(this.isThreeCols() === 1){
                if(num === 0 || num === 1 || num === 3 || num === 4 || num === 6 || num === 7){
                    this.openDir.down = 1;
                    this.openDir.right = 1;
                }else if(num === 2 || num === 5 || num === 8) {
                    this.openDir.down = 1;
                    this.openDir.left = 1;     
                }else if(num === 9 || num === 10 ) {
                    this.openDir.up = 1;
                    this.openDir.right = 1;
                }else if(num === 11){
                    this.openDir.up = 1;
                    this.openDir.left = 1;
                }
            }else if(this.isTwoCols() === 1){
                if(num === 0 || num === 2 || num === 4 || num === 6 || num === 8){
                    this.openDir.down = 1;
                    this.openDir.right = 1;
                }else if(num === 1 || num === 3 || num === 5 || num === 7 || num === 9) {
                    this.openDir.down = 1;
                    this.openDir.left = 1;     
                }else if(num === 10 ) {
                    this.openDir.up = 1;
                    this.openDir.right = 1;
                }else if(num === 11){
                    this.openDir.up = 1;
                    this.openDir.left = 1;
                }     
            }
            return this.openDir; 
        },
        whichWayToClose: function (num) {
            this.closeDir.up = 0;
            this.closeDir.down = 0;
            this.closeDir.left = 0;
            this.closeDir.right = 0;
            if(this.isFourCols() === 1){
                if(num === 0 || num === 1 || num === 4 || num === 5){
                    this.closeDir.up = 1;
                    this.closeDir.left = 1;
                }else if(num === 2 || num === 3 || num === 6 || num === 7) {
                    this.closeDir.up = 1;
                    this.closeDir.right = 1;     
                }else if(num === 8 || num === 9 ) {
                    this.closeDir.down = 1;
                    this.closeDir.left = 1;
                }else if(num === 10 || num === 11){
                    this.closeDir.down = 1;
                    this.closeDir.right = 1;
                }
            }else if(this.isThreeCols() === 1){
                if(num === 0 || num === 1 || num === 3 || num === 4 || num === 6 || num === 7){
                    this.closeDir.up = 1;
                    this.closeDir.left = 1;
                }else if(num === 2 || num === 5 || num === 8) {
                    this.closeDir.up = 1;
                    this.closeDir.right = 1;     
                }else if(num === 9 || num === 10 ) {
                    this.closeDir.down = 1;
                    this.closeDir.left = 1;
                }else if(num === 11){
                    this.closeDir.down = 1;
                    this.closeDir.right = 1;
                } 
            }else if(this.isTwoCols() === 1){
                if(num === 0 || num === 2 || num === 4 || num === 6 || num === 8){
                    this.closeDir.up = 1;
                    this.closeDir.left = 1;
                }else if(num === 1 || num === 3 || num === 5 || num === 7 || num === 9) {
                    this.closeDir.up = 1;
                    this.closeDir.right = 1;     
                }else if(num === 10 ) {
                    this.closeDir.down = 1;
                    this.closeDir.left = 1;
                }else if(num === 11){
                    this.closeDir.down = 1;
                    this.closeDir.right = 1;
                }     
            }
            return this.closeDir;
        },
        getClickedBoxPos: function (num, boxWidth, boxHeight) {
            this.clickedBoxPos.top = 0;
            this.clickedBoxPos.left = 0.0;
            if(this.isFourCols() === 1){
                if(5 <= num && num < 9){
                    this.clickedBoxPos.top = boxHeight + 1;
                }else if(9 <= num){
                    this.clickedBoxPos.top = (2 * boxHeight) + 1;
                }else{
                    this.clickedBoxPos.top = -1;
                }
                var remainder = num % 4;
                switch (remainder) {
                    case 0:
                        this.clickedBoxPos.left = 75.12;
                        break;
                    case 3:
                        this.clickedBoxPos.left = 50.12;
                        break;
                    case 2:
                        this.clickedBoxPos.left = 25.14;
                        break;
                    case 1:
                        this.clickedBoxPos.left = 0.12;
                }
            }else if(this.isThreeCols() === 1){
                if(num < 4){
                    this.clickedBoxPos.top = -2;
                }else if(4 <= num && num <= 6){
                    this.clickedBoxPos.top = boxHeight;
                }else if(7 <= num && num <= 9){
                    this.clickedBoxPos.top = (2 * boxHeight) + 2.5;
                }else if(9 < num){
                    this.clickedBoxPos.top = (3 * boxHeight) + 2.5;

                }
                var remainder = num % 3;
                switch (remainder) {
                    case 0:
                        this.clickedBoxPos.left = 66.62;
                        break;
                    case 2:
                        this.clickedBoxPos.left = 33.4468;
                        break;
                    case 1:
                        this.clickedBoxPos.left = 0;
                }
            }else if(this.isTwoCols() === 1){
                if(num <= 2){
                    this.clickedBoxPos.top = -1.5;
                }else if(2 < num && num <= 4){
                    this.clickedBoxPos.top = boxHeight + 0; 
                }else if(4 < num && num <= 6){
                    this.clickedBoxPos.top = (2 * boxHeight) + 2;
                }else if(6 < num && num <= 8){
                    this.clickedBoxPos.top = (3 * boxHeight) + 4;   
                }else if(8 < num && num <= 10){
                    this.clickedBoxPos.top = (4 * boxHeight) + 6;
                }else if(10 < num && num <= 12){
                    this.clickedBoxPos.top = (5 * boxHeight) + 8.5;  
                }
                var remainder = num % 2;
                switch (remainder) {
                    case 0:
                        this.clickedBoxPos.left = 50.1;
                        break;
                    case 1:
                        this.clickedBoxPos.left = 0.1;
                }       
            }
            return this.clickedBoxPos;
        },

        getBoxOpenAnimPos: function (id) {
            this.openAnimPos.top = '';
            this.openAnimPos.left = '';
            var openDirection = this.whichWayToOpen(id);
            if(this.isFourCols() === 1){
                if(openDirection.down === 1 && openDirection.right === 1){
                }else if(openDirection.down === 1 && openDirection.left === 1){
                    this.openAnimPos.left = '-=25%';
                }else if(openDirection.up === 1 && openDirection.right === 1){
                    this.openAnimPos.top = '-=33.12%';
                }else if(openDirection.up === 1 && openDirection.left === 1){
                    this.openAnimPos.left = '-=25%';
                    this.openAnimPos.top = '-=33.12%';
                }
            }else if(this.isThreeCols() === 1){
                if(openDirection.down === 1 && openDirection.right === 1){
                }else if(openDirection.down === 1 && openDirection.left === 1){
                    this.openAnimPos.top = '+=0.0%';
                    this.openAnimPos.left = '-=33.12%';
                }else if(openDirection.up === 1 && openDirection.right === 1){
                    this.openAnimPos.top = '-=24.8%';
                    this.openAnimPos.left = '+=0.084%';
                }else if(openDirection.up === 1 && openDirection.left === 1){
                    this.openAnimPos.left = '-=33%';
                    this.openAnimPos.top = '-=24.66%';
                }
            }else if(this.isTwoCols() === 1){
                if(openDirection.down === 1 && openDirection.right === 1){
                }else if(openDirection.down === 1 && openDirection.left === 1){
                    this.openAnimPos.top = '+=0.0%';
                    this.openAnimPos.left = '-=50%';
                }else if(openDirection.up === 1 && openDirection.right === 1){
                    this.openAnimPos.top = '-=16.58%';
                    this.openAnimPos.left = '+=0.084%';
                }else if(openDirection.up === 1 && openDirection.left === 1){
                    this.openAnimPos.top = '-=16.58%';
                    this.openAnimPos.left = '-=50.0%';
                }     
            }
            return this.openAnimPos;
        },
        getBoxCloseAnimPos: function (id) {
            this.closeAnimPos.top = '';
            this.closeAnimPos.left = '';
            var closeDirection = this.whichWayToClose(id);
            if(this.isFourCols() === 1){
                if(closeDirection.down === 1 && closeDirection.right === 1){
                    this.closeAnimPos.top = '+=33.33%';
                    this.closeAnimPos.left = '+=24.99%';
                }else if(closeDirection.down === 1 && closeDirection.left === 1){
                    this.closeAnimPos.top = '+=33.33%';
                }else if(closeDirection.up === 1 && closeDirection.right === 1){
                    this.closeAnimPos.top = '+=0.093%';
                    this.closeAnimPos.left = '+=24.96%';
                }else if(closeDirection.up === 1 && closeDirection.left === 1){
                    this.closeAnimPos.top = '+=0.093%';
                    this.closeAnimPos.left = '-=0.025%';
                }
            }else if(this.isThreeCols() === 1){
                if(closeDirection.down === 1 && closeDirection.right === 1){
                    this.closeAnimPos.left = '+=33.25%';
                    this.closeAnimPos.top = '+=24.82%';
                }else if(closeDirection.down === 1 && closeDirection.left === 1){
                    this.closeAnimPos.top = '+=25%';
                    this.closeAnimPos.left = '-=0.018%';
                }else if(closeDirection.up === 1 && closeDirection.right === 1){
                    this.closeAnimPos.top = '+=0.10%';
                    this.closeAnimPos.left = '+=33.30%';
                }else if(closeDirection.up === 1 && closeDirection.left === 1){
                    this.closeAnimPos.top = '+=0.12%';
                    this.closeAnimPos.left = '+=0.1%';
                }
            }else if(this.isTwoCols() === 1){
                if(closeDirection.down === 1 && closeDirection.right === 1){
                    this.closeAnimPos.top = '+=16.6%';
                    this.closeAnimPos.left = '+=50.42%';
                }else if(closeDirection.down === 1 && closeDirection.left === 1){
                    this.closeAnimPos.top = '+=16.6%';
                    this.closeAnimPos.left = '-=0.018%';
                }else if(closeDirection.up === 1 && closeDirection.right === 1){
                    this.closeAnimPos.top = '+=0.04%';
                    this.closeAnimPos.left = '+=50.3%';
                }else if(closeDirection.up === 1 && closeDirection.left === 1){
                    this.closeAnimPos.top = '+=0.04%';
                    this.closeAnimPos.left = '+=0.018%';
                }     
            }
            return this.closeAnimPos;
        }   
    };

    function calculateBgDimensions(){
        var bgResizeDimensions = [];
        for (var i = 1; i < 13; i++) {
            var j = i - 1;
            var thisElem = document.getElementById('customer-'+i);
            var thisWidth = thisElem.getAttribute("data-width");
            var thisHeight = thisElem.getAttribute("data-height");
            var aspectRatio = thisHeight / thisWidth;
            var bgWidth = 0.0;
            var resizeWidth = 0.0;

            if(aspectRatio === 1){
                bgWidth = 250.0;
                resizeWidth = 101.5;
            }else if(aspectRatio > 0.90 && aspectRatio < 1){
                bgWidth = 240.0;
                resizeWidth = 115.0;
            }else if(aspectRatio > 0.80  && aspectRatio <= 0.90){    
                bgWidth = 210.0;
                resizeWidth = 120.0;
            }else if(aspectRatio > 0.75  && aspectRatio <= 0.80){    
                bgWidth = 262.5;
                resizeWidth = 140.0;
            }else if(aspectRatio > 0.60  && aspectRatio <= 0.75){
                bgWidth = 295.75;
                resizeWidth = 158.0;      
            }else if(aspectRatio > 0.49  && aspectRatio <= 0.60){
                bgWidth = 315.0;
                resizeWidth = 180.0;      
            }else{  
                bgWidth = 332.5;
                resizeWidth = 190.0;
            }
            var calculatedHeight = bgWidth * aspectRatio;
            var calculatedResizeHeight = resizeWidth * aspectRatio;
            var sizeObject = {width : resizeWidth, height : calculatedResizeHeight};
            jQuery(thisElem).css('background-size', '240% '+calculatedHeight+'%');
            bgResizeDimensions[j] = sizeObject;
        }
        return bgResizeDimensions;
    }
    
    var $window = jQuery(window);
    resizeDimensions = calculateBgDimensions();
    var customersWrapper = jQuery("#customers-wrapper");
    var viewportWidth = $window.width();
    onViewPortResize(viewportWidth);
    $window.resize(function() {
        if(customersWrapper.find('.customer-cloned-box').length != 0){
            jQuery(".customer-cloned-box").remove();
        }
        viewportWidth = $window.width();
        onViewPortResize(viewportWidth);
    });
    jQuery(".customer-box").click(function() {
        var customerWrapperHtml = jQuery('<div class="customer-content-wrapper customer-cloned-box"></div>');
        var customerOverlayWrapperHtml = jQuery('<div class="customer-overlay-wrapper-clicked"></div>');
        var customerCloseLink =  jQuery('<a href="javascript:void(0)" class="customer-box-close" style="opacity:0;">&times;</a>');
        var customerContentHtml = jQuery('<div class="customer-content"></div>');
        var customerLogoHtml = jQuery('<img />');
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
        var thisCustomerContentWrapper = jQuery(this).find(".customer-content-wrapper");
        var thisCustomerLogoImg = jQuery(this).find("img");
        var thisWrapperId = jQuery(thisCustomerContentWrapper).attr('id');
        var idNum = parseInt(thisWrapperId.split("-").pop()) - 1;
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
        var originalBgSize = jQuery(thisCustomerContentWrapper[0]).css('background-size');
        
        // In case of when the background-size property gets pixel values instead of percentage for some reason (like in IE) 
        if(originalBgSize.indexOf('px') !== -1){
            var originalBgSizeVals = originalBgSize.split(' ');
            var toBeResizedArr = [];
            toBeResizedArr[0] = customerBoxWidth;
            toBeResizedArr[1] = customerBoxHeight;
            var percentageVals = [];
            for(var i = 0; i < 2; i++) {
                originalBgSizeVals[i] = parseInt(originalBgSizeVals[i]);
                percentageVals[i] = Number(((originalBgSizeVals[i] / toBeResizedArr[i]) * 100).toFixed(1));
            }
            var percentageStr = percentageVals[0] + '% ' + percentageVals[1] + '%';
            originalBgSize = percentageStr;
        }
        
        jQuery(customerWrapperHtml).css({
            'background-image' : jQuery(thisCustomerContentWrapper[0]).css('background-image'),
            'background-size': originalBgSize
        });
        var customerBoxClone = customerWrapperHtml;
        customerBoxClicked(customersWrapper, customerBoxClone, customerBoxWidth, customerBoxHeight, customerBoxNum);
        var closeLink = customerCloseLink[0];
        jQuery(closeLink).one('click', function() {
            reverseResizeCloneBox(originalBgSize, customerBoxClone, idNum, customerOverlayWrapperHtml, customerLogoHtml, closeLink)
        });
        resizeCloneBox(customerBoxClone, idNum, customerOverlayWrapperHtml, customerLogoHtml, closeLink);
    });
    
    function onViewPortResize(width) {
        if(1264 <= width){
            gridTracker.setFourCols();
        }else if(944 <= width && width < 1264 ){
            gridTracker.setThreeCols();
        }else if (width < 944){
            gridTracker.setTwoCols();
        }
    }

    function customerBoxClicked(customersWrapper, customerBoxClone, customerBoxWidth, customerBoxHeight, customerBoxNum) {
        jQuery(customerBoxClone).width(customerBoxWidth);
        jQuery(customerBoxClone).height(customerBoxHeight);
        var pos = gridTracker.getClickedBoxPos(customerBoxNum, customerBoxWidth, customerBoxHeight);
        jQuery(customerBoxClone).css({
            'top' : pos.top,
            'left' : pos.left + '%'
        });
        jQuery(customersWrapper).append(customerBoxClone);
    }

    function resizeCloneBox(customerCloneContentWrapper, clickedId, customerCloneOverlay, customerCloneLogo, closeLink) {
        var whereToResize = resizeDimensions[clickedId].width+'% '+resizeDimensions[clickedId].height+'%';
        var customerTween = new TimelineMax({paused:true});
        var cloneBoxWidthLarge = (2 * customerBoxWidth) + 2;
        var cloneBoxHeightLarge = (2 * customerBoxHeight) + 2;
        var topAndLeft = gridTracker.getBoxOpenAnimPos(clickedId);
        if(topAndLeft.top !== '' && topAndLeft.left !== ''){
           customerTween.to(customerCloneContentWrapper, 0.9, {
                width: cloneBoxWidthLarge,
                height: cloneBoxHeightLarge,
                left: topAndLeft.left,
                top: topAndLeft.top,
                backgroundSize: whereToResize,
                autoRound:false, 
                ease: Power1.ease0ut
            }).play();
        }else if(topAndLeft.top !== '' && topAndLeft.left === '') {
            customerTween.to(customerCloneContentWrapper, 0.9, {
                width: cloneBoxWidthLarge,
                height: cloneBoxHeightLarge,
                top: topAndLeft.top,
                backgroundSize: whereToResize,
                autoRound:false, 
                ease: Power1.ease0ut
            }).play(); 
        }else if(topAndLeft.top === '' && topAndLeft.left !== ''){  
            customerTween.to(customerCloneContentWrapper, 0.9, {
                width: cloneBoxWidthLarge,
                height: cloneBoxHeightLarge,
                left: topAndLeft.left,
                backgroundSize: whereToResize,
                autoRound:false, 
                ease: Power1.ease0ut
            }).play();
        }else{
            customerTween.to(customerCloneContentWrapper, 0.9, {
                width: cloneBoxWidthLarge,
                height: cloneBoxHeightLarge,
                backgroundSize: whereToResize,
                autoRound:false, 
                ease: Power1.ease0ut
            }).play(); 
        }
        jQuery(closeLink).animate({
            opacity: '1',
        }, 600); 
        jQuery(customerCloneOverlay).animate({
            opacity: '0',
        }, 900 );
        jQuery(customerCloneLogo).animate({
            opacity: '0',
        }, 900 );
    }

    function reverseResizeCloneBox(originalBgSize, customerCloneContentWrapper, clickedId, customerCloneOverlay, customerCloneLogo, closeLink) {
        var customerTween = new TimelineMax({paused:true});
        var cloneBoxWidthLarge = (2 * customerBoxWidth);
        var cloneBoxHeightLarge = (2 * customerBoxHeight);
        var toBeResizedWith = cloneBoxWidthLarge - (customerBoxWidth);
        var toBeResizedHeight = cloneBoxHeightLarge -( customerBoxHeight);
        var reverseResizeComplete = function(){jQuery(customerCloneContentWrapper).remove()};
        var topAndLeft = gridTracker.getBoxCloseAnimPos(clickedId);
        if(topAndLeft.top !== '' && topAndLeft.left !== ''){
           customerTween.to(customerCloneContentWrapper, 0.75, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                left: topAndLeft.left,
                top: topAndLeft.top,
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();
        }else if(topAndLeft.top !== '' && topAndLeft.left === '') {
            customerTween.to(customerCloneContentWrapper, 0.75, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                top: topAndLeft.top,
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();
        }else if(topAndLeft.top === '' && topAndLeft.left !== ''){
            customerTween.to(customerCloneContentWrapper, 0.75, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                left: topAndLeft.left,
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();
        }else{
            customerTween.to(customerCloneContentWrapper, 0.75, {
                width: toBeResizedWith,
                height: toBeResizedHeight,
                backgroundSize: originalBgSize,
                autoRound:false, 
                ease: Power1.ease0ut,
                onComplete: reverseResizeComplete
            }).play();  
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
        }, 750 );
        jQuery(customerCloneLogo).animate({
                    opacity: '1',
        }, 750 );
    }
});