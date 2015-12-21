<div class="content_inner">
    <div class="col-md-12">
      <h2><?php the_title(); ?></h2>
<?php the_field('vacancy_intro'); ?>
<ul class="listings">   
    <?php if( have_rows('vacancies') ): ?>
                <?php while( have_rows('vacancies') ): the_row(); ?>
                    <li>
                    <h3><a href="<?php the_sub_field('link_to_more_information'); ?>"><?php the_sub_field('job_title'); ?></a></h3>
                    <span><?php the_sub_field('job_details_summary'); ?></span>
                    <p><?php the_sub_field('short_description'); ?></p>
                    <a class="cta" href="<?php the_sub_field('link_to_more_information'); ?>">Read More</a>
                    </li>             
                <?php endwhile; ?>
    <?php endif; ?>
</ul>
  </div>
</div>

  
