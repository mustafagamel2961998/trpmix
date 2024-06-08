

<div class="mb-3 image">
    <label> أستعراض صورة المطرب</label>
    <img src="{{$singer->getFirstMediaUrl('singer') ? $singer->getFirstMediaUrl('singer')  : 'https://www3.0zz0.com/2023/10/20/05/777624830.png'}}" id="image_preview" alt="أستعراض صورة المطرب">
</div>
<div class="mb-3">
    <label for="image">صورة المطرب</label>
    <input type="file" name="image" class="form-control" id="image" placeholder=" صورة المطرب" >
</div>

<div class="mb-3">
    <label for="name"> أسم المطرب</label>
    <input type="text" name="name" class="form-control" id="name" placeholder=" أسم الطرب" value="{{old('name',$singer->name)}}">
</div>

<div class="mb-3">
    <label for="bio"> وصف المطرب</label>
    <textarea name="bio" class="form-control" id="bio">{{old('bio',$singer->bio)}}</textarea>
</div>
<div class="mb-3">
    <label for="country_code">حدد الدولة</label>
    
    <select name="country_code" class="form-control">
        @foreach ($countries as $country)
            <option value="{{$country}}" @if($singer->country_code == $country) selected @endif>{{Country::countryCode($country)}}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="status">حالة المطرب</label>
        <select name="status"  id="status" class="form-control">
            <option value="active" @if($singer->status == 'active') selected @endif>
                مفعل    
            </option>
            <option value="archived" @if($singer->status == 'archived') selected @endif>
                غير مفعل    
            </option>
        </select>
</div>
<div class="mb-3">
    <label for="single_status">فردي ام لا</label>
        <select name="single_status"  id="single_status" class="form-control">
            <option value="single" @if($singer->single_status == 'single') selected @endif>
                فردي    
            </option>
            <option value="with_singer" @if($singer->single_status == 'with_singer') selected @endif>
                معا مطرب اخر   
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