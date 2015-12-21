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
        
   
   
$(".tribe-events-event-cost").prev('dt').hide();   


$(".tribe-events-page-title").each(function() {
   $(this).html($(this).html().replace(/[›]/g,""));
});



        
     //Scrolling
      $(function() {
        $('.scroll').bind('click',function(event){
          var $anchor = $(this);
          $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
            }, 1500,'easeInOutExpo');
          event.preventDefault();
          });
        });
        
        
      //Membership Forms

      //  $('.form_selection .wpcf7-select').change(function() {
        //  if ($(".form_selection .wpcf7-select option[value='Yes']").attr('selected')) {
        //    $('.trading').slideDown();
        //  }
      //});
      
      
    /*Preloader*/
        //<![CDATA[
            $(window).load(function() { // makes sure the whole site is loaded
            $('.loaderbar').removeClass('loaderbar-animate').addClass('loaderbar-complete');
                $('#status').fadeOut();
                $('#preloader').delay(350).fadeOut('slow');  
            })
    //]]> 
      
      
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
        
      
      
      
      //Expanding Panels Default  
      //Hide full menu                      
      $('.nav_menu_default').hide();
      
      //Menu click
      $('.nav_toggle_default').click(function() {
    
        var clicks = $(this).data('clicks');
        if (clicks) {
          //2
          $('.nav_toggle_default .nav-icon').toggleClass('cancel');
          $('.nav_menu_default').slideUp();
        } else {
          //1
          $('.nav_toggle_default .nav-icon').toggleClass('cancel');
          $('.nav_menu_default').slideDown();
          
          //Close login panel and reset
          $('.login_panel_default').slideUp();
          $('.nav_login_default').removeClass('login-active');
          $('.nav_login_default').removeData();
          
          //Close search panel and reset
          $('.search_panel_default').slideUp();
          $('.nav_search_default').removeClass('search-active');
          $('.nav_search_default').removeData();
        }
        $(this).data("clicks", !clicks);
      });
      
      
      //Hide login                     
      $('.login_panel_default').hide();
      
      //Login  click
      $('.nav_login_default').click(function() {
  
        var logclicks = $(this).data('logclicks');
        if (logclicks) {
          //2
          $(this).toggleClass('login-active');
          $('.login_panel_default').slideUp();
        } else {
          //1
          $(this).toggleClass('login-active');
          $('.login_panel_default').slideDown();
          
          //Close nav panel and reset
          $('.nav_menu_default').slideUp();
          $('.nav_login_default .nav-icon').removeClass('cancel');
          $('.nav_toggle_default').removeData();
          
         //Close search panel and reset
          $('.search_panel_default').slideUp();
          $('.nav_search_default').removeClass('search-active');
          $('.nav_search_default').removeData();
          
        }
        $(this).data("logclicks", !logclicks);
      });
      
      
      //Hide Search                    
      $('.search_panel_default').hide();
      
      //Search click
      $('.nav_search_default').click(function() {
  
        var searchclicks = $(this).data('searchclicks');
        if (searchclicks) {
          //2
          $(this).toggleClass('search-active');
          $('.search_panel_default').slideUp();
        } else {
          //1
          $(this).toggleClass('search-active');
          $('.search_panel_default').slideDown();
          
          //Close nav panel and reset
          $('.nav_menu_default').slideUp();
          $('.nav_toggle_default .nav-icon').removeClass('cancel');
          $('.nav_toggle_default').removeData();
          
          //Close login panel and reset
          $('.login_panel_default').slideUp();
          $('.nav_login_default').removeClass('login-active');
          $('.nav_login_default').removeData();
          
        }
        $(this).data("searchclicks", !searchclicks);
      });
      
      
      //Expanding Panels Fixed
      //Hide full menu                      
      $('.nav_menu_fixed').hide();
      
      //Menu click
      $('.nav_toggle_fixed').click(function() {
    
        var clicks = $(this).data('clicks');
        if (clicks) {
          //2
          $('.nav_toggle_fixed .nav-icon').toggleClass('cancel');
          $('.nav_menu_fixed').slideUp();
        } else {
          //1
          $('.nav_toggle_fixed .nav-icon').toggleClass('cancel');
          $('.nav_menu_fixed').slideDown();
          
          //Close login panel and reset
          $('.login_panel_fixed').slideUp();
          $('.nav_login_fixed').removeClass('login-active');
          $('.nav_login_fixed').removeData();
          
          //Close search panel and reset
          $('.search_panel_fixed').slideUp();
          $('.nav_search_fixed').removeClass('search-active');
          $('.nav_search_fixed').removeData();
        }
        $(this).data("clicks", !clicks);
      });
      
      
      //Hide login                     
      $('.login_panel_fixed').hide();
      
      //Login  click
      $('.nav_login_fixed').click(function() {
  
        var logclicks = $(this).data('logclicks');
        if (logclicks) {
          //2
          $(this).toggleClass('login-active');
          $('.login_panel_fixed').slideUp();
        } else {
          //1
          $(this).toggleClass('login-active');
          $('.login_panel_fixed').slideDown();
          
          //Close nav panel and reset
          $('.nav_menu_fixed').slideUp();
          $('.nav_login_fixed .nav-icon').removeClass('cancel');
          $('.nav_toggle_fixed').removeData();
          
         //Close search panel and reset
          $('.search_panel_fixed').slideUp();
          $('.nav_search_fixed').removeClass('search-active');
          $('.nav_search_fixed').removeData();
          
        }
        $(this).data("logclicks", !logclicks);
      });
      
      
      //Hide Search                    
      $('.search_panel_fixed').hide();
      
      //Search click
      $('.nav_search_fixed').click(function() {
  
        var searchclicks = $(this).data('searchclicks');
        if (searchclicks) {
          //2
          $(this).toggleClass('search-active');
          $('.search_panel_fixed').slideUp();
        } else {
          //1
          $(this).toggleClass('search-active');
          $('.search_panel_fixed').slideDown();
          
          //Close nav panel and reset
          $('.nav_menu_fixed').slideUp();
          $('.nav_toggle_fixed .nav-icon').removeClass('cancel');
          $('.nav_toggle_fixed').removeData();
          
          //Close login panel and reset
          $('.login_panel_fixed').slideUp();
          $('.nav_login_fixed').removeClass('login-active');
          $('.nav_login_fixed').removeData();
          
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
      
      
      
      
      
      //Sidebar Shop Widget
      $( ".product-categories li.cat-parent" ).prepend( "<i class='fa fa-chevron-down'></i>" );
      $( ".product-categories ul.children" ).hide();
      $( ".product-categories" ).prev('a').hide();
     
      $('.product-categories li.cat-parent i').each(function() {
        $(this).click(function(){
        $(this).parent('li').children('ul').fadeToggle();
        $(this).toggleClass('fa-times');
        $(this).toggleClass('fa-chevron-down');
        $(this).toggleClass('sub_active');
        });
      });
      
      //Open dropdown on active page
      $( ".product-categories li.current-cat" ).children('ul').show();
      $( ".product-categories li.current-cat i" ).addClass('fa-times');
      $( ".product-categories li.current-cat i" ).addClass('sub_active');
      $( ".product-categories li.current-cat i" ).removeClass('fa-chevron-down');    
      $( ".product-categories li.current-cat" ).parent('ul').show();
      $( ".product-categories li.current-cat" ).parent('ul').parent('li').children('i').addClass('fa-times');
      $( ".product-categories li.current-cat" ).parent('ul').parent('li').children('i').addClass('sub_active');
      $( ".product-categories li.current-cat" ).parent('ul').parent('li').children('i').removeClass('fa-chevron-down'); 
      
      
      
  
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
      
      
      
      //Sidebar Custom Menus
      $( ".widget_nav_menu .menu li ul.sub-menu" ).parent('li').prepend( "<i class='fa fa-chevron-down'></i>" );
      $( ".widget_nav_menu .menu li ul.sub-menu" ).parent('li').addClass('parent_link');
      $( ".widget_nav_menu .menu ul.sub-menu" ).hide();
      $( ".widget_nav_menu .menu" ).prev('a').hide();
     
      $('.widget_nav_menu .menu li.parent_link i').each(function() {
        $(this).click(function(){
        $(this).parent('li').children('ul').fadeToggle();
        $(this).toggleClass('fa-times');
        $(this).toggleClass('fa-chevron-down');
        $(this).toggleClass('sub_active');
        });
      });
      
      //Open dropdown on active page
      $( ".widget_nav_menu .menu li.active" ).children('ul').show();
      $( ".widget_nav_menu .menu li.active i" ).addClass('fa-times');
      $( ".widget_nav_menu .menu li.active i" ).addClass('sub_active');
      $( ".widget_nav_menu .menu li.active i" ).removeClass('fa-chevron-down');    
      

      
      //Training T and C
      $('.add_tandc').attr('disabled','disabled');

      $('.tandc_checkbox').click(function() {       
        var tcclicks = $(this).data('tcclicks');
        if (tcclicks) {
          //2
           $('.tandc_checkbox i').hide();
           $('.add_tandc').attr('disabled','disabled');
        } else {
          //1
          $('.tandc_checkbox i').show();
          $('.add_tandc').removeAttr('disabled');
        }
        $(this).data("tcclicks", !tcclicks);

        // $('.tandc_checkbox i').show();
      });
      
      
      
      //Disable proceed button when user is logged out and sagepay is not checked.
     /* $('#payment input#place_order').hide();  */


    /*     $('.tandc_checkbox').click(function() {       
        var tcclicks = $(this).data('tcclicks');
        if (tcclicks) {
          //2
           $('.tandc_checkbox i').hide();
           $('.add_tandc').attr('disabled','disabled');
        } else {
          //1
          $('.tandc_checkbox i').show();
          $('.add_tandc').removeAttr('disabled');
        }
        $(this).data("tcclicks", !tcclicks);

      });*/
   
   
   
   
      
      
/*Nav Waypoint*/


/*$('.fixed_waypoint').waypoint(function(direction) {
    if (direction === 'down') {
         $('.fixednav').addClass('nav_fixed_hide');
    }
});*/
 
var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
    //Scroll down
       $('.fixednav').addClass('narrownav');
       $('.banner_wrap').addClass('banner_margin');
       /*$('.fixednav').addClass('nav_fixed_hide');*/
       

          
   } else {
      //Scroll up
      /*$('.fixednav').removeClass('nav_fixed_hide');*/

      $('.top_waypoint').waypoint(function(direction) {
          if (direction === 'up') {
               $('.fixednav').removeClass('narrownav');
               $('.banner_wrap').removeClass('banner_margin');  
          }
      });  
   }
   lastScrollTop = st;
});
      
    
    /*Expanding boxes*/
        $('.currentapps li p').hide();
        $('.currentapps li .closebox').each(function() {
        $(this).click(function(){
        $(this).siblings('p').slideToggle();
        $(this).children('i').toggleClass('fa-chevron-down');
        $(this).children('i').toggleClass('fa-times');
        });
      });
        
      /*Events Title Fix*/
      $( "h2.tribe-events-page-title" ).prepend( "<span class='events_title_fix'></span>" );
     
     
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
