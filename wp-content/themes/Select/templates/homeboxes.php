<div class="panel-padding-lg">
<div class="wrap container" role="document">
  
    <div class="row">
      <div class="col-md-12 center-title">
              <h2><?php the_field('promo_section_title'); ?></h2>
              <p class="spacer_lg xwide"><?php the_field('promo_section_desc'); ?></p>
      </div>
    </div>
     
    <div class="row">  
        <?php if( have_rows('promo_box') ): ?>
            <?php while( have_rows('promo_box') ): the_row(); ?>
                <div class="col-md-4 col-sm-6 promo_box">
                  <h4><?php the_sub_field('promo_small_title'); ?></h4>
                  <img class="promo_img" src="<?php the_sub_field('promo_img'); ?>" alt="<?php the_sub_field('promo_title'); ?>" />
                  <div class="promo_btm">
                    <h3><?php the_sub_field('promo_title'); ?></h3>
                    <p><?php the_sub_field('promo_desc'); ?></p>
                    <a href="<?php if(get_sub_field('promo_link_url')) { ?><?php the_sub_field('promo_link_url'); ?><?php } else { ?> <?php the_sub_field('promo_link'); ?><?php } ?>">Read More</a>
                  </div>        
                </div>             
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

      
</div><!-- /.wrap -->
</div>





