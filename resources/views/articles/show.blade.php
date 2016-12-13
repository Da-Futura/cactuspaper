@extends('layout')

@section('content')


    @include('partials.nav')

    <div class="container">
    @include('articles.articleContent')
    </div>
@stop
