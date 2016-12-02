@extends('layout')
@section('content')
    @include('partials.nav')
    <h1>{{$article->title}}</h1>


    <table>
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
                        <td>{{$b->article->title}}</td>
                        <td>{{$b->article->group->name}}</td>
                    </tr>
                    @php
                    array_push($duplicateArray,$b->article->id);
                    @endphp
                    @endif
                @endforeach

            @endforeach


        </tbody>


    </table>


@stop
