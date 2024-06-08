<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    {{-- Set meta tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Set meta tags for seo --}}
    <meta name="description" content="{{$setting->website_descritpion}}">
    <meta name="keywords" content="@foreach ($setting->website_keywords as $keyword){{$keyword}} , @endforeach">
    <meta name="robots" content="noindex, follow">
    {{-- Set meta tags for social media preview  --}}
    <meta property="og:title" content="{{$setting->website_name}}">
    <meta property="og:description" content="{{$setting->website_descritpion}}">
    <meta property="og:image" content="{{$setting->getFirstMediaurl('setting')}}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('/'.'favicon.ico')}}">
    <!-- Remiox Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    {{-- Include tagify css file --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" /> --}}

    {{-- Include bootstrap css file --}}
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/layout/bootstrap.rtl.css')}}" />
    {{-- Globle style file --}}
    <link rel="stylesheet" href="{{asset('assets/css/globle/globle.css')}}" />
    {{-- Style file --}}
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/layout/layout.css')}}" />
    @stack('style')
    <title>{{$title}}</title>
</head>
<body>
     <div class="alert-container">
        @if(Session::has('success'))
        <p class="success-alert">
            {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
        </p>
        @endif
        @if(Session::has('failed'))
        <p class="danger-alert">
            {{Session::get('failed')}} <i class="ri-checkbox-circle-line"></i>
        </p>
        @endif
        @error('avatar')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
   
     </div>
   
     <div class="dashboard-welcome-message-container" style=" @if(Session::has('successLoginMessage')) visibility: visible;  @endif">
      <div class="dashboard-welcome-message-close-btn">
        <i class="ri-close-line"></i>
      </div>
      @if(Session::has('successLoginMessage'))
      <div class="login-message">
        <div class="message-icon">
          <img src="{{asset('/'.'assets/media/default/icon/dashboard/login_welcome_message.svg')}}" alt="رسالة ترحيبية">
        </div>
        <div class="success-login-message-text-container">
            <p class="success-login-message-text">
              {{Session::get('successLoginMessage')}} 
            </p>
        </div>
        <div class="done-btn-container">
          <button type="button" class="done-btn-container-btn">تم</button>
        </div>
      </div>
      @endif
     </div>
    
     <section class="container">
      
      <div class="dashboard-sidebar">
        <div class="page-wrapper chiller-theme">
          <a id="show-sidebar" href="javascript:void(0)">
            <i class="fas fa-bars"></i>
          </a>
          <nav id="sidebar" class="sidebar-wrapper">

              <div class="sidebar-content">
                  
                  <div class="sidebar-brand">
                    <a href="{{route('index.index')}}">طــرب مــيــكس</a>
                    <div id="close-sidebar">
                      <i class="fas fa-times"></i>
                    </div>

                  </div>
                  <div class="sidebar-header">
                    
                    <div class="user-info">
                      <span class="user-name">
                        <strong>{{auth('admin')->user()->first_name}} {{auth('admin')->user()->last_name}}</strong>
                      </span>
                      <span class="user-role">مـــــســـؤل</span>
                      <span class="user-status">
                        @if (auth('admin')->user()->online)
                        <i class="fa fa-circle online"></i>
                        <span>متصل <i class="ri-wifi-line"></i></span>
                        @else
                          <i class="fa fa-circle offline"></i>
                          <span>غير متصل <i class="ri-wifi-off-line"></i></span>
                        @endif
                      </span>
                    </div>
                   <form action="{{route('index.update',auth('admin')->user()->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <label for="avatar" class="avatar-label">
                        <div class="user-pic">
                          <img class="img-responsive img-rounded" 
                          src="{{asset(auth('admin')->user()->getFirstMediaUrl('admin'))}}" alt="Avatar">
                        </div>
                        <input type="file" name="avatar" id="avatar">
                      </label>
                      <div class="submit-preview-container">
                        <div class="submit-preview-close">
                            <i class="ri-close-fill"></i>
                        </div>
                        <div class="submit-preview-content">
                          
                          <div class="submit-preview">
                            <div>
                              <div class="avatar">
                                <img id="avatar_preview" src="https://www10.0zz0.com/2023/10/18/18/863388027.png" alt="Avatar">
                              </div>
                              <button type="submit">تعديل</button>
                            </div>
                          </div>
                        </div>
                      </div>
                   </form>
                  </div>
            
                  <!-- sidebar-search  -->
                  <div class="sidebar-menu">
                    <ul>
                        <div>
                            <li class="header-menu">
                              <span>عام</span>
                            </li>
                            <li class="sidebar">
                                <a href="{{route('index.index')}}">
                                  <div>
                                    <i class="fa-solid fa-house"></i>
                                    <span>الرئيسية</span>
                                  </div>
                                </a>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="javascript:void(0)">
                                    <div>
                                      <i class="fa-solid fa-gauge"></i>
                                      <span>المسؤولين</span>
                                    </div>
        
                                    <div>
                                      <i class="ri-arrow-down-line"></i>
                                    </div>
                                </a>
                                <div class="sidebar-submenu">
                                  <ul>
                                      <a href="{{route('admin.index')}}">
                                        <li>
                                          <i class="fa-solid fa-eye"></i>   عرض المسؤولين 
                                        </li>
                                      </a>
                                      <a href="{{route('admin.create')}}">
                                          <li>
                                            <i class="fa-solid fa-plus"></i>  إضافة مسؤل
                                          </li>
                                      </a>
                                  </ul>
                                </div>
                            </li>
                        </div>
                      
                        <div>
                            <li class="header-menu">
                              <span>المستخدمون</span>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="javascript:void(0)">
                                    <div>
                                      <i class="fa-solid fa-users"></i>
                                      <span>المستخدمين</span>
                                    </div>
        
                                    <div>
                                      <i class="ri-arrow-down-line"></i>
                                    </div>

                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                          <a href="{{route('user.index')}}">
                                            <li>
                                              <i class="fa-solid fa-eye"></i>   عرض المستخدمون 
                                            </li>
                                          </a>
                                          <a href="{{route('user.create')}}">
                                              <li>
                                                <i class="fa-solid fa-plus"></i>  إضافة مستخدم
                                              </li>
                                          </a>
                                    </ul>
                                </div>
                            </li>
                        </div>

                        <div>
                          <li class="header-menu">
                            <span>الاقسام</span>
                          </li>
                          <li class="sidebar-dropdown">
                              <a href="javascript:void(0)">
                                  <div>
                                    <i class="fa-solid fa-bars"></i>
                                    <span>الاقسام</span>
                                  </div>
      
                                  <div>
                                    <i class="ri-arrow-down-line"></i>
                                  </div>

                              </a>
                              <div class="sidebar-submenu">
                                  <ul>
                                        <a href="{{route('category.index')}}">
                                          <li>
                                            <i class="fa-solid fa-eye"></i>   عرض الاقسام 
                                          </li>
                                        </a>
                                        <a href="{{route('category.create')}}">
                                            <li>
                                              <i class="fa-solid fa-plus"></i>  إضافة قسم
                                            </li>
                                        </a>
                                  </ul>
                              </div>
                          </li>
                      </div>  

                         <div>
                            <li class="header-menu">
                              <span>المطربين</span>
                            </li>   
                            <li class="sidebar-dropdown">
                                  <a href="javascript:void(0)">
                                      <div>
                                        <i class="fa-solid fa-microphone"></i>
                                        <span>المطربين</span>
                                      </div>
      
                                      <div>
                                        <i class="ri-arrow-down-line"></i>
                                      </div>
                                  </a>
                              
                              <div class="sidebar-submenu">
      
                                <ul>
                                      <a href="{{route('singer.index')}}">
                                        <li>
                                          <i class="fa-solid fa-eye"></i>   عرض المطربين 
                                        </li>
                                      </a>
                                      <a href="{{route('singer.create')}}">
                                          <li>
                                            <i class="fa-solid fa-plus"></i>  إضافة مطرب
                                          </li>
                                      </a>
                                      <a href="{{route('singer.recycle.view')}}">
                                        <li>
                                          <i class="fa-solid fa-trash"></i> المطربين المحذوفين
                                        </li>
                                      </a>
                                </ul>
                              </div>
                        
                              
                            </li>
                         </div> 
                          
                         <div>
                              <li class="header-menu">
                                  <span>الالبومات</span>
                              </li>   
                              <li class="sidebar-dropdown">
                                    <a href="javascript:void(0)">
                                        <div>
                                          <i class="fa-solid fa-record-vinyl"></i>
                                          <span>الالبومات</span>
                                        </div>
                                        <div>
                                          <i class="ri-arrow-down-line"></i>
                                        </div>
                                    </a>
                                    <div class="sidebar-submenu">
                                          <ul>
                                                <a href="{{route('album.index')}}">
                                                  <li>
                                                    <i class="fa-solid fa-eye"></i>   عرض الالبومات 
                                                  </li>
                                                </a>
                                                <a href="{{route('album.create')}}">
                                                    <li>
                                                      <i class="fa-solid fa-plus"></i>  إضافة البوم
                                                    </li>
                                                </a>
                                                <a href="{{route('album.recycle.view')}}">
                                                  <li>
                                                    <i class="fa-solid fa-trash"></i> الالبومات المحذوفين
                                                  </li>
                                                </a>
                                          </ul>
                                    </div>
                              </li>
                         </div>

                         <div>
                          <li class="header-menu">
                              <span>الاغاني</span>
                          </li>   
                          <li class="sidebar-dropdown">
                                <a href="javascript:void(0)">
                                    <div>
                                      <i class="fa-solid fa-music"></i>
                                      <span>الاغاني</span>
                                    </div>
                                    <div>
                                      <i class="ri-arrow-down-line"></i>
                                    </div>
                                </a>
                                <div class="sidebar-submenu">
                                      <ul>
                                            <a href="{{route('song.index')}}">
                                              <li>
                                                <i class="fa-solid fa-eye"></i>   عرض الاغاني 
                                              </li>
                                            </a>
                                            <a href="{{route('song.create')}}">
                                                <li>
                                                  <i class="fa-solid fa-plus"></i>  إضافة اغنية
                                                </li>
                                            </a>
                                            <a href="{{route('song.recycle.bin.view')}}">
                                              <li>
                                                <i class="fa-solid fa-trash"></i>  الاغاني المحذوفة
                                              </li>
                                          </a>
                                      </ul>
                                </div>
                          </li>
                     </div>






                         <div>
                          <li class="header-menu">
                            <span>الاعلانات </span>
                          </li>   

                          <li class="sidebar-dropdown">
                                  <a href="javascript:void(0)">
                                      <div>
                                        <i class="fa-solid fa-rectangle-ad"></i>
                                        <span>الاعلانات</span>
                                      </div>
      
                                      <div>
                                        <i class="ri-arrow-down-line"></i>
                                      </div>
                                  </a>
                              
                              <div class="sidebar-submenu">
      
                                <ul>
                                      <a href="{{route('website.index')}}">
                                          <li>
                                            <i class="fa-solid fa-eye"></i> عرض إعلانات الاغاني
                                          </li>
                                      </a>
                                      
                                </ul>
                              </div>
                        
                              
                            </li>
                       
                       
                       </div>

                      <div>
                        <li class="header-menu">
                          <span>الاعدادات</span>
                        </li>   
                        <li class="sidebar">
                            <a href="{{route('setting.index')}}">
                              <div>
                                <i class="fa-solid fa-gear"></i>
                                <span>الاعدادات</span>
                              </div>
                            </a>
                        </li>
                      </div>

                    </ul>
                  </div>
                  <!-- sidebar-menu  -->
              </div>
              <!-- sidebar-content  -->
              <div class="sidebar-footer">
                <a href="#">
                  <i class="fa fa-bell"></i>
                  <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                  <i class="fa fa-envelope"></i>
                  <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="{{route('setting.index')}}">
                  <i class="fa fa-cog"></i>
                  <span class="badge-sonar"></span>
                </a>
                <a href="javascript:void(0)">
                <form action="{{route('admin.logout')}}" method="POST">
                  @csrf
                  <button type="submit">
                    <i class="fa fa-power-off"></i>
                  </button>
                </form>
              </a>
              </div>
            </nav>
        
        </div>
   
      </div>

      <div class="dashboard-header">
        

        <div class="last-song-container">
           <div class="last-song-title">
            <p><i class="ri-music-2-line"></i> اخر الاغاني</p>
          </div>

          <div class="last-song-content">
            <div class="last-song">
                <ul class="last-song-list-items">
                @forelse ($songs as $song)
                  <a href="{{route('song.edit',$song->id)}}">
                    <li class="last-song-item">
                        <img src="{{$song->getFirstMediaUrl('song')}}" alt="{{$song->title}}">
                        <div class="by-name">
                          <div class="text">
                            <p>بواسطة</p>
                            {{$song->admin->first_name .' ' . $song->admin->last_name}}
                          </div>
                        </div>
                        <div class="album-name"> 
                          <p class="text">{{$song->title}}</p>
                        </div>
                    </li>
                  </a>
                @empty
                  <a href="{{route('song.create')}}">
                    <li class="last-song-item">
                      <p> <i class="ri-links-line"></i> لا يوجد اي اغاني حتي الان </p>
                    </li>
                 </a>
               @endforelse

                
              </ul>
              
            </div>
          </div>
        </div>


       <div class="last-album-container"> 
          <div class="last-album-title">
            <p><i class="ri-disc-line"></i> اخر الالبومات</p>
          </div>
          <div class="last-album-content"> 
            <div class="last-album"> 
              <ul class="last-album-list-items">
                @forelse ($lastAlbums as $lastAlbum)
                  
                  <a href="{{route('album.edit',$lastAlbum->id)}}">
                    <li class="last-album-item">
                        <img src="{{$lastAlbum->getFirstMediaUrl('album')}}" alt="{{$lastAlbum->name}}">
                        <div class="by-name">
                          <div class="text">
                            <p>بواسطة</p>
                            {{$lastAlbum->admin->first_name .' ' . $lastAlbum->admin->last_name}}
                          </div>
                        </div>
                        <div class="album-name"> 
                          <p class="text">{{$lastAlbum->name}}</p>
                        </div>
                    
                    </li>
                  </a>
                @empty
                  <a href="{{route('album.create')}}">
                    <li class="last-song-item">
                      <p> <i class="ri-links-line"></i> لا يوجد اي البومات حتي الان </p>
                    </li>
                 </a>
               @endforelse
                
              </ul>
            </div>
          </div>
       </div>


        <div class="info-container">
          <div class="info-title">
            <p><i class="ri-pie-chart-2-line"></i> إحصاءات </p>
          </div>
          <div class="info-content">
            <div class="info">
              <ul class="info-list-items">
                <a href="{{route('song.index')}}">
                  <li class="info-item music">
                    <div class="right">
                      <img src="{{asset('/'.'assets/media/default/icon/dashboard/music_count.svg')}}" alt="عدد الاغاني">
                      <p class="text">اغاني</p>
                    </div>
                    <div class="left">
                      <p class="count">{{$songsCount}}</p>
                    </div>
                  </li>
                </a>
                <a href="{{route('album.index')}}">
                  <li class="info-item album">
                    <div class="right">
                      <img src="{{asset('/'.'assets/media/default/icon/dashboard/album_count.svg')}}" alt="عدد الالبومات">
                      <p class="text">الالبومات</p>
                    </div>
                    <div class="left">
                      <p class="count">{{$albumsCount}}</p>
                    </div>
                  </li>
                </a>
                <a href="{{route('singer.index')}}">
                  <li class="info-item singer">
                    <div class="right">
                      <img src="{{asset('/'.'assets/media/default/icon/dashboard/singer_count.svg')}}" alt="عدد المطربين">
                      <p class="text">المطربين</p>
                    </div>
                    <div class="left">
                      <p class="count">{{$singersCount}}</p>
                    </div>
                  </li>
                </a>
                <a href="{{route('user.index')}}">
                  <li class="info-item users">
                    <div class="right">
                      <img src="{{asset('/'.'assets/media/default/icon/dashboard/user_count.svg')}}" alt="عدد المستخدمين">
                      <p class="text">المستخدمين</p>
                    </div>
                    <div class="left">
                      <p class="count">{{$usersCount}}</p>
                    </div>
                  </li>
                </a>

                
              </ul>
            </div>
          </div>
        </div>

        @yield('content')
      </div>
          
     </section>

    {{-- Include bootstrap js file --}}
    <script src="{{asset('assets/js/admin/dashboard/layout/bootstrap.bundle.min.js')}}"></script>  
    <script src="https://kit.fontawesome.com/9dba1ebd97.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- Include tagify js file --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
     --}}
    {{-- Inlcude custome js file --}}
    <script src="{{asset('assets/js/globle/globle.js')}}"></script> 
    <script src="{{asset('assets/js/globle/jquery/globle.js')}}"></script> 
    <script src="{{asset('assets/js/admin/dashboard/jquery/layout.js')}}"></script> 
    @stack('script')
</body>
</html>