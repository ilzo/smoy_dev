<div id="services-wrapper">
    
<?php $i = 0; $j = 1;
foreach($servicesArray as $smoy_service):
    if(!is_object($smoy_service)):  
?> 
    <figure id="service-<?php echo $j ?>">
        <div class="service-stretchy-wrapper">
            <a class="service-link" href="#">
                <div class="service-content-wrapper">
                    <div class="service-color-overlay">
                        <div class="service-content">
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </figure>
<?php else: ?>
<figure id="service-<?php echo $j ?>">
    <div class="service-stretchy-wrapper">
        <a class="service-link" href="<?php echo $smoy_service->url ?>">
            <div class="service-image-wrapper"></div>
            <div class="service-content-wrapper">
                <div class="service-color-overlay">
                    <div class="service-content">
                        <h2 class="service-title"><?php echo $smoy_services_titles_front[$i] ?></h2>
                        <?php if(!empty($smoy_services_mobile_titles[$i])): ?>
                            <h2 class="service-title-mobile"><?php echo $smoy_services_mobile_titles[$i] ?></h2>
                        <?php endif; ?>
                        <div class="title-underline-pink"></div>
                        <p class="service-body-text"><?php echo $smoy_service->excerpt ?></p>
                    </div>
                </div>
            </div>  
        </a>
    </div>
</figure>     
<?php endif; $i++; $j++; endforeach; ?>        
</div>