<div class="panel-padding-sm grey-bg-panel">
<div class="wrap container"> 
      <div class="content row">
            <div class="bread">
             <?php echo do_shortcode( '[widget id="bcn_widget-2"]' ); ?>
            </div>
      </div>
</div>
</div>

<?php get_template_part('templates/pageheader-default'); ?>

<?php if (is_cart() || is_checkout()) { ?>
<div class="panel-padding-sm">
<?php } ?>

<div class="wrap container" role="document">
      <div class="content row">
      <?php if (is_cart() || is_checkout()) { ?>
      <?php } else { ?> 
         <aside class="sidebar" role="complementary">
             <?php get_template_part('templates/sidebar'); ?>
          </aside><!-- /.sidebar -->
       <?php } ?>     
         <main class="main" role="main">
            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('templates/content_standard'); ?>
            <?php endwhile; ?>
         </main><!-- /.main -->     
    </div><!-- /.content -->
</div><!-- /.wrap -->

<?php if (is_cart() || is_checkout()) { ?>
</div>
<?php } ?> 


