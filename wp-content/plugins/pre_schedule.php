<!--<div class="page-header page-header-small">     
<h2>Friday</h2>
</div>-->


<h1>360D Schedule</h1>
<p class="p-lg">
<?php the_field('page_introduction'); ?>
</p>


<ul class="schedule">
<?php if(get_field('schedule_friday')): ?>
      <?php while(has_sub_field('schedule_friday')): ?>
      
 
      <?php if(get_sub_field('session_link_boxes', 11)) { ?>
      <li class="row"> 
		  <div class="col-md-12">
		  
		  <div class="row"> 
		  <div class="col-md-3 col-xs-12 sch_left"></div>		
		  <div style="-webkit-box-shadow:inset 0 5px 0 0 #ebebeb; box-shadow:inset 0 5px 0 0 #ebebeb; height: 20px;"></div>
		  </div>
			
		  <span class="sch_time"><?php the_sub_field('time'); ?></span>
		  <h3 class="sch_title"><?php the_sub_field('entry_title'); ?></h3> 
		  <?php get_template_part('templates/studiolinks-sched'); ?>
		  </div>
      </li>

 
      <?php } else if(get_sub_field('home_tick', 11)) { ?>
 
	    <li class="row"> 
		  <div class="col-md-12">
		  <div class="inner sch_row">
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





