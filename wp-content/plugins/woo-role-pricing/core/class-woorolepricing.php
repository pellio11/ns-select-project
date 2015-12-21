<?php
/**
 * class-woorolepricing.php
 *
 * Copyright (c) Antonio Blanco http://www.blancoleon.com
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author Antonio Blanco
 * @package woorolepricing
 * @since woorolepricing 1.0.0
 */

/**
 * WooRolePricing class
 */
class WooRolePricing {

	public static function init() {
	
		add_filter('woocommerce_get_price', array( __CLASS__, 'woocommerce_get_price' ), 10, 2);
		
		add_action('woocommerce_product_write_panel_tabs', array(__CLASS__,'woocommerce_product_write_panel_tabs') );
		add_action('woocommerce_product_write_panels', array(__CLASS__,'woocommerce_product_write_panels') );
		add_action('woocommerce_process_product_meta', array(__CLASS__,'woocommerce_process_product_meta') );
		
	}
	
	public static function woocommerce_get_price ( $price, $product ) {
		global $post, $woocommerce;

		$baseprice = $price;
		$result = $baseprice;
		
		if ( ($post == null) || !is_admin() ) {
		
			if ( $product->is_type( 'variation' ) ) {
				$commission = WRP_Variations_Admin::get_commission( $product, $product->variation_id );
			} else {
				$commission = self::get_commission( $product );
			}
			
			if ( $commission ) {
				
				$baseprice = $product->get_regular_price();
				
				if ( $product->get_sale_price() != $product->get_regular_price() && $product->get_sale_price() == $product->price ) {
					if ( get_option( "wrp-baseprice", "regular" )=="sale" ) {
						$baseprice = $product->get_sale_price();
					}
				}
				$product_price = $baseprice;
				
				$type = get_option( "wrp-method", "rate" );
				$result = 0;
				if ($type == "rate") {
					// if rate and price includes taxes
					if ( $product->is_taxable() && get_option('woocommerce_prices_include_tax') == 'yes' ) {
						$_tax       = new WC_Tax();
						$tax_rates  = $_tax->get_shop_base_rate( $product->tax_class );
						$taxes      = $_tax->calc_tax( $baseprice, $tax_rates, true );
						$product_price      = $_tax->round( $baseprice - array_sum( $taxes ) );
					}

					$result = self::bcmul($product_price, $commission, WOO_ROLE_PRICING_DECIMALS);
					
					if ( $product->is_taxable() && get_option('woocommerce_prices_include_tax') == 'yes' ) {
						$_tax       = new WC_Tax();
						$tax_rates  = $_tax->get_shop_base_rate( $product->tax_class );
						$taxes      = $_tax->calc_tax( $result, $tax_rates, false ); // important false
						$result      = $_tax->round( $result + array_sum( $taxes ) );
					}
				} else {
					$result = self::bcsub($product_price, $commission, WOO_ROLE_PRICING_DECIMALS);
				}
			}
		}
		return $result;
	}
	
	public static function woocommerce_product_write_panel_tabs() {
	
		echo '<li class="role_pricing_tab general_options"><a href="#role_pricing_data">' . __( 'Role Pricing', WOO_ROLE_PRICING_DOMAIN ) . '</a></li>';
	
	}
	
	public static function woocommerce_product_write_panels() {
		global $post;
		global $wp_roles;
		
		if ( class_exists( 'WP_Roles' ) ) {
			if ( ! isset( $wp_roles ) ) {
				$wp_roles = new WP_Roles();
			}
		}
		
		$pricing_options = array();
		foreach ( $wp_roles->role_objects as $role ) {
			$pricing_options['value_' . $role->name] = get_post_meta($post->ID, 'role_pricing_value_' . $role->name, true);
		}
		?>
		<div id="role_pricing_data" class="panel woocommerce_options_panel">
			<div class="options_role">
				<p class="description">
					<?php echo __( 'Leave empty if no custom role discount should be applied to this product (default setting).', WOO_ROLE_PRICING_DOMAIN ); ?>
				</p>
			</div>
			
			<div class="options_role custom_tab_options">
				<?php 
				foreach ( $wp_roles->role_objects as $role ) {
				?>
				<p class="form-field">
					<label><?php echo ucwords($role->name); ?>:</label>
					<input type="text" class="short" name="role_pricing_value_<?php echo $role->name;?>" value="<?php echo @$pricing_options['value_' . $role->name]; ?>" />
				</p>
				<?php 
				}
				?>
	        </div>	
		</div>
	<?php
		
	}

	public static function woocommerce_process_product_meta( $post_id ) {
		global $wp_roles;

		if ( class_exists( 'WP_Roles' ) ) {
			if ( ! isset( $wp_roles ) ) {
				$wp_roles = new WP_Roles();
			}
		}
		foreach ( $wp_roles->role_objects as $role ) {
			update_post_meta( $post_id, 'role_pricing_value_' . $role->name, ( isset($_POST['role_pricing_value_' . $role->name]) && ( $_POST['role_pricing_value_' . $role->name] !== "" ) ) ? trim($_POST['role_pricing_value_' . $role->name]) : '' );
		}
	}
	
	// extra functions
	
	public static function get_commission ( $product ) {
		global $post, $woocommerce;
	
		
		$user = wp_get_current_user();
		$user_roles = $user->roles;
		$user_role = array_shift($user_roles);
		
		$discount = 0;
		
		if ( $user_role !== null ) {
			// Product - custom discount ...
			$custom = get_post_meta( $product->id, 'role_pricing_value_' . $user_role, true);
			
			// Category - custom discount ....
			if ( $custom !== "" ) {
				$discount = $custom;
			} else {
				$categories = wp_get_post_terms( $product->id, 'product_cat',array('fields'=>'ids') );
				if ( sizeof( $categories ) > 0 ) {
					$max_cat_id = null;
					$max_cat_discount = 0;
					foreach ( $categories as $cat_id ) {
						$cat_discount = get_woocommerce_term_meta($cat_id, 'role_pricing_value_' . $user_role, true);
						if ( $cat_discount !== "" ) {
							if ( $cat_discount > $max_cat_discount ) {
								$max_cat_discount = $cat_discount;
								$max_cat_id = $cat_id;
							}
						}
					}
					if ( $max_cat_id !== null ) {
						$custom = $max_cat_discount;
					}
				}
			}
			
			// general discount ....
			if ( $custom !== "" ) {
				$discount = $custom;
			} else {
				if ( get_option( "wrp-" . $user_role, "-1" ) !== "-1" ) {
					$discount = get_option( "wrp-" . $user_role );
				}
			}
		}
		if ( $discount ) {
			$method = get_option( "wrp-method", "rate" );
			if ( $method == "rate" ) {
				$discount = self::bcsub ( 1, $discount, WOO_ROLE_PRICING_DECIMALS );
				// for security reasons, set 0
				if ( $discount < 0 ) {
					$discount = 0;
				}
			}
		}
	
		return $discount;
		
	}
	
	public static function bcmul( $data1, $data2, $prec = 0 ) {
		$result = 0;
		if ( function_exists('bcmul') ) {
			$result = bcmul( $data1, $data2, $prec );
		} else {
			$value = $data1 * $data2;
			if ($prec) {
				$result = round($value, $prec);
			}
		}
		return $result;
	}
	
	public static function bcsub( $data1, $data2, $prec = 0 ) {
		$result = 0;
		if ( function_exists('bcsub') ) {
			$result = bcsub( $data1, $data2, $prec );
		} else {
			$value = $data1 - $data2;
			if ($prec) {
				$result = round($value, $prec);
			}
		}
		return $result;
	}
	
}
WooRolePricing::init();
