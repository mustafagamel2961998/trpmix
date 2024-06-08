<x-admin.dashboard.layout.layout title="جميع الاغاني المحذوفة">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/song.css')}}" />
    @endpush
    @section('content')

 
    <div class="song-container">

        <div class="add-song-btn-container">
            <a href="{{route('song.index')}}" class="route">
                <i class="fa-solid fa-eye"></i> عرض الاغاني
            </a>
        </div>

        <div class="song-title">
            <p><i class="ri-mic-line"></i> عرض كل الاغاني</p>
        </div>

        <div class="song-content">
            <div class="song">
             
                <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>الصورة</th>
                        <th>عنوان الاغنية</th>
                        <th>كلمات الاغنية</th>
                        <th>رابط الاستماع</th>
                        <th>رابط التحميل</th>
                        <th>الالبوم</th>
                        <th>المغني</th>
                        <th>المغني الدويتو</th>
                        <th>بواسطة</th>
                        <th>القسم</th>
                        <th>السنة</th>
                        <th>مدة الاغنية</th>
                        <th>نوع الاغنية</th>
                        <th>الحالة</th>
                        <th>استرجاع</th>
                        @role(['super_admin','editor'],'admin')
                            <th>حذف نهائي</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                     @forelse ($songs as $song)
                        <tr>
                            <td>   
                            <img src="{{$song->getFirstMediaUrl('song')}}"  alt="{{$song->title}}" class="song-image" data-id="{{$song->id}}"> 
                            <div class="song-image-privew-container" data-id="{{$song->id}}">
                                    <div class="song-image-privew-close"  data-id="{{$song->id}}">
                                        <i class="ri-close-fill"></i>
                                    </div>
                                    <div class="song-image-privew-content">
                                        <img src="{{$song->getFirstMediaUrl('song')}}"  alt="{{$song->title}}"> 
                                    </div>
                            </div>
                            </td>
                            <td>
                                <a href="{{route('song.edit',$song->id)}}">
                                    {{$song->title}}
                                </a>
                            </td>
                            <td class="song-words-preview">
                                <i class="ri-eye-line" data-id="{{$song->id}}"></i>


                                <div class="song-words-container" data-id="{{$song->id}}">
                                    <div class="song-words-close" data-id="{{$song->id}}"> 
                                        <i class="ri-close-line"></i>
                                    </div>
                                    <div class="song-words-content">
                                        
                                        <div class="song-words">
                                            <div class="song-name">
                                                <h4>أسم الاغنية: {{$song->title}}</h4>
                                            </div>
                                            <div class="words">
                                                <p>
                                                    {{$song->words}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{$song->listen_link}}" target="_blank"><i class="fa-solid fa-link"></i></a>
                            </td>
                            <td>
                                <a href="{{$song->download_link}}" target="_blank">
                                    <i class="fa-solid fa-link"></i>
                                </a>
                            </td>
                            <td>{{$song->album->name}}</td>
                            <td>{{$song->singer->name}}</td>
                            <td>{{$song->duet->name}}</td>
                            <td>{{$song->admin->first_name .' ' . $song->admin->last_name}}</td>
                            <td>{{$song->category->name}}</td>
                            <td>{{Carbon\Carbon::parse($song->year)->format('Y')}}</td>
                            <td>{{$song->time}}</td>
                            <td>{{$song->kind}}</td>

                            
                            
                            <td>
                                @if($song->status=='pin')
                                <div class="pin">مثبته</div>
                                @elseif($song->status=='active')
                                <div class="active">مفعل</div>
                                @else
                                <div class="archived">غير مفعل</div>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('song.recycle.restore',$song->id)}}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        <i class="ri-restart-line"></i>
                                        استرجاع
                                    </button>
                                </form>
                            </td>
                           
                            @role(['super_admin','editor'],'admin')
                                <td>
                                    <form action="{{route('song.force.delete',$song->id)}}" method="POST">
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
                            <td colspan="16">لا يوجد اغاني داخل سلة المهملات حتي الان</td>
                        </tr>
                    @endforelse
                    
                    </tbody>
                  </table>

            </div>
            {{$songs->links()}}

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/song.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/song.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>