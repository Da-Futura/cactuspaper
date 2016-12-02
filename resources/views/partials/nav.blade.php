<nav>
    <div class="nav-wrapper">
        <a href="{{url('dashboard')}}" class="cactusLogo">Cactuspaper</a>
        <ul class="right hide-on-med-and-down">
            <li>Hello {{$user->name}}</li>
            <li><a href="{{url('dashboard')}}">Dashboard</a></li>
            <li>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a></li>
        </ul>
    </div>
</nav>



<!-- We need to pass the csrfToken in order for it to auth the logout. so we need to do this hidden form stuff here -->
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
