
<?php
$child_pages = $wpdb->get_results("SELECT *    FROM $wpdb->posts WHERE post_parent = ".$post->ID."    AND post_type = 'page' ORDER BY menu_order", 'OBJECT');    ?>
<?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
<div class="cover_panel">
  <div class="inner">
  <?php echo get_the_post_thumbnail($pageChild->ID, 'covers_img'); ?>
  <a href="<?php echo get_permalink($pageChild->ID); ?>" class="dark">
      <div class="type">
            <h3 class="white alt"><?php echo $pageChild->post_title; ?></h3>
            <!--<p class="white">Looking for an electrician? </p>-->
      </div>
      <span class="white">Read More <i class="fa fa-chevron-circle-right"></i></span>
  </a>
</div>
</div>
<?php endforeach; endif;
?>

