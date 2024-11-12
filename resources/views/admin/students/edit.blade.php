@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Add Student
    </div>
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $student->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ $student->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone number</label>
                <input type="text" name="phone_number" value="{{ optional($student->userDetails)->phone_number }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" value="{{ optional($student->userDetails)->age }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role_id" class="form-control" id="role">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $student->roles[0]->id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary btn-sm">Update</button>
            </div>

            @if($errors->count())
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>
    
</div>
@endsection