<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // $permissionTow = Permission::create(['guard_name' => 'admin','name' => 'writer']);
        // $permissionThree = Permission::create(['guard_name' => 'admin','name' => 'editor']);
        // $role->givePermissionTo($permissionTow);
        // $role->givePermissionTo($permissionThree);
        

        $role = Role::create(['guard_name' => 'admin','name' => 'super_admin']);
        // $permission = Permission::create(['guard_name' => 'admin','name' => 'super_admin']);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);



        $roleTwo = Role::create(['guard_name' => 'admin','name' => 'writer']);
        // $permissionTwo = Permission::create(['guard_name' => 'admin','name' => 'writer']);
        // $roleTwo->givePermissionTo($permissionTwo);
        // $permissionTwo->assignRole($roleTwo);
     

        
        $roleThree = Role::create(['guard_name' => 'admin','name' => 'editor']);
        // $permissionThree = Permission::create(['guard_name' => 'admin','name' => 'editor']);
        // $roleThree->givePermissionTo($permissionThree);
        // $permissionThree->assignRole($roleThree);
        

        $admin = Admin::create([
            'first_name'=>'Mohamed',
            'last_name'=>'Elsheikh',
            'email'=>'mohamed@ghinwa.com',
            'password'=>Hash::make('password'),
            'phone'=>'01099999999',
            'online'=>'0',
            'status'=>'active',
        ]);
        $admin->addMediaFromUrl('https://www10.0zz0.com/2023/10/20/05/517081750.png')
                ->usingName($admin->first_name . ' ' . $admin->last_name)
                ->toMediaCollection('admin');
         $admin->assignRole(['super_admin','writer','editor']);
        

        
        
        $setting = Setting::create([
            'website_name'=>'غنوة',
            'website_descritpion'=>'موقع غنوة للاغاني الشعبي والمهرجانات الشعبي الجديدة والحصرية',
            'website_keywords'=>['اغاني شعبي','مهرجانات شعبي','مهرجانات','غنوة','غنوة مهرجانات'],
            'website_copy_right'=>'جميع الحقوق محفوظة لموقع',
            // 'covers'=>'0',
            'website_ads'=>'0',
            'google_ads'=>'0',
            'facebook'=>'https://www.facebook.com/',
            'youtube'=>'https://www.youtube.com/',
            'twitter'=>'https://twitter.com/',
            'user_website_navbar_bg'=>'#ea0440',
            'user_website_bg'=>'#250b3b',
            'user_website_content_bg'=>'#180427',
        ]);
        $setting->addMediaFromUrl('https://www10.0zz0.com/2023/10/20/05/517081750.png')
                ->usingName('logo')
                ->toMediaCollection('setting');
    }
}
