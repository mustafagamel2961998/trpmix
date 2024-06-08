<x-admin.dashboard.layout.layout title="جميع إعلانات الموقع">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/adwebsite.css')}}" />
    @endpush
    @section('content')

    <div class="alert-container">
        @if(Session::has('success'))
            <p class="success-alert">
                {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
            </p>
        @endif
    </div>
   
    <div class="adwebsite-container">

        <div class="add-adwebsite-btn-container">
            <a href="{{route('website.create')}}" class="create">
                <i class="ri-add-line"></i> إضافة إعلان للموقع جديد 
            </a>
        </div>

        <div class="adwebsite-title">
            <p><i class="fa-solid fa-rectangle-ad"></i> عرض كل الاعلانات للموقع</p>
        </div>

        <div class="adwebsite-content">
            <div class="adwebsite">
             
                <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>لوجو الاعلان</th>
                        <th>صورة الاعلان علي الكمبيوتر</th>
                        <th> صورة الاعلان علي الموبيل</th>
                        <th>أسم الاغنية</th>
                        <th>حالة الاعلان</th>
                        <th>عرض / تعديل</th>
                        @role(['super_admin','editor'],'admin')
                            <th>حذف نهائي</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($adwebsites as $adwebsite)
                        <tr>
                            <td>   
                                <img class="logo-image" src="{{$adwebsite->getFirstMediaUrl('adwebsite_logo')}}" alt="{{$adwebsite->song->title}}" data-id="{{$adwebsite->id}}">
                                <div class="ad-logo-image-prview-container" data-id="{{$adwebsite->id}}">
                                    <div class="ad-logo-image-prview-close-btn" data-id="{{$adwebsite->id}}">
                                        <i class="ri-close-line"></i>
                                    </div>
                                    <div class="ad-logo-image-prview-content">
                                        <img class="ad-logo-image" src="{{$adwebsite->getFirstMediaUrl('adwebsite_logo')}}" alt="{{$adwebsite->song->title}}">
                                    </div>
                                </div>
                            </td>

                            <td>   
                                <img class="computer-image" src="{{$adwebsite->getFirstMediaUrl('adwebsite_computer')}}" alt="{{$adwebsite->song->title}}" data-id="{{$adwebsite->id}}">
                                <div class="ad-computer-image-prview-container" data-id="{{$adwebsite->id}}">
                                    <div class="ad-computer-image-prview-close-btn" data-id="{{$adwebsite->id}}">
                                        <i class="ri-close-line"></i>
                                    </div>
                                    <div class="ad-computer-image-prview-content">
                                        <img class="ad-computer-image" src="{{$adwebsite->getFirstMediaUrl('adwebsite_computer')}}" alt="{{$adwebsite->song->title}}">
                                    </div>
                                </div>
                            </td>
                            <td>   
                                <img class="mobile-image" src="{{$adwebsite->getFirstMediaUrl('adwebsite_mobile')}}" alt="{{$adwebsite->song->title}}" data-id="{{$adwebsite->id}}">
                                <div class="ad-mobile-image-prview-container" data-id="{{$adwebsite->id}}">
                                    <div class="ad-mobile-image-prview-close-btn" data-id="{{$adwebsite->id}}">
                                        <i class="ri-close-line"></i>
                                    </div>
                                    <div class="ad-mobile-image-prview-content">
                                        <img class="ad-mobile-image" src="{{$adwebsite->getFirstMediaUrl('adwebsite_mobile')}}" alt="{{$adwebsite->song->title}}">
                                    </div>
                                </div>
                            </td>
                            <td>   
                                {{$adwebsite->song->title}}
                            </td>
                           
                            <td>
                                @if($adwebsite->pin=='1')
                                <div class="active">مثبت</div>
                                @else
                                <div class="archived">غير مثبت</div>
                                @endif
                            </td>
                            <td>
                                <div class="control">
                                    <a href="{{route('website.edit',$adwebsite->id)}}">
                                        <button type="button" class="control-btn"><i class="ri-settings-2-line"></i>  تحكم   </button>
                                    </a>
                                </div>
                            </td>
                            @role(['super_admin','editor'],'admin')
                                <td>
                                    <form action="{{route('website.destroy',$adwebsite->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="ri-delete-bin-7-line"></i>  
                                            حذف نهائي 
                                        </button>
                                    </form>
                                </td>
                            @endrole
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">لا يوجد إعلانات حتي الان</td>
                        </tr>
                        @endforelse
                    
                    </tbody>
                  </table>

            </div>
            {{$adwebsites->links()}}

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/adwebsite.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/adwebsite.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>