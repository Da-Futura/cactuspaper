@extends('layout')
@section('content')
    <h1>{{$article->title}}</h1>

    {{$conceptRelationshipArray[0][0]->article->title}}

    @foreach($conceptRelationshipArray as $x)
        {{$x[0]->concept->name}}
        @foreach($x as $y)
            {{$y->article->title}}
        @endforeach
    @endforeach



@stop
