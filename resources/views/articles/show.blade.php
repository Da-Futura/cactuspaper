@extends('layout')

@section('content')
    <h1><a href="http://{{$article->url}}">{{$article->title}}</a></h1>

    <ul>
        <!-- loops through the array of Articles given to it -->
        @foreach($article->comments as $comment)
            <li>{{$comment->body}}</li>
        @endforeach
    </ul>
@stop
