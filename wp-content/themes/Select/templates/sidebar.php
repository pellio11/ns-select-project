<?php $current = $post->ID;
$parent = $post->post_parent;
$parent_title = get_the_title($parent);
$get_grandparent = get_post($parent);
$grandparent = $get_grandparent->post_parent;
$grandparent_title = get_the_title($grandparent);
$get_greatgrandparent = get_post($grandparent);
$greatgrandparent = $get_greatgrandparent->post_parent; 
$greatgrandparent_title = get_the_title($greatgrandparent); ?>

<div class="side_foot"></div>
<div class="mobile_sub">Sub Menu<i class='fa fa-chevron-down'></i></div>

<div class="side_nav_wrap">
	
	
<!---Shop--->
<?php if( get_post_type() == 'product' ) { ?>
<h3 class="ancestor_title">
<a href="">Select Shop</a>
</h3>
<ul class="side_list primary_list">
	<?php $args = array( 'hide_empty=0', 'orderby'=>'count', 'order' =>'DESC' ); ?>
	 <?php foreach (get_terms('product_cat', $args) as $cat) : ?>
		<li>
		   <a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>">
		   <span class="rec_img_label"><?php echo $cat->name; ?></span>
		</a>
		</li>
	<?php endforeach; ?>
</ul>
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
<?php if ( is_page_template( 'template-sidebar-sub-sub.php' ) ) { ?>
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
<?php if ( is_page_template( 'template-sidebar-sub-sub-sub.php' ) ) { ?>
<a class="backlink" href="<?php echo get_permalink($greatgrandparent); ?>">
    <i class="fa fa-chevron-circle-left"></i> Back to <?php echo $greatgrandparent_title; ?>
</a>
<h3 class="ancestor_title_sec">
    <div class="inner">
    <?php echo $grandparent_title; ?>
    </div>
</h3>
<?php } ?>


<?php if ( is_page_template( 'template-sidebar-sub.php' ) || is_page_template( 'template-sidebar-sub-sub.php' )  || is_page_template( 'template-sidebar-sub-sub-sub.php' )) { ?>
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


<?php if ( is_page_template( 'template-sidebar.php' ) ) { ?>
<h3 class="ancestor_title"><a href=""><?php echo get_page(array_pop(get_post_ancestors($post->ID)))->post_title; ?></a></h3>
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


<div class="widget_select" style="background-image: url('http://localhost/ns-select-project/wp-content/themes/Select/dist/images/panel-bg.jpg');">
	<a href="#" class="inner">
		<div class="widget_type">
			<h3 class="alt white">Join Select</h3>
			<p class="white">Our role is to deliver services and schemes which will help our Members business.</p>
			<span class="white">Read More <i class="fa fa-chevron-circle-right"></i></span>
		</div>
	</a>
</div>

<a href="#" class="widget_select_alt">
	<img src="http://localhost/ns-select-project/wp-content/uploads/2015/06/ecic.jpg" alt="Join Select" />
	<h3 class="white">Benefit Spotlight</h3>
</a>


<?php dynamic_sidebar('sidebar-primary'); ?>
