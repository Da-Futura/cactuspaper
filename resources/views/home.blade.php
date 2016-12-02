@extends('layout')

@section('content')
@include('partials.nav')

    <div class="container">

        <div class="row homeRow">

            <div class="collection with-header col s12 m6 l7">
                <h3 class="collection-header">My Groups</h3>
                @foreach($userGroups as $group)
                    <a class="collection-item" href="{{url('group',[$group->id])}}">{{$group->name}}</a>
                @endforeach
            </div>



        </div>

    </div>



@endsection
