<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ url('/') }}" class="nav-link px-2 text-white">Home</a></li>
                @isadmin
                <li><a href="{{ url('/tasks') }}" class="nav-link px-2 text-white">Tasks</a></li>
                @endisadmin
            </ul>
            <div class="text-end">
                @guest
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn  btn-warning me-2">
                    Signup
                </a>
                @else
                <a
                href="{{ route('logout') }}"
                class="btn btn-danger me-2"
                onclick="
                event.preventDefault();
                document.getElementById('form-logout').submit();
                "
                >
                    {{ Auth::user()->name }}
                </a>
                <form action="{{ route('logout') }}" method="post" id="form-logout">
                    @csrf
                </form>
                @endguest
            </div>
        </div>
    </div>
</header>
