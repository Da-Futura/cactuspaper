@extends('layout')

@section('content')
    <h1>All Articles</h1>
    <ul>
        <!-- loops through the array of Articles given to it -->
        @foreach($articles as $article)
            <li>{{$article->title}}</li>
        @endforeach
    </ul>


    <!-- Form which adds a new article given contents and the current user
         It calls the route /articles/create -->
    <form method="POST" action="/articles/create">

        {{csrf_field()}}

        <div class="form-group">
            <label for="title" class="col-md-4 control-label">Title</label>
            <textarea class="form-control" cols="10" id="" name="title" rows="1">{{old('title')}}</textarea>
        </div>

        <div class="form-group">
            <label for="url" class="col-md-4 control-label">URL</label>
            <textarea class="form-control" cols="10" id="" name="url" rows="1">{{old('url')}}</textarea>
        </div>

        <div class="form-group">
            <label for="summary" class="col-md-4 control-label">Summary</label>
            <textarea class="form-control" cols="10" id="" name="summary" rows="1">{{old('summary')}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Article</button>
        </div>
    </form>

@stop
