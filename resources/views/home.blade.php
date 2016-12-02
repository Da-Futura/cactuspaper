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

            <div class="col s12 m6 l5">
                <form class="card" role="form" method="POST" action="{{ url('/login') }}" >

                    {{ csrf_field() }}

                    <div class="card-content">
                        <h3>Add New</h3>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="group" type="text" name="group" class="validate" required>
                                <label for="group">Secret Key</label>
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>

                    </div>

                </form>

            </div>



        </div>

    </div>



@endsection
