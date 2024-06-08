  
// update song  privew image 
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
  
  
  // song preview image
  $(document).ready(function() {
    $('.song-image').on('click',function(){
      var id = $(this).data('id');
      $('.song-image-privew-container[data-id='+id+']').css('visibility','visible');
    });
    $('.song-image-privew-close').on('click',function(){
      var id = $(this).data('id');
      $('.song-image-privew-container[data-id='+id+']').css('visibility','hidden');
    });
  });

    // song preview words
    $(document).ready(function() {
      $('.song-words-preview i').on('click',function(){
        var id = $(this).data('id');
        $('.song-words-container[data-id='+id+']').css('visibility','visible');
      });
      $('.song-words-close').on('click',function(){
        var id = $(this).data('id');
        $('.song-words-container[data-id='+id+']').css('visibility','hidden');
      });
    });
  
    