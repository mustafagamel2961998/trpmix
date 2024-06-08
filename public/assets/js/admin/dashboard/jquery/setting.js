

// update logo  privew image 
$(document).ready(function() {
    // Preview image on file selection
    $("#logo").change(function() {
      readURL(this);
    });
    
    // Function to read and display the image preview
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function(e) {
     
          // Set the source of the preview image
          $("#logo_preview").attr("src", e.target.result);
        }
  
        reader.readAsDataURL(input.files[0]);
      }
    }
  });


$(".submit-preview-close").click(function() {
    $(".submit-preview-container").toggle();
});
