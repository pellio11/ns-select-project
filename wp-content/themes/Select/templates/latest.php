<div class="panel-padding-lg blue-bg-panel">
<div class="wrap container" role="document">
    <!--<div class="row">
          <div class="col-md-12 center-title">
            <h2 class="white">Latest from SELECT</h2>
          </div>
    </div>-->
    <div class="row">
          <div class="col-md-4">
            <div class="line_white"><h3 class="white alt line_white_inner">News</h3></div>
            <ul class="feed_ul">
              <?php $args = array('post_type'=>'post', 'orderby' =>'date', 'order' =>'DESC', 'posts_per_page' => 5);
                    // The Query
                    $the_query = new WP_Query( $args );
                    // The Loop
                    while ( $the_query->have_posts() ) :$the_query->the_post(); ?>
                    <li>
                      <article>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?><span><?php get_template_part('templates/entry-meta'); ?></span></a>
                      </article>
                    </li>
                    <?php endwhile;?>
                          <!--Restore original Query & Post Data-->
                          <?php
                          wp_reset_query();
                          wp_reset_postdata();
                    ?>
            </ul>
          </div>
           
          <div class="col-md-4">
            <div class="line_white"><h3 class="white alt line_white_inner">Training</h3></div>
          
          <ul class="feed_ul">
           <?php $args = array('post_type'=>'tribe_events', 'orderby' =>'EventStartDate', 'order' =>'ASC', 'posts_per_page' => 5);
                    // The Query
                    $the_query = new WP_Query( $args );
                    // The Loop
                    while ( $the_query->have_posts() ) :$the_query->the_post(); ?>
                    <li>
                      <article>
                        <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                        <span class="meta eventdate"><?php echo tribe_get_start_date( $post->ID, false, 'j M' ); ?> </span>
                        </a>
                      </article>
                    </li>
                    <?php endwhile;?>
                    <!--Restore original Query & Post Data-->
                    <?php
                    wp_reset_query();
                    wp_reset_postdata();
                    ?> 
           </ul>
          </div>
           
          <div class="col-md-4">
            <div class="line_white"><h3 class="white alt line_white_inner">Twitter</h3></div>
             <?php echo do_shortcode( '[widget id="twitter-3"]' ); ?>
          </div> 
           
    </div>
      
</div><!-- /.wrap -->
</div>





