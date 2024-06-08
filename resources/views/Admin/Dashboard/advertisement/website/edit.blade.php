<x-admin.dashboard.layout.layout title="song name">
    {{-- {{$adwebsite->song->name}} --}}
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/adwebsite.css')}}" />
    @endpush
    @section('content')
    <div class="alert-container">
        @error('logo_image')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('computer_image')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('mobile_image')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('song_id')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('pin')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
    </div>
   
    <div class="adwebsite-container">
        <div class="add-adwebsite-btn-container">
            <a href="{{route('website.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض إعلانات الموقع
            </a>
        </div>

        <div class="adwebsite-title">
            <p>
                
                <i class="ri-mic-line"></i>  تعديل بيانات إعلان للاغنية
                <span class="adwebsite-name-text"> :  أسم الاغنية </span>
                {{-- {{$adwebsite->song->name}} --}}
            </p>
        </div>

        <div class="adwebsite-content">
            <div class="adwebsite">
             
                <form action="{{route('website.update',$adwebsite->id)}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('Admin.Dashboard.advertisement.website._form',['label'=>'تعديل','adwebsite'=>$adwebsite,'songs'=>$songs,'route'=>true])
                </form>
            </div>

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/adwebsite.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/adwebsite.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>