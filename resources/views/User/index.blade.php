<x-user.layout.layout title="الرئيسية">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/user/index.css')}}" />
    @endpush


    {{-- start index content --}}
    @section('content')
    <div class="index-container">

        <div class="right-content">
                    {{-- first section {{ header section }} --}}
                    <section class="header-section-container">
                        {{-- right --}}
                        <div class="singers-and-teams-container">
                            <div class="singers-and-teams-content">
                                <div class="singers-and-teams">
                                    {{-- First section --}}
                                    {{-- Singers and teams header --}}
                                    <div class="singers-and-teams-header">
                    
                                            <div class="title-container">
                                                <h3>
                                                    <i class="ri-mic-fill"></i> <span>مغنين و فرق موسيقية </span>
                                                </h3>
                                            </div>
                    
                                            {{-- Singers and teams --}}
                                            <div class="singers-and-teams-filter-container">
                                                    <form action="{{ URL::current() }}" method="GET">
                                                        <button type="submit" name="single_status" class="@if(request('single_status') =='') active @endif " value="">كل المغنين</button>
                                                        <button type="submit" name="single_status" class="@if(request('single_status') =='single') active @endif "  value="single">مغنين فردين</button>
                                                        <button type="submit" name="single_status" class="@if(request('single_status') =='with_singer') active @endif "  value="with_singer">فرق غنائية</button>
                                                    </form>
                                                    <div class="slider-nav">
                                                        <button class="prev-button">&lt;</button>
                                                        <button class="next-button">&gt;</button>
                                                    </div>
                                            </div>  
                                        
                                    </div>
                                

                            
                                    {{-- secoend section --}}
                                    {{-- Singers cards --}}
                                    <div class="singers-container">

                                        <div class="slider">
                                                <div class="cards">
                                                        @foreach ($singers as $singer)
                                                                <div class="card">
                                                                    <a href="{{route('home.singer.show',[$singer->id,$singer->slug])}}"> 
                                                                        
                                                                        <img src="{{$singer->getFirstMediaUrl('singer')}}" alt="Image 1">
                                                                    </a>
                                                                    <h5><a href="{{route('home.singer.show',[$singer->id,$singer->slug])}}">{{$singer->name}}</a></h5>
                                                               
                                                                    <div>عدد الاغاني : {{$singer->songs->count() + $singer->duet->count()}}
                                                                    </div>
                                                                </div>
                                                        @endforeach
                                                </div>
                                        </div>
                                        <div class="singers-over-shadow">
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                
                
                    {{-- second section {{ body section }} --}}
                    <section class="body-section-container">
                        {{-- right --}}
                        <div class="new-songs-container">
                            <div class="new-songs-content">
                                <div class="new-songs">
                                    {{-- First section --}}
                                    {{-- New songs header --}}
                                    <div class="new-songs-header">

                                            <div class="title-container">
                                                <h3>
                                                    <i class="ri-music-2-line"></i> 
                                                    <span>أجدد الاغاني</span>
                                                </h3>
                                            </div>

                                            {{-- songs category filter --}}
                                            <div class="new-songs-filter-container">
                                                    <form action="{{ URL::current() }}" method="GET" id="songsFilterByCategory">
                                                        <select name="category_id">
                                                            <option value="">إختار قسم</option>
                                                                @foreach ($getCategoriesForFilterNewSongs as $category)
                                                                <option value="{{$category->id}}" @if($category->id == request()->query('category_id')) selected @endif>{{$category->name}}</option>  
                                                                @endforeach
                                                        </select>
                                                    </form>
                                            </div>  

                                    </div> 

                                    {{-- secoend section --}}
                                    {{-- New songs --}}
                                    <div class="new-songs-data-container">
                                        <div class="new-songs-data-content">

                                            <div class="new-songs-data">
                                                <ul class="new-songs-data-list-items">
                                                    @foreach ($getLatestSongs as $getLatestSong)
                                                     
                                                            <li class="new-songs-data-item">

                                                                <div class="new-songs-data-item-header">
                                                                    <div class="new-songs-data-item-image">
                                                                        <img src="{{$getLatestSong->getFirstMediaUrl('song')}}" alt="">
                                                                    </div>
                                                                    <div class="new-songs-data-item-song-name">
                                                                        <a href="{{route('song.show',['id'=>$getLatestSong->id,'slug'=>$getLatestSong->slug])}}">
                                                                            {{$getLatestSong->title}}
                                                                        </a>
                                                                        {{-- <p>
                                                                            <a href="{{route('song.show',['id'=>$getLatestSong->id,'slug'=>$getLatestSong->slug])}}">
                                                                                {{$getLatestSong->title}}
                                                                            </a>
                                                                        </p>
                                                                         --}}

                                                                        <div class="new-songs-data-item-singer-name">
                                                                           
                                                                                <a href="{{route('home.singer.show',['id'=>$getLatestSong->singer->id,'slug'=>$getLatestSong->singer->slug])}}">
                                                                                    {{$getLatestSong->singer->name}}
                                                                                </a>
                                                                        
                                                                        </div>
                                                                  
                                                                    </div>
                                                                </div>
                                                                
                                                            
                                                            </li>
                                                   
                                                    
                                                    @endforeach
                                                </ul>
                                            </div>

                                            @if($getLatestSongs->count())
                                                <div class="load-more">
                                                    <p>عرض المزيد</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                            </div> 
                        </div>       
                        
                        


                        {{-- left --}}
                    </section>
        </div>



        <div class="left-content">
              
            {{-- left --}}
            <div class="weekly-songs-list-container">
                <div class="weekly-songs-list-content">
                    <div class="weekly-songs-list">
                        <div class="weekly-songs-list-header">
                            <h5>القائمة الاسبوعية</h5>
                        </div>
                        <ul class="weekly-songs-list-items" id="scrollable">
                            @foreach ($weeklySongsList as $key => $weeklySongList)
                            
                                <li class="weekly-songs-list-item">
                                    <a href="{{route('song.show',[$weeklySongList->id,$weeklySongList->slug])}}">
                                        <div>
                                            {{$key}}
                                        </div> 
                                        {{$weeklySongList->title}}
                                    </a>
                                    <div class="play playsong" data-src="{{$weeklySongList->listen_link}}" data-id="{{$weeklySongList->id}}" data-image="{{$weeklySongList->getFirstMediaUrl('song')}}" data-song-title="{{$weeklySongList->title}}" data-song-singer-name="{{$weeklySongList->singer->name}}">
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

            {{-- last albums --}}
            <div class="last-album-container">
                <div class="last-album-content">
                    <div class="last-album">

                        <div class="last-album-header">
                            <h4> <i class="ri-disc-line"></i> أحدث الالبومات </h4>
                            <a href="{{route('albums.index')}}">المزيد ></a>
                        </div>

                        <div class="last-album-list">
                            <ul class="last-album-list-items">
                                @foreach ($getFeatureThreeAlbums as $getFeatureThreeAlbum)
                                    
                                    <li class="last-album-item">

                                        <div class="last-album-item-info">
                                            <div class="last-album-item-info-image">
                                                <a href="{{route('home.album.show',[$getFeatureThreeAlbum->id,$getFeatureThreeAlbum->slug])}}">
                                                    <img src="{{$getFeatureThreeAlbum->getFirstMediaUrl('album')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="last-album-item-info-name">
                                                <a href="{{route('home.album.show',[$getFeatureThreeAlbum->id,$getFeatureThreeAlbum->slug])}}">
                                                    <i class="ri-video-fill"></i>
                                                </a>
                                                <h5><a href="{{route('home.album.show',[$getFeatureThreeAlbum->id,$getFeatureThreeAlbum->slug])}}">{{$getFeatureThreeAlbum->name}}</a></h5>
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
                                          <a href="{{route('home.album.show',[$getFeatureThreeAlbum->id,$getFeatureThreeAlbum->slug])}}"">
                                            <p class="watch"> 
                                                <i class="ri-disc-line"></i>
                                            </p>
                                          </a>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <audio id="audio" controls class="d-none audio"></audio>

    <div class="audio-play">
            <div class="row justify-content-center align-items-center">
                <div class="col-7 col-md-2 d-flex justify-content-center align-items-center audio-back">
                    <img src="{{asset('assets/media/default/audio_player/default_aduio_song_icon.png')}}" width="45" height="45" style="background-color: #ffffff;" class="rounded-circle me-3" alt="">
                    <div>
                        <h5 class="small m-0 text-light" id="audioNmae">.......</h5>
                        <h6 class="small m-0" id="singerName">.....</h6>
                    </div>
                </div>
                <div class="col-1 col-md-2 d-flex justify-content-around audio-controle-btn">
                    <button class="btn d-none d-md-block" title="next" id="next"><i
                        class="fa-solid fa-forward-step fa-lg"></i></button>
                    <button class="btn" title="play-pause" id="play-pause-button"><i
                        class="fa-solid fa-play fa-2xl"></i></button>
                    <button class="btn d-none d-md-block" title="back" id="back"><i
                        class="fa-solid fa-backward-step fa-lg"></i></button>
                    
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
                    <span id="total-time1" class="text-light"></span>
                </div>
               
                <div class="col-2 d-flex justify-content-around align-items-center d-none d-md-flex">
                    <i class="fa-solid fa-volume-high text-light" id="volume-icon"></i>
                    <input type="range" title="volume" id="volume-control" min="0" max="1" step="0.01" value="1">
                </div>
                <div class="col-1 d-flex justify-content-center d-block d-md-none">
                    <span id="total-time2" class="text-light"></span>
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

    @endsection
    
    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/user/index.js')}}"></script> 
    <script src="{{asset('assets/js/user/jquery/index.js')}}"></script> 

    <script>
        $(document).ready(function() {
            $('.playsong').on('click', function (e) {
                const id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "history/store",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(response){
                        
                    },
                    
                });

            });

        });

    
    </script>

  
    @endpush

</x-user.layout.layout>