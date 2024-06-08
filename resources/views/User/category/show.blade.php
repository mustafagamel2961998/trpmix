<x-user.layout.layout title="{{$songsByCategory->name}}">
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

       
                <div class="singers">
                      <ul class="singers-list-items">
                        @if($songsByCategory->count())
                                @foreach($songsByCategory->songs as $song)
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
                            <a href="">
                                المزيد >
                            </a>
                        </div>

                        <div class="other-singers-list">
                            <ul class="other-singers-list-items">
                                @if($singers->count())
                                    @foreach ($singers as $singer)
                                                <li class="other-singers-item">
                                                    <div class="singer-avatar">
                                                        <img src="{{$singer[0]->getFirstMediaUrl('singer')}}" alt="{{$singer[0]->name}}">
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
                                                    <a href="">
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


    @endsection
    
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/user/songs.js')}}"></script> 
        <script src="{{asset('assets/js/user/jquery/songs.js')}}"></script> 
    @endpush

</x-user.layout.layout>