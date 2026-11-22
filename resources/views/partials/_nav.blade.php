
<nav class="navbar navbar-expand-lg bg-dark mb-4 rounded" data-bs-theme="dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('home') }}">
            📚 Shelves
        </a>

        <div class="navbar-nav ms-auto">

            <a class="nav-link" href="{{ route('home') }}">
                Home
            </a>

            <a class="nav-link" href="{{ route('books.catalog') }}">
                All Books
            </a>

            @guest
                <a class="nav-link" href="{{ route('login') }}">
                    Log in
                </a>

                <a class="nav-link" href="{{ route('register') }}">
                    Register
                </a>
            @endguest

            @auth
                <span class="nav-link text-white">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm mt-1">
                        Log out
                    </button>
                </form>
            @endauth

        </div>
    </div>
</nav>
