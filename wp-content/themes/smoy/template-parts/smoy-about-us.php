<div id="about-body-text-wrapper">
    <div id="about-heading">
        <h1 id="about-main-title" class="heading-orange"><?php echo $smoy_about_section_title ?></h1>
    </div>
    <div class="about-container">
        <?php /*$i = 1;*/ for($i = 0; $i < 3; $i++):?>
            <h3 class="about-section-title"><?php echo $smoy_about_content_titles[$i] ?></h3>
            <div class="title-underline-orange"></div>
            <p><?php echo $smoy_about_content_body_texts[$i] ?></p>
        <?php endfor; ?>  
    </div>
    <div class="contact-button-container">
        <?php if(is_home()): ?>
            <button id="about-us-contact" class="contact-us-button">Ota yhteyttä.</button>
        <?php else: ?>
            <button id="about-us-contact" class="contact-us-button">Contact us.</button>
        <?php endif; ?>
    </div>
</div>

<?php $j = 1; for($i = 0; $i < 4; $i++):?>
<div id="filler-shape-<?php echo $j ?>" class="about-mask middle">
    <p>”<?php echo $smoy_about_quote_ball_body_texts[$i] ?>”</p>
</div>
<?php $j++; endfor; ?>
<svg id="smoy-about-us-svg" width="100%" height="100%">
  <defs>
    <mask id="filter-holes">
      <rect width="100%" height="100%" fill="#b0b"/>
      <?php $j = 1; for($i = 0; $i < 4; $i++):?> 
        <circle id="hole-<?php echo $j ?>" class="overlay-hole" r="<?php echo $smoy_about_radius_array[$i]?>" fill="black" transform="translate(<?php echo $overlay_hole_middle_translate_positions[$i][0] ?>, <?php echo $overlay_hole_middle_translate_positions[$i][1]?>)"/>
      <?php $j++; endfor; ?>  
    </mask>
  </defs>
<rect id="about-us-overlay" width="100%" height="100%" mask="url(#filter-holes)" />
</svg>
