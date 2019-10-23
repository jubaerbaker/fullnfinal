@extends('layouts.app')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Post for {{ $categories->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Post</li>
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
                            <table class="table">


                                @foreach($posts as $post)

                                    @if($post->category->id === $categories->id)
                                        <tr>

                                            <td>
                                                <h4><a href="{{ route('post.show', $post->id) }}" > {{ $post->title }}</a></h4>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection