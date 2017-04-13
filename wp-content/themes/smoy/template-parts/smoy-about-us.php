<?php
                  
if ( !wp_is_mobile() ){
             
?>

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
<!--
<div id="about-quote-ball-1" class="about-quote-ball">
    <p>"Mukava ja aito ilmapiiri"</p>
</div>
-->

<div id="test-shape-1">
    <p>”Mukava ja aito ilmapiiri”</p>
</div>
<div id="test-shape-2">
    <p>”Jatkuvasti toisiamme rohkeasti haastava vuoropuhelu”</p>
</div>
<div id="test-shape-3">
    <p>”Innostunut ja ammattitaitoinen porukka”</p>
</div>
<div id="test-shape-4">
    <p>”Joustavaa ja tarkkaa työtä”</p>
</div>
<svg id="mySVG" width="100%" height="100%">
  <defs>
    <mask id="hole">
      <rect width="100%" height="100%" fill="#b0b"/>
      <circle id="circle1" r="75" fill="black" transform="translate(1101, 304)"/>
      <circle id="circle2" r="100" fill="black" transform="translate(1258, 447)"/>
      <circle id="circle3" r="90" fill="black" transform="translate(1140, 627)"/>
    <circle id="circle4" r="75" fill="black" transform="translate(1245, 783)"/>
    </mask>
  </defs>

<rect id="about-us-overlay" width="100%" height="100%" mask="url(#hole)" />
    
</svg>
    
  
<?php

} else {


}
 
?>
       
   