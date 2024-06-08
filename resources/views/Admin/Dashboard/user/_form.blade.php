

<div class="mb-3">
    <label for="name"> أسم المستخدم</label>
    <input type="text" name="name" class="form-control" id="name" placeholder=" أسم المستخدم" value="{{old('name',$user->name)}}">
</div>

<div class="mb-3">
    <label for="email"> البريد الالكتورني </label>
    <input type="email" name="email" class="form-control" id="email" value="{{old('bio',$user->email)}}" placeholder="البريد الالكتروني">
</div>

<div class="mb-3">
    <label for="password">  كلمة السر </label>
    <input type="password" name="password" class="form-control" id="password" placeholder="كلمة السر">
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