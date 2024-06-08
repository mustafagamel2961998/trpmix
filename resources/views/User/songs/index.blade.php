<x-user.layout.layout title="الاغاني">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/user/songs.css')}}" />
    @endpush
 
    {{-- start singer content --}}
    @section('content')
    <div class="singer-container">

        <div class="right-content">
            
        {{-- header section (singer data) --}}
        <div class="singers-container">
            <div class="singers-content">
                
            <div class="singers-hedaer">
                <div class="singers-header-content">

                    <div class="singers-header-title">
                        <h4>الاغاني</h4>
                    </div>
                    <div class="singers-header-form">
                        <form action="{{ URL::current() }}" method="GET" id="filterByYear">
                            <select name="created_at"> 
                                <option value="">إختار سنة</option>
                                    @for($i=2000; $i <= now()->year; $i++)
                                        <option value="{{$i}}" @if(request()->created_at == $i) selected @endif>{{$i}}</option>
                                    @endfor
                            </select>
                        </form>
                    </div>
                    {{-- <div class="singers-header-form">
                        <form>
                            <select>
                                <option value="">إختار سنة</option>
                                <option value="">2023</option>

                            </select>
                        </form>
                    </div> --}}



                </div>
            </div>

            <div class="singer-tabs-data-container">
                <div class="singer-tabs-data-content">
                    <div class="singer-tabs-data">
                        <ul class="singer-tabs-data-list-items">
                            @foreach($getCategoriesForSongsCategories as $getCategoryForSongsCategory)
                                <a href="{{route('song.show.category',$getCategoryForSongsCategory->id)}}">
                                    <li class="singer-tabs-data-item active">
                                         {{$getCategoryForSongsCategory->name}}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
                <div class="singers">
                      <ul class="singers-list-items">
                        @if($AllSongs->count())
                                @foreach($AllSongs as $song)
                                    <li class="singers-item">
                                        <div class="singer-song-data">
                                            <div class="singer-avatar">
                                                <img src="{{$song->getFirstMediaUrl('song')}}" alt="{{$song->title}}">
                                            </div>
                                            <div class="info">
                                                <div class="song-title">
                                                    <a href="{{route('song.show',[$song->id,$song->slug])}}">{{$song->title}}</a>
                                                </div>
                                                <div class="singer-name">
                                                    <a href="{{route('home.singer.show',[$song->singer->id,$song->singer->slug])}}">
                                                        {{$song->singer->name}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>  
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="load-more">
                            <p>عرض المزيد</p>
                        </div>
                    </div>
                </div>    

            </div>

        </div>


        <div class="left-content">
            {{-- left --}}
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

            
            <div class="weekly-songs-list-container">
                <div class="weekly-songs-list-content">
                    <div class="weekly-songs-list">
                        <div class="weekly-songs-list-header">
                            <h5> 
                                <i class="ri-music-2-line"></i> إغاني قد تسمعها</h4>
                            </h5>
                            <a href="">المزيد ></a>
                        </div>
                        <ul class="weekly-songs-list-items">
                           @if($historySongs->histories->count())
                                @foreach ($historySongs->histories->take(4) as $historySong)
                                        <li class="weekly-songs-list-item">
                                            <div>
                                                <i class="ri-video-line"></i>
                                            </div>
                                            <div>
                                                <div class="singer-name">
                                                    <a href="{{route('song.show',[$historySong->songs->id,$historySong->songs->slug])}}">
                                                        {{$historySong->songs->title}}
                                                    </a>
                                                    <a href="{{route('home.singer.show',[$historySong->songs->singer->id,$historySong->songs->singer->slug])}}" class="singer-name-link">
                                                        {{$historySong->songs->singer->name}}
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                
                                @endforeach
                          @endif
                        </ul>
                    </div>
                    {{-- <div class="over-shadow">

                    </div> --}}
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
        <script src="{{asset('assets/js/user/songs.js')}}"></script> 
        <script src="{{asset('assets/js/user/jquery/songs.js')}}"></script> 
    @endpush

</x-user.layout.layout>