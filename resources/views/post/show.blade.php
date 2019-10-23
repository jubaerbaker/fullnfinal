@extends('layouts.app')


@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header -->
                    <header class="header text-white h-fullscreen pb-80"
                            style="background-image: url({{ asset($post->image) }});"
                            data-overlay="9">
                        <div class="container text-center">
                            <div class="row h-100">
                                <div class="col-lg-8 mx-auto align-self-center">
                                    <div class="card card-default">
                                        <div class="card-body">
                                            <h1 class="display-4 mt-7 mb-8"
                                                style="color: black">{{  $post->title }}</h1>
                                            <p><span class="opacity-70 mr-1" style="color: black">By</span> <a
                                                        class="text-black" href="#">
                                                    {{ $post->user->name }}
                                                </a></p>
                                            @if($post->image != 'noimage.jpg')
                                                <p><img class="avatar avatar-sm"
                                                        src="{{ asset('/images/'.$post->image) }}"
                                                        alt="..."
                                                        height='100px'
                                                        weight='100px'></p>
                                            @endif
                                            <p style="color: black;">{{ $post->description }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 align-self-end text-center">
                                    <div class="card card-default">
                                        <div class="card-body">
                                            <a class="scroll-down-1 scroll-down-white" style="color: black"
                                               href="#section-content"><span></span></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </header><!-- /.header -->
                    @foreach($replies as $reply)
                        @if($reply->post_id === $post->id)
                            <div class="card my-5">
                                <div class="card-header">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <b>{{ $reply->user->name }}</b>
                                                {{ strip_tags($reply->content) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class='card-header'>
                        Add a replay
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <form action="{{ route('replies.store',$post->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input id="content" type="hidden" name="content">
                                <trix-editor input="content"></trix-editor>
                                <button type="submit" class="btn btn-sm my-2 btn-success">
                                    Add replay
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection