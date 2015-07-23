<?php
/**
 * Template Name: Cover Template
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

<?php // get_template_part('templates/pageheader-default'); ?>
<div class="panel-padding-lg">
 <div class="wrap container">
    <div class="row">
      <div class="col-md-12 center-title">
              <h1 class="scalable_h1"><?php the_title(); ?></h1>
              <p class="spacer_lg xwide"><?php the_field('section_intro'); ?></p>
      </div>
    </div>
 </div>

<div class="wrap container" role="document">
      <div class="content row">
            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('templates/covers'); ?>
            <?php endwhile; ?>
    </div><!-- /.content -->
</div><!-- /.wrap -->
</div>
