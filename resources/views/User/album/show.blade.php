<x-user.layout.layout title="{{$album->name}}">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/user/album_songs.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/user/album.css')}}" />

    @endpush
 
    {{-- start singer content --}}
    @section('content')
    <div class="favorite-messages-container">
        <div class="favorite-messages-content">
            <p class="favorite-messages"></p>
        </div>
    </div>
    <div class="singer-container">

        <div class="right-content">
            
       {{-- header section (singer data) --}}
       <div class="singer-data-section-container">
            <div class="singer-data-section-content">
                <div class="singer-data-section">

                    <div class="singer-right-data">
                        <div class="header">
                            {{$album->name}}
                        </div>

                        <div class="body">
                        
                            <div class="singer-name">
                                <h3>{{$album->name}}</h3>
                            </div>
                        </div>
                        {{-- <div class="footer">
                            <p>{{$singer->bio}}</p>
                        </div> --}}
                    </div>


                    <div class="singer-left-data">
                        <div class="avatar">
                            <img src="{{$album->getFirstMediaUrl('album')}}" alt="{{$album->name}}">
                        </div>
                        <h3>{{$album->name}}</h3>
                    </div>
                </div>
            </div>
       </div>

       <div class="download-album-container">
            <div class="download-album-content">
                <div class="download-album">

                    <div class="download-album-button">
                        <a href="{{$album->album_download_link}}" target="_blank">
                            <button class="route">
                                تحميل الالبوم
                            </button>
                        </a>
                    </div>

                </div>
            </div>  
       </div>

        
          {{-- header section (singer data) --}}
          <div class="album-container">

                <div class="album-content">
                    <h4>الالبومات تابعه للمغني</h4>
                    <div class="album">
                        <ul class="album-list-items">
                            @foreach($albumSingerAlbums as $album)
                                <li class="album-item">

                                    <div class="album-media">
                                        <div>
                                    
                                                <div class="icon">
                                                    <i class="ri-play-fill"></i>
                                                    <p>
                                                        {{$album->view}}
                                                    </p>
                                                </div>
                                                @auth
                                                <div class="icon add-to-favorite" data-id="{{$album->id}}">
                                                    
                                                    <i class="ri-heart-line"></i>
                                                        <p>
                                                            {{$album->favorites_count}}
                                                        </p>
                                                
                                                </div>
                                                @endauth
                                                @guest
                                                <div class="icon">
                                                    
                                                    <i class="ri-login-box-line"></i>
                                                        <p>
                                                        0  
                                                    </p>
                                                
                                                </div>
                                                @endguest
                                                <div class="icon">
                                                    <i class="ri-headphone-line"></i>
                                                        <p>
                                                            {{$album->songs_count}}
                                                        </p>
                                            </div>
                                        
                                                                
                                        
                                        </div>
                                        
                                        <a href="{{route('home.album.show',[$album->id,$album->slug])}}"> 
                                            <img src="{{$album->getFirstMediaUrl('album')}}" alt="{{$album->name}}">
                                        </a>
                                    </div>
                                    <div class="album-footer">
                                        <div class="icon">
                                            <i class="ri-play-circle-line"></i>
                                        </div>
                                        <span>
                                            <a href="{{route('home.album.show',[$album->id,$album->slug])}}"> 
                                                {{$album->name}}
                                            </a>
                                        </span>
                                            
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
        </div>    
    
       
    </div>


    <div class="left-content">
        {{-- left --}}
       {{-- left --}}
       <div class="weekly-songs-list-container">
        <div class="weekly-songs-list-content">
            <div class="weekly-songs-list">
                <div class="weekly-songs-list-header">
                    <h5>إغاني الالبوم</h5>
                </div>
                <ul class="weekly-songs-list-items" id="scrollable">
                    @foreach ($album->songs as $key => $albumSong)
                    
                        <li class="weekly-songs-list-item">
                            <a href="">
                                <div>
                                    {{$key}}
                                </div> 
                                {{$albumSong->title}}
                            </a>
                            <div class="play playsong" data-src="{{$albumSong->listen_link}}" data-id="{{$albumSong->id}}" data-image="{{$albumSong->getFirstMediaUrl('song')}}" data-song-title="{{$albumSong->title}}" data-song-singer-name="{{$albumSong->singer->name}}">
                                <i class="ri-play-circle-fill"></i>
                            </div>
                        </li>
                        
                    @endforeach
                </ul>
            </div>
            <div class="over-shadow">

            </div>
        </div>
    </div>
    <div class="weekly-songs-list-container">
        <div class="weekly-songs-list-content">
            <div class="weekly-songs-list">
                <div class="weekly-songs-list-header">
                    <h5>إغاني من نفس النوع</h5>
                </div>
                <ul class="weekly-songs-list-items" id="scrollable">
                    @foreach ($albumKindSongs as $key => $albumKindSong)
                    
                        <li class="weekly-songs-list-item">
                            <a href="">
                                <div>
                                    {{$key}}
                                </div> 
                                {{$albumKindSong->title}}
                            </a>
                            <div class="play playsong" data-src="{{$albumKindSong->listen_link}}" data-id="{{$albumKindSong->id}}" data-image="{{$albumKindSong->getFirstMediaUrl('song')}}" data-song-title="{{$albumKindSong->title}}" data-song-singer-name="{{$albumKindSong->singer->name}}">
                                <i class="ri-play-circle-fill"></i>
                            </div>
                        </li>
                        
                    @endforeach
                </ul>
            </div>
            <div class="over-shadow">

            </div>
        </div>
    </div>
    
    {{-- last singerss --}}
    <div class="other-singers-container">
    <div class="other-singers-content">
        <div class="other-singers">

            <div class="other-singers-header">
                
                <h4> 
                    <i class="ri-mic-line"></i> مغنين قد تسمعهم 
                </h4>
                <a href="{{route('singers.index')}}">
                    المزيد >
                </a>
            </div>

            <div class="other-singers-list">
                <ul class="other-singers-list-items">
                    @if($singers->count())
                        @foreach ($singers as $singer)
                                    <li class="other-singers-item">
                                        <div class="singer-avatar">
                                            <a href="{{route('home.singer.show',[$singer[0]->id,$singer[0]->slug])}}">
                                            <img src="{{$singer[0]->getFirstMediaUrl('singer')}}" alt="{{$singer[0]->name}}">
                                            </a>
                                        </div>
                                        <div class="singer-name">
                                            <a href="{{route('home.singer.show',[$singer[0]->id,$singer[0]->slug])}}">
                                                {{$singer[0]->name}}
                                            </a>
                                        </div>
                                        <p>مغني</p>
                                    </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>  
    </div>

      
    </div>

    <audio id="audio" controls class="d-none audio">
    </audio>

    <div class="audio-play">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-7 col-md-2 d-flex justify-content-center align-items-center audio-back">
                    <img src="{{asset('assets/media/default/audio_player/default_aduio_song_icon.png')}}" width="45" height="45" style="background-color: #ffffff;" class="rounded-circle me-3" alt="">
                    <div>
                        <h5 class="small m-0" id="audioNmae">.......</h5>
                        <h6 class="small m-0" id="singerName">.....</h6>
                    </div>
                </div>
                <div class="col-1 col-md-2 d-flex justify-content-around audio-controle-btn">
                    <button class="btn d-none d-md-block" title="back" id="back"><i
                            class="fa-solid fa-backward-step fa-lg"></i></button>
                    <button class="btn" title="play-pause" id="play-pause-button"><i
                            class="fa-solid fa-play fa-2xl"></i></button>
                    <button class="btn d-none d-md-block" title="next" id="next"><i
                            class="fa-solid fa-forward-step fa-lg"></i></button>
                </div>
                
                <div class="col-1 d-flex justify-content-center">
                    <span id="current-time">0:00</span>
                </div>
                <div class="col-3 d-none d-md-block">
                    <div class="progress">
                        <span class="progress-bar" id="progress-bar"></span>
                    </div>
                </div>

                <div class="col-1 d-flex justify-content-center d-none d-md-block">
                    <span id="total-time1"></span>
                </div>
               
                <div class="col-2 d-flex justify-content-around align-items-center d-none d-md-flex">
                    <i class="fa-solid fa-volume-high" id="volume-icon"></i>
                    <input type="range" title="volume" id="volume-control" min="0" max="1" step="0.01" value="1">
                </div>
                <div class="col-1 d-flex justify-content-center d-block d-md-none">
                    <span id="total-time2"></span>
                </div>
                @auth
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <span role="button" id="wishlist-icon" title="wishlist">
                        <i class="fa-solid fa-heart fa-lg"></i>
                    </span>
                </div>
                @endauth
            </div>
        </div>
    </div>

    @endsection
    
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/user/album_songs.js')}}"></script> 
        <script src="{{asset('assets/js/user/jquery/album_songs.js')}}"></script> 
        <script>
            $(document).ready(function() {
                $('.add-to-favorite').on('click', function (e) {
                    const albumid = $(this).data('id');
                    const id = $(this).data('id');
                        $.ajax({
                            type: 'post',
                            url: "/favorite/store",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            success: function(response){
                                // response.message
                                $('.favorite-messages-container').css('display','block');
                                $('.favorite-messages').text(response.message);
                                setTimeout(() => {
                                    $('.favorite-messages-container').css('display','none');
    
                                }, 1000);
                            },
                            
                        });
    
                    });
    
    
                });
        </script>
    @endpush

</x-user.layout.layout>