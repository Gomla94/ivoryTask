<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\utils\StudentsUtility;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Students\StoreStudentRequest;

class StudentsController extends Controller
{
    protected $studentsUtility;

    public function __construct(StudentsUtility $studentsUtility)
    {
        $this->studentsUtility = $studentsUtility;
    }

    public function index()
    {
        if(!auth()->user()->can('students.view_all')) {
            abort(403);
        }
        $students = User::students()->select('id', 'name', 'email')->get();
        if(request('query')) {
            $searchTerm = request('query');
            $students = User::students()
            ->whereRaw("match(name) against (? in boolean mode)", [$searchTerm])
            ->select('id', 'name', 'email')->get();
        }
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        if(!auth()->user()->can('students.create')) {
            abort(403);
        }

        $roles = Role::select('id', 'name')->get();

        return view('admin.students.create', compact('roles'));
    }

    public function store(StoreStudentRequest $request)
    {
        try {

            if(!auth()->user()->can('students.create')) {
                abort(403);
            }

            DB::beginTransaction();
            
            $this->studentsUtility->createStudent($request);

            DB::commit();
            return redirect()->route('students.index')->with('success', 'Student added');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Something went wrong');
        }
    }

    public function edit(User $student)
    {
        if(!auth()->user()->can('students.update')) {
            abort(403);
        }

        $student->with(['userDetails', 'roles']);
        $roles = Role::select('id', 'name')->get();

        return view('admin.students.edit', compact('student', 'roles'));
    }

    public function update(StoreStudentRequest $request, User $student)
    {
        try {

            if(!auth()->user()->can('students.update')) {
                abort(403);
            }

            DB::beginTransaction();
            
            $this->studentsUtility->updateStudent($request, $student);

            DB::commit();
            return redirect()->route('students.index')->with('success', 'Student updated');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroy(User $student)
    {
        if(!auth()->user()->can('students.delete')) {
            abort(403);
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted');
    }
}
