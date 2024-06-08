<x-admin.dashboard.layout.layout title="إضافة مستخدم جديد">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/user.css')}}" />
    @endpush
    @section('content')
    <div class="alert-container">
        @error('name')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
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
   
    <div class="user-container">
        <div class="add-user-btn-container">
            <a href="{{route('user.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض المستخدمون
            </a>
        </div>

        <div class="user-title">
            <p><i class="ri-mic-line"></i>  إضافة مستخدم جديد </p>
        </div>

        <div class="user-content">
            <div class="user">
             


                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    @include('Admin.Dashboard.user._form',['label'=>'إضافة','user'=>$user,'route'=>false])
                </form>
            </div>

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/user.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/user.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>