<div class="content_inner">
  
  <div class="row">
    <div class="col-md-12">
      <h2>Office Bearers</h2>
    </div>
  </div>
  
      <div class="row">
        <ul class="staff">
            <?php if( have_rows('office_bearers') ): ?>
                        <?php while( have_rows('office_bearers') ): the_row(); ?>
                            <li class="col-xl-3 col-lg-3 col-md-6 col-sm-4 col-xs-6">
                            <img src="<?php the_sub_field('staff_img'); ?>" alt="<?php the_sub_field('staff_name'); ?>" />
                            <h4><?php the_sub_field('staff_name'); ?></h4>                                                  
                            </li>             
                        <?php endwhile; ?>
            <?php endif; ?>
        </ul>
      </div>  
      <div class="row">
        <div class="col-md-12">
          <h2>Staff Members</h2>
        </div>
      </div>
       <div class="row">
        <ul class="staff">
            <?php if( have_rows('staff') ): ?>
                        <?php while( have_rows('staff') ): the_row(); ?>
                            <li class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                            <img src="<?php the_sub_field('staff_img'); ?>" alt="<?php the_sub_field('staff_name'); ?>" />
                            <h4><?php the_sub_field('staff_name'); ?></h4>                                                  
                            </li>             
                        <?php endwhile; ?>
            <?php endif; ?>
        </ul>
      </div>
  </div>
</div>

  
