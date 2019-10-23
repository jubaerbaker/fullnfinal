<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TSRelation</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('public/frontend/css/blog-home.css') }}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">TSRelation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container" @if(count($posts) < 1) style="height: 475px;" @endif>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            @yield('mainContent')

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

        @if(count($categories) > 0)
            <!-- Categories Widget -->
                <div class="card my-4">

                    <h5 class="card-header">Categories</h5>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ url('/posts/'.$category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website {{ date('Y') }}</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('public/frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
