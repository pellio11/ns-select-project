
<?php //if (is_front_page()) { ?>
<div id="preloader">
    <div class="loaderbar loaderbar-animate"></div>
</div>
<?php //} ?>

<div class="top_waypoint"></div>
<header class="banner nav_default" role="banner"> 
  <div class="container">  
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/select-logo.gif" /></a>
      
      <a class="cart-contents-head" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
      <span class="amount"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
      <img class="cart_default" src="<?php echo get_template_directory_uri(); ?>/dist/images/cart.gif" />
      </a>
      
      <button class="nav_search nav_search_default"><i class="fa fa-search"></i></button>
      <?php if (!is_user_logged_in()) { ?> <button class="nav_login nav_login_default"><span class="mob">Login</span><span class="full">Member Login</span></button><?php } ?>
      <?php if (is_user_logged_in()) { ?> <a href="<?php echo wp_logout_url( home_url() ); ?>" class="nav_logged_in"><span class="mob">Logout</span><span class="full">Logout</span></a><?php } ?>
      <?php if (is_user_logged_in()) { ?> <a href="<?= esc_url(home_url('/')); ?>my-select" class="my_select"><span>My SELECT</span></a><?php } ?>
      <button class="nav_toggle nav_toggle_default">
        <div class="nav-icon">
         <div></div>
       </div>  
      </button>   
      <nav class="nav_menu nav_menu_default" role="navigation">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
          endif;
          ?>
      </nav>
      <nav class="nav_full" role="navigation">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
          endif;
          ?>
      </nav>
      <div class="login_panel login_panel_default">
          <!--<span class="closelogin nav_login nav_login_default"><i class="fa fa-times"></i></span>-->
          <h3>Member Login</h3>
          <form name="loginform" id="loginform" action="<?= esc_url(home_url('/')); ?>wp-login.php" method="post">
          <label class="form_hidden">Username:</label><input type="text" name="log" id="log" value="" size="20" tabindex="1" placeholder="Username"/>
          
          <label class="form_hidden">Password:</label><input type="password" name="pwd" id="pwd" value="" size="20" tabindex="2" placeholder="Password"/>
          
          <p class="submit">
          <input type="submit" name="submit" id="submit" value="Login" tabindex="3" />
          <input type="hidden" name="redirect_to" value="wp-admin/" />
          
          </form>
          <ul>
          <li><a href="http://select.nsdesign4.net/wp-register.php">Register</a></li>
          <li><a href="http://select.org.uk/wp-login.php?action=lostpassword" title="Password Lost and Found">Lost your password?</a></li>
          </ul>
      </div>
      
      <div class="search_panel search_panel_default">
          <!--<span class="closesearch nav_search"><i class="fa fa-times"></i></span>-->
          <h3>Search Website</h3>
          <?php get_template_part('templates/searchform'); ?>
      </div>  
      </div>     
  </div>
</header>
<div class="fixed_waypoint"></div>
<div class="nav_waypoint"></div>

<?php get_template_part('templates/fixednav'); ?>