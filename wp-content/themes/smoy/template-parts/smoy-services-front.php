<div id="services-wrapper">
    
<?php 
if ( !wp_is_mobile() ){ 
$j = 1; for($i = 0; $i < 6; $i++):
    
//var_dump($i);
//var_dump($j);
?>
    
<figure id="service-<?php echo $j ?>" class="service-box">
    <div class="service-stretchy-wrapper">
        <a href="#">
            <div class="service-content-wrapper">
                <div class="service-content">
                    <?php echo $smoy_services_titles[$i] ?>
                    <div class="title-underline-pink"></div>
                </div>
            </div>
        </a>
    </div>
</figure>
     
<?php $j++; endfor; ?>         
    


<?php

} else {


}
 
?>    
    
   
    
</div>