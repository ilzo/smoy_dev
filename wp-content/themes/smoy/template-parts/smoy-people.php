<div id="staff-wrapper">
<?php $i = 1; foreach($pplArray as $smoy_person):
if(!is_object($smoy_person)): ?> 
<figure id="person-<?php echo $i ?>" class="person-box black-box">
    <div class="person-content-wrapper">
        <div class="person-content">
        </div>
    </div>
</figure>
<?php else: ?>
<figure id="person-<?php echo $i ?>" class="person-box">
    <div class="person-content-wrapper">
        <?php if(!empty($smoy_person->thumbnail)): 
            $thisThumb = $smoy_person->thumbnail;
        ?>
        <img src="<?php echo esc_url($thisThumb) ?>" />
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/misc/mustaboksi@2x.jpg" width="190" height="190" />
        <?php endif; 
        if(!empty($smoy_person->title)): ?>
            <div class="person-content">
                <p class="person-name"><?php echo $smoy_person->name ?></p>
                <div class="person-line-separator"></div>
                <p class="person-title"><?php echo $smoy_person->title ?></p>
                <?php if(!empty($smoy_person->phone)): ?>
                    <p class="person-phone"><?php echo $smoy_person->phone ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</figure>
<?php endif; $i++; endforeach; ?>
</div>