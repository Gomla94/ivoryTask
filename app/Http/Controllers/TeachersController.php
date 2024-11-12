<?php

namespace App\Http\Controllers;

use App\Models\User;

class TeachersController extends Controller
{
    
    public function index()
    {
        if(!auth()->user()->can('teachers.view_all')) {
            abort(403);
        }
        $teachers = User::teachers()->select('id', 'name', 'email')->get();
        return view('admin.teachers.index', compact('teachers'));
    }
}
