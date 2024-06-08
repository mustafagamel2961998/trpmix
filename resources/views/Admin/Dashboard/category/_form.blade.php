
<div class="mb-3">
    <label for="name"> أسم القسم</label>
    <input type="text" name="name" class="form-control" id="name" placeholder=" أسم القسم" value="{{old('name',$category->name)}}">
</div>

<div class="mb-3">
    <label for="description">
        وصف القسم
    </label>
    <textarea name="description" class="form-control">{{old('description',$category->description)}}</textarea>
</div>

<div class="mb-3">
    <label for="status"> حالة القسم</label>
    <select name="status" class="form-control">
        <option value="active" @if($category->status =='active') selected @endif>مفعل</option>
        <option value="archived" @if($category->status =='archived') selected @endif>غير مفعل</option>
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