@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Tag</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Tag</li>
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
                            <div><a class="btn btn-primary" href="{{ route('tags.create') }}">Add Tag</a></div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Posts Count</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>
                                            {{ $tag->name }}
                                        </td>
                                        <td>
                                            {{ $tag->posts->count() }}
                                        </td>
                                        <td>
                                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm">
                                                Edit
                                            </a></td>
                                        <td>
                                            <form method="POST" action="{{ route('tags.destroy', $tag->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
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
