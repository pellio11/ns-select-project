<div class="content_inner">
    <div class="col-md-12">
      <p class="content_intro"><?php the_field('page_intro'); ?></p>
      <h2>Current Applications</h2>
      <ul class="currentapps">   
          <?php if( have_rows('current_apps') ): ?>
                      <?php while( have_rows('current_apps') ): the_row(); ?>
                          <li>
                            <div class="closebox">
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <h3><?php the_sub_field('company_name'); ?></h3>
                            <span><?php the_sub_field('date_applied'); ?></span>
                            <p>
                                <span>Principal Representative: </span> <?php the_sub_field('principal_representative'); ?><br />
                                <span>Principal Position: </span> <?php the_sub_field('principal_position'); ?><br />
                                <span>Branch: </span> <?php the_sub_field('branch'); ?><br />
                                <span>Address 1: </span> <?php the_sub_field('address_1'); ?><br />
                                <span>Address 2: </span> <?php the_sub_field('address_2'); ?><br />
                                <span>Address 3: </span> <?php the_sub_field('address_3'); ?><br />
                                <span>Town: </span> <?php the_sub_field('town'); ?><br />
                                <span>Postcode: </span> <?php the_sub_field('postcode'); ?><br />
                            </p>
                          </li>             
                      <?php endwhile; ?>
          <?php endif; ?>
      </ul>
  </div>
    
    <div class="col-md-12">
    <h2>Comments</h2>
    <?php echo do_shortcode( '[contact-form-7 id="419" title="Comments form"]' ); ?>
    </div>
    
    
</div>

  
