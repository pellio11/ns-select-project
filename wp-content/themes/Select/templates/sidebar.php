<?php $current = $post->ID;
$parent = $post->post_parent;
$parent_title = get_the_title($parent);
$get_grandparent = get_post($parent);
$grandparent = $get_grandparent->post_parent;
$grandparent_title = get_the_title($grandparent);
$get_greatgrandparent = get_post($grandparent);
$greatgrandparent = $get_greatgrandparent->post_parent; 
$greatgrandparent_title = get_the_title($greatgrandparent); ?>

<!--<div class="side_foot"></div>-->
<div class="mobile_sub">Sub Menu<i class='fa fa-chevron-down'></i></div>

<div class="side_nav_wrap">
	
<!--News Pages--->
<?php if (is_home() || is_single() && 'tribe_events' != get_post_type() && !is_singular( 'tribe_events' )) { ?>
<?php echo do_shortcode( '[widget id="recent-posts-2"]' ); ?>
<?php echo do_shortcode( '[widget id="archives-2"]' ); ?>
<?php } ?>

<!---Training Pages and Courses--->
<?php if (is_page( 16 ) || $post->post_parent == '16' || tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' )) { ?>
<h3 class="ancestor_title"><a href="<?= esc_url(home_url('/')); ?>training">Training</a></h3>
<?php echo do_shortcode( '[widget id="nav_menu-7"]' ); ?>
<?php } ?>

<!---Members Pages--->
<!--Get the Grandparent of the page-->
<?php $current = $post->ID;
$parent = $post->post_parent;
$get_grandparent = get_post($parent);
$grandparent = $get_grandparent->post_parent;
?>

<?php if (is_page( 291 ) || $post->post_parent == '291' || $grandparent == '291') { ?>
<h3 class="ancestor_title"><a href="<?= esc_url(home_url('/')); ?>my-select">My SELECT</a></h3>
<?php echo do_shortcode( '[widget id="nav_menu-8"]' ); ?>
<?php } ?>

	
<!---Shop--->
<?php if( get_post_type() == 'product' ) { ?>
<h3 class="ancestor_title">
<a href="">Select Shop</a>
</h3>
<?php echo do_shortcode( '[widget class="side_list primary_list" id="woocommerce_product_categories-2"]' ); ?>

<!--<ul class="side_list primary_list">
	<?php $args = array( 'hide_empty=0', 'orderby'=>'count', 'order' =>'DESC' ); ?>
	 <?php foreach (get_terms('product_cat', $args) as $cat) : ?>
		<li>
		   <a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>">
		   <span class="rec_img_label"><?php echo $cat->name; ?></span>
		</a>
		</li>
	<?php endforeach; ?>
</ul>-->
<?php } ?>
	
    
<!---Subpage--->
<?php if ( is_page_template( 'template-sidebar-sub.php' ) ) { ?>
<a class="backlink" href="<?php echo get_permalink($parent); ?>">
    <i class="fa fa-chevron-circle-left"></i> Back to <?php echo $parent_title; ?>
</a>
<h3 class="ancestor_title_sec">
    <div class="inner">
    <?php the_title(); ?>
    </div>
</h3>
<?php } ?>


<!---Level 2--->
<?php if ( is_page_template( 'template-sidebar-sub-sub.php' ) ){ ?>
<a class="backlink" href="<?php echo get_permalink($grandparent); ?>">
    <i class="fa fa-chevron-circle-left"></i> Back to <?php echo $grandparent_title; ?>
</a>
<h3 class="ancestor_title_sec">
    <div class="inner">
    <?php echo $parent_title; ?>
    </div>
</h3>
<?php } ?>


