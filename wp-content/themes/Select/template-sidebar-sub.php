<?php
/**
 * Template Name: Sidebar Template Sub
 */
?>
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

<div class="wrap container" role="document">
      <div class="content row">   
         <aside class="sidebar" role="complementary">
             <?php get_template_part('templates/sidebar'); ?>
          </aside><!-- /.sidebar -->              
         <main class="main" role="main">
            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('templates/content', 'page'); ?>
            <?php endwhile; ?>
         </main><!-- /.main -->     
    </div><!-- /.content -->
</div><!-- /.wrap -->
