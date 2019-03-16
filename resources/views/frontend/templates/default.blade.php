<!DOCTYPE html>
<html lang="en">

@include('frontend.templates.partials.head')

<body>

<!-- Navigation -->
@include('frontend.templates.partials.navigation')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

            <h1 class="my-4">Hallo Kamu Yang Ada Disana
                {{-- <small>Secondary Text</small> --}}
            </h1>

        @include('frontend.templates.partials.alert')

        @yield('content')

        <!-- Pagination -->
            {{-- <ul class="pagination justify-content-center mb-4">
              <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
              </li>
              <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
              </li>
            </ul> --}}

        </div>

        <!-- Sidebar Widgets Column -->
        {{--<div class="col-md-4">--}}

            {{--<!-- Search Widget -->--}}
            {{--<div class="card my-4">--}}
                {{--<h5 class="card-header">Search</h5>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="input-group">--}}
                        {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                        {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-secondary" type="button">Go!</button>--}}
              {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <!-- Categories Widget -->
            {{--<div class="card my-4">--}}
                {{--<h5 class="card-header">Categories</h5>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<ul class="list-unstyled mb-0">--}}
                                {{--<li>--}}
                                    {{--<a href="#">Web Design</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">HTML</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">Freebies</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<ul class="list-unstyled mb-0">--}}
                                {{--<li>--}}
                                    {{--<a href="#">JavaScript</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">CSS</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">Tutorials</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<!-- Side Widget -->--}}
            {{--@include('frontend.templates.partials.sidebar')--}}

        </div>

    </div>
    <!-- /.rowaler -->

</div>
<!-- /.container -->



<!-- Bootstrap core JavaScript -->
{{--<script src="vendor/jquery/jquery.min.js"></script>--}}
{{--<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{ asset('js/plugins/pace.min.js') }}"></script>
@stack('extra-script')
</body>

</html>
