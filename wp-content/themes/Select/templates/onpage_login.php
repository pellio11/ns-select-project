<div class="onscreen_login_panel">
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