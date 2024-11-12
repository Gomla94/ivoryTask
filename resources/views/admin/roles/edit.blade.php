@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="flex items-center justify-between mb-4 w-100">
            <h3 class="text-gray-500 font-normal">Edit Role: {{ $role->name }}</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method("PATCH")
    
            <div class="form-group">
                <ul style="list-style: none;padding:0">
                    @foreach($permissions as $permission)
                    <li class="d-flex">
                        <input type="checkbox" id="{{ $permission->id }}" {{ $role->permissions->contains($permission) ? 'checked' : '' }} name="permissions[{{ $permission->name }}]">
                        <label for="{{ $permission->id }}" style="margin-left:10px">{{ $permission->name }}</label>
                    </li>
                    @endforeach
                </ul>
    
                <button class="btn btn-primary btn-sm">Update</button>
            </div>
        </form>
    </div>
</div>

    
        
@endsection