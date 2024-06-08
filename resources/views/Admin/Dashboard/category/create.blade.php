<x-admin.dashboard.layout.layout title="إضافة قسم جديد">
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
                <i class="fa-solid fa-eye"></i> عرض الاقسام
            </a>
        </div>

        <div class="category-title">
            <p><i class="ri-mic-line"></i>  إضافة قسم جديد </p>
        </div>

        <div class="category-content">
            <div class="category">
             


                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    @include('Admin.Dashboard.category._form',['label'=>'إضافة','category'=>$category,'route'=>false])
                </form>
            </div>

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/category.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/category.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>