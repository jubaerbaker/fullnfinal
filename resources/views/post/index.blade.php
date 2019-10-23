@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My All Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My All Post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div><a class="btn btn-primary" href="{{ url('/post/create') }}">Add post</a></div>
                            @if($posts->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        @if(Auth::id() === $post->user_id || auth()->user()->isAdmin())
                                            <tr>
                                                <td><a href="{{ route('post.show', $post->id) }}">{{$post->title}}</a>
                                                </td>
                                                <td>

                                                    {{ $post->category ? $post->category->name : '' }}
                                                    @foreach($courses as $course)
                                                    @if($post->category->course_id === $course->id)
                                                    {{ $course->name }}
                                                    @endif
                                                    @endforeach
                                                    </a>
                                                </td>
                                                @if($post->trashed())
                                                    <td>
                                                        <form action="{{ route('restore_posts', $post->id) }}"
                                                              method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}
                                                            <button type="submit" class="btn btn-info btn-sm">Restore
                                                            </button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="{{ route('post.edit', $post->id) }}"
                                                           class="btn btn-info btn-sm">Edit</a>
                                                    </td>
                                                @endif
                                                <td>
                                                    <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            {{ $post->trashed() ? 'Delete':'Trash' }}
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach


                                    </tbody>
                                </table>
                            @else
                                <h3 class="text-center">No Posts Yet</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
