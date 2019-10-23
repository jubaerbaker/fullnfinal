@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Course Approval Request</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Course Approval List</li>
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
                                    <th>Course Name</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courseApprovals as $courseApproval)
                                    @if($courseApproval->course)
                                        @if(Auth::id()===$courseApproval->course_user_id)
                                            <tr>
                                                <td>
                                                    {{ $courseApproval->user->name }}
                                                </td>
                                                <td>
                                                    {{ $courseApproval->course->name }}
                                                </td>
                                                <td>
                                                    @if($courseApproval->status === 0)

                                                        <form action="{{ route('courseApproval.update',$courseApproval->id) }}"
                                                              method="POST">
                                                            {{ csrf_field() }}
                                                            @if(isset($courseApproval))
                                                                {{ method_field('PUT') }}
                                                            @endif

                                                            <button type="submit" class="btn btn-success btn-sm">Accept
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form method="POST"
                                                              action="{{ route('courseApproval.destroy', $courseApproval->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete
                                                            </button>
                                                        </form>

                                                    @endif
                                                </td>
                                            </tr>

                                        @endif
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