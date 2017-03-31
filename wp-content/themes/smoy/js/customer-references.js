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
var testBoxClicked = 0;
var customerBoxMarginTop = 0;
var customerBoxMarginBottom = 0;
var customerBoxMargin = '';
var isInLastRow = 0;
var isBottomLeftSide = 0;
var isRightSide = 0;

var testValue = 0;

var testBoxWidthDouble = 0;
var testBoxHeightDouble = 0;

var customerBoxMargin = '';
//var remainder = 0;
var testBox = jQuery('<figure class="customer-test-box"></figure');

jQuery(testBox).on( "click", function() {
    
    var testBoxTop = parseInt(jQuery(this).css('top'), 10);
    
    if(testBoxClicked == 0){
        onTestBoxClicked();
    }
    
    testBoxClicked = 1;
    
});

jQuery(function() {
    
    customersWrapper = jQuery('#customers-wrapper');
    viewportWidth = jQuery(window).width();
    onViewPortResize(viewportWidth);
    
    jQuery(window).resize(function() {
        viewportWidth = jQuery(window).width();
        onViewPortResize(viewportWidth);
    });

    jQuery('.customer-box').click(function() {
        
        customerBoxWidth = jQuery(this).width();
        customerBoxHeight = jQuery(this).height();
        customerBoxMargin = jQuery(this).css('margin');
        customerBoxNum = jQuery('.customer-box').index(this) + 1;
        
        if(isFourCols == 1) {
           customerBoxClickedFourCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum);
        }else if(isThreeCols == 1) {
           customerBoxClickedThreeCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum); 
        }else if(isTwoCols == 1) {
                 
        }
        
    
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
    
    jQuery(testBox).width(customerBoxWidth);
    jQuery(testBox).height(customerBoxHeight);

    if(5 <= customerBoxNum && customerBoxNum < 9){
        
        customerBoxMarginTop = -2 + customerBoxHeight;

        if(customerBoxNum == 7 || customerBoxNum == 8){
            isRightSide = 1;
        }else{
            isRightSide= 0;
        }
        
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -2.5px';

        isInLastRow = 0;
        isBottomLeftSide = 0;
    }else if(9 <= customerBoxNum){
      
        customerBoxMarginTop = -2 + (2 * customerBoxHeight);
        
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -2.5px';
        
        isInLastRow = 1;
        if(customerBoxNum == 9 || customerBoxNum == 10){
            isBottomLeftSide = 1;
        }else{
            isBottomLeftSide = 0;
        }

        isRightSide= 0;

    }else{
        
        var customerBoxMargin = '-2px -1.5px -2px -2.5px';
        
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

    jQuery(testBox).css({
        'margin' : customerBoxMargin,
        /*'top' : topPos, */
        'left' : leftPos
    });


    topPos = -1;
    leftPos = 2.5;


    jQuery(customersWrapper).append(testBox);

    testBoxClicked = 0;

    if(customerBoxNum == 12) { 
        isInLastCorner = 1;
    }
}


function onTestBoxClicked() {
    testBoxWidthDouble = 2 * customerBoxWidth;
    testBoxHeightDouble = 2 * customerBoxHeight;
    testValue = 2 * testBoxHeightDouble;

    if(isInLastRow == 1){

        if(isBottomLeftSide == 1){

            var testBoxNewMarginTop = customerBoxMarginTop - customerBoxHeight;

             jQuery(testBox).animate({
                width: testBoxWidthDouble,
                marginTop: testBoxNewMarginTop,
                height: testBoxHeightDouble
            }, 1250 );

        }else{


            var testBoxNewMarginLeft = -2.5 - customerBoxWidth;
            var testBoxNewMarginTop = customerBoxMarginTop - customerBoxHeight;

            jQuery(testBox).animate({
                marginLeft: testBoxNewMarginLeft,
                width: testBoxWidthDouble,
                marginTop: testBoxNewMarginTop,
                height: testBoxHeightDouble
            }, 1250 );

        }

    }else{

        if(isRightSide){

            var testBoxNewMarginLeft = -2.5 - customerBoxWidth;

            jQuery(testBox).animate({
                marginLeft: testBoxNewMarginLeft,
                width: testBoxWidthDouble,
                height: testBoxHeightDouble
            }, 1250 );


        }else{
            jQuery(testBox).animate({
                width: testBoxWidthDouble,
                height: testBoxHeightDouble
            }, 1250 );


        }


    }
}









function customerBoxClickedThreeCols(customersWrapper, customerBoxWidth, customerBoxHeight, customerBoxNum) {
    
    jQuery(testBox).width(customerBoxWidth);
    jQuery(testBox).height(customerBoxHeight);

    if(customerBoxNum < 4){
        if(customerBoxNum == 3){
           isRightSide = 1;
        }else{
           isRightSide= 0;
        }
        
        var customerBoxMargin = '-2px -1.5px -2px -2.5px';
        
        isInLastRow = 0;
        isBottomLeftSide = 0;
        
        
    
    }else if(4 <= customerBoxNum && customerBoxNum <= 6){
        if(customerBoxNum == 6){
           isRightSide = 1;
        }else{
           isRightSide= 0;
        }
        
        customerBoxMarginTop = -2 + customerBoxHeight;
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -2.5px';
        
        isInLastRow = 0;
        isBottomLeftSide = 0;
    
    }else if(7 <= customerBoxNum && customerBoxNum <= 9){
        //topPos += customerBoxHeight;

        if(customerBoxNum == 9){
           isRightSide = 1;
        }else{
           isRightSide= 0;
        }
        
        customerBoxMarginTop = -2 + (2 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -2.5px';

        isInLastRow = 0;
        isBottomLeftSide = 0;
    }else if(9 < customerBoxNum){
        //topPos += 1 * customerBoxHeight;

        //topPos = 0;
        
        
        customerBoxMarginTop = -2 + (3 * customerBoxHeight);
        var customerBoxMargin = ''+customerBoxMarginTop+'px -1.5px -2px -2.5px';
        //customerBoxMargin = '-2px -1.5px -2px -2.5px';

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

    jQuery(testBox).css({
        'margin' : customerBoxMargin,
        /*'top' : topPos, */
        'left' : leftPos
    });


    topPos = -1;
    leftPos = 2.5;


    jQuery(customersWrapper).append(testBox);

    testBoxClicked = 0;

    if(customerBoxNum == 12) { 
        isInLastCorner = 1;
    }
}