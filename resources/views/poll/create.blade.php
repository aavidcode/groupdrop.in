@extends('layouts.master')

@section('content')

<div class="page-header">
    <div class="container">
        <h1 class="title">Start a New Poll</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#">Pages</a>
                </li>
                <li class="active">Services</li>
            </ul>
        </div>
    </div>
</div>
<!-- page-header -->
<section id="service" class="page-section" ng-controller="PollCtrl">
    <div class="container">
        <div class="row">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="" class="lable-control">Which Community do your products belong to?</label>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <select ng-model="poll.community_id" class="form-control">
                            <option value="">Select a Community</option>
                            @foreach($communities as $community)
                            <option value="{{$community->id}}">{{$community->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="lable conttrol">Title Your Poll</label>
                    <span class="help-block">What type of products are you interested in?</span>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" ng-model="poll.title" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        
                        <div class="col-sm-4 col-md-3 poll_option" ng-repeat="pollOption in poll.pollOptions">
                            <div class="poll_image"><img ng-src="<%pollOption.image_url%>" /></div>
                            <button class="button btn btn-block btn-primary" id="remove_poll" ng-click="removePollOption(pollOption)">Remove</button>
                        </div>
                        
                        
                        <div class="col-sm-4 col-md-3">
                            <div class="poll_add">+</div>
                            <button class="button btn btn-block button--light" id="show_poll" ng-click="showPollOption()">Add an option</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary" ng-click="savePollOptions(1)">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('poll.partials.add-option')
    @include('poll.partials.edit-option')
</section>
<!-- page-section -->


@stop    