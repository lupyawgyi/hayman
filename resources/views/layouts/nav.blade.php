<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <a class="navbar-brand text-danger" href="{{url("/home")}}">Hayman-Control</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="container-fluid mr-3" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                {{--            <li class="nav-item active">--}}
                {{--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
                {{--            </li>--}}
                {{--            href="{{url("/backend/index")}}--}}
                {{--            @if(\Illuminate\Support\Facades\Auth::user()->hasAnyRole(1,2 ))--}}
                @if(\Illuminate\Support\Facades\Auth::user()->hasAnyRole(1 ))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            Only Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url("/backend/users/index")}}">Users</a>
                            <a class="dropdown-item" href="{{url("/backend/branches/index")}}">Logout</a>
                        </div>
                    </li>
                @endif
                <li class="nav-item dropdown mr-5">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('backend/users/password/'.Auth::user()->id.'/change')}}">Change
                            password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url("/logout")}}">Logout</a>
                    </div>
                </li>

            </ul>

        </div>
    @endif
</nav>
