<x-admin.dashboard.layout.layout title="{{$song->title}}">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/song.css')}}" />
    @endpush
    @section('content')
    <div class="alert-container">
        @error('image')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('title')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('words')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('listen_link')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('download_link')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('album_id')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('singer_id')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('singer_duet_id')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('admin_id')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('category_id')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('year')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('time')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('kind')
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
   
    <div class="song-container">
        <div class="add-song-btn-container">
            <a href="{{route('song.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض الاغاني
            </a>
        </div>

        <div class="song-title">
            <p><i class="ri-mic-line"></i>  تعديل  بيانات اغنية : {{$song->title}}</p>
        </div>

        <div class="song-content">
            <div class="song">
             

                <form action="{{route('song.update',$song->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('Admin.Dashboard.song._form',['label'=>'تعديل','song'=>$song,'route'=>true])
                </form>
            </div>

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/song.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/song.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>