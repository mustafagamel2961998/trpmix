<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
        {{-- Set csrf token for ajax requests --}}
        <meta name="csrf-token" content="{{ Session::token() }}"> 

        {{-- Set meta tags --}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- Set meta tags for seo --}}
        <meta name="description" content="{{$setting->website_descritpion}}">
        <meta name="keywords" content="@foreach ($setting->website_keywords as $keyword){{$keyword}} , @endforeach">
        {{-- Set meta tags for social media preview  --}}
        <meta property="og:title" content="{{$setting->website_name}}">
        <meta property="og:description" content="{{$setting->website_descritpion}}">
        {{-- <meta property="og:image" content="{{$setting->getFirstMediaurl('setting')}}"> --}}

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        {{-- fontawesome --}}
        <link rel="stylesheet" href="{{asset('assets/css/user/layout/all.min.css')}}">
        <!-- Remiox Icon -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
        {{-- Include bootstrap css file --}}
        <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/layout/bootstrap.rtl.css')}}" />
        {{-- Include bootstrap audio player design --}}
        <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
        {{-- Globle style file --}}
        <link rel="stylesheet" href="{{asset('assets/css/globle/globle.css')}}" />
        {{-- Style file --}}
        <link rel="stylesheet" href="{{asset('assets/css/user/layout/layout.css')}}" />
        @stack('style')
        <title>{{$title}}</title>
