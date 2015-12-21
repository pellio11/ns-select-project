<div class="content_inner">
    <div class="col-md-12"><h2>Training Categories</h2>
    <?php if(get_field('section_intro')) { ?>
        <p class="section_intro_content"><?php the_field('section_intro'); ?></p>
    <?php } ?>
    </div> 
    <?php if( have_rows('training_cats') ): ?>
        <?php while( have_rows('training_cats') ): the_row(); ?>       
            <div class="cover_panel cover_panel_content">
              <div class="inner">
              <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>" />
              <a href="<?= esc_url(home_url('/')); ?>/<?php the_sub_field('link'); ?>" class="dark">
                  <div class="type">
                        <h3 class="white alt"><?php the_sub_field('title'); ?></h3>
                        <!--<p class="white">Looking for an electrician? </p>-->
                  </div>
                  <span class="white">Read More <i class="fa fa-chevron-circle-right"></i></span>
              </a>
            </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <div class="col-md-12">
    <?php get_template_part('templates/content', 'page'); ?>
    
    <!--<div class="other_courses"><h2>Other courses</h2>
    <p><?php the_field('extra_courses_intro', 16); ?></p>
    <ul>
    <?php if( have_rows('extra_courses', 16) ): ?>
                <?php while( have_rows('extra_courses', 16) ): the_row(); ?>
                    <li>
                    <h3><?php the_sub_field('course_title', 16); ?></h3>
                    <p><?php the_sub_field('course_description', 16); ?></p>
                    </li>             
                <?php endwhile; ?>
    <?php endif; ?>
    </ul>
    </div>-->
    
    <br /><br />
    </div>
    
    
</div>