<x-admin.dashboard.layout.layout title="جميع المستخدمين">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/user.css')}}" />
    @endpush
    @section('content')

    <div class="alert-container">
        @if(Session::has('success'))
            <p class="success-alert">
                {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
            </p>
        @endif
    </div>
   
    <div class="user-container">

        <div class="add-user-btn-container">
            <a href="{{route('user.create')}}" class="create">
                <i class="ri-add-line"></i> إضافة مستخدم 
            </a>
        </div>

        <div class="user-title">
            <p><i class="ri-mic-line"></i> عرض كل المستخدمون</p>
        </div>

        <div class="user-content">
            <div class="user">
             
                <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>الاسم</th>
                        <th> البريد الالكتورني</th>
                        <th>تاريخ الانضمام</th>
                        <th>عرض / تعديل</th>
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
                               {{Carbon\Carbon::parse($user->created_at)->format('d-m-Y ( h-m A )') }}
                            </td>
                            <td>
                                <div class="control">
                                    <a href="{{route('user.edit',$user->id)}}">
                                        <button type="button" class="control-btn"><i class="ri-settings-2-line"></i>  تحكم   </button>
                                    </a>
                                </div>
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
                            <td colspan="5">لا يوجد مستخدمين حتي الان</td>
                        </tr>
                        @endforelse
                        
                    
                    </tbody>
                  </table>

            </div>
            {{$users->links()}}

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/user.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/user.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>