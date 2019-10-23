@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Poll</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Poll</li>
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
                            <form action="{{ action('PollAnswerController@store') }}"
                                  method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Question</td>
                                            <td>Answer</td>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                @foreach ($polls as $poll)
                                    <?php
                                    $course = \App\Course::where('id', $poll->course_id)->first();
                                    $options = json_decode($poll->options);
                                    if($course) {
                                    $isApproval = \Illuminate\Support\Facades\DB::table('course_approvals')->where([
                                        ['course_id', '=', $course->id],
                                        ['user_id', '=', \Illuminate\Support\Facades\Auth::user()->id]
                                    ])->first();
                                    if($isApproval) {
                                    $result = \Illuminate\Support\Facades\DB::table('poll_answers')->where([
                                        ['course_id', '=', $course->id],
                                        ['user_id', '=', \Illuminate\Support\Facades\Auth::user()->id]
                                    ])->first();
                                    if($result) {
                                        echo null;
                                    } else {
                                    ?>
                                    <div class="form-group">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <?= $course->name; ?>
                                                    <input type="hidden" name="course_id[]"
                                                           value="<?= $poll->course_id; ?>">
                                                </td>
                                                <td><?= $poll->question; ?></td>
                                                <td>
                                                    <?php
                                                    foreach($options as $option) { ?>
                                                    <?= $option; ?> <input type="radio"
                                                                           name="answer[{{ $poll->course_id }}]"
                                                                           value="<?= $option; ?>">
                                                    <?php }
                                                    ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php }
                                    } } ?>
                                @endforeach

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