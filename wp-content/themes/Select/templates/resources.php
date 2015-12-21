<div class="content_inner">
    <div class="col-md-12">
      <?php the_field('page_intro'); ?>
      <h2>Resources Library</h2>
      <ul class="pressrelease">   
          <?php if( have_rows('press') ): ?>
                      <?php while( have_rows('press') ): the_row(); ?>
                          <li>
                          <h3><a href="<?php the_sub_field('press_doc'); ?>"><?php the_sub_field('press_name'); ?></a></h3>
                          <span><?php the_sub_field('press_date_details'); ?></span>
                          <a class="cta" href="<?php the_sub_field('press_doc'); ?>">Download</a>
                          </li>             
                      <?php endwhile; ?>
          <?php endif; ?>
      </ul>
  </div>
</div>

  
