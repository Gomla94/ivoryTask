@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-between mb-4 w-100">
        <h3 class="text-gray-500 font-normal">Students</h3>
        <a class="button" href="{{ route('students.create') }}">Create a student</a>
        <form action="{{ route('students.index') }}" method="GET" class="mt-2">
            <input type="text" class="form-control" name="query">
            <button class="btn btn-primary btn-sm mt-2">Search</button>
        </form>
    </div>

    <div class="d-flex" style="flex-wrap: wrap">
        @forelse($students as $student)
        <div class="px-3 mb-3">
            @include('admin.students.card')
        </div>                    
        @empty
            <p>No students.</p>
        @endforelse
    </div>
        
@endsection