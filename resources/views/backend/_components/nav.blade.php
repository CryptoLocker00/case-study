<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <div class="container">
            <a class="navbar-brand text-center" href="{{route('backend.index')}}">
                {{config('app.name')}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item @if(isset($active) && $active == 'address') active @endif">
                        <a class="nav-link" href="{{route('backend.address.index')}}">Addresses</a>
                    </li>
                    <li class="nav-item @if(isset($active) && $active == 'user') active @endif">
                        <a class="nav-link" href="{{route('backend.user.index')}}">Users</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-user-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                            <li class="nav-item @if(isset($active) && $active == 'administrator') active @endif">
                                <a class="dropdown-item small" href="{{route('backend.administrator.index')}}">Administrators</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @if(Auth::check())
                                <li class="nav-item @if(isset($active) && $active == 'logout') active @endif">
                                    <a class="dropdown-item small" href="{{route('backend.logout')}}">Logout</a>
                                </li>
                            @else
                                <li class="nav-item @if(isset($active) && $active == 'login') active @endif">
                                    <a class="dropdown-item small" href="{{route('backend.login')}}">Login</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>



@push('script')
    <script>
        function myFunction() {
            var x = document.getElementById("navbarSupportedContent");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endpush

