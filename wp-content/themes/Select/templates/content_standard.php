<div class="content_inner">
    <!--<h2><?php the_title(); ?></h2>-->
    
    <?php if(get_field('content_intro')) { ?>
        <p class="content_intro"><?php the_field('content_intro'); ?></p>
    <?php } ?>
    
    <?php if(get_field('content_image')) { ?>
    <img class="content_image" src="<?php the_field('content_image'); ?>" alt="<?php the_title(); ?>" />
    <?php } ?>
    
    <?php get_template_part('templates/content', 'page'); ?>
    
    <!--Training Content-->
    <?php if (tribe_is_event_category()) { ?>
     <?php get_template_part('templates/training_extra_courses'); ?>
    <?php } ?>
</div>