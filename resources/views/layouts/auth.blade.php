<nav class="navbar navbar-default navbar-static-top">
    <div class="container head-login">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        </ul>
	</div>
</nav>
<div class="login-window">
@yield('content')
</div>