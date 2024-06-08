
// create or update singer image and privew image 
$(document).ready(function() {
    // Preview image on file selection
    $("#image").change(function() {
      readURL(this);
    });
    
    // Function to read and display the image preview
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function(e) {
          // Set the source of the preview image
          $("#image_preview").attr("src", e.target.result);
        }
  
        reader.readAsDataURL(input.files[0]);
      }
    }
  });


  // singer preview image
  $(document).ready(function() {
    $('.album-image').on('click',function(){
      var id = $(this).data('id');
      $('.album-image-privew-container[data-id='+id+']').css('visibility','visible');
    });
    $('.album-image-privew-close').on('click',function(){
      var id = $(this).data('id');
      $('.album-image-privew-container[data-id='+id+']').css('visibility','hidden');
    });
  });
