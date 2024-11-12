<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'type' => 'admin'
        ]);

        $teacher = User::create([
            'name' => 'teacher',
            'email' => 'teacher@example.com',
            'password' => Hash::make('password'),
            'type' => 'teacher'
        ]);

        $student = User::create([
            'name' => 'student',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'type' => 'student'
        ]);

        $permissions = [
            ['name' => 'students.view_all'],
            ['name' => 'students.create'],
            ['name' => 'students.update'],
            ['name' => 'students.delete'],

            ['name' => 'teachers.view_all'],
            ['name' => 'teachers.create'],
            ['name' => 'teachers.update'],
            ['name' => 'teachers.delete'],

            ['name' => 'roles.view_all'],
            ['name' => 'roles.create'],
            ['name' => 'roles.update'],
            ['name' => 'roles.delete'],

            ['name' => 'messages.view_all'],
            ['name' => 'messages.view_own'],
            ['name' => 'messages.create'],
            ['name' => 'messages.update'],
            ['name' => 'messages.delete'],
            
        ];

        $insert_data = [];
        $time_stamp = Carbon::now()->toDateTimeString();
        foreach ($permissions as $permission) {
            $permission['guard_name'] = 'web';
            $permission['created_at'] = $time_stamp;
            $insert_data[] = $permission;
        }

        Permission::insert($insert_data);

        $fetchedPermissions = Permission::all();
        
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncPermissions($fetchedPermissions);
        $teacherRole = Role::create(['name' => 'teacher']);
        $studentRole = Role::create(['name' => 'student']);

        $admin->assignRole($adminRole);
        $teacher->assignRole($teacherRole);
        $student->assignRole($studentRole);
    }
}
