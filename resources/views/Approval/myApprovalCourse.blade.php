@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My courses</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My courses</li>
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
                                <thead>
                                <tr>
                                    <th>Name</th>

                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>


                                @foreach($courseApprovals as $courseApproval)
                                    <tr>
                                        @if($courseApproval->course)
                                            @if(auth()->user()->isAdmin() || Auth::id() === $courseApproval->user_id )
                                                <td>
                                                    <a href="{{ route('courses.show', $courseApproval->course_id) }}"> {{ $courseApproval->course->name }}</a>
                                                </td>

                                            @endif
                                        @endif
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
