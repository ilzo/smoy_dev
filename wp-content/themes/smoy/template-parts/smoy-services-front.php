<div id="services-wrapper">
<?php $j = 1; for($i = 0; $i < 6; $i++):?>
<figure id="service-<?php echo $j ?>">
    <div class="service-stretchy-wrapper">
        <a class="service-link" href="#">
            <div class="service-content-wrapper">
                <div class="service-color-overlay">
                    <div class="service-content">
                        <h2 class="service-title"><?php echo $smoy_services_titles[$i] ?></h2>
                        <?php if(!empty($smoy_services_mobile_titles[$i])): ?>
                            <h2 class="service-title-mobile"><?php echo $smoy_services_mobile_titles[$i] ?></h2>
                        <?php endif; ?>
                        <div class="title-underline-pink"></div>
                        <p class="service-body-text"><?php echo $smoy_services_body_texts[$i] ?></p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</figure>
     
<?php $j++; endfor; ?>         
</div>