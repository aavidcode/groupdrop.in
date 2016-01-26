@extends('layouts.master')

@section('content')


<div class="page-header">
    <div class="container">
        <h1 class="title">{{$poll->name}}</h1>

        <a href="{{ route('my-communities')}}" class="btn btn-primary">My Communities</a>
        <a href="{{ route($poll->type == 1 ? 'poll.create' : 'demand.create')}}" class="btn btn-default">Start a {{ $poll->type == 1 ? 'Poll' : 'Demand'}}</a>
    </div>
</div>
<!-- page-header -->
<section id="service" class="page-section"  ng-controller="PollCtrl" ng-init="loadPollOptions({{$poll->id}})">
    <div class="container shop text-center">

        <div class="row">

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#voting" aria-controls="voting" role="tab" data-toggle="tab">
                        <i class="fa fa-home"></i> Voting</a>
                </li>
                <li role="presentation">
                    <a href="#results" aria-controls="results" role="tab" data-toggle="tab">
                        <i class="fa fa-user"></i> Results</a>
                </li>
                <li role="presentation">
                    <a href="#discussion" aria-controls="discussion" role="tab" data-toggle="tab" ng-click="loadDiscussions({{$poll->id}})">
                        <i class="fa fa-comment"></i> Discussions</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="voting">
                    @if($poll->type == 1)
                    <div class="col-sm-4 col-md-3" ng-repeat="pollOption in poll.pollOptions">
                        <div class="product-item">
                            <div class="product-img">
                                <img src="<%pollOption.image_url%>" alt="" width="265" height="276">
                            </div>
                            <h4><%pollOption.title%></h4>
                            <div class="product-details">
                                <div class="product-details">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label ng-click="votePoll(poll.id, pollOption.id, $event)" id="voting_radio_<%pollOption.id%>" class="btn btn-primary voting_radio">
                                            <input type="radio" name="poll_vote" ng-checked="isVoted(pollOption.id)"> <span><%isVoted(pollOption.id) ? "VOTED" : "VOTE"%></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="col-sm-4 col-md-3">
                            <div class="poll_add">+</div>
                            <button class="button btn btn-block button--light" id="show_poll" ng-click="showPollOption()">Add an option</button>
                        </div>
                    
                    @else
                    <?php
                    $isVoted = $poll->isVoted();
                    ?>
                    <div class="col-sm-4 col-md-3">
                        <div class="product-item">
                            <div class="product-img">
                                <img src="{{$poll->default_image_url}}" alt="" width="265" height="276">
                            </div>
                            <h4>{{$poll->title}}</h4>
                            <div class="product-details">
                                <a href="" ng-click="voteDemand({{$poll-> id}}, $event)" class="btn btn-primary">{{$isVoted ? 'VOTED' : 'VOTE'}}</a>
                            </div>

                        </div>
                    </div>
                    @endif
                </div>
                <div role="tabpanel" class="tab-pane" id="results">
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
                <div role="tabpanel" class="tab-pane" id="discussion">
                    <form action="" class="horizontal-form" ng-submit="saveDiscussion({{$poll->id}})">
                        <div class="col-lg-8">
                        <textarea ng-model="discussion.comment" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                    
                    <div class="row">
                        <div class="col-lg-8" style="text-align: left; margin-bottom: 20px;" ng-repeat="discussionDet in discussions">
                            <div class="col-lg-3"><img src="https://placehold.it/80x80" alt="" class="src" /></div>
                            <div class="col-lg-9">
                                <h4><%discussionDet.user.first_name%></h4>
                                <p><%discussionDet.comment%></p>
                                <div class="pull-right"><%discussionDet.created_at | timeAgo%></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($poll->type == 1)
    @include('poll.partials.add-option')
    @include('poll.partials.edit-option')
    @endif
</section>  
<!-- page-section -->



@stop    