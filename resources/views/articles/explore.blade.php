@extends('layout')

@section('head')
    {{ elixir('css/app.css') }}
    <script src="{{elixir('js/d3.min.js')}}"></script>
    <script src="{{elixir('js/script.js')}}"></script>
@stop

@section('content')
    <h1>{{$article->title}}</h1>
{{$json}}

@stop
