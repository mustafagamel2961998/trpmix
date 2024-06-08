<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    {{-- Set meta tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Set meta tags for seo --}}
    <meta name="description" content="Page description goes here.">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="robots" content="noindex, follow">
    {{-- Set meta tags for social media preview  --}}
    <meta property="og:title" content="Page Title">
    <meta property="og:description" content="Page description goes here.">
    <meta property="og:image" content="https://www.example.com/image.jpg">
    {{-- Include sweet alert --}}
    {{-- <link rel="stylesheet" href="{{'assets/css/admin/auth/sweetalert.min.css')}}" /> --}}
    {{-- Include remixicon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" />
    {{-- Include bootstrap css file --}}
    <link rel="stylesheet" href="{{asset('assets/css/admin/auth/bootstrap.rtl.css')}}" />
    {{-- Globle style file --}}
    <link rel="stylesheet" href="{{asset('assets/css/globle/globle.css')}}" />
    {{-- Login style file --}}
    <link rel="stylesheet" href="{{asset('assets/css/admin/auth/login.css')}}" />
    
    <title>تسجيل الدخول - لوحة التحكم</title>
</head>
<body>
    
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
        @if(Session::has('loginFailed'))
            <p class="danger-alert">
                {{Session::get('loginFailed')}} <i class="ri-error-warning-line"></i>
            </p>
        @endif
        @if(Session::has('success'))
            <p class="success-alert">
                {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
            </p>
        @endif

        
   </div>

    @if(Session::has('statusFailed'))
        <div class="alert-status-container">
            <div class="alert-status">
                    
                <div>
                    <p>
                        <i class="ri-error-warning-line"></i>
                    </p>
                    {{Session::get('statusFailed')}}
                    <div>
                        <button type="button" class="status-failed-alert">تم</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    @if(Session::has('middlewareFailed'))
        <div class="alert-status-container">
            <div class="alert-status">
                    
                <div>
                    <p>
                        <i class="ri-error-warning-line"></i>
                    </p>
                    {{Session::get('middlewareFailed')}}
                    <div>
                        <button type="button" class="status-failed-alert">تم</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    

   <div class="dashboard-login-container">
    <div class="dashboard-login-content">
        <div class="dashboard-login">
            <div class="dashboard-login-poster">
                <div>
                    <img src="{{asset('assets/media/default/icon/dashboard/music.svg')}}" alt="تسجيل الدخول">
                    <p class="brand-name">طــرب مـيكــس دوت كـوم</p>
                </div>
            </div>
            <form action="{{route('dashboard.login.method')}}" method="POST"> 
                @csrf
                <div class="input-container">
                    <div class="dashboard-login-form-poster">
                        <img src="{{asset('assets/media/default/icon/dashboard/headphone_music.svg')}}" alt="تسجيل الدخول">
                    </div>
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
                </div>
            </form>
        </div> 
    </div> 
   </div> 
      
    {{-- Include bootstrap js file --}}
    <script src="{{asset('assets/js/admin/auth/bootstrap.bundle.min.js')}}"></script>  
    {{-- Include sweetalert js file --}} 
    {{-- <script src="{{asset('assets/js/admin/auth/sweetalert.all.min.js')}}"></script>    --}}
    {{-- Include globle jquery js file --}} 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/globle/jquery/globle.js')}}"></script>   
</body>



</html>