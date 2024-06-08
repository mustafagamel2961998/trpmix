
// layout side bar ( Menu )
$(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
        $(this)
        .parent()
        .hasClass("active")
    ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
        .parent()
        .removeClass("active");
    } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
        $(this)
        .parent()
        .addClass("active");
    }
});

$("#close-sidebar").click(function() {
$(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
$(".page-wrapper").addClass("toggled");
});

$(".today-title-tasks-header-close").click(function() {
    $(".today-title-tasks-header").toggle();
});
$(".add-new-task-for-title-name-btn").click(function() {
    $(".today-title-tasks-header").toggle();
});


// layout update avatar form privew avatar 
$(document).ready(function() {
    // Preview image on file selection
    $("#avatar").change(function() {
      readURL(this);
    });
    
    // Function to read and display the image preview
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function(e) {
          // Show the image preview
          $(".submit-preview-container").toggle();
          
          // Set the source of the preview image
          $("#avatar_preview").attr("src", e.target.result);
        }
  
        reader.readAsDataURL(input.files[0]);
      }
    }
  });


$(".submit-preview-close").click(function() {
    $(".submit-preview-container").toggle();
});
