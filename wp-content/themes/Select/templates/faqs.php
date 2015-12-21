<div class="content_inner">
    <div class="col-md-12">
      <h2><?php the_title(); ?></h2>
      <?php the_field('page_intro'); ?>
      <ul class="pressrelease">   
          <?php if( have_rows('faqs') ): ?>
                      <?php while( have_rows('faqs') ): the_row(); ?>
                          <li>
                          <h3><?php the_sub_field('faq_q'); ?></a></h3>                        
                          <p><?php the_sub_field('faq_a'); ?></p>
                          </li>             
                      <?php endwhile; ?>
          <?php endif; ?>
      </ul>
  </div>
</div>

  
