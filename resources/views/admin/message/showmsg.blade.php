@extends('admin.appdash')

@section('main', 'Message list')
@section('content')

<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="{{ route('message') }}" class=" mt-3"><strong><i class="bi bi-arrow-left-circle"></i> Back</strong></a>

    <h2>message Details</h2>

    <div class="card">
        <div class="card-header">
            <strong>{{ $messages->sujet }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $messages->name }}</p>
            <p><strong>Email:</strong> {{ $messages->email }}</p>
            <p><strong>messages:</strong></p>
            <p>{{ $messages->content }}</p>
        </div>
        <div class="card-footer text-muted">
            Sent on {{ $messages->created_at->format('Y-m-d H:i') }}
        </div>
    </div>


 <!-- Reply Button -->
    <button class="btn btn-success mt-3 " data-bs-toggle="collapse" data-bs-target="#replyForm">
        <i class="bi bi-reply-fill"></i> Reply
    </button>

    <!-- Delete Button -->
    <form action="{{ route('messagess.destroy', $messages->id_mess) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3" >
            <i class="bi bi-trash-fill"></i> Delete
        </button>
    </form>
    <div class="collapse mt-2" id="replyForm">
    <form action="{{route('reply_msg',['sujet'=> $messages->sujet ,'email' =>  $messages->email, 'id_message_reply' => $messages->id_mess])}}" method="POST">
        @csrf
        <div class="form-floating mt-2">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="content"></textarea>
        <label for="floatingTextarea2">Reply</label>
        </div>
        <button type="submit" class="btn btn-success mt-2">Success</button>
    </form>
    </div>
</div>



@endsection
