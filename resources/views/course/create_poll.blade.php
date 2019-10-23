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
                            <form action="{{ action('PollController@store') }}"
                                  method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Course</label>
                                    <select class="form-control" name="course_id" required>
                                        <option value="">--Select Course--</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Question</label>
                                    <input type="text" name="question" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td>Action</td>
                                            <td>Option</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <button type="button" onclick="addRow()" class="btn btn-primary">+
                                                </button>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="options[]" id="option_1" value="">
                                                <input type="hidden" name="row" id="row" class="row" value="1">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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

    <script>
        function addRow() {
            var row = parseInt($('#row').val());
            row = row + 1;
            var str = '<tr id="tr_' + row + '">';
            str += '<td><button type="button" onclick="removeRow(' + row + ')" class="btn btn-danger">-</button></td>';
            str += '<td><input type="text" class="form-control" name="options[]" id="option_' + row + '" value=""</td>';
            str += '</tr>';
            $('table>tbody').append(str);
            $('#row').val(row);
            $('.select2').select2();
        }

        function removeRow(row) {
            $('#tr_' + row).remove();
            var current = Number($('#row').val());
            var row = current - 1;
            $('#row').val(row);
            calculateTotalPrice();
        }
    </script>

@endsection