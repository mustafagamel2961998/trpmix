<x-admin.dashboard.layout.layout title="جميع الاقسام">
    @push('style')
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard/category.css')}}" />
    @endpush
    @section('content')

    <div class="alert-container">
        @if(Session::has('success'))
            <p class="success-alert">
                {{Session::get('success')}} <i class="ri-checkbox-circle-line"></i>
            </p>
        @endif
    </div>
   
    <div class="category-container">

        <div class="add-category-btn-container">
            <a href="{{route('category.create')}}" class="create">
                <i class="ri-add-line"></i> إضافة قسم 
            </a>
        </div>

        <div class="category-title">
            <p><i class="ri-mic-line"></i> عرض كل الاقسام</p>
        </div>

        <div class="category-content">
            <div class="category">
             
                <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>أسم القسم</th>
                        <th>وصف القسم </th>
                        <th>حالة القسم</th>
                        <th>عرض / تعديل</th>
                        @role(['super_admin','editor'],'admin')
                            <th>حذف نهائي</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>   
                                {{$category->name}}
                            </td>
                            <td>   
                                {{$category->description}}
                            </td>
                           
                            <td>
                                @if($category->status=='active')
                                <div class="active">مفعل</div>
                                @else
                                <div class="archived">غير مفعل</div>
                                @endif
                            </td>
                            <td>
                                <div class="control">
                                    <a href="{{route('category.edit',$category->id)}}">
                                        <button type="button" class="control-btn"><i class="ri-settings-2-line"></i>  تحكم   </button>
                                    </a>
                                </div>
                            </td>
                            @role(['super_admin','editor'],'admin')
                                <td>
                                    <form action="{{route('category.destroy',$category->id)}}" method="POST">
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
                            <td colspan="5">لا يوجد اقسام حتي الان</td>
                        </tr>
                        @endforelse
                    
                    </tbody>
                  </table>

            </div>
            {{$categories->links()}}

        </div>
    </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/admin/dashboard/user.js')}}"></script> 
        <script src="{{asset('assets/js/admin/dashboard/jquery/user.js')}}"></script> 
    @endpush
    </x-admin.dashboard.layout.layout>