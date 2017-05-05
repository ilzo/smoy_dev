<div id="contact-wrapper">
    <div id="contact-info-container">
    <?php $i = 1; foreach($contact_ppl_array as $smoy_contact_person): ?>
        <div id="contact-info-item-<?php echo $i ?>" class="contact-info-block">
            <h3 class="contact-info-name"><?php echo $smoy_contact_person->name ?></h3>
            <div class="contact-line-separator"></div>
            <?php if(!empty($smoy_contact_person->title)): ?>
                <p class="contact-info-title"><?php echo $smoy_contact_person->title ?></p>
            <?php endif; ?>
            <?php if(!empty($smoy_contact_person->phone)): ?>
                <p class="contact-info-tel"><?php echo $smoy_contact_person->phone ?></p>
            <?php endif; ?>
        </div>
    <?php $i++; endforeach; ?>
    </div>
    <div id="contact-form-container">
        <?php echo do_shortcode($contact_form_shortcode); ?>
    </div>
</div>