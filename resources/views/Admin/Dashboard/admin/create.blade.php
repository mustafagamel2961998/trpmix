<x-admin.dashboard.layout.layout title="إضافة مسؤل جديد">
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
    </div>
   
    <div class="admin-container">
        <div class="add-admin-btn-container">
            <a href="{{route('admin.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض المسؤولين
            </a>
        </div>

        <div class="admin-title">
            <p><i class="ri-mic-line"></i>  إضافة مسؤل جديد </p>
        </div>

        <div class="admin-content">
            <div class="admin">
             


                <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('Admin.Dashboard.admin._form',['label'=>'إضافة','permissions'=>$permissions, 'admin'=>$admin,'route'=>false])
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