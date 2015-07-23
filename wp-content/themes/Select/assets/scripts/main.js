/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        
        
      //Membership Forms

      //  $('.form_selection .wpcf7-select').change(function() {
        //  if ($(".form_selection .wpcf7-select option[value='Yes']").attr('selected')) {
        //    $('.trading').slideDown();
        //  }
      //});
        
      
      $('.trading').hide();
      $('.starting').hide();
      
      $('#six_months').change(function() {
          var formval = $("#six_months").val();
          if ( formval == 'Yes' ) {
            $('.trading').fadeIn();
            $('.starting').hide();
          }
      });
      
      $('#six_months').change(function() {
          var formval = $("#six_months").val();
          if ( formval == 'No' ) {
            $('.trading').hide();
            $('.starting').fadeIn();
          }
      });
      
      $('#six_months').change(function() {
          var formval = $("#six_months").val();
          if ( formval == 'Select' ) {
            $('.trading').hide();
            $('.starting').hide();
          }
      });
        
        
      //Hide full menu                      
      $('.nav_menu').hide();
      
      //Menu click
      $('.nav_toggle').click(function() {
    
        var clicks = $(this).data('clicks');
        if (clicks) {
          //2
          $('.nav-icon').toggleClass('cancel');
          $('.nav_menu').slideUp();
        } else {
          //1
          $('.nav-icon').toggleClass('cancel');
          $('.nav_menu').slideDown();
          
          //Close login panel and reset
          $('.login_panel').slideUp();
          $('.nav_login').removeClass('login-active');
          $('.nav_login').removeData();
          
          //Close search panel and reset
          $('.search_panel').slideUp();
          $('.nav_search').removeClass('search-active');
          $('.nav_search').removeData();
        }
        $(this).data("clicks", !clicks);
      });
      
      
      //Hide login                     
      $('.login_panel').hide();
      
      //Login  click
      $('.nav_login').click(function() {
  
        var logclicks = $(this).data('logclicks');
        if (logclicks) {
          //2
          $(this).toggleClass('login-active');
          $('.login_panel').slideUp();
        } else {
          //1
          $(this).toggleClass('login-active');
          $('.login_panel').slideDown();
          
          //Close nav panel and reset
          $('.nav_menu').slideUp();
          $('.nav-icon').removeClass('cancel');
          $('.nav_toggle').removeData();
          
         //Close search panel and reset
          $('.search_panel').slideUp();
          $('.nav_search').removeClass('search-active');
          $('.nav_search').removeData();
          
        }
        $(this).data("logclicks", !logclicks);
      });
      
      
      //Hide Search                    
      $('.search_panel').hide();
      
      //Search click
      $('.nav_search').click(function() {
  
        var searchclicks = $(this).data('searchclicks');
        if (searchclicks) {
          //2
          $(this).toggleClass('search-active');
          $('.search_panel').slideUp();
        } else {
          //1
          $(this).toggleClass('search-active');
          $('.search_panel').slideDown();
          
          //Close nav panel and reset
          $('.nav_menu').slideUp();
          $('.nav-icon').removeClass('cancel');
          $('.nav_toggle').removeData();
          
          //Close login panel and reset
          $('.login_panel').slideUp();
          $('.nav_login').removeClass('login-active');
          $('.nav_login').removeData();
          
        }
        $(this).data("searchclicks", !searchclicks);
      });
      
      

      //Sidebar Primary
      $( ".primary_list li.page_item_has_children" ).prepend( "<i class='fa fa-chevron-down'></i>" );
      $( ".primary_list ul.children" ).hide();
      $( ".primary_list" ).prev('a').hide();
     
      $('.primary_list li.page_item_has_children i').each(function() {
        $(this).click(function(){
        $(this).parent('li').children('ul').fadeToggle();
        $(this).toggleClass('fa-times');
        $(this).toggleClass('fa-chevron-down');
        $(this).toggleClass('sub_active');
        });
      });
      
      //Open dropdown on active page
      $( ".primary_list li.current_page_item" ).children('ul').show();
      $( ".primary_list li.current_page_item i" ).addClass('fa-times');
      $( ".primary_list li.current_page_item i" ).addClass('sub_active');
      $( ".primary_list li.current_page_item i" ).removeClass('fa-chevron-down');    
      $( ".primary_list li.current_page_item" ).parent('ul').show();
      $( ".primary_list li.current_page_item" ).parent('ul').parent('li').children('i').addClass('fa-times');
      $( ".primary_list li.current_page_item" ).parent('ul').parent('li').children('i').addClass('sub_active');
      $( ".primary_list li.current_page_item" ).parent('ul').parent('li').children('i').removeClass('fa-chevron-down');
      
      
      
      //Second Level
      $( ".second_list li.current_page_ancestor ul.children li.page_item_has_children ul.children" ).addClass('visible_list');
      $( ".second_list li.current_page_ancestor ul.children li.page_item_has_children ul.children li.page_item_has_children ul.children" ).removeClass('visible_list');
      $( ".visible_list" ).parent('li').siblings('li').hide();
      $( ".visible_list" ).parent('li').parent('ul').parent('li').siblings('li').hide();
      $( ".visible_list" ).parent('li').children('a').hide();
      $( ".visible_list" ).parent('li').parent('ul').parent('li').children('a').hide();
      $( ".visible_list" ).parent('li').parent('ul').parent('li').parent('ul').parent('li').children('a').hide();
      
      $( ".visible_list li.page_item_has_children ul.children" ).parent('li').prepend( "<i class='fa fa-chevron-down'></i>" );
      $( ".visible_list li.page_item_has_children ul.children" ).hide();
     

     
      $('.visible_list li.page_item_has_children i').each(function() {
        $(this).click(function(){
        $(this).parent('li').children('ul').fadeToggle();
        $(this).toggleClass('fa-times');
        $(this).toggleClass('fa-chevron-down');
        $(this).toggleClass('sub_active_sub');
        });
      });
      
      //Open dropdown on active page - second level
      $( ".visible_list li.current_page_item" ).children('ul').show();
      $( ".visible_list li.current_page_item i" ).addClass('fa-times');
      $( ".visible_list li.current_page_item i" ).addClass('sub_active_sub');
      $( ".visible_list li.current_page_item i" ).removeClass('fa-chevron-down');    
      $( ".visible_list li.current_page_item" ).parent('ul').show();
      $( ".visible_list li.current_page_item" ).parent('ul').parent('li').children('i').addClass('fa-times');
      $( ".visible_list li.current_page_item" ).parent('ul').parent('li').children('i').addClass('sub_active_sub');
      $( ".visible_list li.current_page_item" ).parent('ul').parent('li').children('i').removeClass('fa-chevron-down');
      
      
      //Mobile sub menu
      $( ".side_nav_wrap" ).addClass('side_nav_toggle');
      $( ".mobile_sub" ).click(function() {
        $( ".side_nav_wrap" ).toggleClass('nav_show_hide');
      });
      

      
      
   
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
