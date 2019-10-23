@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All course</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All course</li>
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
                                <div><a class="btn btn-primary" href="{{ route('courses.create') }}">Add course</a>
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>


                                @foreach($courses as $course)
                                    <tr>
                                        <?php $flag = 0; ?>

                                        @if(auth()->user()->isAdmin() || Auth::id() === $course->user_id )
                                            <td>
                                                <a href="{{ route('courses.show', $course->id) }}"> {{ $course->name }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('courses.edit', $course->id) }}"
                                                   class="btn btn-info btn-sm">
                                                    Edit
                                                </a></td>
                                            <td>
                                                <form method="POST"
                                                      action="{{ route('courses.destroy', $course->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                            <?php
                                            $courseApproval = (object)array('id' => 0);
                                            ?>
                                            @foreach($courseApprovals as $courseApproval)
                                                @if($courseApproval->course_id ===  $course->id && Auth::id() ===$courseApproval->user_id)
                                                    <?php
                                                    $flag = 1; ?>
                                                @endif
                                            @endforeach
                                            @if($flag=== 0)

                                                <td>
                                                    <form method="POST"
                                                          action="{{ route('courseApprove.approveMyCourse',$courseApproval->id) }}">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <input type="hidden" id="name" class="form-control"
                                                                   name="courseId"
                                                                   value="{{ $course->id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" id="name" class="form-control"
                                                                   name="ApproveId"
                                                                   value="{{ Auth::id() }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" id="name" class="form-control"
                                                                   name="courseUserId"
                                                                   value="{{ $course->user_id}}">
                                                        </div>
                                                        <button type="submit" class="btn btn-success btn-sm">Add me
                                                        </button>
                                                    </form>
                                                </td>

                                            @endif
                                            {{--@endforeach--}}
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

