<div class="ad-logo-image">
    <img src="{{$adwebsite->getFirstMediaUrl('adwebsite_logo')}}" id="logo_image_preview"  alt="{{$adwebsite->song->title ?? ''}}">
</div>
<div class="mb-3">
    <label for="logo_image"> صورة شعار الاعلان</label>
    <input type="file" name="logo_image" class="form-control" id="logo_image" placeholder="صورة شعار الاعلان">
</div>


<div class="ad-computer-image">
    <img src="{{$adwebsite->getFirstMediaUrl('adwebsite_computer')}}" id="computer_image_preview" alt="{{$adwebsite->song->title ?? ''}}">
</div>
<div class="mb-3">
    <p>
        <span>ملحوظة : </span>
        يجب أن يكون ابعاد الصورة علي الاقل
        <strong>2048x1152</strong>
    </p>
    <label for="computer_image"> صورة الاعلان علي الكمبيوتر</label>
    <input type="file" name="computer_image" class="form-control" id="computer_image" placeholder="صورة الاعلان علي الكمبيوتر">
</div>

<div class="ad-mobile-image">
    <img src="{{$adwebsite->getFirstMediaUrl('adwebsite_mobile')}}" id="mobile_image_preview"  alt="{{$adwebsite->song->title ?? ''}}">
</div>
<div class="mb-3">
    <p>
        <span>ملحوظة : </span>
        يجب أن يكون ابعاد الصورة علي الاقل
        <strong>720x1280</strong>
    </p>
    <label for="mobile_image"> صورة الاعلان علي موبيل</label>
    <input type="file" name="mobile_image" class="form-control" id="mobile_image" placeholder="صورة الاعلان علي الموبيل">
</div>




<div class="mb-3">
    <label for="song_id">اغنية الاعلان</label>
    <select name="song_id" id="song_id" class="form-control">
        @foreach ($songs as $song)
            <option value="{{$song->id}}" @if($song->id == $adwebsite->song_id) selected @endif>
                {{$song->title}}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="pin"> حالة الاعلان</label>
    <select name="pin" class="form-control">
        <option value="1" @if($adwebsite->pin =='1') selected @endif>مثبت</option>
        <option value="0" @if($adwebsite->pin =='0') selected @endif>غير مثبت</option>
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