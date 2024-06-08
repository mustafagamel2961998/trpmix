<x-user.layout.layout title="الرئيسية">
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/user/search.css') }}" />
    @endpush


    {{-- start index content --}}
    @section('content')
        @if ($singers->count())
            <div class="singers-container">
                <div class="singers-content">

                    <div class="singers-hedaer">
                        <div class="singers-header-content">

                            <div class="singers-header-title">
                                <h4>المغنين</h4>
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
                            @foreach ($singers as $Singer)
                                <li class="singers-items">
                                    <div class="singers-avatar">
                                        <img src="{{ $Singer->getFirstMediaUrl('singer') }}" alt="">
                                    </div>
                                    <div class="singers-name">
                                        <p class="singers-name-text">
                                            <a href="{{ route('home.singer.show', [$Singer->id, $Singer->slug]) }}">
                                                {{ $Singer->name }}
                                            </a>
                                        </p>
                                        <p class="text">مغني</p>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            </div>
        @endif
        @if ($songs->count())
            {{-- header section (singer data) --}}
            <div class="singers-container">
                <div class="singers-content">

                    <div class="singers-hedaer">
                        <div class="singers-header-content">
                            <div class="singers-header-title">
                                <h4>الاغاني</h4>
                            </div>
                        </div>
                    </div>


                    <div class="singers">
                        <ul class="singers-list-items">
                            @foreach ($songs as $song)
                                <li class="singers-item">
                                    <div class="singer-song-data">
                                        <div class="singer-avatar">
                                            <img src="{{ $song->getFirstMediaUrl('song') }}" alt="{{ $song->title }}">
                                        </div>
                                        <div class="info">
                                            <div class="song-title">
                                                <a
                                                    href="{{ route('song.show', [$song->id, $song->slug]) }}">{{ $song->title }}</a>
                                            </div>
                                            <div class="singer-name">
                                                <a
                                                    href="{{ route('home.singer.show', [$song->singer->id, $song->singer->slug]) }}">
                                                    {{ $song->singer->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        @endif
        @if ($albums->count())
            {{-- header section (singer data) --}}
            <div class="album-container">

                <div class="album-hedaer">
                    <div class="album-header-content">

                        <div class="album-header-title">
                            <h4>الالبومات</h4>
                        </div>

                    </div>
                </div>

                <div class="album-content">
                    <div class="album">
                        <ul class="album-list-items">
                            @foreach ($albums as $album)
                                <li class="album-item">

                                    <div class="album-media">
                                        <div>
                                            @auth
                                                <div class="icon">
                                                    <i class="ri-play-fill"></i>
                                                    <p>
                                                        {{ $album->view }}
                                                    </p>
                                                </div>
                                                <div class="icon add-to-favorite" data-id="{{ $album->id }}">

                                                    <i class="ri-heart-line"></i>
                                                    <p>
                                                        {{ $album->favorites_count }}
                                                    </p>

                                                </div>
                                                <div class="icon">
                                                    <i class="ri-headphone-line"></i>
                                                    <p>
                                                        {{ $album->songs_count }}
                                                    </p>
                                                </div>
                                            @endauth


                                        </div>

                                        <a href="{{ route('home.album.show', [$album->id, $album->slug]) }}">
                                            <img src="{{ $album->getFirstMediaUrl('album') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="album-footer">
                                        <div class="icon">
                                            <i class="ri-play-circle-line"></i>
                                        </div>
                                        <span>
                                            <a href="{{ route('home.album.show', [$album->id, $album->slug]) }}">
                                                {{ $album->name }}
                                            </a>
                                        </span>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    @endsection

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @endpush

</x-user.layout.layout>
