@extends('template.main')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-light">
        <div class="container text-center">
            <h1>Halaman About</h1>
            <h3>{{ $user }}</h3>
            <p style="color: black">{{ $email }}</p>
            <img src="{{ url('/uploads/profile.jpg') }}" alt="Ahmad-Muzayyin" width="200" class="rounded-circle">
        </div>
    </div>
@endsection
