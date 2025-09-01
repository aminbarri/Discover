
@extends('app')

@section('main', 'Contact')
@section('content')
    <div class="">
        <div class="d-flex flex-column min-vh-100">
            <div class="w-100 contact-header border-bottom border-4 border-success">
                    <h1 class="ps-5 text-light text-uppercase d-flex">Contact With Us <hr class="ms-5  border-4 w-25" style="    margin-top: 25px; opacity: 1;"/></h1>
            </div>
            <div class="container ">

                <div class="form-container  mt-4">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form action="{{ route('message_store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="sujet">Sujet</label>
                            <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Enter the subject" value="{{ old('sujet') }}" required>
                            @error('sujet')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="content">Message</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter your message" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
