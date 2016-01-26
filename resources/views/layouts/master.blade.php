<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Groupdrop - description" />
        <meta name="author" content="groupdrop" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Groupdrop</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" />
        <!-- Font -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:300,400,700,400italic,700italic' />
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css' />
        <!-- Font Awesome Icons -->

        {!! HTML::style('resources/assets/css/font-awesome.min.css') !!}
        <!-- Bootstrap core CSS -->
        {!! HTML::style('resources/assets/css/bootstrap.min.css') !!}
        {!! HTML::style('resources/assets/css/hover-dropdown-menu.css') !!}
        <!-- Icomoon Icons -->
        {!! HTML::style('resources/assets/css/icons.css') !!}
        <!-- Revolution Slider -->
        {!! HTML::style('resources/assets/css/revolution-slider.css') !!}
        {!! HTML::style('resources/assets/css/settings.css') !!}
        <!-- Animations -->
        {!! HTML::style('resources/assets/css/animate.min.css') !!}
        <!-- Owl Carousel Slider -->
        {!! HTML::style('resources/assets/css/owl.carousel.css') !!}
        {!! HTML::style('resources/assets/css/owl.theme.css') !!}
        {!! HTML::style('resources/assets/css/owl.transitions.css') !!}
        <!-- PrettyPhoto Popup -->
        {!! HTML::style('resources/assets/css/prettyPhoto.css') !!}
        {!! HTML::style('resources/assets/css/style.css') !!}
        {!! HTML::style('resources/assets/css/responsive.css') !!}
        <!-- Color Scheme -->
        {!! HTML::style('resources/assets/css/color.css') !!}

        {!! HTML::style('resources/assets/vendor/bootbox/bootbox.css') !!}

        {!! HTML::style('resources/assets/css/custom.css') !!}

        {!! HTML::script('resources/assets/js/jquery.min.js') !!}
        
        <script type="text/javascript">
            var BASE_URL = '{{URL::to('/')}}/';
        </script>
    </head>
    <body>
        <div id="page" ng-app="gd-app">
            <!-- Page Loader -->
            <div id="pageloader">
                <div class="loader-item fa fa-spin text-color"></div>
            </div>

            <!-- Top Bar -->
<header id="sticker" class="sticky-navigation">
    <!-- Sticky Menu -->
    <div class="sticky-menu relative">
        <!-- navbar -->
        <div class="navbar navbar-default navbar-bg-light" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header" style="width:100%;">
                            <!-- Button For Responsive toggle -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span></button> 
                            <!-- Logo -->

                            <a class="navbar-brand" href="index.html">
                                <img class="site_logo" alt="Site Logo" src="{{asset('resources/assets/images/logo.png')}}" />
                            </a>
                            @if(Auth::check())
                            <div class="pull-right col-md-pull-2" style="margin-top:20px;">Welcome {{Auth::user()->first_name}} | <a href=" {{ action('Auth\AuthController@getLogout')}}">Logout</a></div>
                            @else 
                            <a class="navbar-login btn btn-primary" data-toggle="modal" data-target="#loginModal" href="#">Login</a>
                            @endif
                        </div>
                        <!-- Navbar Collapse -->
                        <div class="navbar-collapse collapse">
                            <!-- nav -->

                            <!-- Right nav -->
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- navbar -->
    </div>
    <!-- Sticky Menu -->
</header>
            
            @yield('content')
            @include('layouts.footer')       

        </div>
        <!-- page -->
    </body>
</html>