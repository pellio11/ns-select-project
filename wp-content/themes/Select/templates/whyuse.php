<div class="content_inner">
    <div class="col-md-12">
      <!--<h2><?php the_title(); ?></h2>-->
           
      <?php if(get_field('content_intro')) { ?>
          <p class="content_intro"><?php the_field('content_intro'); ?></p>
      <?php } ?>
      
      <?php if(get_field('content_image')) { ?>
      <img class="content_image" src="<?php the_field('content_image'); ?>" alt="<?php the_title(); ?>" />
      <?php } ?>
          
      <ul class="pressrelease">   
          <?php if( have_rows('benefits') ): ?>
                      <?php while( have_rows('benefits') ): the_row(); ?>
                          <li>
                          <?php if(get_field('benefit_icon')) { ?>
                              <img src="<?php the_field('benefit_icon'); ?>" alt="<?php the_sub_field('benefit_name'); ?>" />
                          <?php } ?>
                          <h3><?php the_sub_field('benefit_name'); ?></a></h3>                        
                          <p><?php the_sub_field('benefit_description'); ?></p>
                          </li>             
                      <?php endwhile; ?>
          <?php endif; ?>
      </ul>
  </div>
</div>

  
