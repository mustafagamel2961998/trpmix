<x-admin.dashboard.layout.layout title="سلة المحذوفات للمطربين">
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
            <a href="{{route('singer.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض  المطربين
            </a>
        </div>

        <div class="singer-title">
            <p><i class="ri-mic-line"></i> المطربين المحذوفين</p>
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
                        <th>وقت الحذف</th>
                        <th> إسترجاع </th>
                        @role(['super_admin','editor'],'admin')
                            <th>حذف نهائي</th>
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
                                {{$singer->name}}
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
                                {{Carbon\Carbon::parse($singer->deleted_at)->format('d-m-Y ( h-m A )') }}
                            </td>
                            <td>
                                <form action="{{route('singer.restore',$singer->id)}}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        <i class="ri-restart-line"></i>  
                                        إسترجاع  
                                    </button>
                                </form>
                            </td>
                            @role(['super_admin','editor'],'admin')
                                <td>
                                    <form action="{{route('singer.force.delete',$singer->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="ri-delete-bin-7-line"></i>  حذف نهائي </button>
                                    </form>
                                </td>
                            @endrole
                        </tr>
                      @empty
                            <tr>
                                <td colspan="8">لا يوجد مطربين داخل سلة المهملات حتي الان</td>
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