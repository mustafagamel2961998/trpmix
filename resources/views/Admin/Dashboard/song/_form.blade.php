

<div class="mb-3 image">
    <label> أستعراض صورة الاغنية</label>
    <img src="{{$song->getFirstMediaUrl('song') ? $song->getFirstMediaUrl('song')  : 'https://www4.0zz0.com/2023/10/24/18/735937862.png'}}" id="image_preview" alt="أستعراض صورة الاغنية">
</div>

<div class="mb-3">
    <label for="image">صورة الاغنية</label>
    <input type="file" name="image" class="form-control" id="image" placeholder=" صورة الاغنية" >
</div>

<div class="mb-3">
    <label for="title"> عنوان الاغنية</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="عنوان الاغنية" value="{{old('title',$song->title)}}">
</div>

<div class="mb-3">
    <label for="words"> كلمات الاغنية </label>
    <textarea name="words" class="form-control" id="words">{{old('words',$song->words)}}</textarea>
</div>

<div class="mb-3">
    <label for="listen_link"> رابط الاستماع للاغنية</label>
    <input type="text" name="listen_link" class="form-control" id="listen_link" placeholder="رابط الاستماع للاغنية" value="{{old('listen_link',$song->listen_link)}}">
</div>
<div class="mb-3">
    <label for="download_link"> رابط التحميل للاغنية</label>
    <input type="text" name="download_link" class="form-control" id="download_link" placeholder="رابط التحميل للاغنية" value="{{old('download_link',$song->download_link)}}">
</div>



<div class="mb-3">
    {{-- <input type="hidden" name="singer_id" class="form-control" id="singer_id"> --}}

    <label for="album_name"> اختيار الالبوم </label>
    <input type="text" name="album_name" class="form-control" id="album_name" placeholder="اختيار الالبوم " value="{{old('album_name',$song->album->name)}}">
    <ul class="album_id-list-items">
        
    </ul>
</div>



{{-- <div class="mb-3">
    <label for="album_id"> اختيار الالبوم </label>
        <select name="album_id"  id="album_id" class="form-control">
            <option value="">بدون البوم</option>
            @foreach ($albums as $album)
                <option value="{{$album->id}}" @if($song->album_id == $album->id) selected @endif>
                    {{$album->name}}
                </option>
            @endforeach
        </select>
</div> --}}


<div class="mb-3">
    {{-- <input type="hidden" name="singer_id" class="form-control" id="singer_id"> --}}

    <label for="singer_name"> اختيار المغني </label>
    <input type="text" name="singer_name" class="form-control" id="singer_name" placeholder="اختيار المغني" value="{{old('singer_name',$song->singer->name)}}">
    <ul class="singer_id-list-items">
        
    </ul>
</div>

{{-- <div class="mb-3">
    <label for="singer_id"> اختيار المغني </label>
        <select name="singer_id"  id="singer_id" class="form-control">
            <option value="">بدون مغني</option>
            @foreach ($singers as $singer)
                <option value="{{$singer->id}}" @if($song->singer_id == $singer->id) selected @endif>
                    {{$singer->name}}
                </option>
            @endforeach
        </select>
</div> --}}




<div class="mb-3">
    {{-- <input type="hidden" name="singer_id" class="form-control" id="singer_id"> --}}
    {{-- {{$song->duet}} --}}
    <label for="singer_duet_name"> اختيار المغني الدويتو</label>
    <input type="text" name="singer_duet_name" class="form-control" id="singer_duet_name" placeholder="اختيار المغني الدويتو" value="{{old('singer_duet_name',$song->duet->name)}}">
    <ul class="singer-name-list-items">
        
    </ul>
</div>


{{-- <div class="mb-3">
    <label for="singer_duet_id"> اختيار المغني الدويتو</label>
        <select name="singer_duet_id"  id="singer_duet_id" class="form-control">
            <option value="">بدون مغني دويتو</option>
            @foreach ($singers as $singer)
                <option value="{{$singer->id}}" @if($song->singer_duet_id == $singer->id) selected @endif>
                    {{$singer->name}}
                </option>
            @endforeach
        </select>
</div> --}}


<div class="mb-3">
    <label for="category_id"> اختيار  القسم للاغنية</label>
        <select name="category_id"  id="category_id" class="form-control">
            {{-- <option value="">بدون قسم</option> --}}
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($song->category_id == $category->id) selected @endif>
                    {{$category->name}}
                </option>
            @endforeach
        </select>
