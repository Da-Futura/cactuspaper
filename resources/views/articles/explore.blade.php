@extends('layout')

@section('head')
    <script src="https://d3js.org/d3.v4.min.js"></script>
@stop

@section('content')
    <h1>{{$article->title}}</h1>
    {{$json}}

    <script>
     d3.select("body").style("background-color", "tomato");

    </script>


@stop
