<x-admin.dashboard.layout.layout title="الاعدادات">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/setting.css')}}" />
    @endpush
    @section('content')
    <div class="alert-container">
        @error('logo')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('website_name')
            <p class="danger-alert">
                {{$message}} <i class="ri-error-warning-line"></i>
            </p>
        @enderror
        @error('website_descritpion')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror

        @error('website_keywords')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('website_copy_right')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        {{-- @error('covers')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror --}}
        @error('website_ads')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('google_ads')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('facebook')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('youtube')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @error('twitter')
        <p class="danger-alert">
            {{$message}} <i class="ri-error-warning-line"></i>
        </p>
        @enderror
        @if(Session::has('success'))
            <p class="success-alert">
                {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
            </p>
        @endif
    </div>
   
    <div class="setting-container">
        <div class="setting-title">
            <p><i class="fa-solid fa-gear"></i> تعديل اعدادات الموقع</p>
        </div>
        <div class="setting-content">
            <div class="setting">
                <form action="{{route('setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 image">
                        <label>الشعار الحالي</label>
                        <img src="{{$setting->getFirstMediaUrl('setting')}}" id="logo_preview" alt="الشعار الحالي">
                    </div>
                    <div>
                        <p>البيانات الاساسية</p>
                        <div class="mb-3">
                            <label for="logo"> شعار الموقع</label>
                            <input type="file" name="logo" class="form-control" id="logo" placeholder=" شعار الموقع" >
                        </div>
                        <div class="mb-3">
                            <label for="website_name"> أسم الموقع</label>
                            <input type="text" name="website_name" class="form-control" id="website_name" placeholder=" أسم الموقع" value="{{old('website_name',$setting->website_name)}}">
                        </div>
                        <div class="mb-3">
                            <label for="website_descritpion"> وصف الموقع</label>
                            <textarea name="website_descritpion" class="form-control" id="website_descritpion">{{old('website_descritpion',$setting->website_descritpion)}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="website_keywords"> الكلمات المفتاحية للموقع</label>
                            <textarea name="website_keywords[]" class="form-control" id="website_keywords"> @if(old('website_keywords[]')) {{old('website_keywords[]')}} @else @foreach ($setting->website_keywords as $website_keyword) {{$website_keyword}}  @endforeach @endif </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="website_copy_right">رسالة حقوق المليكة للموقع</label>
                            <input type="text" name="website_copy_right" class="form-control" id="website_copy_right" placeholder="رسالة حقوق المليكة للموقع" value="{{old('website_copy_right',$setting->website_copy_right)}}">
                        </div>

                    </div>
                    <div>
                            <p>روابط التواصل الاجتماعي</p>
                            <div class="mb-3">
                                <label for="facebook"> الفيس بوك</label>
                                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="فيس بوك" value="{{old('facebook',$setting->facebook)}}"> 
                            </div>
                            <div class="mb-3">
                                <label for="youtube"> يوتيوب</label>
                                <input type="text" name="youtube" id="youtube" class="form-control" placeholder="يوتيوب" value="{{old('youtube',$setting->youtube)}}">
                            </div>
                            <div class="mb-3">
                                <label for="twitter"> تويتر</label>
                                <input type="text" name="twitter" id="twitter" class="form-control" placeholder="تويتر" value="{{old('twitter',$setting->twitter)}}">
                            </div>

                    </div>
                    {{-- <div class="mb-3">
                        <input type="checkbox" name="covers" id="covers"  @checked($setting->covers) value="1">
                        <label for="covers">تفعيل الغلاف</label>
                    </div> --}}
                    <div class="mb-3">
                        <input type="checkbox" name="website_ads" id="website_ads" @checked($setting->website_ads)  value="1">
                        <label for="website_ads">تفعيل الاعلانات للموقع</label>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="google_ads" id="google_ads" @checked($setting->google_ads) value="1">
                        <label for="google_ads">تفعيل اعلانات جوجال ادسنس</label>
                    </div>
                    <div>
                        <p>الوان التصميم الخارجي</p>
                        <div class="mb-3">
                            <label for="user_website_navbar_bg">لون الجزء الخاص بالروابط العلوي الخارجي</label>
                            <input type="color" name="user_website_navbar_bg" id="user_website_navbar_bg" value="{{$setting->user_website_navbar_bg}}">
                        </div>
    
                        <div class="mb-3">
                            <label for="user_website_bg">لون خلفية الموقع الخارجي</label>
                            <input type="color" name="user_website_bg" id="user_website_bg" value="{{$setting->user_website_bg}}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="user_website_content_bg">لون خلفية محتوي الموقع الخارجي</label>
                            <input type="color" name="user_website_content_bg" id="user_website_content_bg" value="{{$setting->user_website_content_bg}}">
                        </div>
                    </div>
                    

                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark">
                            <i class="ri-save-line"></i> حفظ التعديلات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/setting.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/setting.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>