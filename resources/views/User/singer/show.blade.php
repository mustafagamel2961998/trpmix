<x-user.layout.layout title="{{$singer->name}}">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/user/singer.css')}}" />
        <meta property="og:image" content="{{$singer->getFirstMediaUrl('singer')}}">

    @endpush
    {{-- start singer content --}}
    @section('content')
    <div class="singer-container">

        <div class="right-content">
            {{-- header section (singer data) --}}
            <div class="singer-data-section-container">
                <div class="singer-data-section-content">
                    <div class="singer-data-section">

                        <div class="singer-right-data">
                            <div class="header">
                                {{$singer->name}}
                            </div>

                            <div class="body">
                                <div class="singer-type">
                                    <span>
                                        مغني فردي
                                    </span>
                                </div>
                                <div class="singer-name">
                                    <h3>{{$singer->name}}</h3>
                                </div>
                            </div>
                            <div class="footer">
                                <p>{{$singer->bio}}</p>
                            </div>
                        </div>


                        <div class="singer-left-data">
                            <div class="avatar">
                                <img src="{{$singer->getFirstMediaUrl('singer')}}" alt="{{$singer->name}}">
                            </div>
                            <h3>{{$singer->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="singer-tabs-data-container">
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
            </div>

        {{-- body section {{ body section }} --}}
        <section class="body-section-container">
            <div class="new-songs-container">
                <div class="new-songs-content">
                    <div class="new-songs">
                        {{-- First section --}}
                        {{-- New songs header --}}
                        <div class="new-songs-header">

                                <div class="title-container">
                                    <h3>
                                        {{-- <i class="ri-music-2-line"></i>  --}}
                                        <span> أغاني منفردة لـــ"{{$singer->name}}"</span>
                                    </h3>
                                </div>
                        </div> 

                        {{-- secoend section --}}
                        {{-- New songs --}}
                        <div class="new-songs-data-container">
                            <div class="new-songs-data-content">

                                <div class="new-songs-data">
                                    <ul class="new-songs-data-list-items" id="single_songs">
                                        @foreach ($singerSingleSongs->songs as $singerSingleSong)
                                            <a href="{{route('song.show',[$singerSingleSong->id,$singerSingleSong->slug])}}">
                                                <li class="new-songs-data-item">

                                                    <div class="new-songs-data-item-header">
                                                        <div class="new-songs-data-item-image">
                                                            <img src="{{$singerSingleSong->getFirstMediaUrl('song')}}" alt="">
                                                        </div>
                                                        <div class="new-songs-data-item-song-name">
                                                            <a href="">{{$singerSingleSong->title}}</a>
                                                            <div class="new-songs-data-item-singer-name">
                                                                {{$singerSingleSong->singer->name}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                
                                                </li>
                                            </a>
                                        
                                        @endforeach
                                    </ul>
                                </div>
                                {{-- @if($singerSingleSongs->songs->count())
                                <div class="load-more">
                                    <p>عرض المزيد</p>
                                </div>
                                @endif --}}
                            </div>
                        </div>



                        

                        {{-- First section --}}
                        {{-- New songs header --}}
                        <div class="new-songs-header">

                            <div class="title-container">
                                <h3>
                                    {{-- <i class="ri-music-2-line"></i>  --}}
                                    <span> أغاني شائعة لـــ"{{$singer->name}}"</span>
                                </h3>
                            </div>
                    </div> 

                    {{-- secoend section --}}
                    {{-- New songs --}}
                    <div class="new-songs-data-container" id="comman_songs">
                        <div class="new-songs-data-content">

                            <div class="new-songs-data">
                                <ul class="new-songs-data-list-items">
                                    @foreach ($singer->songs as $song)
                                        <a href="{{route('song.show',[$song->id,$song->slug])}}">
                                            <li class="new-songs-data-item">

                                                <div class="new-songs-data-item-header">
                                                    <div class="new-songs-data-item-image">
                                                        <img src="{{$song->getFirstMediaUrl('song')}}" alt="{{$song->title}}">
                                                    </div>
                                                    <div class="new-songs-data-item-song-name">
                                                        <a href="">{{$song->title}}</a>
                                                        <div class="new-songs-data-item-singer-name">
                                                        {{$song->singer->name}}
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            
                                            </li>
                                        </a>
                                    
                                    @endforeach
                                </ul>
                            </div>
                            {{-- @if($singerSingleSongs->songs->count())
                            <div class="load-more">
                                <p>عرض المزيد</p>
                            </div>
                            @endif --}}
                        </div>
                    </div>
                </div> 
            </div>       

        </section>

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
                            <a href="">
                                المزيد >
                            </a>
                        </div>
                        <ul class="weekly-songs-list-items">
                            @foreach ($singerHighListenSongs->songs as $weeklySongList)
                            
                                <li class="weekly-songs-list-item">
                                    <div>
                                            <img src="{{$weeklySongList->getFirstMediaUrl('song')}}" alt="{{$weeklySongList->singer->name}}">
                                    </div>
                                    <div>
                                        <div class="singer-name">
                                            <a href="{{route('song.show',[$weeklySongList->id,$weeklySongList->slug])}}">
                                                {{$weeklySongList->title}}
                                            </a>
                                                <a style="color: #806c8f;" href="{{route('home.singer.show',[$weeklySongList->singer->id,$weeklySongList->singer->slug])}}">   
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
                                <i class="ri-mic-line"></i> معنين آخرين</h4>
                            <a href="">المزيد ></a>
                        </div>

                        <div class="other-singers-list">
                            <ul class="other-singers-list-items">
                                @foreach($othersSingers as $otherSinger)
                                <li class="other-singers-item">
                                    <div class="singer-avatar">
                                        <img src="{{$otherSinger->getFirstMediaUrl('singer')}}" alt="{{$otherSinger->name}}">
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
    <script src="{{asset('assets/js/user/singer.js')}}"></script> 
    <script src="{{asset('assets/js/user/jquery/singer.js')}}"></script> 
    
    <script>
    // function autoScroll() {
    //     var scrollableElement = document.getElementById("scrollable");
      
    //     scrollableElement.scrollTop += 20;

    //     // Call autoScroll again after a delay
    //     setTimeout(autoScroll, 1000); // Adjust the delay (in milliseconds) as needed
    // }
    
    // // Start the autoScroll function initially
    // autoScroll();
    
    </script>

  
    @endpush

</x-user.layout.layout>