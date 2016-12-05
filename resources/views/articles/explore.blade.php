@extends('layout')
@section('content')
    @include('partials.nav')
    <div class="container">

        <h1 class="exploreHead">{{$article->title}}</h1>


        <table class="striped">
            <thead>
                <tr>
                    <th>Concept</th>
                    <th>Article</th>
                    <th>Group</th>
                </tr>
            </thead>

            <tbody>
                @foreach($conceptRelationshipArray as $a)


                    @foreach($a as $b)
                        @if(!(in_array($b->article->id, $duplicateArray)))
                            <tr>
                                <td>{{$a[0]->concept->name}}</td>
                                <td><a href="{{url('article',[$b->article->id])}}">{{$b->article->title}}</a></td>
                                <td><a href="{{url('group', [$b->article->group->id])}}">{{$b->article->group->name}}</a></td>
                            </tr>
                            @php
                            array_push($duplicateArray,$b->article->id);
                            @endphp
                        @endif
                    @endforeach

                @endforeach


            </tbody>


        </table>
    </div>

@stop
