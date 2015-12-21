<div class="content_inner">
    <div class="col-md-12 single_vacancy">
      <h2><?php the_title(); ?></h2>
      <span><?php the_field('job_details'); ?></span>
    <?php if(get_field('event_image')) { ?>
    <img class="content_image" src="<?php the_field('event_image'); ?>" alt="<?php the_title(); ?>" />
    <?php } ?>
       <?php the_field('full_details'); ?>
  </div>
</div>

  
