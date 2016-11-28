@extends('layout');

@section('content')
    <h1>{{$group->name}}</h1>

    <h2>Articles are</h2>
    <ul>
    @foreach($group->articles as $article)
        <li>{{$article->title}}</li>
    @endforeach
    </ul>

    <h2>Group Members are</h2>
    <ul>
        @foreach($group->memberships as $membership)
            <li>{{$membership->user->name}}  {{$membership->user_role}}</li>
        @endforeach
    </ul>

@stop
