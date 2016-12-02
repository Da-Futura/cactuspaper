@extends('layout')

@section('content')


    @include('partials.nav')

    <div class="container">
        <div class="titleRow">
            <div class="col s12">
                <h1 class="articleTitle"><a href="{{$article->url}}">{{$article->title}}</a></h1>
            </div>
        </div>

        <div class="row articleRow valign-wrapper">
            <div class="col s12 m8 l8">

                <div class="row summary">
                    <div class="card-panel">
                        <p>{{$article->summary}}</p>
                    </div>
                </div>

                <div class="row">
                    <ul class="collection with-header commentCollection">
                        <li class="collection-header commentCollectionHeader">Comments</li>
                        <!-- loops through the array of Articles given to it -->
                        @foreach($article->comments as $comment)
                            <li class="collection-item avatar">
                                <i class="material-icons circle red">play_arrow</i>
                                <span class="title">{{$comment->user->name}}</span>
                                <p>{{$comment->body}}</p>
                            </li>
                        @endforeach
                    </ul>


                    <!-- Form which adds a new comment given contents and the currnt user
                         It calls the route /articles/{article}/newComment -->
                    <form class="card" method="POST" action="/article/{{$article->id}}/newComment">

                        {{csrf_field()}}
                        <div class="card-content">
                            <div class="form-group">
                                <textarea class="materialize-textarea" id="body" name="body">{{old('body')}}</textarea>
                                <label for="body">New Comment</label>
                            </div>
                        </div>

                        <div class="card-action">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col s12 m4 l4 regCarlaCol valign">
                <img  alt="Carla The Cactus" src="{{asset('img/cutiecactus.png')}}" width="400px"/>
                <a href="{{url('explore',[$article->id])}}">Explore</a>
            </div>

        </div>
    </div>
@stop
