<x-admin.dashboard.layout.layout title="{{$admin->first_name .' ' . $admin->last_name}}">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/admin.css')}}" />
    @endpush
    @section('content')
    <div class="alert-container">
        @error('avatar')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
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
        @error('phone')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        
        @if(Session::has('errorPassword'))
            <p class="danger-alert">
                {{Session::get('errorPassword')}} <i class="ri-error-warning-line"></i>
            </p>
        @endif
        
    </div>
   
    <div class="admin-container">
        <div class="add-admin-btn-container">
            <a href="{{route('admin.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض المسؤولين
            </a>
        </div>

        <div class="admin-title">
            <p>
                
                <i class="ri-mic-line"></i>  تعديل بيانات المسؤل 
                <span class="admin-name-text"> :  {{$admin->first_name .' ' . $admin->last_name}}</span>
            </p>
        </div>

        <div class="admin-content">
            <div class="admin">
             

                <form action="{{route('admin.update',$admin->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('Admin.Dashboard.admin._form',['label'=>'تعديل','admin'=>$admin,'route'=>true])
                </form>
            </div>

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/admin.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/admin.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>