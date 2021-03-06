<?php
global $woocommerce;

$is_there_any_product         = false;
$is_there_any_product_to_sell = false;

ob_start();
?>


<style>
	.quantity{
		position: relative;
		top: 10px;
	}
</style>



<form action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ) ?>" class="cart" method="post" enctype='multipart/form-data'>
	<h2 class="tribe-events-tickets-title"><?php esc_html_e( 'Book places on the course', 'tribe-wootickets' ) ?></h2>

	<table width="100%" class="tribe-events-tickets">
		<?php
		foreach ( $tickets as $ticket ) {

			global $product;

			if ( class_exists( 'WC_Product_Simple' ) ) {
				$product = new WC_Product_Simple( $ticket->ID );
			} else {
				$product = new WC_Product( $ticket->ID );
			}

			$gmt_offset = get_option( 'gmt_offset' );
			$gmt_offset = ( $gmt_offset >= 0 ) ? ' +' . $gmt_offset : ' ' . $gmt_offset;
			$gmt_offset = str_replace( array( '.25', '.5', '.75' ), array( ':15', ':30', ':45' ), $gmt_offset );

			$end_date = null;
			if ( ! empty( $ticket->end_date ) ){
				$end_date = strtotime( $ticket->end_date . $gmt_offset );
			} else {
				$end_date = strtotime( tribe_get_end_date( get_the_ID(), false, 'Y-m-d G:i' ) . $gmt_offset );
			}

			$start_date = null;
			if ( ! empty( $ticket->start_date ) ) {
				$start_date = strtotime( $ticket->start_date . $gmt_offset );
			}

			if ( ( empty( $start_date ) || time() > $start_date ) && ( empty( $end_date ) || time() < $end_date ) ) {

				$is_there_any_product = true;

				echo sprintf( '<input type="hidden" name="product_id[]" value="%d">', $ticket->ID );

				echo '<tr>';
				echo '<td class="woocommerce" style="position: relative;">';

				if ( $product->is_in_stock() ) {
					// Max quantity will be left open if backorders allowed, restricted to 1 if the product is
					// constrained to be sold individually or else set to the available stock quantity
					$max_quantity = $product->backorders_allowed() ? '' : $product->get_stock_quantity();
					$max_quantity = $product->is_sold_individually() ? 1 : $max_quantity;

					woocommerce_quantity_input( array(
						'input_name'  => 'quantity_' . $ticket->ID,
						'input_value' => 0,
						'min_value'   => 0,
						'max_value'   => $max_quantity,
					) );

					$is_there_any_product_to_sell = true;
				} else {
					echo '<span class="tickets_nostock">' . esc_html__( 'Out of stock!', 'tribe-wootickets' ) . '</span>';
				}
				echo '<span style="font-size: 13px; position: relative; top: -30px; left: 70px;">Number of participants</span></td>';

				echo '<td nowrap="nowrap" class="tickets_name">';
				echo $ticket->name;
				echo '</td>';

				echo '<td class="tickets_price">';
				echo $this->get_price_html( $product );
				//echo '<a class="member_discount nav_login" href="';
				//echo esc_url(home_url('/'));
				//echo 'wp-admin';
				//echo '">Login for member discount</a>';
				
				if (!is_user_logged_in()) {  
				echo '<a class="member_discount nav_login_fixed">Login for member discount</a>';
				}
				
				echo '</td>';

				echo '<td class="tickets_description">';
				echo $ticket->description;
				echo '</td>';

				echo '</tr>';
			}
		}

		if ( $is_there_any_product_to_sell ) {
			?>
			<tr>
				<td colspan="4" class="woocommerce add-to-cart">
					
				<div class="tandc">
					<div class="tandc_checkbox"><i class="fa fa-check"></i></div> I have read and agreed to the <a target="_blank" href="<?= esc_url(home_url('/')); ?>terms-and-conditions-training">terms and conditions</a>
				</div>


					<button type="submit" name="wootickets_process" value="1"
					        class="button alt add_tandc"><?php esc_html_e( 'Add to cart', 'tribe-wootickets' );?></button>
				</td>
			</tr>
			<?php
		} ?>
	</table>
</form>

<?php
$content = ob_get_clean();
if ( $is_there_any_product ) {
	echo $content;
}