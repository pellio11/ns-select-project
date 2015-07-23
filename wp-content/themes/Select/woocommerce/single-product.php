<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<div class="panel-padding-sm grey-bg-panel">
<div class="wrap container"> 
      <div class="content row">
            <div class="bread">
             <?php echo do_shortcode( '[widget id="bcn_widget-2"]' ); ?>
            </div>
      </div>
</div>
</div>

<?php get_template_part('templates/pageheader-shop'); ?>

<?php // get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		// do_action( 'woocommerce_before_main_content' );
	?>

<div class="panel-padding-md">
<div class="wrap container" role="document">
      <div class="content row">
		<div class="product_single_wrap">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		// do_action( 'woocommerce_sidebar' );
	?>

<?php // get_footer( 'shop' ); ?>


	  </div><!-- /.content -->
	</main><!-- /.main -->  
</div><!-- /.wrap -->
</div>

<div class="panel-padding-md panel-border-top">
	<div class="wrap container">
		<div class="row">
			<div class="single_related">
				<h3 class="related_header">Other products you might like...</h3>
				<div class="row">
				<?php
					/**
					 * woocommerce_after_single_product_summary hook
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15
					 * @hooked woocommerce_output_related_products - 20
					 */
					do_action( 'woocommerce_after_single_product_summary' );
				?>
				</div>
			</div>
		</div>
	</div>
</div>

