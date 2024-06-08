$(document).ready(function() {
    $('#songsFilterByCategory').on('change', function() {
        var $form = $(this).closest('form');
        $( "#songsFilterByCategory" ).trigger( "submit" );

        // $form.find('input[type=submit]').click();
    });
});


$(document).ready(function() {
    $('.playsong').on('click', function (e) {
        const audioSrc = $(this).data('src');
        const imageSrc = $(this).data('image');
        const songTitle = $(this).data('song-title');
        const songSingerName = $(this).data('song-singer-name');
        const playPauseButton = document.getElementById("play-pause-button");
        
        if (audioSrc) {
            const isPlaying = !audio.paused && !audio.ended;
            
            if (isPlaying) {
                audio.pause();
                playPauseButton.innerHTML = `<i class="fa-solid fa-play fa-2xl"></i>`;
            } else {
                $('.audio').attr('src', audioSrc);
                $('.audio')[0].play();
                $('.rounded-circle').attr('src', imageSrc);
                $('#audioNmae').text(songTitle);
                $('#singerName').text(songSingerName);
                playPauseButton.innerHTML = `<i class="fa-solid fa-pause fa-2xl"></i>`;
            }
        }
    });

    $('#play-pause-button').on('click', function() {
        const audio = $('.audio')[0];
        const playPauseButton = document.getElementById("play-pause-button");
        const isPlaying = !audio.paused && !audio.ended;

        if (isPlaying) {
            audio.pause();
            playPauseButton.innerHTML = `<i class="fa-solid fa-play fa-2xl"></i>`;
        } else {
            audio.play();
            playPauseButton.innerHTML = `<i class="fa-solid fa-pause fa-2xl"></i>`;
        }
    });
}); 


    $('.load-more').on('click',function(){

        $('.new-songs-data').height("+=630");

    });



// $(document).ready(function() {
//     $('.playsong').on('click', function (e) {
//         const id = $(this).data('id');
        

//     });

// });