@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Send message to: <span style="color:red">{{ $teacher->name }}</span>
    </div>
    <div class="card-body">
        <form action="{{ route('messages.storeAMessageToTeacher', $teacher->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Message</label>
                <textarea name="message" class="form-control" id="" cols="30" rows="10">{{ old('message') }}</textarea>
            </div>           
           
            <div class="mt-2">
                <button class="btn btn-primary btn-sm">Send</button>
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