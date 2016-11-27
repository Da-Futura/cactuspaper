@extends('layout')

@section('content')
    <h1>All Articles</h1>
    <ul>
        @foreach($articles as $article)
            <li>{{$article->title}}</li>
        @endforeach
    </ul>
@stop
