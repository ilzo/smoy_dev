<div id="customers-wrapper">
<?php
                  
if ( !wp_is_mobile() ){
    $i = 1;
    foreach($smoy_refs_logos as $ref_logo_url):         
?>    
<figure id="customer-<?php echo $i ?>" class="customer-box">
   <!--<a class="references-img-a" href="#">-->
    <div class="customer-stretchy-wrapper">
        <div class="customer-content-wrapper">
            <div class="customer-content">
                <?php if(!empty($ref_logo_url)): ?>
                    <img src="<?php echo esc_url($ref_logo_url) ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
   <!--</a>-->
</figure>

<?php $i++; endforeach;

} else {

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
}
 
?>
       
</div>    