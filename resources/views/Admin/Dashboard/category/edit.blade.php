<x-admin.dashboard.layout.layout title="{{$category->name}}">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/category.css')}}" />
    @endpush
    @section('content')
    <div class="alert-container">
        @error('name')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('description')
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
   
    <div class="category-container">
        <div class="add-category-btn-container">
            <a href="{{route('category.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض الاقسم
            </a>
        </div>

        <div class="category-title">
            <p>
                
                <i class="ri-mic-line"></i>  تعديل بيانات القسم 
                <span class="category-name-text"> :  {{$category->name}}</span>
            </p>
        </div>

        <div class="category-content">
            <div class="category">
             
                <form action="{{route('category.update',$category->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('Admin.Dashboard.category._form',['label'=>'تعديل','category'=>$category,'route'=>true])
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