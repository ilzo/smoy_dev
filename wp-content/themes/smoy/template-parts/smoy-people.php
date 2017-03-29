<div id="staff-wrapper">
<?php
                  
//if ( !wp_is_mobile() ){ 
    $i = 1;
    foreach($pplArray as $smoy_person):
    
    
    if(!is_object($smoy_person)):
    
?> 
    <figure id="person-<?php echo $i ?>" class="person-box">
        <div class="person-stretchy-wrapper">
            <div class="person-content-wrapper">
            </div>
        </div>
    </figure>
    
<?php
   
    else:
    
    
    ?>

<figure id="person-<?php echo $i ?>" class="person-box">
   <!--<a class="references-img-a" href="#">-->
    <div class="person-stretchy-wrapper">
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
                    <p><?php echo $smoy_person->name ?></p>
                    <p><?php echo $smoy_person->title ?></p>
                    <?php if(!empty($smoy_person->phone)): ?>
                        <p><?php echo $smoy_person->phone ?></p>
                    <?php endif; ?>
                </div>
            
            <?php endif; ?>
        </div>
    </div>
   <!--</a>-->
</figure>

<?php  
    
endif;
    
$i++;
    
endforeach;

//} else {

/* Stuff for mobile devices goes here */

/*
    if ( $smoy_refs_latest_loop->have_posts() ) :

        while ( $smoy_refs_latest_loop->have_posts() ) : $smoy_refs_latest_loop->the_post();

            $i++;

            echo '<div id="references-item-'.$i.'" class="references-item">';

                echo '<a class="works-img-a" href="'.get_permalink().'" title="'.get_the_title().'">';

                    if ( has_post_thumbnail() ) :
                        //the_post_thumbnail();

                        $attr = array(
                            'id' => get_the_ID()
                        );

                        the_post_thumbnail( 'references-thumbnail', $attr );

                        echo '<div id="content-mobile-'.$i.'" class="references-content-mobile">';

                            the_title();

                            if ( has_excerpt(get_the_ID()) ) {
                                the_excerpt();
                            }

                        echo '</div>';

                    else:

                        echo '<img src="'.esc_url( get_template_directory_uri() ).'/images/latestposts_default.png" width="500" height="326"  alt="'.get_the_title().'" />';
                        echo '<div id="content-mobile-'.$i.'" class="references-content-mobile" >';

                            //the_title();
                            the_title();

                            if ( has_excerpt(get_the_ID()) ) {
                                the_excerpt();
                            }

                        echo '</div><!-- .references-content-mobile" -->';


                    endif; 
                echo '</a>';

            echo '</div><!-- .references-item" -->';

        endwhile;
    endif;

*/
//}
 
?>
       
</div>