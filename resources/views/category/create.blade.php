@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-default">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-group">
                                        @foreach($errors->all() as $error)
                                            <li class="list-group-item">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
                                  method="POST">
                                {{ csrf_field() }}
                                @if(isset($category))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                           value="{{ isset($category) ? $category->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <select name="course" id="course" class="form-control">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}"
                                                    @if(isset($category))
                                                    @if($course->id === $category->course_id)
                                                    selected
                                                    @endif
                                                    @endif
                                            >
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group text-center">

                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection