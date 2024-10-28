

@extends('admin.appdash')

@section('main', 'Message')
@section('content')

<div class="container mt-5 ">
    <h2>Messages</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Sujet</th>
                <th>Message</th>
                <th>Send At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->sujet }}</td>
                    <td> <a href="{{ route('message_show', $message->id_mess) }}" class="">
                        <i class="bi bi-eye"></i> 
                    </a> </td>
                    <td>{{ $message->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection