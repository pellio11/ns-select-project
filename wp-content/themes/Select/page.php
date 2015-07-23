<div class="wrap container" role="document">
      <div class="content row">
         <main class="main" role="main">
            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('templates/page', 'header'); ?>
              <?php get_template_part('templates/content', 'page'); ?>
            <?php endwhile; ?>
        
         </main><!-- /.main -->
    </div><!-- /.content -->
</div><!-- /.wrap -->
