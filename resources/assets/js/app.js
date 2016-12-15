/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// AJAX for the dashboard page to load groups.
$(document).ready(function(e){
    // This handles loading the group view via AJAX into the dashboard.
    var mainContainer = $('#homeContent');
    ajaxLink('.group-link', mainContainer);

});


// This loads the content of an article page into the #homeContent
$(document).ajaxComplete(function(e){
    var mainContainer = $('#homeContent');
    ajaxLink('.article-link', mainContainer);
    ajaxLink('.group-link', mainContainer);
    ajaxLink('.dashboard-link', mainContainer);
});


// Given a string '.foo-link' and a dom object, like $('#main')
// ajax all .foo-links into the mainContainer.

function ajaxLink(linkClass, mainContainer){
    $(linkClass).on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        url += "/ajax";
        mainContainer.load(url);
    });
};

// Intercepts the form submission
// Submits to watson over ajax
// Reconstructs the url to get the groupsContent

// $(document).ajaxComplete(function(e){

//     var groupsRow = $('.groupsRow');
//     $('#article-submit-form').submit(function(e){
//         e.preventDefault();


//         // Get some values from elements on the page:
//         var aUrl = $( "#url-input" ).val(),
//             aSum = $( "#summary-input" ).val(),
//             group = $( "#group-input" ).val(),
//             user_id = $( "#user-input" ).val();
//         url = $("#article-submit-form").attr( "action" );
//         url += "/ajax";
//         console.log(url);

//         console.log(aSum + aUrl + group);
//         // Send the data using post
//         var posting = $.post( url, { 'url' : aUrl, 'summary' : aSum, 'group_id' : group, 'user_id' : user_id  } );
//         console.log(posting);


//         // groupID = $('#group-input').val();
//         // groupUrl = window.location.href;
//         // pathname = window.location.pathname;
//         // groupUrl = groupUrl.replace(pathname,'');
//         // groupUrl += "/group/" + groupID + "/ajax";

//         // groupsRow.load(groupUrl);

//     });
// });

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
