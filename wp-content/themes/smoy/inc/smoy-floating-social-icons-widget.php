<?php
class Smoy_Floating_Social_Icons_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'smoy_floating_social_icons_widget',
			esc_html__( 'Floating Social Icons Widget', 'smoy' ),
			array( 'description' => esc_html__( 'Tämän vimpaimen avulla määritellään kelluvat some-ikonit sivulle', 'smoy' ), ) 
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
        $iconArr = array();
        $urlArr = array();
        $j = 1;
        for($i = 0; $i < 5; $i++) {
            $iconArr[$i] = $instance['item_icon_'.$j];
            $urlArr[$i] = $instance['item_url_'.$j];
            $j++;
        }
        ?>
        <nav id="fs-menu">
            <input type="checkbox" href="#" id="fs-menu-open" class="fs-menu-open" name="fs-menu-open" />
            <label class="fs-menu-open-button" for="fs-menu-open"><p>SMOY SOME</p></label>
            <?php $j = 5; for($i = 4; $i >= 0; $i--): 
                if(!empty($iconArr[$i]) && ( !empty($urlArr[$i]) && $urlArr[$i] !== '#')): ?>
                    <a target="_blank" href="<?php echo esc_url($instance['item_url_'.$j]) ?>" class="fs-menu-item fs-item-<?php echo $j ?>"><i class="icon-<?php echo $instance['item_icon_'.$j]?>"></i></a>
                <?php endif; ?>
            <?php $j--; endfor; ?>
        </nav>
        <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $item_icon_1 = ! empty( $instance['item_icon_1'] ) ? $instance['item_icon_1'] : '';
        $item_icon_2 = ! empty( $instance['item_icon_2'] ) ? $instance['item_icon_2'] : '';
        $item_icon_3 = ! empty( $instance['item_icon_3'] ) ? $instance['item_icon_3'] : '';
        $item_icon_4 = ! empty( $instance['item_icon_4'] ) ? $instance['item_icon_4'] : '';
        $item_icon_5 = ! empty( $instance['item_icon_5'] ) ? $instance['item_icon_5'] : '';
        $item_url_1 = ! empty( $instance['item_url_1'] ) ? $instance['item_url_1'] : '#';
        $item_url_2 = ! empty( $instance['item_url_2'] ) ? $instance['item_url_2'] : '#';
        $item_url_3 = ! empty( $instance['item_url_3'] ) ? $instance['item_url_3'] : '#';
        $item_url_4 = ! empty( $instance['item_url_4'] ) ? $instance['item_url_4'] : '#';
        $item_url_5 = ! empty( $instance['item_url_5'] ) ? $instance['item_url_5'] : '#';
        
		?>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_icon_1' ) ); ?>"><?php esc_attr_e( 'Ikoni 1', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_icon_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_icon_1' ) ); ?>" type="text" value="<?php echo esc_attr( $item_icon_1 ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_url_1' ) ); ?>"><?php esc_attr_e( 'Linkki 1', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_url_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_url_1' ) ); ?>" type="text" value="<?php echo esc_attr( $item_url_1 ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_icon_2' ) ); ?>"><?php esc_attr_e( 'Ikoni 2', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_icon_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_icon_2' ) ); ?>" type="text" value="<?php echo esc_attr( $item_icon_2 ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_url_2' ) ); ?>"><?php esc_attr_e( 'Linkki 2', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_url_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_url_2' ) ); ?>" type="text" value="<?php echo esc_attr( $item_url_2 ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_icon_3' ) ); ?>"><?php esc_attr_e( 'Ikoni 3', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_icon_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_icon_3' ) ); ?>" type="text" value="<?php echo esc_attr( $item_icon_3 ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_url_3' ) ); ?>"><?php esc_attr_e( 'Linkki 3', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_url_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_url_3' ) ); ?>" type="text" value="<?php echo esc_attr( $item_url_3 ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_icon_4' ) ); ?>"><?php esc_attr_e( 'Ikoni 4', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_icon_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_icon_4' ) ); ?>" type="text" value="<?php echo esc_attr( $item_icon_4 ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_url_4' ) ); ?>"><?php esc_attr_e( 'Linkki 4', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_url_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_url_4' ) ); ?>" type="text" value="<?php echo esc_attr( $item_url_4 ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_icon_5' ) ); ?>"><?php esc_attr_e( 'Ikoni 5', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_icon_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_icon_5' ) ); ?>" type="text" value="<?php echo esc_attr( $item_icon_5 ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'item_url_5' ) ); ?>"><?php esc_attr_e( 'Linkki 5', 'smoy' ); ?></label> 
		<input class="floating-social-form-input" id="<?php echo esc_attr( $this->get_field_id( 'item_url_5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'item_url_5' ) ); ?>" type="text" value="<?php echo esc_attr( $item_url_5 ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['item_icon_1'] = ( ! empty( $new_instance['item_icon_1'] ) ) ? strip_tags( $new_instance['item_icon_1'] ) : '';
        $instance['item_icon_2'] = ( ! empty( $new_instance['item_icon_2'] ) ) ? strip_tags( $new_instance['item_icon_2'] ) : '';
        $instance['item_icon_3'] = ( ! empty( $new_instance['item_icon_3'] ) ) ? strip_tags( $new_instance['item_icon_3'] ) : '';
        $instance['item_icon_4'] = ( ! empty( $new_instance['item_icon_4'] ) ) ? strip_tags( $new_instance['item_icon_4'] ) : '';
        $instance['item_icon_5'] = ( ! empty( $new_instance['item_icon_5'] ) ) ? strip_tags( $new_instance['item_icon_5'] ) : '';
        
        $instance['item_url_1'] = ( ! empty( $new_instance['item_url_1'] ) ) ? strip_tags( $new_instance['item_url_1'] ) : '';
        $instance['item_url_2'] = ( ! empty( $new_instance['item_url_2'] ) ) ? strip_tags( $new_instance['item_url_2'] ) : '';
        $instance['item_url_3'] = ( ! empty( $new_instance['item_url_3'] ) ) ? strip_tags( $new_instance['item_url_3'] ) : '';
        $instance['item_url_4'] = ( ! empty( $new_instance['item_url_4'] ) ) ? strip_tags( $new_instance['item_url_4'] ) : '';
        $instance['item_url_5'] = ( ! empty( $new_instance['item_url_5'] ) ) ? strip_tags( $new_instance['item_url_5'] ) : '';
        
		return $instance;
	}

} 
?>