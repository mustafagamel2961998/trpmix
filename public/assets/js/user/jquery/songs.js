$(document).ready(function() {
    $('#filterByYear').on('change', function() {
        var $form = $(this).closest('form');
        $("#filterByYear").trigger("submit");

        // $form.find('input[type=submit]').click();
    });
});

$(document).ready(function() {
    $('.playsong').on('click', function (e) {
        const audioSrc = $(this).data('src');
        const imageSrc = $(this).data('image');
        const songTitle = $(this).data('song-title');
        const songSingerName = $(this).data('song-singer-name');

        // console.log(audioSrc);
        if (audioSrc) {
            $('.audio').attr('src', audioSrc);
            $('.audio')[0].play();
            $('.rounded-circle').attr('src',imageSrc);
            $('#audioNmae').text(songTitle);
            $('#singerName').text(songSingerName);
        }
    });


    $('.load-more').on('click',function(){

        $('.singers-list-items').height("+=160");

    });

});


