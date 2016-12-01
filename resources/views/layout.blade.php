<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel</title>
      <link href="{{ elixir('css/app.css') }}" rel="stylesheet"/>
      @yield('head')
  </head>
  <body>
      <div class="container">
          <div class="row">

              <div class="col-md-6 col-md-offset-3">
                  @yield('content')
              </div>

          </div>

      </div>
  </body>
</html>
