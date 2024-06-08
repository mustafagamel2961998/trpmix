
  // index last singers preview image
  $(document).ready(function() {
    $('.singer-image').on('click',function(){
      var id = $(this).data('id');
      $('.singer-image-privew-container[data-id='+id+']').css('visibility','visible');
    });
    $('.singer-image-privew-close').on('click',function(){
      var id = $(this).data('id');
      $('.singer-image-privew-container[data-id='+id+']').css('visibility','hidden');
    });
  });
