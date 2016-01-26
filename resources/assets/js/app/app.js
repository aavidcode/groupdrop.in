'use strict';

var app = angular.module('gd-app', [
    'ngCookies',
    'ui.router',
    'gd.controllers',
    'yaru22.angular-timeago'
], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

