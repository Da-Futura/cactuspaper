@extends('layout')

@section('head')
    <script src="https://d3js.org/d3.v4.min.js"></script>
@stop

@section('content')
    <h1>{{$article->title}}</h1>
    <p id="jsonP">{{$json}}</p>




@stop

@section('footer')

    <script>
     var fromP = document.getElementById("jsonP").innerHTML;


     d3.select("body").style("background-color", "gray");

     d3.selectAll("p")
       .style("color", "black");

     var theData = [2,5,1,8];

     var p = d3.select("body").selectAll("p")
               .data(theData)
               .enter()
               .append("p")
               .text(function (d,i){
                   return "i = " + i + "d = " +d;
               });

     var spaceCircles = [30,70,110];
     var svgContainer = d3.select("body").append("svg")
                          .attr("width", 200)
                          .attr("height", 200);

     var circles = svgContainer.selectAll("circle")
                               .data(spaceCircles)
                               .enter()
                               .append("circle");

     var circleAttributes = circles
         .attr("cx", function (d) { return d; })
         .attr("cy", function (d) { return d; })
         .attr("r", 20 )
         .style("fill", function(d) {
             var returnColor;
             if (d === 30) { returnColor = "green";
             } else if (d === 70) { returnColor = "purple";
             } else if (d === 110) { returnColor = "red"; }
             return returnColor;
         });

    </script>

@stop
