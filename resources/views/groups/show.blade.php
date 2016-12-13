@extends('layout')

@section('content')
    @include('partials.nav')
    <div class="container">
        @include('groups.groupsContent');
    </div>
@stop
