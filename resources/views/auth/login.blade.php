@extends('layout')

@section('content')

    @include('partials.authNav')
    <div class="container">
        <div class="row registerRow valign-wrapper">
            <div class="col s12 m5 regCarlaCol valign">
                <img  alt="Carla The Cactus" src="{{asset('img/cutiecactus.png')}}" width="400px"/>
            </div>

            <div class="col s12 m6 offset-m1">
                <form class="card" role="form" method="POST" action="{{ url('/login') }}" >

                    {{ csrf_field() }}

                    <div class="card-content">
                        <h3>Login</h3>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" class="validate" required>
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Login
                                <i class="material-icons right">send</i>
                            </button>
                            <span class="registerSpan">
                                <a href="{{url('/register')}}">or register</a>
                            </span>
                        </div>

                    </div>

                </form>

            </div>

        </div> <!-- End of registerRow -->
    </div>

@endsection
