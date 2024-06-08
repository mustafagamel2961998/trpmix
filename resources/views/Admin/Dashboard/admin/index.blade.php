<x-admin.dashboard.layout.layout title="جميع المسؤولين">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/admin.css')}}" />
    @endpush
    @section('content')

    <div class="alert-container">
        @if(Session::has('success'))
            <p class="success-alert">
                {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
            </p>
        @endif
    </div>
   
    <div class="admin-container">

        <div class="add-admin-btn-container">
            <a href="{{route('admin.create')}}" class="create">
                <i class="ri-add-line"></i> إضافة مسؤل 
            </a>
        </div>

        <div class="admin-title">
            <p><i class="ri-mic-line"></i> عرض كل المسؤولين</p>
        </div>

        <div class="admin-content">
            <div class="admin">
             
                <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th> البريد الالكتورني</th>
                        <th>تاريخ الانضمام</th>
                        <th>الموبيل</th>
                        <th>الصلاحية</th>
                        <th>الحالة</th>
                        <th>عرض / تعديل</th>
                        @role(['super_admin','editor'],'admin')
                            <th>حذف نهائي</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $admin)
                        <tr>
                            <td>   
                                <img src="{{$admin->getFirstMediaUrl('admin')}}"  alt="{{$admin->name}}" class="admin-image" data-id="{{$admin->id}}"> 
                                <div class="admin-image-privew-container" data-id="{{$admin->id}}">
                                    <div class="admin-image-privew-close"  data-id="{{$admin->id}}">
                                        <i class="ri-close-fill"></i>
                                    </div>
                                    <div class="admin-image-privew-content">
                                        <img src="{{$admin->getFirstMediaUrl('admin')}}"  alt="{{$admin->name}}"> 
                                    </div>
                                </div>
                             </td>
                            <td>   
                                <a href="{{route('admin.edit',$admin->id)}}">
                                    {{$admin->first_name . ' ' . $admin->last_name}}
                                </a>
                            </td>
                            <td>   
                                {{$admin->email}}
                            </td>
                           
                            <td>
                               {{Carbon\Carbon::parse($admin->created_at)->format('d-m-Y ( h-m A )') }}
                            </td>
                            <td>{{$admin->phone}}</td>
                            <td>
                                @foreach ($admin->getRoleNames() as $role)
                                    [ {{$role}} ] 
                                @endforeach
                            </td>
                            <td>
                                @if($admin->status=='active')
                                <div class="active">مفعل</div>
                                @else
                                <div class="archived">غير مفعل</div>
                                @endif
                            </td>
                            <td>
                                <div class="control">
                                    <a href="{{route('admin.edit',$admin->id)}}">
                                        <button type="button" class="control-btn">
                                            <i class="ri-settings-2-line"></i>
                                              تحكم  
                                        </button>
                                    </a>
                                </div>
                            </td>
                            @role(['super_admin','editor'],'admin')
                                    <td>
                                        <form action="{{$admin->id}}" method="POST">
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
                            <td colspan="9">لا يوجد مسوؤلين حتي الان</td>
                        </tr>
                        @endforelse
                    
                    </tbody>
                  </table>

            </div>
            {{$admins->links()}}

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/admin.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/admin.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>