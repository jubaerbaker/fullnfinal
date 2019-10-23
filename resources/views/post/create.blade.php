@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ isset($post) ? 'Edit Post': 'Create Post' }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ isset($post) ? 'Edit Post': 'Create Post' }}</li>
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
                            <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}"
                                  method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if(isset($post))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id='title'
                                           value="{{ isset($post) ? $post->title: '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input id="description" type="text" name="description" class="form-control"
                                           value="{{ isset($post) ? $post->description : '' }}">
                                    {{--<trix-editor input="content"></trix-editor>--}}
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <input id="content" type="text" name="content" class="form-control"
                                           value="{{ isset($post) ? $post->content : '' }}">
                                    {{--<trix-editor input="content"></trix-editor>--}}
                                </div>
                                @if(isset($post))
                                    <div class="form-group">
                                        <img src="{{ asset($post->image) }}" alt="" style="width: 100%">
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        {{--@foreach($categories as $category)--}}
                                        {{--<option value="{{ $category->id }}">{{ $category->name }}</option>--}}
                                        {{--@endforeach--}}
                                        @foreach($courseApprovals as $courseApproval)
                                            @if(Auth::id()===$courseApproval->user_id )
                                                @foreach($categories as $category)
                                                    @if($category->course_id === $courseApproval->course_id)
                                                        <option value="{{ $category->id }}" @if(isset($post))
                                                        @if($category->id === $post->category_id)
                                                        selected
                                                                @endif
                                                                @endif
                                                        >
                                                            {{ $category->name }}
                                                            @if(isset($courses))
                                                                @foreach($courses as $course)
                                                                    @if($course->id === $category->course_id)
                                                                        {{ $course->name }}
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image"/>
                                </div>
                                <!--<div class="form-group">
                               <input type="file" name="file" />
                                </div>-->

                                @if($tags->count() > 0)
                                    <div class="form-group">
                                        <label for="tags">Tags</label>

                                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                        @if(isset($post))
                                                        @if($post->hasTag($tag->id))
                                                        selected
                                                        @endif
                                                        @endif
                                                >
                                                    {{ $tag->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif


                                <div class="form-group text-center">

                                    <button type="submit"
                                            class="btn btn-success"> {{ isset($post) ? 'Update Post': 'Create Post' }}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>

        $(document).ready(function () {
            $('.tags-selector').select2();
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection
