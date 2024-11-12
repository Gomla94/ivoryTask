@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-between mb-4 w-100">
        <h3 class="text-gray-500 font-normal">Roles</h3>
    </div>

    <div class="d-flex" style="flex-wrap: wrap">
        <ul class="list-group" style="width:100%">        
            @forelse($roles as $role)
                <li class="list-group-item" class="width:auto">
                    {{ $role->name }}
                    <p>Users count: {{ $role->users->count() }}</p>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info btn-sm">Edit</a>
                </li>                    
            @empty
                <p>No roles.</p>
            @endforelse
        </ul>
    </div>
        
@endsection