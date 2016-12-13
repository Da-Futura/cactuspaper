/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


// This handles loading the group view via AJAX into the dashboard.

$(document).ready(function(e){

    var mainRow = $('.homeRow');
    $('.group-link').on('click', function(e){
        e.preventDefault();
        groupUrl = $(this).attr('href');
        groupUrl += "/ajax";

        mainRow.load(groupUrl);

    });

});
