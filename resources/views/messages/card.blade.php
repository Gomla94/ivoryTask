<div class="card" style="min-height: 300px;min-width:500px">
    <div class="card-header">
        Message details
    </div>
    <div class="card-body">
        <h3 class="mb-4 py-4 -ml-5 pl-4">
            <p>ID: {{ $message->id }}</p>
            <p>From: {{ $message->from->name }}</p>
            <p>To: {{ $message->to->name }}</p>            
            <p>Message: {{ $message->message }}</p>            
        </h3>
    </div>
</div>