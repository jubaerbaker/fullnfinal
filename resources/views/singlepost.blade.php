@extends('welcome')

@section('mainContent')

    <!-- Title -->
    <h1 class="mt-4">{{ $post->title }}</h1>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{ $post->created_at }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{ asset('images/'.$post->image) }}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{ $post->content }}</p>


@endsection