

// update logo  privew image 
$(document).ready(function() {
    // Preview image on file selection
    $("#logo_image").change(function() {
        readURLLogo(this);
    });
    
    // Function to read and display the image preview
    function readURLLogo(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function(e) {
     
          // Set the source of the preview image
          $("#logo_image_preview").attr("src", e.target.result);
        }
  
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#computer_image").change(function() {
        readURLComputer(this);
      });
      
      // Function to read and display the image preview
      function readURLComputer(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
    
          reader.onload = function(e) {
       
            // Set the source of the preview image
            $("#computer_image_preview").attr("src", e.target.result);
          }
    
          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#mobile_image").change(function() {
        readURLMobile(this);
      });
      
      // Function to read and display the image preview
      function readURLMobile(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
    
          reader.onload = function(e) {
            // Set the source of the preview image
            $("#mobile_image_preview").attr("src", e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
  });



  // logo preview
  $(document).ready(function() {
    $('.logo-image').on('click',function(){
      var id = $(this).data('id');
      $('.ad-logo-image-prview-container[data-id='+id+']').css('visibility','visible');
    });

    $('.ad-logo-image-prview-close-btn').on('click',function(){
      var id = $(this).data('id');
      $('.ad-logo-image-prview-container[data-id='+id+']').css('visibility','hidden');
    });



    
  // computer preview
    $('.computer-image').on('click',function(){
      var id = $(this).data('id');
      $('.ad-computer-image-prview-container[data-id='+id+']').css('visibility','visible');
    });

    $('.ad-computer-image-prview-close-btn').on('click',function(){
      var id = $(this).data('id');
      $('.ad-computer-image-prview-container[data-id='+id+']').css('visibility','hidden');
    });



  // mobile preview

    $('.mobile-image').on('click',function(){
      var id = $(this).data('id');
      $('.ad-mobile-image-prview-container[data-id='+id+']').css('visibility','visible');
    });

    $('.ad-mobile-image-prview-close-btn').on('click',function(){
      var id = $(this).data('id');
      $('.ad-mobile-image-prview-container[data-id='+id+']').css('visibility','hidden');
    });
  });

 