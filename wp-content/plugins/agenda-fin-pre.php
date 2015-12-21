<ul class="schedule">
<?php if(get_field('schedule_friday', 11 )): ?>
      <?php while(has_sub_field('schedule_friday', 11)): ?>
       <?php if(get_sub_field('financial_tick', 11)) { ?>
	    <li class="row" > 
		  <div class="col-md-12">
		  <div class="inner sch_row sch_row_session">
		  <div class="row">
		  <div class="col-md-3 col-xs-12 sch_left">
			<div class="inner">
			<span class="sch_time"><?php the_sub_field('time'); ?></span>
			<img class="sch_img" src="<?php the_sub_field('company_logo_profile_picture'); ?>" alt="<?php the_sub_field('entry_title'); ?>" />
			</div>
		  </div> 
		  <div class="col-md-6 col-xs-12 sch_mid">
			<div class="inner">
			<h3 class="sch_title"><?php the_sub_field('entry_title'); ?></h3>
			<span class="sch_person"><?php the_sub_field('personorganisation_presenting'); ?></span>
			<p><?php the_sub_field('entry_description'); ?></p>
			</div>
		  </div>
		  <div class="col-md-3 col-xs-12 sch_right" >
			<div class="inner">
			<h4>Location:</h4>
			<?php the_sub_field('location'); ?>
			</div>
		  </div>  
		  </div>
		  </div>
		  </div>  
	    </li>
	     <?php } ?>
<?php endwhile; ?>
<?php endif; ?>
</ul>





