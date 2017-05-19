<div id="services-wrapper"> 
<?php $j = 1; for($i = 0; $i < 6; $i++): ?>
<figure id="service-<?php echo $j ?>">
    <div class="service-stretchy-wrapper">
        <a class="service-link" href="javascript:void(0)">
            <div class="service-image-wrapper"></div>
            <div class="service-content-wrapper">
                <div class="service-color-overlay">
                    <div class="service-content">
                        <h2 class="service-title"><?php echo $smoy_services_titles_front[$i] ?></h2>
                        <div class="title-underline-pink"></div>
                        <p class="service-body-text"><?php echo $smoy_services_desc_bodies_eng[$i] ?></p>
                    </div>
                </div>
            </div>  
        </a>
    </div>
</figure>     
<?php $j++; endfor; ?>        
</div>