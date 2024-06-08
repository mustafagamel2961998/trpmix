<x-admin.dashboard.layout.layout title="{{$album->name}}">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/album.css')}}" />
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
        
        @error('album_download_link')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('singer_id')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('status')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
    </div>
   
    <div class="album-container">
        <div class="add-album-btn-container">
            <a href="{{route('album.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض الالبومات
            </a>
        </div>

        <div class="album-title">
            <p>
                <i class="ri-mic-line"></i>  تعديل بيانات الالبوم 
                <span class="singer-name-text"> :  {{$album->name}}</span>
            </p>
        </div>

        <div class="album-content">
            <div class="album">
                <form action="{{route('album.update',$album->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('Admin.Dashboard.album._form',['label'=>'تعديل','album'=>$album,'singers'=>$singers,'route'=>true])
                </form>
            </div>

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/album.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/album.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>