<x-user.layout.layout title="{{$song->title}}">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/user/song_show.css')}}" />
    <meta property="og:title" content="{{$song->title}}">
    <meta property="og:description" content="{{$song->title}}">
    <meta property="og:image" content="{{$song->getFirstMediaUrl('song')}}">
    <meta property="og:url" content="{{$song->name}}">
    <meta property="og:type" content="website">
    @endpush

    {{-- start singer content --}}
    @section('content')

    <div class="alert-container">
        @error('comment')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror

        @if(Session::has('success'))
        <p class="success-alert">
            {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
        </p>
        @endif


    </div>
    <div class="singer-container">

        <div class="right-content">
            {{-- header section (singer data) --}}
            <div class="singer-data-section-container">
                <div class="singer-data-section-content"
                    style="background-image: url({{$song->getFirstMediaUrl('song')}});   filter: blur(6px);    background-position: center; background-size: cover;">
                </div>
                <div class="singer-data-section">


                    <div class="song-header">
                        <div class="singer-right-data">
                            <div class="header">
                                {{$song->title}}
                            </div>

                            <div class="body">
                                <div class="singer-name">
                                    <h3>
                                        النوع : {{$song->kind}}
                                    </h3>
                                </div>
                                <div class="song-show-category">
                                    <span>
                                        القسم : {{$song->category->name}}
                                    </span>
                                </div>

                            </div>


                        </div>


                        <div class="singer-left-data">
                            <div class="play-song">
                                <div class="col-1 col-md-2 d-flex justify-content-around audio-controle-btn">
                                    {{-- <button class="btn d-none d-md-block" title="back" id="back">
                                        <i class="fa-solid fa-backward-step fa-lg"></i>
                                    </button> --}}

                                    <button class="btn" title="play-pause" id="play-pause-button">
                                        <i class="fa-solid fa-play fa-2xl"></i>
                                    </button>
                                    {{-- <button class="btn d-none d-md-block" title="next" id="next">
                                        <i class="fa-solid fa-forward-step fa-lg"></i>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="w-100 d-flex align-items-center">
                        <div class="container">
                            <div class="audio-content">
                                <audio id="audio_song" controls class="d-none audio">
                                    <source src="{{$song->listen_link}}" type="audio/mp3">
                                </audio>

                                <div class="audio-play">
                                    <div class="container">
                                        <div class="row justify-content-center align-items-center">

                                            <div class="col-1 d-flex justify-content-center">
                                                <span id="current-time">0:00</span>
                                            </div>

                                            <div class="col-6">
                                                <div class="progress">
                                                    <span class="progress-bar" id="progress-bar"></span>
                                                </div>
                                            </div>

                                            <div class="col-1 d-flex justify-content-center">
                                                <span id="total-time1"></span>
                                            </div>

                                            <div class="col-4 d-flex justify-content-around align-items-center">
                                                <i class="fa-solid fa-volume-high" id="volume-icon"></i>
                                                <input type="range" title="volume" id="volume-control" min="0" max="1"
                                                    step="0.01" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <br>
            @auth
            <div class="reactions-container">
                <div class="reactions-content">


                    <div class="listen-count">
                        {{$song->listen_count * 4}}  مشاهدة
                    </div>

                      <div class="like-share-content">

                        <div class="like-dislike">

                            <div class="song-like">
                                <small class="like-count">{{$song->likes_count}}</small>
                                <span role="button" id="wishlist-icon" title="wishlist"
                                    class="like @if($song->likes->count() && $song->likes[0]->user_id == auth()->user()->id) love @endif"
                                    data-id="{{$song->id}}">
                                    <i class="ri-thumb-up-fill"></i>
                                </span>
                            </div>
    
                            <div class="song-dis-like">
                                <span role="button">
                                    <i class="ri-thumb-down-fill"></i>
                                </span>
                            </div>
    
                        </div>
    
                        <div class="share-download">
                            <div class="song-dis-like" id="shareButton">
                                <span role="button">
                                    <i class="ri-share-forward-line"></i>
                                </span>
                            </div>
    
                            <div class="song-dis-like">
    
                                <a href="{{$song->download_link}}" target="_blank"  style="color: #ffffff;">
                                    <span role="button">
                                        <i class="ri-download-line"></i>
                                    </span>
                                </a>
                            </div>
    
    
                        </div>
      
                      </div>  

                      

                     
                </div>
            </div>
            @endauth
            @guest
            <div class="reactions-container">
                <div class="reactions-content">

                    <div class="listen-count">
                        {{$song->listen_count * 4}}  مشاهدة
                    </div>

                    <div  class="like-share-content"> 
                        <div class="like-dislike">
                            <div class="song-like join-btn">
                                <small class="like-count"></small>
                                <span role="button" id="wishlist-icon" title="wishlist">
                                    <i class="ri-thumb-up-fill"></i>
                                </span>
                            </div>

                            <div class="song-dis-like join-btn">
                                <span role="button">
                                    <i class="ri-thumb-down-fill"></i>
                                </span>
                            </div>

                        </div>

                        <div class="share-download">
                            <div class="song-dis-like" id="shareButton">
                                <span role="button">
                                    <i class="ri-share-forward-line"></i>
                                </span>
                            </div>

                            <div class="song-dis-like">
                                <a href="{{$song->download_link}}" target="_blank" style="color: #ffffff;">
                                    <span role="button">
                                        <i class="ri-download-line"></i>
                                    </span>
                                </a>
                            </div>



                        </div>

                    </div>
                 

                    
                     

                </div>
            </div>
            @endguest
            <div class="song-comments-container">
                <div class="song-comments-content">
                    <div class="song-comments">
                        @auth
                        <form action="{{route('song.comment',$song->id)}}" method="POST">
                            @csrf
                            <input name="comment" placeholder="إضف تعليق...">
                            <button type="submit"><i class="ri-send-plane-2-line"></i></button>
                        </form>
                        @endauth
                        @guest
                        <div class="guest-comment-container">
                            <a href="#" class="join-btn">
                                <div class="guest-comment-content">
                                    <p>إضف تعليق</p> <i class="ri-send-plane-2-line"></i>
                                </div>
                            </a>
                        </div>
                        @endguest

                        <ul class="song-comments-list-items">
                            @foreach($song->comments as $comment)
                            <li class="song-comments-item">
                                <div class="comment-song-image">
                                    <img src="{{$song->getFirstMediaUrl('song')}}" alt="{{$song->title}}">
                                    <p>{{$comment->user->name}}</p>
                                </div>
                                <div class="comment-content">
                                    {{$comment->comment}}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- <div class="singer-tabs-data-container">
                <div class="singer-tabs-data-content">
                    <div class="singer-tabs-data">
                        <ul class="singer-tabs-data-list-items">
                            <a href="">
                                <li class="singer-tabs-data-item active">
                                    <i class="ri-home-line"></i>
                                    نظرة عامة
                                </li>
                            </a>
                            <a href="#single_songs">
                                <li class="singer-tabs-data-item">
                                    <i class="ri-netease-cloud-music-line"></i>
                                    أغاني منفردة
                                </li>
                            </a>
                            <a href="">
                                <li class="singer-tabs-data-item">
                                    <i class="ri-disc-line"></i>
                                    البومات المغني
                                </li>
                            </a>
                            <a href="#comman_songs">
                                <li class="singer-tabs-data-item">
                                    <i class="ri-heart-2-line"></i>
                                    أغاني شائعة
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div> --}}

        </div>


        <div class="left-content">
            {{-- left --}}
            <div class="weekly-songs-list-container">
                <div class="weekly-songs-list-content">
                    <div class="weekly-songs-list">
                        <div class="weekly-songs-list-header">
                            <h5>
                                <i class="ri-netease-cloud-music-line"></i> الاغاني الاكثر استماعاً
                            </h5>
                            <a href="{{route('songs.index')}}">
                                المزيد >
                            </a>
                        </div>
                        <ul class="weekly-songs-list-items">
                            @foreach ($singerHighListenSongs->songs as $weeklySongList)

                            <li class="weekly-songs-list-item">
                                <div>
                                    <img src="{{$weeklySongList->getFirstMediaUrl('song')}}"
                                        alt="{{$weeklySongList->singer->name}}">
                                </div>
                                <div>
                                    <div class="singer-name">
                                        <a href="{{route('song.show',[$weeklySongList->id,$weeklySongList->slug])}}">
                                            {{$weeklySongList->title}}
                                        </a>
                                        <a href="{{route('home.singer.show',[$weeklySongList->singer->id,$weeklySongList->singer->slug])}}"
                                            class="singer-name-link">
                                            {{$weeklySongList->singer->name}}
                                        </a>

                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div class="over-shadow">

                    </div> --}}
                </div>
            </div>

            {{-- last albums --}}
            <div class="other-singers-container">
                <div class="other-singers-content">
                    <div class="other-singers">

                        <div class="other-singers-header">
                            <h4>
                                <i class="ri-mic-line"></i> معنين آخرين
                            </h4>
                            <a href="{{route('singers.index')}}">المزيد ></a>
                        </div>

                        <div class="other-singers-list">
                            <ul class="other-singers-list-items">
                                @foreach($othersSingers as $otherSinger)
                                <li class="other-singers-item">
                                    <div class="singer-avatar">
                                        <img src="{{$otherSinger->getFirstMediaUrl('singer')}}"
                                            alt="{{$otherSinger->name}}">
                                    </div>
                                    <div class="singer-name">
                                        <a href="{{route('home.singer.show',[$otherSinger->id,$otherSinger->slug])}}">
                                            {{$otherSinger->name}}
                                        </a>
                                    </div>
                                    <p>مغني</p>
                                </li>
                                @endforeach


                                {{-- @foreach ($getFeatureThreeAlbums as $getFeatureThreeAlbum)

                                <li class="last-album-item">

                                    <div class="last-album-item-info">
                                        <div class="last-album-item-info-image">
                                            <img src="{{$getFeatureThreeAlbum->getFirstMediaUrl('album')}}" alt="">
                                        </div>
                                        <div class="last-album-item-info-name">
                                            <i class="ri-video-fill"></i>
                                            <h5>تجربه</h5>
                                        </div>
                                    </div>

                                    <div class="last-album-item-btn">
                                        <a href="">
                                            <p class="yt">
                                                <i class="ri-play-fill"></i>
                                            </p>
                                        </a>
                                        <a href="">
                                            <p class="love">
                                                <i class="ri-heart-fill"></i>
                                            </p>
                                        </a>
                                        <a href="">
                                            <p class="watch">
                                                <i class="ri-disc-line"></i>
                                            </p>
                                        </a>
                                    </div>
                                </li>
                                @endforeach --}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @endsection

    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/user/songs.js')}}"></script>
    <script src="{{asset('assets/js/user/jquery/songs.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.like').on('click', function (e) {
                var currentCount = $('.like-count').text();

                if ($('.like').hasClass('love')) {
                    var newCount = parseInt(currentCount) + 1;

                } else {
                    var newCount = parseInt(currentCount) - 1;

                }
                $('.like-count').text(newCount);

                const id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "/song/like",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function (response) {

                    },

                });

            });

        });
    </script>
    <script>
        const shareButton = document.getElementById('shareButton');

        if (navigator.share) {
            shareButton.addEventListener('click', () => {
                navigator.share({
                    title: document.title,
                    text: 'Check out this page!',
                    url: window.location.href
                })
                    .then(() => console.log('Shared successfully'))
                    .catch((error) => console.error('Error sharing:', error));
            });
        } else {
            // Fallback if Web Share API is not supported
            shareButton.addEventListener('click', () => {
                alert('Web Share API is not supported in this browser.');
            });
        }
    </script>
    @endpush

</x-user.layout.layout>