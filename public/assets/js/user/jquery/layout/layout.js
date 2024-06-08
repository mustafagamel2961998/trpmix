$(document).ready(function() {
    'use strict';
    $('.ri-search-line').click(function () {
      $('nav form').css({'width':'20px', 'visibility': 'visible'}).animate({'width':'270px'}, 200);
      if($('nav form').is(":visible")){
        $('.search-form-btn').css('display','none');
      } else {
        $('.search-form-btn').css('display','block');
      }
    });

});
$(document).ready(function() {
    'use strict';
    $('.close-search-form').click(function () {
      $('nav form').css({'visibility': 'hidden'});

        $('.search-form-btn').css('display','block');

    });
  });



  
  $(document).ready(function() {
    'use strict';
    $('.join-btn').click(function () {
      $('.auth-form-container').toggle();
      // $('.signup-form').toggle();

    });


    $('.sign-up-form-btn').click(function () {
      $('.signup-form').toggle();

        $('.login-form').toggle();

    });
    $('.login-form-btn').click(function () {
        $('.login-form').toggle();
        $('.signup-form').toggle();
    });
    $('.auth-form-close').click(function () {

      $('.auth-form-container').toggle();
      // $('.signup-form').toggle();

      
    });

    
  });

