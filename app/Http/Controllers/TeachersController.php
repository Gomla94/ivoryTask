<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

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
