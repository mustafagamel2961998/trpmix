<x-admin.dashboard.layout.layout title="جميع المطربين">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/singer.css')}}" />
    @endpush
    @section('content')

    <div class="alert-container">
        @if(Session::has('success'))
            <p class="success-alert">
                {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
            </p>
        @endif
    </div>
   
    <div class="singer-container">

        <div class="add-singer-btn-container">
            <a href="{{route('singer.create')}}" class="create">
                <i class="ri-add-line"></i> إضافة مطرب
            </a>
        </div>

        <div class="singer-title">
            <p><i class="ri-mic-line"></i> عرض كل المطربين</p>
        </div>

        <div class="singer-content">
            <div class="singer">
             
                <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>الوصف المختصر</th>
                        <th>الدولة</th>
                        <th>الحالة</th>
                        <th>عرض / تعديل</th>
                        @role(['super_admin','editor'],'admin')
                            <th>حذف مؤقت</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                     @forelse ($singers as $singer)
                        <tr>
                            <td>   
                            <img src="{{$singer->getFirstMediaUrl('singer')}}"  alt="{{$singer->name}}" class="singer-image" data-id="{{$singer->id}}"> 
                            <div class="singer-image-privew-container" data-id="{{$singer->id}}">
                                    <div class="singer-image-privew-close"  data-id="{{$singer->id}}">
                                        <i class="ri-close-fill"></i>
                                    </div>
                                    <div class="singer-image-privew-content">
                                        <img src="{{$singer->getFirstMediaUrl('singer')}}"  alt="{{$singer->name}}"> 
                                    </div>
                            </div>
                            </td>
                            <td>
                                <a href="{{route('singer.edit',$singer->id)}}">
                                    {{$singer->name}}
                                </a>
                            </td>
                            <td>{{$singer->bio}}</td>
                            <td>{{Country::countryCode($singer->country_code)}}</td>
                            <td>
                                @if($singer->status=='active')
                                <div class="active">مفعل</div>
                                @else
                                <div class="archived">غير مفعل</div>
                                @endif
                            </td>

                            <td>
                                <div class="control">
                                    <a href="{{route('singer.edit',$singer->id)}}">
                                        <button type="button" class="control-btn"><i class="ri-settings-2-line"></i>  تحكم   </button>
                                    </a>
                                </div>
                            </td>
                            @role(['super_admin','editor'],'admin')
                                <td>
                                    <form action="{{route('singer.destroy',$singer->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="ri-delete-bin-7-line"></i>  حذف مؤقت </button>
                                    </form>
                                </td>
                            @endrole
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">لا يوجد مطربين حتي الان</td>
                        </tr>
                    @endforelse
                    
                    </tbody>
                  </table>

            </div>
            {{$singers->links()}}

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/singer.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/singer.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>