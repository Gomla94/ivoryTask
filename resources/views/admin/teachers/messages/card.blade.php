<div class="card" style="min-height: 300px;min-width:500px">
    <div class="card-header">
        Message details
    </div>
    <div class="card-body">
        <h3 class="mb-4 py-4 -ml-5 pl-4">
            <p>ID: {{ $message->id }}</p>
            <p>From: {{ $message->from->name }}</p>
            <p>To: {{ $message->to->name }}</p> 
            
            {{-- <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-sm">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form> --}}
        </h3>
    </div>
</div>