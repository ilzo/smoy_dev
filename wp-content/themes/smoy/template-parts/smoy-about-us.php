<?php if ( !wp_is_mobile() ){ ?>
<div id="about-body-text-wrapper">
    <div id="about-heading">
        <h1 class="heading-orange"><?php echo $smoy_about_section_title ?></h1>
    </div>
    <div class="about-container">
        <?php $i = 1; for($i = 0; $i < 3; $i++):?>
            <h3 class="about-section-title"><?php echo $smoy_about_content_titles[$i] ?></h3>
            <div class="title-underline-orange"></div>
            <p><?php echo $smoy_about_content_body_texts[$i] ?></p>
        <?php endfor; ?>  
    </div>
    <div class="contact-button-container">
        <button class="contact-us-button">Ota yhteyttä.</button>
    </div>
</div>
<!--
<div id="about-quote-ball-1" class="about-quote-ball">
    <p>"Mukava ja aito ilmapiiri"</p>
</div>
-->

<div id="filler-shape-1" class="about-mask middle">
    <p>”Mukava ja aito ilmapiiri”</p>
</div>
<div id="filler-shape-2" class="about-mask middle">
    <p>”Jatkuvasti toisiamme rohkeasti haastava vuoropuhelu”</p>
</div>
<div id="filler-shape-3" class="about-mask middle">
    <p>”Innostunut ja ammattitaitoinen porukka”</p>
</div>
<div id="filler-shape-4" class="about-mask middle">
    <p>”Joustavaa ja tarkkaa työtä”</p>
</div>
<svg id="smoy-about-us-svg" width="100%" height="100%">
  <defs>
    <mask id="filter-holes">
      <rect width="100%" height="100%" fill="#b0b"/>
        <circle id="hole-1" class="overlay-hole" r="75" fill="black" transform="translate(1101, 204)"/>
        <circle id="hole-2" class="overlay-hole" r="100" fill="black" transform="translate(1258, 347)"/>
        <circle id="hole-3" class="overlay-hole" r="90" fill="black" transform="translate(1140, 527)"/>
        <circle id="hole-4" class="overlay-hole" r="75" fill="black" transform="translate(1245, 683)"/>
    </mask>
  </defs>

<rect id="about-us-overlay" width="100%" height="100%" mask="url(#filter-holes)" />
    
</svg>

<?php

} else {


}
 
?>
       
   