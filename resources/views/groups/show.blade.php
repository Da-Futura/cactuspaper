@extends('layout')

@section('content')
    <h1>{{$group->name}}</h1>

    <h2>Articles are</h2>
    <ul>
    @foreach($group->articles as $article)
        <li>{{$article->title}}</li>
    @endforeach
    </ul>
@stop
