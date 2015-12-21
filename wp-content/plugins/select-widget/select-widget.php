<?php
/*
Plugin Name: Select Widget
Plugin URI: http://select.org.uk/
Description: Select Widget
Author: Paul Elliot
Version: 1.0
Author URI: http://nsdesign.co.uk
*/
// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');
	
	
add_action( 'widgets_init', function(){
     register_widget( 'Select_Widget' );
});	
/**
 * Adds Select_Widget widget.
 */
class Select_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Select_Widget', // Base ID
			__('Select Widget', 'text_domain'), // Name
			array( 'description' => __( 'Select Widget', 'text_domain' ), ) // Args
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
        
        ?>
        
        
        <a href="#" class="widget_select_alt">
            <img src="
            
            <?php
            if ( ! empty( $instance['image'] ) ) {
                echo $args['before_image'] . apply_filters( 'widget_image', $instance['image'] ). $args['after_image'];
            } ?>
            " alt="Join Select" />
            
            <h3 class="white">             
                <?php
                if ( ! empty( $instance['smltitle'] ) ) {
                    echo $args['before_small_title'] . apply_filters( 'widget_small_title', $instance['smltitle'] ). $args['after_small_title'];
                } ?>
            </h3>
            
        </a>
        
        <div class="widget_textbox"
                <h3 class="alt">    
                <?php
                if ( ! empty( $instance['title'] ) ) {
                    echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
                } ?>
                </h3>
                
                <p>
                    <?php
                    if ( ! empty( $instance['textbox'] ) ) {
                        echo $args['before_textbox'] . apply_filters( 'widget_textbox', $instance['textbox'] ). $args['after_textbox'];
                    } ?>  
                </p>
                
                <a href="
                    <?php
                    if ( ! empty( $instance['pagelink'] ) ) {
                        echo $args['before_pagelink'] . apply_filters( 'widget_pagelink', $instance['pagelink'] ). $args['after_pagelink'];
                    } ?>
                ">Read More</a>
                
        </div>
        
        
 
        
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
        
        
        if ( isset( $instance[ 'smltitle' ] ) ) {
			$smltitle = $instance[ 'smltitle' ];
		}
		else {
			$smltitle = __( 'New small title', 'text_domain' );
		}
        
        if ( isset( $instance[ 'textbox' ] ) ) {
			$textbox = $instance[ 'textbox' ];
		}
		else {
			$textbox = __( 'New text box', 'text_domain' );
		}
        
        if ( isset( $instance[ 'image' ] ) ) {
			$image = $instance[ 'image' ];
		}
		else {
			$image = __( 'New image', 'text_domain' );
		}
        
        if ( isset( $instance[ 'pagelink' ] ) ) {
			$pagelink = $instance[ 'pagelink' ];
		}
		else {
			$pagelink = __( 'New page link', 'text_domain' );
		}
        
        
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            
            <label for="<?php echo $this->get_field_id( 'smltitle' ); ?>"><?php _e( 'Small Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'smltitle' ); ?>" name="<?php echo $this->get_field_name( 'smltitle' ); ?>" type="text" value="<?php echo esc_attr( $smltitle ); ?>">
            
            <label for="<?php echo $this->get_field_id( 'textbox' ); ?>"><?php _e( 'Text Box:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'textbox' ); ?>" name="<?php echo $this->get_field_name( 'textbox' ); ?>" type="text" value="<?php echo esc_attr( $textbox ); ?>">
            
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image (paste absolute url of image):' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>">
		
            <label for="<?php echo $this->get_field_id( 'pagelink' ); ?>"><?php _e( 'Page Link:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'pagelink' ); ?>" name="<?php echo $this->get_field_name( 'pagelink' ); ?>" type="text" value="<?php echo esc_attr( $pagelink ); ?>">
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        
        $instance['smltitle'] = strip_tags($new_instance['smltitle']);
        
        $instance['textbox'] = strip_tags($new_instance['textbox']);
        
        $instance['image'] = strip_tags($new_instance['image']);
        
        $instance['pagelink'] = strip_tags($new_instance['pagelink']);

		return $instance;
	}
} // class Select_Widget




