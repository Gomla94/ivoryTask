@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-between mb-4 w-100">
        <h3 class="text-gray-500 font-normal">Messages</h3>    
    </div>

    <div class="d-flex" style="flex-wrap: wrap">
        @forelse($messages as $message)
        <div class="px-3 mb-3">
            @include('messages.card')
        </div>                    
        @empty
            <p>No messages.</p>
        @endforelse
    </div>
        
@endsection