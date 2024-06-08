<x-admin.dashboard.layout.layout title="سلة المحذوفات للالبومات">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/album.css')}}" />
    @endpush
    @section('content')

    <div class="alert-container">
        @if(Session::has('success'))
            <p class="success-alert">
                {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
            </p>
        @endif
    </div>
   
    <div class="album-container">

        <div class="add-album-btn-container">
            <a href="{{route('album.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض  الالبومات
            </a>
        </div>

        <div class="album-title">
            <p><i class="ri-mic-line"></i> الالبومات المحذوفة</p>
        </div>

        <div class="album-content">
            <div class="album">
             
              
                <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>بواسطة</th>
                        <th>المطرب</th>
                        <th>الحالة</th>
                        <th>إسترجاع</th>
                        @role(['super_admin','editor'],'admin')
                            <th>حذف نهائي</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                     @forelse ($albums as $album)
                        <tr>
                            <td>   
                                <img src="{{$album->getFirstMediaUrl('album')}}"  alt="{{$album->name}}" class="album-image" data-id="{{$album->id}}"> 
                                <div class="album-image-privew-container" data-id="{{$album->id}}">
                                    <div class="album-image-privew-close"  data-id="{{$album->id}}">
                                        <i class="ri-close-fill"></i>
                                    </div>
                                    <div class="album-image-privew-content">
                                        <img src="{{$album->getFirstMediaUrl('album')}}"  alt="{{$album->name}}"> 
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{route('album.edit',$album->id)}}">
                                    {{$album->name}}
                                </a>
                            </td>
                            <td>{{$album->admin->first_name .' ' . $album->admin->last_name}}</td>
                            <td>{{$album->singer->name}}</td>
                            <td>
                                @if($album->status=='active')
                                <div class="active">مفعل</div>
                                @else
                                <div class="archived">غير مفعل</div>
                                @endif
                            </td>

                            <td>
                                <div class="control">
                                    <form action="{{route('album.restore',$album->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="control-btn">
                                            <i class="ri-restart-line"></i>
                                            إسترجاع  
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @role(['super_admin','editor'],'admin')
                                <td>
                                    <form action="{{route('album.force.delete',$album->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="ri-delete-bin-7-line"></i> 
                                            حذف نهائي 
                                        </button>
                                    </form>
                                </td>
                            @endrole
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">لا يوجد البومات في سلة المهملات حتي الان</td>
                        </tr>
                    @endforelse

                    
                    </tbody>
                  </table>


            </div>
            {{$albums->links()}}

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/album.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/album.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>