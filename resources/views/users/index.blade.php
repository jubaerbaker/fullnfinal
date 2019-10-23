@extends('layouts.app')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                            @if($users->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>

                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                @if(!$user->isAdmin())
                                                    <form action="{{ route('users.make-admin', $user->id) }}"
                                                          method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-success btn-sm">Make
                                                            Admin
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!$user->isTeacher())
                                                    <form action="{{ route('users.make-teacher', $user->id) }}"
                                                          method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-success btn-sm">Make
                                                            Teacher
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3 class="text-center">No Users Yet</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
