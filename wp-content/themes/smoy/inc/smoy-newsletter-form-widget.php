<?php
if (!defined('ABSPATH')) exit;

class Smoy_Newsletter_Form_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
			'smoy_newsletter_form_widget',
			esc_html__( 'Newsletter Subscription Form Widget', 'smoy' ),
			array( 'description' => esc_html__( 'Tämän vimpaimen avulla määritetään uutiskirjelomake sivulle', 'smoy' ), ) 
		); 
        
    }

    function widget($args, $instance) {
        if (!isset( $args['widget_id'])) {
			$args['widget_id'] = $this->id;
		}
        
        $title = (!empty($instance['title'])) ? $instance['title'] : __( 'Tilaa uutiskirje' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$desc = (!empty( $instance['desc'])) ? $instance['desc'] : '';
        $desc = apply_filters('widget_text', $desc, $instance, $this->id_base);
        
        $form_shortcode = $instance['form_shortcode'];
        
        echo $args['before_widget'];
        
        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
		}
        ?>
        <div class="newsletter-widget-desc"><?php echo esc_html($desc); ?></div>
        <?php
        $form = '<div class="newsletter-form-container">';
        if(!empty($form_shortcode)){
           $form .= do_shortcode($form_shortcode);  
        }
        $form .= "</div>\n";
        
        echo $form;
        
        echo $args['after_widget']; 
        
        
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['desc'] = sanitize_textarea_field( $new_instance['desc'] );
        $instance['form_shortcode'] = sanitize_text_field( $new_instance['form_shortcode'] );
		return $instance;
    }

    function form($instance) {
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $desc = isset( $instance['desc'] ) ? esc_attr( $instance['desc'] ) : '';
        $form_shortcode = isset( $instance['form_shortcode'] ) ? esc_attr( $instance['form_shortcode'] ) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                Otsikko:
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
            <label for="<?php echo $this->get_field_id('desc'); ?>">
                Kuvaus:
                <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo $desc; ?></textarea>
            </label>
            <label for="<?php echo $this->get_field_id('form_shortcode'); ?>">
                Lomakkeen lyhytkoodi:
                <input class="widefat" id="<?php echo $this->get_field_id('form_shortcode'); ?>" name="<?php echo $this->get_field_name('form_shortcode'); ?>" type="text" value="<?php echo $form_shortcode; ?>" />
            </label>
        </p>
        <?php
    }

}
?>