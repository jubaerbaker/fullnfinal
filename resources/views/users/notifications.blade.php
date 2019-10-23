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
                            <ul class="list-group">
                                @foreach($notifications as $notification)
                                    <li class="list-group-item">
                                        @if($notification->type === 'App\Notifications\NewReplyAdded')
                                            A new reply was added to your discussion
                                            <strong>
                                                {{ $notification->data['post']['title'] }}
                                            </strong>
                                            <a href="{{ route('post.show', $notification->data['post']['id']) }}"
                                               class="btn float-right btn-sm btn-info">
                                                View discussion
                                            </a>
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
