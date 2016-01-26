@extends('layouts.master')

@section('content')
<!-- Sticky Navbar -->
<div class="page-header">
    <div class="container">
        <h1 class="title">My Communities</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <?php
            //print_r($user->communities());
            ?>
            @foreach($user->userCommunities as $userCommunity) 
            <a href=""><span class="label label-default">{{$userCommunity->community->name}}</span></a>
            @endforeach
        </div>
    </div>
</div>
<!-- page-header -->
<section id="service" class="page-section shop">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom:40px;">
                <a href="{{ route('poll.create')}}" class="btn btn-primary pull-right col-lg-offset-1">Start a New Poll</a>
                <a href="{{ route('demand.create')}}" class="btn btn-primary pull-right">Start a New Demand</a>
            </div>


            <div class="col-md-12 product-page">


                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#polls" aria-controls="polls" role="tab" data-toggle="tab">
                                <i class="fa fa-home"></i> Polls</a>
                        </li>
                        <li role="presentation">
                            <a href="#demands" aria-controls="demands" role="tab" data-toggle="tab">
                                <i class="fa fa-user"></i> Demands</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="polls">
                            <h5>Polls</h5>
                            @if($polls)
                            @foreach($polls as $poll)
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <img src="{{$poll->default_image_url}}" alt="" width="265" height="276">
                                        </div>
                                        <div class="product-details">
                                            <h4>{{$poll->title}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- .product -->
                                <div class="col-md-8 col-sm-6">
                                    <div class="product-rating pull-right">
                                        <div class="star-rating">
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star-half-o"></i></div>
                                    </div>
                                    <div class="price-details">
                                        <h3><a href="vote/{{$poll->slug}}/{{$poll->id}}">{{$poll->title}}</a></h3>
                                    </div>
                                    @foreach($poll->details as $pollDetail)
                                    <h6>{{$pollDetail->title}}</h6>
                                    <div class="vote-count pull-right">{{$pollDetail->total_votes}} votes</div>
                                    <div class="progress">
                                        <div data-percentage="{{$pollDetail->total_votes}}" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$pollDetail->total_votes}}" role="progressbar" class="progress-bar">
                                            <span class="progress-label" style="left: {{$pollDetail->total_votes}}%">{{$pollDetail->total_votes}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div role="tabpanel" class="tab-pane" id="demands">
                            <h5>Demands</h5>
                            @if($demands)
                            @foreach($demands as $demand)
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <img src="{{$demand->default_image_url}}" alt="" width="265" height="276">
                                        </div>
                                        <div class="product-details">
                                            <h4>{{$demand->title}}</h4>
                                            <h5 class="text-color">$99</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- .product -->
                                <div class="col-md-8 col-sm-6">
                                    <div class="product-rating pull-right">
                                        <div class="star-rating">
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star-half-o"></i></div>
                                    </div>
                                    <div class="price-details">
                                        <h3><a href="vote/{{$demand->slug}}/{{$demand->id}}">{{$demand->title}}</a></h3>
                                    </div>
                                    <div class="vote-count pull-right">{{$demand->total_votes}} votes</div>
                                    <div class="progress">
                                        <div data-percentage="{{$demand->total_votes}}" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$demand->total_votes}}" role="progressbar" class="progress-bar">
                                            <span class="progress-label" style="left: {{$demand->total_votes}}%">{{$demand->total_votes}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</section>
<!-- page-section -->

@stop    