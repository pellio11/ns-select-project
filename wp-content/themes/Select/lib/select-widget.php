<?php

use WP_Widget;
class tis_sidebar_box extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function tis_sidebar_box() {
        parent::WP_Widget(false, $name = 'CHQ Sidebar Box');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */      /*Paul - this sets up each option in the widget (but does not create the user form) and then displays them in the actual webpage. */
    function widget($args, $instance) {	
        extract( $args );
	$smltitle 	= apply_filters('widget_smltitle', $instance['smltitle']);   //title
        $title 		= apply_filters('widget_title', $instance['title']);   //title
	$shorttext 	= apply_filters('widget_shorttext', $instance['shorttext']);   //title
        $widimage 		= apply_filters('widget_widimage', $instance['widimage']);  //widimage
        $link 		= apply_filters('widget_link ', $instance['link']);  //link
	$linktext 	= apply_filters('widget_linktext', $instance['linktext']);   //title
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
						
                                                                        
<div class="row">
  <a target="_blank" href="<?php if ( $link  ) echo $link ; ?>" class="col-xs-6 col-sm-6 col-md-12 side-box">
    <div class="side-box-case side-box-bg side-border-orange" style="background: url(<?php if ( $widimage ) echo $widimage; ?>) no-repeat center;">
     <div class="side-box-darken side-box-inner">   
        <h5><?php if ( $smltitle ) echo $smltitle; ?></h5> 
        <h3><?php if ( $title ) echo $title; ?></h3>
        <p><?php if ( $shorttext ) echo $shorttext; ?></p>
        <span class="side-box-link"><?php if ( $linktext ) echo $linktext; ?> <i class="fa fa-arrow-circle-right"></i></span>
     </div>
    </div>
  </a>
</div>





                                                                                                
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
        

    //Strip tags from title and name to remove HTML     //Paul - Each option from above gets a line here to update the option and strip tags. They are all variables within the array called $instance.
		$instance['smltitle'] = strip_tags($new_instance['smltitle']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['shorttext'] = strip_tags($new_instance['shorttext']);
        $instance['widimage'] = strip_tags( $new_instance['widimage'] );
        $instance['link'] = strip_tags( $new_instance['link'] );
	$instance['linktext'] = strip_tags($new_instance['linktext']);
        return $instance; 
    }
 
    /** @see WP_Widget::form -- do not rename this */   //Paul - A different p tag for each input in user form in the widget. This allows them to input the options. Also need to add a line per option with esc_attr.
    function form($instance) {	
        $smltitle 		= esc_attr($instance['smltitle']);
	$title 		= esc_attr($instance['title']);
	$shorttext 	= esc_attr($instance['shorttext']);
        $widimage 		= esc_attr($instance['widimage']);
        $link 		= esc_attr($instance['link']);
	$linktext 		= esc_attr($instance['linktext']);
        ?>
         
	 <p>
          <label for="<?php echo $this->get_field_id('smltitle'); ?>"><?php _e('Small Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('smltitle'); ?>" name="<?php echo $this->get_field_name('smltitle'); ?>" type="text" value="<?php echo $smltitle; ?>" />
         </p>
	     
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
         </p>
	 
	 <p>
          <label for="<?php echo $this->get_field_id('shorttext'); ?>"><?php _e('Short Text:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('shorttext'); ?>" name="<?php echo $this->get_field_name('shorttext'); ?>" type="text" value="<?php echo $shorttext; ?>" />
         </p>
         
        
        <p>
          <label for="<?php echo $this->get_field_id('widimage'); ?>"><?php _e('Image URL:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('widimage'); ?>" name="<?php echo $this->get_field_name('widimage'); ?>" type="text" value="<?php echo $widimage; ?>" />
         </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link URL:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
         </p>
	
	 <p>
          <label for="<?php echo $this->get_field_id('linktext'); ?>"><?php _e('Link Text:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('linktext'); ?>" name="<?php echo $this->get_field_name('linktext'); ?>" type="text" value="<?php echo $linktext; ?>" />
         </p>
         
         



        <?php 
    }
    
   
} // end class news_widget
add_action('widgets_init', create_function('', 'return register_widget("tis_sidebar_box");'));















