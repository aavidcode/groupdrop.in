'use strict';

angular.module('gd.controllers', []).
        controller('PollCtrl', function ($rootScope, $scope, $http, $element, filterFilter) {
            $scope.poll = {poll_type: '', default_image_url: '', pollOptions: [], votes: []};
            $scope.showPollOption = function () {
                $scope.product_url = "http://www.apple.com";
                $('#pollAddOptionModal').modal();
            };

            $scope.saveProductInfo = function (pollOption) {
                if ($scope.poll.default_image_url == '') {
                    $scope.poll.default_image_url = pollOption.image_url;
                }
                $scope.poll.pollOptions.push(pollOption);
                if ($scope.poll.id != undefined) {
                    var newPollOption = {title: pollOption.title, image_url: pollOption.image_url, product_url: pollOption.product_url, description: pollOption.description};
                    $http.post(BASE_URL + 'poll/option/save/' + $scope.poll.id, newPollOption).success(function (response) {
                        $scope.loadPollOptions($scope.poll.id);
                    });
                }
                $('#pollEditOptionModal').modal('hide');
            };

            $scope.changeDemandPicture = function () {
                filepicker.pick(function (Blob) {
                    $scope.poll.default_image_url = Blob.url;
                });
            };

            $scope.voteDemand = function (id, e) {
                var type = (e.currentTarget.text == 'VOTE');
                e.currentTarget.text = type ? "VOTED" : "VOTE";
                $http.get(BASE_URL + 'demand/vote/' + id + '/' + (type ? 1 : 0)).success(function (response) {
                });
            };

            $scope.votePoll = function (poll_id, id, e) {
                var text = $('#voting_radio_' + id).find('span').text();
                var type = (text == 'VOTE');
                $('.voting_radio').find('span').text('VOTE');
                $('#voting_radio_' + id).find('span').text(type ? 'VOTED' : 'VOTE');
                $http.get(BASE_URL + 'poll/vote/' + poll_id + '/' + id + '/' + (type ? 1 : 0)).success(function (response) {
                });
            };

            $scope.removePollOption = function (pollOption) {
                var index = $scope.poll.pollOptions.indexOf(pollOption);
                $scope.poll.pollOptions.splice(index, 1);
            };

            $rootScope.savePollOptions = function ($type) {
                $scope.poll.poll_type = $type;
                var data = $scope.poll;
                $http.post(BASE_URL + 'poll', data).success(function (response) {
                    window.location.href = response.redirect;
                });
            };

            $rootScope.updatePollOptions = function () {
                var data = $scope.pollOptions;
                $http.put(BASE_URL + 'poll', data).success(function (response) {

                });
            };

            $scope.discussion = {};
            $scope.saveDiscussion = function (poll_id) {
                $scope.discussion.poll_id = poll_id;
                $http.post(BASE_URL + 'poll/discussion/save', $scope.discussion).success(function (response) {
                    $scope.loadDiscussions(poll_id);
                });
            };

            $scope.loadDiscussions = function (poll_id) {
                $http.get(BASE_URL + 'poll/discussions/' + poll_id).success(function (response) {
                    $scope.discussions = response.data;
                    $scope.currentPage = response.current_page;
                    $scope.maxSize = 2;
                    $scope.totalItems = response.total;
                });
            };

            $scope.loadPollOptions = function (poll_id) {
                $http.get(BASE_URL + 'poll/options/' + poll_id).success(function (response) {
                    $scope.poll.id = response.data.id;
                    $scope.poll.pollOptions = response.data.details;
                    $scope.poll.votes = response.data.votes;
                });
            };

            $scope.isVoted = function (id) {
                if (filterFilter($scope.poll.votes, {polls_demands_details_id: id}).length > 0) {
                    return true;
                }
            };

//            $scope.isVoted = function (id) {
//                var returnValue = false;
//                angular.forEach($scope.poll.votes, function (vote, key) {
//                    if (vote.polls_demands_details_id == id) {
//                        returnValue = true;
//                        return;
//                    }
//                });
//
//                return returnValue;
//            };
        }).
        controller('PollInfoCtrl', function ($rootScope, $scope, $http) {
            $rootScope.pollOption = [];
            $scope.getProductInfo = function () {
                $rootScope.pollOption = [];
                var data = {'product_url': $scope.product_url};
                $http.post(BASE_URL + 'poll/productinfo', data).success(function (response) {
                    $rootScope.pollOption = response;
                    $rootScope.pollOption['product_url'] = $scope.product_url;
                    $('#pollAddOptionModal').modal('hide');
                    $('#pollEditOptionModal').modal();
                }).error(function () {
                    $rootScope.pollOption['product_url'] = $scope.product_url;
                    $('#pollAddOptionModal').modal('hide');
                    $('#pollEditOptionModal').modal();
                });
            };

            $scope.changePollPicture = function () {
                filepicker.pick(function (Blob) {
                    $rootScope.pollOption['image_url'] = Blob.url;
                });
            };

        });        