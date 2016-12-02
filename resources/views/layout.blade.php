<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://use.typekit.net/bvp2qbr.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet"/>

    <title>Cactuspaper</title>

  </head>

  <body>

      @yield('content')

      @include('partials.footer')
      <script src="{{ elixir('js/app.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  </body>
</html>
