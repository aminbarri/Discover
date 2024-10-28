@extends('admin.appdash')

@section('main', 'Message list')
@section('content')

<div class="container mt-5">
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
    <a href="" class="btn btn-success mt-3">
        <i class="bi bi-reply-fill"></i> Reply
    </a>

    <!-- Delete Button -->
    <form action="{{ route('messagess.destroy', $messages->id_mess) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3" >
            <i class="bi bi-trash-fill"></i> Delete
        </button>
    </form>
</div>



@endsection