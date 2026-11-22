@extends('layouts.app')

@section('title', 'Book Catalog')

@section('content')

    @if(isset($currentCategory) && $currentCategory)
        <div class="alert alert-info">
            Currently viewing genre:
            <strong>{{ $currentCategory }}</strong>
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="mb-3">📚 Digital Bookstore Directory</h2>

            <p class="text-muted">
                Browse our available books below.
            </p>

            <form action="{{ route('books.catalog') }}" method="GET" class="row g-2 mb-4">

    <div class="col-md-4">
        <input type="text"
               name="search"
               class="form-control"
               placeholder="Search title or author..."
               value="{{ request('search') }}">
    </div>

    <div class="col-md-3">
        <select name="genre" class="form-select">
            <option value="">All Genres</option>
            <option value="Fiction" {{ request('genre') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
            <option value="Dystopian" {{ request('genre') == 'Dystopian' ? 'selected' : '' }}>Dystopian</option>
            <option value="Sci-Fi" {{ request('genre') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
            <option value="Fantasy" {{ request('genre') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
        </select>
    </div>

    <div class="col-md-3">
        <div class="form-check mt-2">
            <input type="checkbox"
                   name="premium"
                   value="1"
                   class="form-check-input"
                   id="premium"
                   {{ request()->has('premium') ? 'checked' : '' }}>
            <label class="form-check-label" for="premium">
                Premium books only
            </label>
        </div>
    </div>

   <div class="col-md-2">
    <select name="sort" class="form-select">
        <option value="title" {{ request('sort', 'title') == 'title' ? 'selected' : '' }}>
            Sort by Title
        </option>
        <option value="author" {{ request('sort') == 'author' ? 'selected' : '' }}>
            Sort by Author
        </option>
    </select>
</div>

<div class="col-md-2">
    <button type="submit" class="btn btn-primary w-100">
        Search
    </button>
</div>

</form>

<a href="{{ route('books.catalog') }}" class="btn btn-secondary">
    Clear
</a>



            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="mb-4">

                <strong>Browse Genres:</strong>

@auth
    <a href="{{ route('books.create') }}" class="btn btn-sm btn-success">
        Add a Book
    </a>
@endauth

                <a href="{{ route('books.genre') }}"
                   class="btn btn-sm btn-outline-primary">
                    All Titles
                </a>

                <a href="{{ route('books.genre', 'Fiction') }}"
                   class="btn btn-sm btn-outline-primary">
                    Fiction
                </a>

                <a href="{{ route('books.genre', 'Dystopian') }}"
                   class="btn btn-sm btn-outline-primary">
                    Dystopian
                </a>

                <a href="{{ route('books.genre', 'Sci-Fi') }}"
                   class="btn btn-sm btn-outline-primary">
                    Sci-Fi
                </a>

                <a href="{{ route('books.spotlight') }}"
                   class="btn btn-sm btn-warning">
                    ⭐ Book of the Month
                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-striped table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Price ($)</th>
                            <th>Category</th>
                            <th>Details / Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($books as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item['code'] }}
                                </td>

                                <td>
                                    <strong>{{ $item['title'] }}</strong>
                                </td>

                                <td>
                                    {{ $item['author'] }}
                                </td>

                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $item['genre'] }}
                                    </span>
                                </td>

                                <td>
                                    ${{ number_format($item['price'], 2) }}
                                </td>

                                <td>

                                    @if($item['price'] >= 15)
                                        <span class="badge bg-success">
                                            Premium
                                        </span>
                                    @else
                                        <span class="badge bg-warning text-dark">
                                            Affordable
                                        </span>
                                    @endif

                                </td>

                                <td>
    <a href="{{ route('books.details', $item['id']) }}"
   class="btn btn-primary btn-sm">
    Read Info
</a>

@auth
    <a href="{{ route('books.edit', $item['id']) }}"
       class="btn btn-warning btn-sm">
        Edit
    </a>

    <form action="{{ route('books.destroy', $item['id']) }}"
          method="POST"
          class="d-inline"
          onsubmit="return confirm('Are you sure you want to delete this book?');">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger btn-sm">
            Delete
        </button>
    </form>
@endauth
</td>
                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center py-4">

                                    <strong>
                                        No books are currently available in our bookstore.
                                    </strong>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

                        <div class="mt-3">
                {{ $books->links() }}
            </div>

        </div>

    </div>

@endsection
