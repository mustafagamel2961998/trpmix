<x-admin.dashboard.layout.layout title="لوحة التحكم">
@push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/dashboard.css')}}" />
@endpush
@yield('album')
@yield('info')
@section('content')


<div class="dashboard-container">
    <div class="dashboard-content">
        <div class="dashboard">
   

            {{-- last singers --}}
            <div class="last-singers-container">
                <div class="last-singers-title">
                    <div><i class="fa-solid fa-microphone"></i> اخر 10 مطربين</div>
                    <div>
                        <a href="{{route('singer.index')}}">
                            عرض الكل
                        </a>
                    </div>
                </div>

                <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>الوصف المختصر</th>
                        <th>الدولة</th>
                        <th>الحالة</th>
                        <th>بواسطة</th>
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
                                    <img src="{{$singer->admin->getFirstMediaUrl('admin')}}" alt="{{$singer->admin->first_name . ' ' . $singer->admin->last_name}}">{{$singer->admin->first_name . ' ' . $singer->admin->last_name}}
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
                            <td colspan="8">لا يوجد مطربين حتي الان</td>
                        </tr>
                        @endforelse 
                        
                    </tbody>
                  </table>
            </div>
          


            {{-- last users --}}
            <div class="last-users-container">
                <div class="last-users-title">
                    <div><i class="ri-user-3-line"></i> اخر 10 مستخدمين</div>
                    <div>
                        <a href="{{route('user.index')}}">
                            عرض الكل
                        </a>
                    </div>
                </div>

                <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>الاسم</th>
                        <th> البريد الالكتورني</th>
                        <th>تاريخ الانضمام</th>
                        @role(['super_admin','editor'],'admin')
                            <th>حذف نهائي</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>   
                                    {{$user->name}}
                                </td>
                                <td>   
                                    {{$user->email}}
                                </td>
                               
                                <td>
                                   {{Carbon\Carbon::parse($user->deleted_at)->format('d-m-Y ( h-m A )') }}
                                </td>
                                @role(['super_admin','editor'],'admin')
                                    <td>
                                        <form action="{{$user->id}}" method="POST">
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
                                <td colspan="4">لا يوجد مستخدمين حتي الان</td>
                            </tr>
                        @endforelse 
                    </tbody>
                  </table>
            </div>
          
        </div>
    </div>
</div>
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('assets/js/admin/dashboard/dashboard.js')}}"></script> 
<script src="{{asset('assets/js/admin/dashboard/jquery/dashboard.js')}}"></script> 
@endpush
@endsection
</x-admin.dashboard.layout.layout>