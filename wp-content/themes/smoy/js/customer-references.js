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
var isBottomLeftSide = 0;
var isRightSide = 0;
var testValue = 0;
var cloneBoxWidthDouble = 0;
var cloneBoxHeightDouble = 0;
var customerBoxMargin = '';
var customerBoxClone;

jQuery(function() {
    customersWrapper = jQuery("#customers-wrapper");
    viewportWidth = jQuery(window).width();
    onViewPortResize(viewportWidth);
    
    jQuery(window).resize(function() {
        if(customersWrapper.find('.customer-cloned-box').length != 0){
            jQuery(".customer-cloned-box").remove();
        }
        
        viewportWidth = jQuery(window).width();
        onViewPortResize(viewportWidth);
    });

    jQuery(".customer-box").click(function() {
        
        if(customersWrapper.find('.customer-cloned-box').length != 0){
            jQuery(".customer-cloned-box").remove();
        }
       
        customerBoxWidth = jQuery(this).width();
        customerBoxHeight = jQuery(this).height();
        customerBoxMargin = jQuery(this).css("margin");
        customerBoxNum = jQuery(".customer-box").index(this) + 1;
        customerBoxClone = jQuery(this).clone();
        
        var customerBoxCloneContentWrapper = jQuery(customerBoxClone).find("div.customer-content-wrapper");
        var customerBoxCloneLogoImg = jQuery(customerBoxClone).find("img");
        var thisCustomerContentWrapper = jQuery(this).find("div.customer-content-wrapper");
        var thisCustomerLogoImg = jQuery(this).find("img");
        
        jQuery(customerBoxClone).removeAttr("id");
        customerBoxClone.removeClass("customer-box");
        customerBoxClone.addClass("customer-cloned-box");
        
        var backgroundStyle = css_utility(jQuery(thisCustomerContentWrapper[0]));
        jQuery(customerBoxCloneContentWrapper[0]).css(backgroundStyle);
        
        if(typeof thisCustomerLogoImg[0] != "undefined"){
           var logoStyle = css_utility(jQuery(thisCustomerLogoImg[0]));
           jQuery(customerBoxCloneLogoImg[0]).css(logoStyle);
        }
        
        if(isFourCols == 1) {
           customerBoxClickedFourCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum);
        }else if(isThreeCols == 1) {
           customerBoxClickedThreeCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum); 
        }else if(isTwoCols == 1) {
           customerBoxClickedTwoCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum);      
        }
        
        resizeCloneBox(customerBoxCloneContentWrapper[0], customerBoxCloneLogoImg[0]);
    
    });
    
});


function onViewPortResize(width) {
    if(width >= 1200){
        isFourCols = 1;
        isThreeCols = 0;
        isTwoCols = 0;
    }else if(960 <= width && width < 1200 ){
        isThreeCols = 1;
        isFourCols = 0;
        isTwoCols = 0;
    }else{
        isTwoCols = 1;
        isFourCols = 0;
        isThreeCols = 0;
    }
}


function customerBoxClickedFourCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum) {
    
    jQuery(customerBoxClone).width(customerBoxWidth);
    jQuery(customerBoxClone).height(customerBoxHeight);

    if(5 <= customerBoxNum && customerBoxNum < 9){
        
        customerBoxMarginTop = -2.5 + customerBoxHeight;

        if(customerBoxNum == 7 || customerBoxNum == 8){
            isRightSide = 1;
        }else{
            isRightSide= 0;
        }
        
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';

        isInLastRow = 0;
        isBottomLeftSide = 0;
    }else if(9 <= customerBoxNum){
      
        customerBoxMarginTop = -2.5 + (2 * customerBoxHeight);
        
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        
        isInLastRow = 1;
        if(customerBoxNum == 9 || customerBoxNum == 10){
            isBottomLeftSide = 1;
        }else{
            isBottomLeftSide = 0;
        }

        isRightSide= 0;

    }else{
        
        var customerBoxMargin = '-2.5px -1.5px -2px -4.5px';
        
        if(customerBoxNum == 3 || customerBoxNum == 4){
            isRightSide = 1;
        }else{
            isRightSide= 0;
        }

        isInLastRow = 0;
        isBottomLeftSide = 0;
    }

    var remainder = customerBoxNum % 4;

    switch (remainder) {
        case 0:
            leftPos += 3 * customerBoxWidth;
            break;
        case 3:
            leftPos += 2 * customerBoxWidth;
            break;
        case 2:
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

    if(customerBoxNum == 12) { 
        isInLastCorner = 1;
    }
}


function customerBoxClickedThreeCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum) {
    
    jQuery(customerBoxClone).width(customerBoxWidth);
    jQuery(customerBoxClone).height(customerBoxHeight);

    if(customerBoxNum < 4){
        if(customerBoxNum == 3){
           isRightSide = 1;
        }else{
           isRightSide= 0;
        }
        
        var customerBoxMargin = '-2.5px -1.5px -2px -4.5px';
        
        isInLastRow = 0;
        isBottomLeftSide = 0;
        
    }else if(4 <= customerBoxNum && customerBoxNum <= 6){
        if(customerBoxNum == 6){
           isRightSide = 1;
        }else{
           isRightSide= 0;
        }
        
        customerBoxMarginTop = -2.5 + customerBoxHeight;
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        
        isInLastRow = 0;
        isBottomLeftSide = 0;
    
    }else if(7 <= customerBoxNum && customerBoxNum <= 9){
        
        if(customerBoxNum == 9){
           isRightSide = 1;
        }else{
           isRightSide= 0;
        }
        
        customerBoxMarginTop = -2.5 + (2 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';

        isInLastRow = 0;
        isBottomLeftSide = 0;
    }else if(9 < customerBoxNum){
      
        customerBoxMarginTop = -2.5 + (3 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
       
        isInLastRow = 1;
        if(customerBoxNum == 10 || customerBoxNum == 11){
            isBottomLeftSide = 1;
        }else{
            isBottomLeftSide = 0;
        }

        isRightSide= 0;

    }

    var remainder = customerBoxNum % 3;

    switch (remainder) {
        case 0:
            leftPos += 2 * customerBoxWidth;
            break;
        case 2:
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

    if(customerBoxNum == 12) { 
        isInLastCorner = 1;
    }
}


function customerBoxClickedTwoCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum) {
    
    jQuery(customerBoxClone).width(customerBoxWidth);
    jQuery(customerBoxClone).height(customerBoxHeight);
    
    if(customerBoxNum % 2 == 0){
       isRightSide = 1;
    }else{
       isRightSide= 0;
    }
    
    if(customerBoxNum == 11 || customerBoxNum == 12){
        isInLastRow = 1;
        isRightSide= 0;
        if(customerBoxNum == 11){
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
    
    
    if(customerBoxNum <= 2){
        
        var customerBoxMargin = '-2.5px -1.5px -2px -4.5px';
        
    }else if(2 < customerBoxNum && customerBoxNum <= 4){
        
        customerBoxMarginTop = -2.5 + customerBoxHeight;
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
       
        
    }else if(4 < customerBoxNum && customerBoxNum <= 6){
        customerBoxMarginTop = -2.5 + (2 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        
    }else if(6 < customerBoxNum && customerBoxNum <= 8){
        customerBoxMarginTop = -2.5 + (3 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        
    
    }else if(8 < customerBoxNum && customerBoxNum <= 10){
        customerBoxMarginTop = -2.5 + (4 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        
    
    }else if(10 < customerBoxNum && customerBoxNum <= 12){
        
        customerBoxMarginTop = -2.5 + (5 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -4.5px';
        
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


function resizeCloneBox(customerCloneContentWrapper, customerCloneLogo) {
    
    cloneBoxWidthDouble = 2 * customerBoxWidth;
    cloneBoxHeightDouble = 2 * customerBoxHeight;
    testValue = 2 * cloneBoxHeightDouble;

    if(isInLastRow == 1){

        if(isBottomLeftSide == 1){
            var cloneBoxNewMarginTop = customerBoxMarginTop - customerBoxHeight;

             jQuery(customerBoxClone).animate({
                width: cloneBoxWidthDouble,
                marginTop: cloneBoxNewMarginTop,
                height: cloneBoxHeightDouble
            }, 1250 );
            
        }else{


            var cloneBoxNewMarginLeft = -2.5 - customerBoxWidth;
            var cloneBoxNewMarginTop = customerBoxMarginTop - customerBoxHeight;

            jQuery(customerBoxClone).animate({
                marginLeft: cloneBoxNewMarginLeft,
                width: cloneBoxWidthDouble,
                marginTop: cloneBoxNewMarginTop,
                height: cloneBoxHeightDouble
            }, 1250 );
            
        }

    }else{

        if(isRightSide){

            var cloneBoxNewMarginLeft = -2.5 - customerBoxWidth;

            jQuery(customerBoxClone).animate({
                marginLeft: cloneBoxNewMarginLeft,
                width: cloneBoxWidthDouble,
                height: cloneBoxHeightDouble
            }, 1250 );
            
        }else{
            
            jQuery(customerBoxClone).animate({
                width: cloneBoxWidthDouble,
                height: cloneBoxHeightDouble
            }, 1250 );
            
        }

    }
    
    jQuery(customerCloneContentWrapper).animate({
                backgroundSize: '169%',
            }, 1250 );
    
    jQuery(customerCloneLogo).animate({
                opacity: '0',
    }, 1250 );
}


/*
*
* CSS utility functions
*
*/

function css_utility(a) {
    var sheets = document.styleSheets, o = {};
    for (var i in sheets) {
        var rules = sheets[i].rules || sheets[i].cssRules;
        for (var r in rules) {
            if (a.is(rules[r].selectorText)) {
                o = jQuery.extend(o, css2json_utility(rules[r].style), css2json_utility(a.attr('style')));
            }
        }
    }
    return o;
}

function css2json_utility(css) {
    var s = {};
    if (!css) return s;
    if (css instanceof CSSStyleDeclaration) {
        for (var i in css) {
            if ((css[i]).toLowerCase) {
                s[(css[i]).toLowerCase()] = (css[css[i]]);
            }
        }
    } else if (typeof css == "string") {
        css = css.split("; ");
        for (var i in css) {
            var l = css[i].split(": ");
            s[l[0].toLowerCase()] = (l[1]);
        }
    }
    return s;
}