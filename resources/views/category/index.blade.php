@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Category</li>
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
                            @if(auth()->user()->isAdmin() || auth()->user()->isTeacher() )
                                <div><a class="btn btn-primary" href="{{ route('categories.create') }}">Add category</a>
                                </div>
                            @endif

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Posts Count</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($courseApprovals as $courseApproval)
                                    @if(Auth::id()===$courseApproval->user_id )
                                        @foreach($categories as $category)
                                            @if($category->course_id === $courseApproval->course_id)
                                                <tr>

                                                    <td>
                                                        <a href="{{ route('categories.show', $category->id) }}"> {{ $category->name }}</a>
                                                    </td>
                                                    <td>
                                                        {{$category->course->name}}
                                                    </td>
                                                    <td>
                                                        {{ $category->post->count() }}
                                                    </td>
                                                    @if(auth()->user()->isAdmin() || Auth::id() === $category->user_id )
                                                        <td>
                                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                               class="btn btn-info btn-sm">
                                                                Edit
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form method="POST"
                                                                  action="{{ route('categories.destroy', $category->id) }}">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
