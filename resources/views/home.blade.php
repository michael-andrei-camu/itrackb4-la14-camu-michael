
@extends('layouts.app')

@section('title', 'Welcome to Shelves')

@section('content')

<div class="p-5 mb-4 bg-blue rounded-3">
    <div class="container-fluid py-3">
        <h2>Discover and Explore Books</h2>

        <p class="lead">
            Browse our collection of books, explore different genres,
            and find your next favorite read through our digital bookstore directory.
        </p>

        <a href="{{ route('books.catalog') }}" class="btn btn-primary btn-lg">
            Browse Books
        </a>
    </div>
</div>


<div class="row align-items-center mt-4">
    <div class="col-md-3 text-center mb-3">
        <img src="{{ asset('img/michael.jpg') }}"
             width="150"
             height="150"
             class="rounded-circle img-thumbnail"
             alt=" Michael Andrei CamuS">
    </div>

    <div class="col-md-9">
        <h4>Student Information</h4>
        <p class="mb-1"><strong>Name:</strong> Michael Andrei Camu</p>
        <p class="mb-1"><strong>Course:</strong> BS Information Technology</p>
        <p class="mb-1"><strong>Year:</strong> 4th Year</p>
        <p class="mb-1"><strong>Block:</strong> C </p>
    </div>
</div>


<div class="row mt-4">
    <div class="col-md-6 mb-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5>Total Books</h5>
                <h2 class="text-primary">{{ $bookCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5>Total Genres</h5>
                <h2 class="text-success">{{ $genreCount }}</h2>
            </div>
        </div>
    </div>
</div>



@endsection
