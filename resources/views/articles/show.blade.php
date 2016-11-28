@extends('layout')

@section('content')
    <h1><a href="{{$article->url}}">{{$article->title}}</a></h1>
{{$article->user->name}}
    <ul>
        <!-- loops through the array of Articles given to it -->
        @foreach($article->comments as $comment)
            <li>{{$comment->body}}  {{$comment->user->name}}</li>
        @endforeach
    </ul>

@stop
