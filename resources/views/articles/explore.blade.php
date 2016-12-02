@extends('layout')
@section('content')
    <h1>{{$article->title}}</h1>

    <!-- @foreach($conceptRelationshipArray as $x)
         @foreach($x as $y)
         {{$x[0]->concept->name}}
         {{$y->article->group->name}}
         @endforeach
         @endforeach -->

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
                    @if($b->article->id != $article->id)
                    <tr>
                        <td>{{$a[0]->concept->name}}</td>
                        <td>{{$b->article->title}}</td>
                        <td>{{$b->article->group->name}}</td>
                    </tr>
                    @endif
                @endforeach

            @endforeach


        </tbody>


    </table>


@stop
