<div class="card" style="min-height: 300px;min-width:500px">
    <div class="card-header">
        Student details
    </div>
    <div class="card-body">
        <h3 class="mb-4 py-4 -ml-5 pl-4">
            <p>ID: {{ $student->id }}</p>
            <p>Name: {{ $student->name }}</p>
            <p>Email: {{ $student->email }}</p> 
            
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-sm">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </h3>
    </div>
</div>