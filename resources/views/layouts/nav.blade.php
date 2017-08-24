<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            @if(Sentinel::check())
                <li class="nav-item">
                    <form action="/logout" method="post">
                        {{ csrf_field() }}

                        <button class="btn btn-outline-light text-uppercase" type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="btn btn-outline-light text-uppercase" href="/login">Login</a>
                </li>
                <li>&nbsp;&nbsp;</li>
                <li class="nav-item">
                    <a class="btn btn-primary text-uppercase" href="/register">Register</a>
                </li>
            @endif
        </ul>
        {{--<form class="form-inline mt-2 mt-md-0">--}}
            {{--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
            {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
        {{--</form>--}}
    </div>
</nav>