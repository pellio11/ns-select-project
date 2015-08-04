<header class="banner" role="banner"> 
  <div class="container">  
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/select-logo.gif" /></a>
      <button class="nav_search"><i class="fa fa-search"></i></button>
      <?php if (!is_user_logged_in()) { ?> <button class="nav_login"><span class="mob">Login</span><span class="full">Member Login</span></button><?php } ?>
      <?php if (is_user_logged_in()) { ?> <a href="<?php echo wp_logout_url( home_url() ); ?>" class="nav_logged_in"><span class="mob">Logout</span><span class="full">Logout</span></a><?php } ?>
      <?php if (is_user_logged_in()) { ?> <a href="<?= esc_url(home_url('/')); ?>my-select" class="my_select"><span>My Select</span></a><?php } ?>
      <button class="nav_toggle">
        <div class="nav-icon">
         <div></div>
       </div>  
      </button>   
      <nav class="nav_menu" role="navigation">
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
      <div class="login_panel">
          <h3>Member Login</h3>
          <form name="loginform" id="loginform" action="http://localhost/ns-select-project/wp-login.php" method="post">
          <label class="form_hidden">Username:</label><input type="text" name="log" id="log" value="" size="20" tabindex="1" placeholder="Username"/>
          
          <label class="form_hidden">Password:</label><input type="password" name="pwd" id="pwd" value="" size="20" tabindex="2" placeholder="Password"/>
          
          <p class="submit">
          <input type="submit" name="submit" id="submit" value="Login" tabindex="3" />
          <input type="hidden" name="redirect_to" value="wp-admin/" />
          
          </form>
          <ul>
          <li><a href="http://localhost/ns-select-project/wp-register.php">Register</a></li>
          <li><a href="http://localhost/ns-select-project/wp-login.php?action=lostpassword" title="Password Lost and Found">Lost your password?</a></li>
          </ul>
      </div>
      
      <div class="search_panel">
          <h3>Search Website</h3>
          <?php get_template_part('templates/searchform'); ?>
      </div>  
      </div>     
  </div>
</header>



<?php if (is_cart() || is_checkout()) { ?>
<div class="panel-padding-sm grey-bg-panel">
<div class="wrap container"> 
      <div class="content row">
            <div class="bread">
             <?php echo do_shortcode( '[widget id="bcn_widget-2"]' ); ?>
            </div>
      </div>
</div>
</div>
<?php get_template_part('templates/pageheader-shop'); ?>
<?php } ?>






