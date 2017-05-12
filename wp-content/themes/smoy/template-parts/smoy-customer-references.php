<div id="customers-wrapper">
<?php $i = 0; $j = 1; foreach($smoy_refs_logos as $ref_logo_url): ?>    
<figure class="customer-box">
    <div class="customer-stretchy-wrapper">
        <div id="customer-<?php echo $j ?>" class="customer-content-wrapper" data-width="<?php echo $smoy_bg_img_widths[$i] ?>" data-height="<?php echo $smoy_bg_img_heights[$i] ?>">
            <div class="customer-overlay-wrapper">
                <div class="customer-content">
                    <?php if(!empty($ref_logo_url)): ?>
                        <img src="<?php echo esc_url($ref_logo_url) ?>" />
                     <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</figure>
<?php $i++; $j++; endforeach;?>
       
</div>    