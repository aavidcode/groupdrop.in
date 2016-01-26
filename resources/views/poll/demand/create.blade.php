@extends('layouts.master')

@section('content')


<div class="page-header">
    <div class="container">
        <h1 class="title">Start a New Demand</h1>
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
                    <label for="" class="lable conttrol">Title Your Demand</label>
                    <span class="help-block">What type of products are you interested in?</span>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" ng-model="poll.title" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="label-control col-lg-3">Product Picture</label>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <div class="thumbnail">
                            <img ng-src="<%poll.default_image_url%>" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-2"><a href="" ng-click="changeDemandPicture()" id="change_picture" class="btn btn-default btn-sm">Add Picture</a></div>
                </div>
                <div class="form-group">
                    <label for="" class="label-control col-lg-3">Demand Description</label>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <textarea ng-model="poll.description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary" ng-click="savePollOptions(2)">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- page-section -->


@stop    