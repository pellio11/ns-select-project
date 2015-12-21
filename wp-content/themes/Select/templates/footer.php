<div class="panel-padding-lg-none grey-bg-panel">
<div class="wrap container" role="document">
  <div class="row">
  
  <footer class="content-info" role="contentinfo">
  
  <?php if ( !is_page_template( 'template-home.php' ) && !is_page_template( 'template-branches.php' ) && !is_page_template( 'template-covers.php' ) && !is_page_template( 'template-custom.php' ) && !is_page_template( 'template-contact.php' ) && !is_product()  &&  !is_page('Cart') &&  !is_page('Checkout') ) { ?>
    <div class="foot_line_wrap"><div class="foot_line"></div></div>
  <?php } ?>

    <?php // dynamic_sidebar('sidebar-footer'); ?>   
    <div class="footer-widget">
       <?php echo do_shortcode( '[widget id="text-2"]' ); ?>
    </div>
    <div class="footer-widget">
    <?php echo do_shortcode( '[widget id="nav_menu-4"]' ); ?>
    </div>
    <div class="footer-widget">
    <?php echo do_shortcode( '[widget id="nav_menu-5"]' ); ?>
    </div>
    <div class="footer-widget">
    <?php echo do_shortcode( '[widget id="nav_menu-6"]' ); ?>
    </div>
    <div class="footer-widget">
    <?php echo do_shortcode( '[widget id="text-3"]' ); ?>
    </div>
    
    <div class="footer-base">
     <div class="inner">
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
      &nbsp; | &nbsp; Website by <a href="http://www.nsdesign.co.uk">NSDesign</a>
      &nbsp; | &nbsp; <a href="<?php echo esc_url(home_url('/')); ?>terms-and-conditions">Terms and Conditions</a>
       &nbsp; | &nbsp; Scotland's trade association for the electrical contracting industry.
       <a class="brandfoot" href="<?= esc_url(home_url('/')); ?>"><img alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/select-logo-foot.gif" /></a>
      </p>
     </div>
    </div>
    

</footer>
  </div>
</div>
</div>





