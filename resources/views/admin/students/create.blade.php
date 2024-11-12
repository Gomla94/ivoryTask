@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Add Student
    </div>
    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone number</label>
                <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" value="{{ old('age') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role_id" class="form-control" id="role">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary btn-sm">Create</button>
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