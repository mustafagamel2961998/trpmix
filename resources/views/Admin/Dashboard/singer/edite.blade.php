<x-admin.dashboard.layout.layout title="{{$singer->name}}">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/singer.css')}}" />
    @endpush
    @section('content')
    <div class="alert-container">
        @error('image')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('name')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('bio')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('country_code')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('status')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        {{-- @error('slug')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror --}}
    </div>
   
    <div class="singer-container">
        <div class="add-singer-btn-container">
            <a href="{{route('singer.index')}}" class="route">
                <i class="fa-solid fa-eye"></i>  عرض المطربين
            </a>
        </div>
        <div class="singer-title">
            <p>
                
                <i class="ri-mic-line"></i>  تعديل بيانات المطرب 
                <span class="singer-name-text"> :  {{$singer->name}}</span>
            </p>
        </div>

        <div class="singer-content">
            <div class="singer">
                <form action="{{route('singer.update',$singer->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('Admin.Dashboard.singer._form',['label'=>'تعديل','singer'=>$singer,'countries'=>$countries,'route'=>true])
                </form>
            </div>

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/singer.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/singer.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>