</head>
<body style="background-color:{{$setting->user_website_bg}}">

      <div class="alert-container">
        @if(Session::has('success'))
        <p class="success-alert">
            {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
        </p>
        @endif
        @error('email')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('password')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror

        @error('name')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('password_confirmed')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
      </div>

    <section class="section">
      <div class="auth-form-container">
        <div class="auth-form-close">
          <i class="ri-close-circle-line"></i>
        </div>
        <div class="auth-form-content">
          <div class="auth-form">
              <form  action="{{route('login')}}" method="POST" class="login-form">
                @csrf
                 <div class="mb-3">
                      <label for="email" class="form-label">البريد الالكتروني</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="البريد الالكتروني">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="كلمة المرور">
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-dark">
                      <i class="ri-login-circle-line"></i> دخول
                    </button>
                  </div>
                  <p class="sign-up-form-btn">
                    تسجيل حساب جديد
                  </p>
              </form>
              <form action="{{route('register')}}" method="POST" class="signup-form">
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label"> الاسم كامل</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="الاسم كامل">
                  </div>
                  <div class="mb-3">
                      <label for="email" class="form-label">البريد الالكتروني</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="البريد الالكتروني">
                  </div>
                  <div class="mb-3">
                      <label for="password" class="form-label">كلمة المرور</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="كلمة المرور">
                  </div>
                  <div class="mb-3">
                    <label for="password_confirmed" class="form-label">اعادة كتابة كلمة السر</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmed" placeholder="اعادة كتابة كلمة المرور">
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-dark">
                      <i class="ri-user-add-line"></i> سجل الان
                    </button>
                  </div>
                  <p class="login-form-btn">
                    تسجل الدخول
                  </p>
             </form>
          </div>
        </div>
      </div>
        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light"  style="@if ($setting->website_ads)  background: linear-gradient(rgb(19, 4, 56) 0%, rgba(33, 2, 80, 0) 100%) !important; @else background-color:{{$setting->user_website_navbar_bg}} @endif">
            <div class="container-fluid"  style="@if ($setting->website_ads)  background: linear-gradient(rgb(19, 4, 56) 0%, rgba(33, 2, 80, 0) 100%) !important; @else background-color:{{$setting->user_website_navbar_bg}} @endif">
              <a class="navbar-brand" href="{{route('index')}}">
                <img src="{{asset($setting->getFirstMediaurl('setting'))}}" alt="{{$setting->website_name}}">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #ffffff"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
               
               
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('index')}}">
                      <i class="ri-home-line"></i> الرئيسية 
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{Route('songs.index')}}">
                      <i class="ri-music-2-line"></i>  الاغاني
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('albums.index')}}">
                      <i class="ri-disc-line"></i> الالبومات
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('singers.index')}}">
                      <i class="ri-mic-line"></i>
                      المغنين
                    </a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                      <i class="ri-file-list-3-line"></i>  الاخبار
                    </a>
                  </li> --}}
                </ul>



                <form class="d-flex search-form" action="{{route('user.search')}}" method="POST">
                  @csrf
                  <div class="close-search-form"><i class="ri-close-circle-line"></i></div>
                    <input class="form-control" type="text" name="keyword" placeholder="بحث عن مغني أو اغنية أو البوم..." aria-label="Search"style="@if ($setting->website_ads)background-color:transparent; @else background-color:{{$setting->user_website_navbar_bg}} @endif">
                    <button class="nav-search-btn" type="submit">
                      <i class="ri-search-line"></i>
                    </button>
                </form>
                <div class="search-form-btn">
                  <i class="ri-search-line"></i>
                </div>


                <ul class="navbar-nav me-auto mb-2 mb-lg-0 join-us">
                  <li class="nav-item">
                    @guest
                    <a class="nav-link" href="#">
                      <button class="route join-btn">
                        <i class="ri-login-box-line"></i>
                        انضم الينا
                      </button>
                      
                    </a>
                    @endguest
                    @auth
                    <div class="dropdown">

                    <button class="route dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="ri-user-line"></i>
                      {{auth()->user()->name}}
                    </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="dropdown-menu-item">
                          <a class="dropdown-item" href="{{route('user.logout')}}">
                            {{-- <i class="ri-logout-circle-line"></i>  --}}
                              خروج 
                          </a>
                        </li>
                      
                      </ul>
                    </div>
                    @endauth
                   

                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                      <button class="create">
                        <i class="ri-add-line"></i>
                        حساب جديد    
                      </button>
                    </a>
                  </li> --}}
               
                 
                </ul>
              </div>
            </div>
        </nav>
        <div class="alert-container">
            @error('email')
              <p class="danger-alert">
                  {{$message}} <i class="ri-error-warning-line"></i>
              </p>
              @enderror
              @error('password')
                  <p class="danger-alert">
                      {{$message}} <i class="ri-error-warning-line"></i>
                  </p>
              @enderror
        </div>
        @if ($setting->website_ads)
        {{-- ads website slides --}}
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
     
          <div class="carousel-inner">
            @foreach ($adswebsite as $adwebsite)
             
                <div class="carousel-item @if($adwebsite->pin) active @endif">
                      <div class="covers-data">
                        <div class="compuer" style=" background-image: url({{$adwebsite->getFirstMediaUrl('adwebsite_computer')}})">

                        </div>
                        <div class="logo-container">
                          <img class="logo" src="{{$adwebsite->getFirstMediaUrl('adwebsite_logo')}}" class="d-block w-100" alt="{{$adwebsite->song->title}}">
                        </div>
                        {{-- <img class="compuer" src="{{$adwebsite->getFirstMediaUrl('adwebsite_computer')}}" class="d-block w-100" alt="{{$adwebsite->song->title}}"> --}}
                        <img  
                          style="
                            height: 670px !important;
                            min-height: 670px !important;
                            max-height: 670px !important;" 
                            class="mobile" src="{{$adwebsite->getFirstMediaUrl('adwebsite_mobile')}}" class="d-block w-100" alt="{{$adwebsite->song->title}}">
                      </div>
                      <div class="adwebsit-slider-info-container">
                        <div class="adwebsit-slider-info-content">

                          {{-- <div class="adwebsit-slider-info-song-words">
                            <p>{{$adwebsite->song->words}}</p>
                          </div> --}}
                          <div class="adwebsit-slider-info-song-singer-name">
                            <p>{{$adwebsite->song->singer->name}}</p>
                          </div>
                          <div class="adwebsit-slider-info-listen-or-download"> 
                            <a href="{{route('song.show',[$adwebsite->song->id,$adwebsite->song->slug])}}">
                              <button class="create">
                                <i class="ri-headphone-line"></i> أستماع
                              </button>
                            </a>
                            <a href="{{$adwebsite->song->download_link}}" target="_blank">
                              <button  class="route">
                                <i class="ri-download-2-line"></i>  تحميل
                              </button>
                            </a>
                          </div>
                        </div>
                      </div>
                 </div>
              
             
            @endforeach
           
          </div>
          {{-- <div class="logos">
              @foreach ($adswebsite as $adwebsite)
                @foreach ($adwebsite->getMedia('adwebsite_logo') as $logo)
                    {{$logo}}
                @endforeach
              @endforeach
          </div> --}}
          
        @endif
      

    </section>
  
  
    <div class="content-container">
      <div class="content-content">
        <div class="content">
          @yield('content') 
        </div>
      </div>
    </div>
  
  
    {{-- Include bootstrap js file --}}
    <script src="{{asset('assets/js/admin/dashboard/layout/bootstrap.bundle.min.js')}}"></script>
    {{-- Include bootstrap audio player design --}}
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>  

    {{-- Include fontawesome --}}
    <script src="https://kit.fontawesome.com/9dba1ebd97.js" crossorigin="anonymous"></script>
    {{-- Include query --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  
    {{-- Inlcude custome js file --}}
    <script src="{{asset('assets/js/globle/globle.js')}}"></script> 
    <script src="{{asset('assets/js/globle/jquery/globle.js')}}"></script> 
    <script src="{{asset('assets/js/user/layout/layout.js')}}"></script> 
    <script src="{{asset('assets/js/user/jquery/layout/layout.js')}}"></script> 
    <script>
  
      
    </script>
    @stack('script')
</body>
</html>