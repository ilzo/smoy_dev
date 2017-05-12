<div id="blog-wrapper">
<?php 
$double_angle_html = '<div class="read-more-symbol">&#187</div>';    
$read_more_html = sprintf( '%s', __( 'Lue lisää ', 'smoy' ) .  $double_angle_html);
$smoy_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 2, 'order' => 'DESC', 'cat' => 2, 'ignore_sticky_posts' => true ) );
if ( $smoy_latest_loop->have_posts() ) :
    while ( $smoy_latest_loop->have_posts() ) : $smoy_latest_loop->the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            <div class="blog-panel-content">
                <div class="wrap">
                    <header class="blog-front-header">
                        <?php the_title( '<h2 class="blog-front-title">', '</h2>' ); ?>
                        <?php the_date('F Y', '<h4 class="blog-front-month">', '</h4>'); ?>
                    </header>
                    <div class="blog-front-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="blogs-more-container">
                        <?php echo '<a title="' . the_title_attribute('echo=0') . '" href="'. get_permalink($post->ID) . '" class="more-link"><p class="more-text"></p>' . __( $read_more_html, 'smoy' ) . '</a>'; ?>
                        <div class="more-link-underline"></div>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile;
endif;	
wp_reset_postdata(); ?>
</div>