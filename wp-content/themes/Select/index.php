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
            <div class="content_inner">
              <h2>Latest from SELECT</h2>
              <?php if (!have_posts()) : ?>
                <div class="alert alert-warning">
                  <?php _e('Sorry, no results were found.', 'sage'); ?>
                </div>
                <?php get_search_form(); ?>
              <?php endif; ?>
              
              <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
              <?php endwhile; ?>
              
              <?php the_posts_navigation(); ?>
          </div>
         </main><!-- /.main -->     
    </div><!-- /.content -->
</div><!-- /.wrap -->
