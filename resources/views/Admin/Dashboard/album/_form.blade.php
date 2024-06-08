
<div class="mb-3 image">
    <label> أستعراض صورة الالبوم</label>
    <img src="{{$album->getFirstMediaUrl('album') ? $album->getFirstMediaUrl('album')  : 'https://www8.0zz0.com/2023/10/21/10/970460381.png'}}" id="image_preview" alt="أستعراض صورة الالبوم">
</div>
<div class="mb-3">
    <label for="image">صورة الالبوم</label>
    <input type="file" name="image" class="form-control" id="image" placeholder=" صورة الالبوم" >
</div>

<div class="mb-3">
    <label for="name"> أسم الالبوم</label>
    <input type="text" name="name" class="form-control" id="name" placeholder=" أسم الالبوم" value="{{old('name',$album->name)}}">
</div>
<div class="mb-3">
    <label for="album_download_link"> رابط تحميل الالبوم</label>
    <input type="text" name="album_download_link" class="form-control" id="album_download_link" placeholder=" رابط تحميل الالبوم" value="{{old('album_download_link',$album->album_download_link)}}">
</div>


<div class="mb-3">
    <label for="singer_id">حدد المطرب</label>
    
    <select name="singer_id" class="form-control">
        @foreach ($singers as $allSingers)
            <option value="{{$allSingers->id}}" @if($allSingers->id == $album->singer_id) selected @endif>{{$allSingers->name}}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="status">حالة الالبوم</label>
        <select name="status"  id="status" class="form-control">
            <option value="active" @if($album->status == 'active') selected @endif>
                مفعل    
            </option>
            <option value="archived" @if($album->status == 'archived') selected @endif>
                غير مفعل    
            </option>
        </select>
</div>



<div class="mb-3">
    <button type="submit" class="btn btn-dark">

        @if ($route)
        <i class="ri-save-line"></i>     
        @else
        <i class="ri-add-line"></i>
        @endif
        {{$label}}

    </button>
</div>