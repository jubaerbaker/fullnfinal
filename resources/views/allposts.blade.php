@extends('welcome')

@section('mainContent')
    <h1 class="my-4">
        @if(count($posts) > 0)
            All Posts
        @endif
            Study network
    </h1>

    @foreach($posts as $post)
        <!-- Blog Post -->
        <div class="card mb-4">
            @if($post->image != 'noimage.jpg')
                <img class="card-img-top" src="{{ asset('images/'.$post->image) }}" alt="Card image cap">
            @endif
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ url('/single-post/'.$post->id) }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on {{ $post->created_at }}
            </div>
        </div>
    @endforeach
@endsection