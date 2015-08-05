<?php use Roots\Sage\Titles; ?>
<div class="page-header"> 
  <?php if ( tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' )  ) { ?>
  <h1>Training</h1>
  <?php } else {?>
  <h1><?= Titles\title(); ?></h1>
  <?php } ?> 
</div>
