@extends('layout')

@section('content')
    <h1>All Articles</h1>
    <ul>
        <!-- loops through the array of Articles given to it -->
        @foreach($articles as $article)
            <li>{{$article->title}}</li>
        @endforeach
    </ul>
@stop
