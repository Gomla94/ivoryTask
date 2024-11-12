@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-between mb-4 w-100">
        <h3 class="text-gray-500 font-normal">Teachers</h3>        
    </div>

    <div class="d-flex" style="flex-wrap: wrap">
        @forelse($teachers as $teacher)
        <div class="px-3 mb-3">
            @include('admin.teachers.card')
        </div>                    
        @empty
            <p>No teachers.</p>
        @endforelse
    </div>
        
@endsection