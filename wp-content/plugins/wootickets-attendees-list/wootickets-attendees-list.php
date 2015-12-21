<?php
/*
Plugin Name: WooTickets Attendees List
Plugin URI: http://buzzwebmedia.com.au/
Description: Inserts appropriate number of fields for event attendee names and emails in Woocommerce checkout page and saves it as meta in order details. WooCommerce & WooTickets plugin are required.
Author: Dominic Tan
Author URI: http://buzzwebmedia.com.au/
Version: Beta 0.1
Text Domain: wootickets-attendees-list

Copyright: © 2013 Dominic Tan
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * Check if WooCommerce & WooTickets are active
 **/
if (	
		in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && 
		in_array( 'wootickets/wootickets.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )
	) {
	/**
	 * Add the field to the checkout
	 **/
	add_action('woocommerce_after_order_notes', 'wt_attendee_details');
	function wt_attendee_details( $checkout ) {

		$attendee_count = wt_count_attendees();
		
		if($attendee_count > 0) {
			echo "</div></div>"; //close the Billing Address section to create new group of fields
			echo "<div id='attendee_details'><div>"; //automatically be closed from 2 Billing Address's div - </div></div>
			echo '<h3>'.__('Participants').'</h3>';
			for($n = 1; $n <= $attendee_count; $n++ ) {
				woocommerce_form_field( 'attendee_name_'.$n, array(
					'type'          => 'text',
					'class'         => array('form-row form-row-first'),
					'label'         => __('Name'),
					'placeholder'   => __(''),
					'required'		=> true,
				), $checkout->get_value( 'attendee_name_'.$n ));
				woocommerce_form_field( 'attendee_email_'.$n, array(
					'type'          => 'text',
					'class'         => array('form-row form-row-last validate-email'),
					'label'         => __('NI Number'),
					'placeholder'       => __(''),
					'required'		=> false,
				), $checkout->get_value( 'attendee_email_'.$n ));
			}
		}
		//echo "Attendees: " . $attendee_count;
	}
	
	/**
	 * Process the checkout
	 **/
	add_action('woocommerce_checkout_process', 'wt_attendee_fields_process');

	function wt_attendee_fields_process() {
		global $woocommerce;
		$attendee_count = wt_count_attendees();
		
		for($n = 1; $n <= $attendee_count; $n++ ) {
			if (!$_POST['attendee_email_'.$n] || !$_POST['attendee_name_'.$n])
				$error = true;
				break;
		}
		if($error) {
			$woocommerce->add_error( __('Please complete the attendee details.') );
		}

	}
	
	/**
	 * Update the order meta with field value
	 **/
	add_action('woocommerce_checkout_update_order_meta', 'wt_attendee_update_order_meta');

	function wt_attendee_update_order_meta( $order_id ) {
		
		$attendee_count = wt_count_attendees();
		for($n = 1; $n <= $attendee_count; $n++ ) {
			if ($_POST['attendee_name_'.$n]) update_post_meta( $order_id, 'Attendee Name '.$n, esc_attr($_POST['attendee_name_'.$n]));
			if ($_POST['attendee_email_'.$n]) update_post_meta( $order_id, 'Attendee NI '.$n, esc_attr($_POST['attendee_email_'.$n]));
		}
		
	}
	
	function wt_count_attendees() {
		
		global $woocommerce;
		$attendee_count = 0;
		
		if (sizeof($woocommerce->cart->get_cart())>0) :
			foreach ($woocommerce->cart->get_cart() as $item_id => $values) :
				$_product = $values['data'];
				if ($_product->exists() && $values['quantity']>0) :
				    				 
					if (get_post_meta($_product->id, '_tribe_wooticket_for_event', true) > 0)
					//if (get_post_meta($_product->id, '_tribe_wooticket_for_event') > 0)
					
						$attendee_count += $values['quantity'];
				endif;
			endforeach;
		endif;
		
		return $attendee_count;
		
	}
}
	
?>