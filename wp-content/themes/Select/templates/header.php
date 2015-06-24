<header class="banner" role="banner"> 
  <div class="container">  
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img alt="<?php bloginfo('name'); ?>" src="<?php echo get_template_directory_uri(); ?>/assets/images/select-logo.gif" /></a>
      <button class="nav_login"><span>Login</span></button>
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
      <div class="login_panel">
        
      </div>
      
  </div>
</header>
