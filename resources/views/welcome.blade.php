@extends('layouts.index')
@section('nav-item')
            @if (Route::has('login'))
               
                    @auth

                            
                            <li class="{{ url('/dashboard') }}">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    @else
 
                    <li class="{{ url('/dashboard') }}">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                        @if (Route::has('register'))
                        <li>   
                        <a
                                href="{{ route('register') }}"
                                class="nav-link">
                                Register
                            </a>
                            </li>
                        @endif
                    @endauth
                
            @endif
@endsection
@section('content')
    @foreach ($books as $book)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="" class="card-img-top" alt="{{ $book->book_name }}">
                <div class="card-body">
                    <h5 class="card-title
                    ">{{ $book['book_name'] }}</h5>
                    <p class="card-text">{{ $book->description }}</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection