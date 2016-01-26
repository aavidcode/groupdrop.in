@extends('layouts.master')

@section('content')

<!--<a class="navbar-brand" href="index.html" style="top: 30px;">
    <img class="site_logo" alt="Site Logo" width="190" height="86" src="{{asset('resources/assets/images/logo.png')}}" />
</a>-->


<!-- Sticky Navbar -->		
<section class="text-slider parallaxbg">
    <div class="overlay"></div>
    <div class="container padding-80">
        <div class="row">
            <div class="col-md-12 white">
                <!--TYPED TEXT SLIDER-->
                <h1 class="typed-text upper top-padding-120 text-color">
                    <span class="element color" data-elements="BRINGING ENTHUSIASTS TOGETHER"></span>
                </h1>
                <!--/.TYPED TEXT SLIDER-->
                <p class="description medium white">Explore communities, products and stories you're passionate about.</p>
                <p>
                    <a class="btn btn-default square upper" href="#" data-toggle="modal" data-target="#signupModal"><i class="fa fa-envelope"></i>Signup with Email</a> 
                    <a class="btn btn-primary square upper" href="#"><i class="fa fa-facebook"></i>signup with facebook</a></p>
            </div>
        </div>
    </div>
</section>




@include('partials.login')
@include('partials.register')
@include('partials.community')



@stop
