<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'WelcomeController@index');
Route::get('/my-communities', array('as' => 'my-communities', 'uses' => 'UserController@myCommunities'));

Route::resource('users', 'UserController');
Route::resource('poll', 'PollDemandController');

Route::group(array('prefix' => 'users/'), function() {
    Route::get('activate/{id}/{activationCode}', array('as' => 'users.activate', 'uses' => 'UserController@activateUser'));
    Route::post('communities', array('as' => 'users.communities', 'uses' => 'UserController@saveCommunities'));
});

Route::get('vote/{slug}/{id}', array('uses' => 'PollDemandController@showPollVotes'));

Route::group(array('prefix' => 'poll/'), function() {
    Route::post('productinfo', array('uses' => 'PollDemandController@getProductInfo'));
    Route::get('create', array('as' => 'poll.create', 'uses' => 'PollDemandController@pollCreate'));
    Route::get('vote/{poll_id}/{id}/{type}', array('as' => 'poll.vote', 'uses' => 'PollDemandController@votePoll'));
    Route::get('options/{poll_id}', array('as' => 'poll.options', 'uses' => 'PollDemandController@loadPollOptions'));
    Route::post('option/save/{poll_id}', array('as' => 'poll.option.save', 'uses' => 'PollDemandController@savePollOption'));
    Route::get('discussions/{poll_id}', array('as' => 'poll.discussion', 'uses' => 'PollDemandController@loadDiscussions'));
    Route::post('discussion/save', array('as' => 'poll.discussion.save', 'uses' => 'PollDemandController@saveDiscussion'));
});

Route::group(array('prefix' => 'demand/'), function() {
    Route::get('create', array('as' => 'demand.create', 'uses' => 'PollDemandController@demandCreate'));
    Route::get('vote/{id}/{type}', array('as' => 'demand.vote', 'uses' => 'PollDemandController@voteDemand'));
});


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
