<div class="content_inner">
  
          <!--<div class="row">
                <div class="col-md-12">
                  <h2>Staff Members</h2>
                </div>
           </div>-->
       
                  <?php if( have_rows('staff') ): ?>
                        <?php while( have_rows('staff') ): the_row(); ?>
                          <div class="row">
                            <div class="col-md-12">
                              <h2><?php the_sub_field('department_name'); ?></h2>
                            </div>
                          </div>
                          <div class="row">
                            <ul class="staff_listing">
                                <?php if( have_rows('staff_department') ): ?>
                                            <?php while( have_rows('staff_department') ): the_row(); ?>
                                                <li class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                                                <img src="<?php the_sub_field('staff_img'); ?>" alt="<?php the_sub_field('staff_name'); ?>" />
                                                <div class="details">
                                                  <p>
                                                    <?php if(get_sub_field('staff_name')){ ?><?php the_sub_field('staff_name'); ?><br /><?php } ?>
                                                     <?php if(get_sub_field('staff_job')){ ?><?php the_sub_field('staff_job'); ?><br /><?php } ?>
                                                     <?php if(get_sub_field('staff_email')){ ?><?php the_sub_field('staff_email'); ?><br /><?php } ?>
                                                     <?php if(get_sub_field('staff_phone')){ ?><?php the_sub_field('staff_phone'); ?><?php } ?>
                                                  </p>
                                                </div>                                         
                                                </li>             
                                            <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                          </div>
               <?php endwhile; ?>
            <?php endif; ?>
  


  </div>


  