</div>







<div class="mb-3">
    <label for="year">سنة الاغنية </label>
    <input type="text" name="year" class="form-control" id="year" placeholder="سنة الاغنية" value="{{old('year',$song->year)}}">
</div>
<div class="mb-3">
    <label for="time">وقت الاغنية </label>
    <input type="text" name="time" class="form-control" id="time" placeholder="وقت الاغنية" value="{{old('time',$song->time)}}">
</div>

<div class="mb-3">
    <label for="kind"> نوع الاغنية</label>
        <select name="kind"  id="kind" class="form-control">
            <option value="شعبي" @if($song->kind == 'شعبي') selected @endif>
                شعبي    
            </option>
            <option value="مهرجانات" @if($song->kind == 'مهرجانات') selected @endif>
                مهرجانات    
            </option>
            <option value="رومانسي" @if($song->kind == 'رومانسي') selected @endif>
                رومانسي    
            </option>

            <option value="وطني" @if($song->kind == 'وطني') selected @endif>
                وطني    
            </option>
        </select>
</div>

<div class="mb-3">
    <label for="status">حالة الاغنية</label>
        <select name="status"  id="status" class="form-control">

            <option value="pin" @if($song->status == 'pin') selected @endif>
                مثبتة  
            </option>

            <option value="active" @if($song->status == 'active') selected @endif>
                مفعل    
            </option>
            <option value="archived" @if($song->status == 'archived') selected @endif>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    // Attach keyup event handler to the input field
    $('#singer_name').keyup(function(){
        // Get the current value of the input field
        var singerName = $(this).val();
        
        $.ajax({
            url: `/singer/id/search/${singerName}`, // Your backend API endpoint
            method: 'GET',
            // data: { singerName: singerName },
            success: function(response) {     
                var resultList = $('.singer_id-list-items');
                resultList.empty(); // Clear previous results
         


                // console.log(response)
                response.data.forEach(function(item) {
                    
                
                var listItem = $('<li>').text(item.name).appendTo(resultList);
                    // console.log(item);
                // Click event handler for list items
                listItem.click(function(){
                    $('#singer_name').val($(this).text()); // Set the input field value
                    resultList.empty(); // Clear the results list
                });

            });
            },
            error: function(xhr, status, error) {
                console.error('Error performing search:', error);
            }
        });
        // Do something with the input text
    });
});

$(document).ready(function(){
    // Attach keyup event handler to the input field
    $('#singer_duet_name').keyup(function(){
        // Get the current value of the input field
        var singerName = $(this).val();
        
        $.ajax({
            url: `/singer/id/search/${singerName}`, // Your backend API endpoint
            method: 'GET',
            // data: { singerName: singerName },
            success: function(response) {     
                var resultList = $('.singer-name-list-items');
                resultList.empty(); // Clear previous results
         


                // console.log(response)
                response.data.forEach(function(item) {
                    
                
                var listItem = $('<li>').text(item.name).appendTo(resultList);
                    // console.log(item);
                // Click event handler for list items
                listItem.click(function(){
                    $('#singer_duet_name').val($(this).text()); // Set the input field value
                    resultList.empty(); // Clear the results list
                });

            });
            },
            error: function(xhr, status, error) {
                console.error('Error performing search:', error);
            }
        });
        // Do something with the input text
    });
});


$(document).ready(function(){
    // Attach keyup event handler to the input field
    $('#album_name').keyup(function(){
        // Get the current value of the input field
        var albumName = $(this).val();
        
        $.ajax({
            url: `/album/name/search/${albumName}`, // Your backend API endpoint
            method: 'GET',
            // data: { singerName: singerName },
            success: function(response) {     
                var resultList = $('.album_id-list-items');
                resultList.empty(); // Clear previous results
         


                // console.log(response)
                response.data.forEach(function(item) {
                    
                
                var listItem = $('<li>').text(item.name).appendTo(resultList);
                    // console.log(item);
                // Click event handler for list items
                listItem.click(function(){
                    $('#album_name').val($(this).text()); // Set the input field value
                    resultList.empty(); // Clear the results list
                });

            });
            },
            error: function(xhr, status, error) {
                console.error('Error performing search:', error);
            }
        });
        // Do something with the input text
    });
});




</script>