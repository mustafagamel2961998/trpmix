
<div class="mb-3 image">
    <label> أستعراض صورة المسؤل</label>
    <img src="{{$admin->getFirstMediaUrl('admin') ? $admin->getFirstMediaUrl('admin')  : 'https://www3.0zz0.com/2023/10/20/05/777624830.png'}}" id="image_preview" alt="أستعراض صورة المطرب">
</div>
<div class="mb-3">
    <label for="create_admin_avatar">صورة المسؤل</label>
    <input type="file" name="avatar" class="form-control" id="create_admin_avatar" placeholder=" صورة المسؤل" >
</div>

<div class="mb-3">
    <label for="first_name"> أسم المسؤل الاول</label>
    <input type="text" name="first_name" class="form-control" id="first_name" placeholder=" أسم المسؤل الاول" value="{{old('first_name',$admin->first_name)}}">
</div>
<div class="mb-3">
    <label for="last_name"> أسم المسؤل الاخير</label>
    <input type="text" name="last_name" class="form-control" id="last_name" placeholder=" أسم المسؤل الاخير" value="{{old('last_name',$admin->last_name)}}">
</div>
<div class="mb-3">
    <label for="email"> البريد الالكتورني </label>
    <input type="email" name="email" class="form-control" id="email" value="{{old('bio',$admin->email)}}" placeholder="البريد الالكتروني">
</div>

<div class="mb-3">
    <label for="password">  كلمة السر </label>
    <input type="password" name="password" class="form-control" id="password" placeholder="كلمة السر">
</div>
<div class="mb-3">
    <label for="phone">  رقم الموبيل </label>
    <input type="text" name="phone" class="form-control" id="phone" value="{{old('phone',$admin->phone)}}" placeholder=" رقم الموبيل">
</div>



<div class="mb-3">

    <label for="permissions">
        الصلاحيات
    </label>
    <div class="admin-permissions-container">
        <div class="admin-permissions-title">
            <span> <i class="fa-solid fa-drum-steelpan"></i> الصلاحيات الحاليه لهذا المسؤل </span>
        </div>
        <ul class="admin-permissions-list-items">
            @foreach ($admin->getRoleNames() as $role)
                <li class="admin-permissions-item">
                    {{$role}}
                </li>
            @endforeach
        </ul>
    </div>
   
    <select name="roles[]" id="roles" multiple>
        @foreach ($roles as $role)
        <option value="{{$role->name}}">{{$role->name}}</option>

            {{-- <optgroup label="{{$role->name}}">
                @foreach ($role->permissions as $permission)
                  <option value="{{$permission->name}}">{{$permission->name}}</option>
                @endforeach
            </optgroup> --}}
        @endforeach
    </select>
    
    
    
    
    <div class="mb-3">
        <label for="status">حالة المسؤل</label>
            <select name="status"  id="status" class="form-control">
                <option value="active" @if($admin->status == 'active') selected @endif>
                    مفعل    
                </option>
                <option value="archived" @if($admin->status == 'archived') selected @endif>
                    غير مفعل    
                </option>
            </select>
    </div>
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