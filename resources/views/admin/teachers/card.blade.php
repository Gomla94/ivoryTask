<div class="card" style="min-height: 300px;min-width:500px">
    <div class="card-header">
        Teacher details
    </div>
    <div class="card-body">
        <h3 class="mb-4 py-4 -ml-5 pl-4">
            <p>ID: {{ $teacher->id }}</p>
            <p>Name: {{ $teacher->name }}</p>
            <p>Email: {{ $teacher->email }}</p> 
            
            @if(auth()->id() != $teacher->id)
                <a href="{{ route('messages.send-message-to', $teacher->id) }}" class="btn btn-info btn-sm">Send message</a>
            @endif
        </h3>
    </div>
</div>