<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        .playlist {
            max-width: 300px;
        }

        .playlist ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .playlist li {
            cursor: pointer;
            padding: 5px;
            background-color: #f2f2f2;
            margin-bottom: 5px;
        }

        .playlist li:hover {
            background-color: #e0e0e0;
        }
    </style>
    <div class="playlist">
        <ul>
          <li data-src="{{asset('1.mp3')}}">Song 1</li>
          <li data-src="{{asset('2.mp3')}}">Song 2</li>

        </ul>
      </div>
      <audio id="audio-player" controls></audio>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
            const playlist = document.querySelector('.playlist');
            const audioPlayer = document.querySelector('#audio-player');

            playlist.addEventListener('click', function(event) {
                const listItem = event.target;
                const audioSrc = listItem.getAttribute('data-src');

                if (audioSrc) {
                audioPlayer.setAttribute('src', audioSrc);
                audioPlayer.play();
                }
            });
        });
      </script>
</body>
</html>