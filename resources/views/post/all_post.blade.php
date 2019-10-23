@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Post</h1>
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
                            @if($posts->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($courseApprovals as $courseApproval)
                                        @if(Auth::id()===$courseApproval->user_id)

                                            @foreach($categories as $category)

                                                @if($courseApproval->course_id === $category->course_id)
                                                    @foreach($posts as $post)
                                                        @if($post->category_id=== $category->id)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ route('post.show', $post->id) }}">{{$post->title}}</a>
                                                                </td>
                                                                <td>
                                                                    {{$post->description}}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
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
