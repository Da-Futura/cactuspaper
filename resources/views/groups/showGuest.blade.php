@extends('layout')

@section('content')
    @include('partials.nav')
    <div class="container">
        <div class="row groupsRow">
            <div class="collection with-header col s12 m6 l7">
                <h3 class="collection-header">{{$group->name}}</h3>
                @foreach($group->articles as $article)
                    <a class="collection-item truncate" href="{{url('article',[$article->id])}}">{{$article->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
@stop
