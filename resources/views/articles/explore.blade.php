@extends('layout')

@section('content')

    <h1><a href="{{$article->url}}">{{$article->title}}</a></h1>

    <ul>
        @foreach($article->conceptRelationships as $conceptRelationship)
            <li>{{$conceptRelationship->concept->name}} = {{$conceptRelationship->relevance}}</li>
        @endforeach
    </ul>

@stop
