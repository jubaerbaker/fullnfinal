@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create course</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create course</li>
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
                            <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}"
                                  method="POST">
                                {{ csrf_field() }}
                                @if(isset($course))
                                    {{--{{ method_field('PUT') }}--}}
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                           value="{{ isset($course) ? $course->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <input type="text" id="name" class="form-control" name="description"
                                           value="{{ isset($course) ? $course->description : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Schedule</label>
                                    <input type="text" id="name" class="form-control" name="schedule"
                                           value="{{ isset($course) ? $course->schedule : '' }}">
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