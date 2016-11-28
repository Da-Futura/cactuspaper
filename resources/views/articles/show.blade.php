@extends('layout')

@section('content')
    <h1><a href="{{$article->url}}">{{$article->title}}</a></h1>
{{$article->user->name}}
    <ul>
        <!-- loops through the array of Articles given to it -->
        @foreach($article->comments as $comment)
            <li>{{$comment->body}}  {{$comment->user->name}}</li>
        @endforeach
    </ul>


    <!-- Form which adds a new comment given contents and the currnt user
       It calls the route /articles/{article}/newComment -->
    <form method="POST" action="/articles/{{$article->id}}/newComment">

        {{csrf_field()}}

        <div class="form-group">
            <textarea class="form-control" cols="30" id="" name="body" rows="3">{{old('body')}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Note</button>
        </div>


    </form>


@stop
