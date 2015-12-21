<?php
/*
Plugin Name: Select Widget Blue
Plugin URI: http://select.org.uk/
Description: Select Widget Blue
Author: Paul Elliot
Version: 1.0
Author URI: http://nsdesign.co.uk
*/
// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');
	
	
add_action( 'widgets_init', function(){
     register_widget( 'Select_Widget_Blue' );
});	
/**
 * Adds Select_Widget_Blue widget.
 */
class Select_Widget_Blue extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Select_Widget_Blue', // Base ID
			__('Select Widget Blue', 'text_domain'), // Name
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
        
		
<div class="widget_select" style="background-image: url('http://www.select.org.uk/wp-content/themes/Select/dist/images/panel-bg.jpg');">
	<a href="
		  <?php
		  if ( ! empty( $instance['pagelink'] ) ) {
			  echo $args['before_pagelink'] . apply_filters( 'widget_pagelink', $instance['pagelink'] ). $args['after_pagelink'];
		  } ?>
	" class="inner">
		<div class="widget_type">
			<h3 class="alt white">
			   <?php
						 if ( ! empty( $instance['title'] ) ) {
							 echo apply_filters( 'widget_title', $instance['title'] );
				} ?>  
			</h3>
			<p class="white">	   
			   <?php
			   if ( ! empty( $instance['textbox'] ) ) {
				   echo $args['before_textbox'] . apply_filters( 'widget_textbox', $instance['textbox'] ). $args['after_textbox'];
			   } ?>
		    </p>
			<span class="white">Read More <i class="fa fa-chevron-circle-right"></i></span>
		</div>
	</a>
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

 
        if ( isset( $instance[ 'textbox' ] ) ) {
			$textbox = $instance[ 'textbox' ];
		}
		else {
			$textbox = __( 'New text box', 'text_domain' );
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
            
            <label for="<?php echo $this->get_field_id( 'textbox' ); ?>"><?php _e( 'Text Box:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'textbox' ); ?>" name="<?php echo $this->get_field_name( 'textbox' ); ?>" type="text" value="<?php echo esc_attr( $textbox ); ?>">

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
               
        $instance['textbox'] = strip_tags($new_instance['textbox']);
        
        $instance['pagelink'] = strip_tags($new_instance['pagelink']);

		return $instance;
	}
} // class Select_Widget_Blue