<!---Level 3--->
<?php if ( is_page_template( 'template-sidebar-sub-sub-sub.php' ) || is_page_template( 'template-faqs-sidebar-sub-sub-sub.php' )) { ?>
<a class="backlink" href="<?php echo get_permalink($greatgrandparent); ?>">
    <i class="fa fa-chevron-circle-left"></i> Back to <?php echo $greatgrandparent_title; ?>
</a>
<h3 class="ancestor_title_sec">
    <div class="inner">
    <?php echo $grandparent_title; ?>
    </div>
</h3>
<?php } ?>


<?php if ( is_page_template( 'template-sidebar-sub.php' ) || is_page_template( 'template-sidebar-sub-sub.php' )  || is_page_template( 'template-sidebar-sub-sub-sub.php' ) || is_page_template( 'template-faqs-sidebar-sub-sub-sub.php' )) { ?>
<?php
if( is_page() ) {
	if( !$post->post_parent ) {
		$pagelist = '<li><a class="master_page" href="'.  get_page_link($post->ID) .'">' . $post->post_title . '</a>';
		$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&sort_column=post_date');
		if( $children ) $pagelist .= '<ul class="side_list primary_list">' . $children . '</ul>';
		$pagelist .= '</li>';
	}
	elseif( $post->ancestors ) {
		// get the top ID of this page. Page ids DESC so top level ID is the last one
		$ancestor = end($post->ancestors);
		$pagelist = wp_list_pages('title_li=&include='.$ancestor.'&echo=0&sort_column=post_date&sort_column=post_date');
		$pagelist = str_replace('</li>', '', $pagelist);
		$pagelist .= '<ul class="side_list second_list">' . wp_list_pages('title_li=&child_of='.$ancestor.'&echo=0&sort_column=post_date') .'</ul></li>';
	}
	echo $pagelist;
}
?>
<?php } ?>

 
<!--Main Sub Navigation-->
<?php if ( is_page_template( 'template-sidebar.php' ) && !is_page( 291 ) && $post->post_parent != '291' && $grandparent != '291' && !is_page( 16 ) &&  $post->post_parent != '16' || is_page_template( 'template-staff-sidebar.php' ) || is_page_template( 'template-vacancies-sidebar.php' ) || is_page_template( 'template-vacancy-sidebar.php' ) || is_page_template( 'template-press-sidebar.php' ) || is_page_template( 'template-faqs-sidebar.php' ) || is_page_template( 'template-events-sidebar.php' ) || is_page_template( 'template-eventsingle-sidebar.php' ) || is_page_template( 'template-branches.php' )  || is_page_template( 'template-whyuse-sidebar.php' ) || is_page_template( 'template-currentapps-sidebar.php' ) || is_page_template( 'template-searchcon-sidebar.php' )  ) { ?>
<h3 class="ancestor_title ancestor_main"><a href="<?= esc_url(home_url('/')); ?><?php echo get_page(array_pop(get_post_ancestors($post->ID)))->post_title; ?>"><?php echo get_page(array_pop(get_post_ancestors($post->ID)))->post_title; ?></a></h3>
<?php
if( is_page() ) {
	if( !$post->post_parent ) {
		$pagelist = '<li><a class="master_page" href="'.  get_page_link($post->ID) .'">' . $post->post_title . '</a>';
		$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&sort_column=post_date');
		if( $children ) $pagelist .= '<ul class="side_list primary_list">' . $children . '</ul>';
		$pagelist .= '</li>';
	}
	elseif( $post->ancestors ) {
		// get the top ID of this page. Page ids DESC so top level ID is the last one
		$ancestor = end($post->ancestors);
		$pagelist = wp_list_pages('title_li=&include='.$ancestor.'&echo=0&sort_column=post_date&sort_column=post_date');
		$pagelist = str_replace('</li>', '', $pagelist);
		$pagelist .= '<ul class="side_list primary_list">' . wp_list_pages('title_li=&child_of='.$ancestor.'&echo=0&sort_column=post_date') .'</ul></li>';
	}
	echo $pagelist;
}
?>
<?php } ?>
</div><!--end of side_nav_wrap-->


<?php dynamic_sidebar('sidebar-primary'); ?>
