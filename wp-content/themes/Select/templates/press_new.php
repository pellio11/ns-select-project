<div class="content_inner">
    <div class="col-md-12">
      <h2><?php the_title(); ?></h2>
      <?php the_field('page_intro'); ?>
      
      
       <?php if( have_rows('press') ): ?>
                      <?php while( have_rows('press') ): the_row(); ?>
                      <h2><?php the_sub_field('title_year'); ?></h2>
                        <ul class="pressrelease"> 
                            <?php if( have_rows('single_press_release') ): ?>
                                   <?php while( have_rows('single_press_release') ): the_row(); ?>
                                      <li>
                                      <h3><a href="<?php the_sub_field('press_doc'); ?>"><?php the_sub_field('press_name'); ?></a></h3>
                                      <span><?php the_sub_field('press_date_details'); ?></span>
                                      <a class="cta" href="<?php the_sub_field('press_doc'); ?>">Read More</a>
                                      </li>
                                  <?php endwhile; ?>
                             <?php endif; ?>
                       </ul>
                      <?php endwhile; ?>
        <?php endif; ?>
      
      
   <!--   
    <h2>Press Releases</h2>
      <ul class="pressrelease">   
          <?php if( have_rows('press') ): ?>
                      <?php while( have_rows('press') ): the_row(); ?>
                          <li>
                          <h3><a href="<?php the_sub_field('press_doc'); ?>"><?php the_sub_field('press_name'); ?></a></h3>
                          <span><?php the_sub_field('press_date_details'); ?></span>
                          <a class="cta" href="<?php the_sub_field('press_doc'); ?>">Read More</a>
                          </li>             
                      <?php endwhile; ?>
          <?php endif; ?>
      </ul>
      <h2>Campaigns</h2>
      <ul class="pressrelease"> 
          <?php if( have_rows('press') ): ?>
                      <?php while( have_rows('press') ): the_row(); ?>
                          <li>
                          <h3><a href="<?php the_sub_field('press_doc'); ?>"><?php the_sub_field('press_name'); ?></a></h3>
                          <span><?php the_sub_field('press_date_details'); ?></span>
                          <a class="cta" href="<?php the_sub_field('press_doc'); ?>">Read More</a>
                          </li>             
                      <?php endwhile; ?>
          <?php endif; ?>
      </ul>-->
   
  </div>
</div>

  
