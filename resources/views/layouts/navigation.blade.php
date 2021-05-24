<nav class="nav">
    <ul>
        <li class="nav_link"><a href="{{route('home')}}">Home</a></li>
        @guest
        <li class="nav_link"><a href="{{route('register')}}">Create Account</a></li>
        <li class="nav_link"><a href="{{route('login')}}">Login</a></li>
        @endguest
        @auth
        @if(Auth::user()->user_type==0)
        <li class="nav_link"><a href="{{route('dashboard')}}">Dashboard</a></li>
        @else
        <li class="nav_link"><a href="{{route('adminiy.panel')}}">Dashboard</a></li>
        @endif
        <li class="nav_link"><a href="{{route('logout')}}">Logout</a></li>
        @endauth
        <li class="nav_link"><a href="#">Price List</a></li>
        <li class="nav_link"><a href="{{route('feedback')}}">Feedback</a></li>
    </ul>
</nav>