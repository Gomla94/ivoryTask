<?php

namespace App\utils;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentsUtility {

    public function createStudent($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'type' => 'student'
        ]);

        $user->userDetails()->create([
            'phone_number' => $request->phone_number,
            'age' => $request->age,
        ]);

        $role = Role::findById($request->role_id);
        $user->assignRole($role);

        return $user;
    }

    public function updateStudent($request, User $student)
    {
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $student->userDetails()->updateOrCreate(
            ['user_id' => $student->id],
            [
            'phone_number' => $request->phone_number,
            'age' => $request->age,
            'user_id' => $student->id
            ]
        );

        $student->syncRoles($request->role_id);

        return $student;
    }
}