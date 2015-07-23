<div class="panel-padding-md blue-bg-panel pagehead-default">
<div class="wrap container" role="document">
    <div class="row">
          <div class="col-md-12 center-title">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('templates/page', 'header'); ?>
            <?php endwhile; ?>
          </div>
  </div>
  </div>
</div>