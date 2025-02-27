@extends('layouts.index')



@section('header')
<header class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold">Welcome to Uamob Library</h1>
                <p class="lead">Discover thousands of books across various genres and topics</p>
                <div class="mt-4">
                    <a href="#featured-books" class="btn btn-light btn-lg me-2">
                        <i class="fas fa-book me-1"></i> Explore Books
                    </a>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-tags me-1"></i> Browse Categories
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="/api/placeholder/600/400" alt="Library" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
    <div class="col-12 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0" id="featured-books">
                <i class="fas fa-star text-warning me-2"></i>Featured Books
            </h2>
            <a href="#" class="btn btn-outline-primary">
                View All <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
        <hr>
    </div>

    @forelse ($books as $book)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 book-card shadow-sm">
                @if($book->cover_image)
                    <img src="{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->book_name }}" style="height: 200px; object-fit: cover;">
                @else
                    <img src="/api/placeholder/400/200" class="card-img-top" alt="{{ $book->book_name }}">
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="badge bg-primary">{{ $book->category->name ?? 'General' }}</span>
                        <small class="text-muted"><i class="fas fa-user me-1"></i>{{ $book->author ?? 'Unknown' }}</small>
                    </div>
                    <h5 class="card-title">{{ $book->book_name }}</h5>
                    <p class="card-text">
                        {{ Str::limit($book->description, 100) }}
                    </p>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star-half-alt text-warning"></i>
                                <span class="ms-1">4.5</span>
                            </small>
                        </div>
                        <a href="" class="btn btn-sm btn-primary">
                            <i class="fas fa-info-circle me-1"></i> View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> No books found. Please check back later.
            </div>
        </div>
    @endforelse

    <!-- Categories Section -->
    <div class="col-12 mt-5">
        <h2 class="mb-4"><i class="fas fa-tags text-primary me-2"></i>Popular Categories</h2>
        <div class="row g-3">
            @php
                $categories = ['Fiction', 'Science', 'History', 'Biography', 'Self-Help', 'Business'];
                $icons = ['book', 'flask', 'landmark', 'user', 'heart', 'briefcase'];
                $colors = ['primary', 'success', 'danger', 'warning', 'info', 'secondary'];
            @endphp
            
            @for($i = 0; $i < count($categories); $i++)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center h-100 border-{{ $colors[$i] }}">
                            <div class="card-body">
                                <div class="rounded-circle bg-light d-inline-flex p-3 mb-3">
                                    <i class="fas fa-{{ $icons[$i] }} text-{{ $colors[$i] }} fa-2x"></i>
                                </div>
                                <h5 class="card-title">{{ $categories[$i] }}</h5>
                                <p class="card-text small text-muted">Explore books</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </div>
    
    <!-- Recent Additions -->
    <div class="col-12 mt-5">
        <h2 class="mb-4"><i class="fas fa-calendar-alt text-primary me-2"></i>Recent Additions</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Added On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(array_slice($books->toArray(), 0, 5) as $book)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <img src="/api/placeholder/40/40" class="rounded" alt="{{ $book['book_name'] }}">
                                    </div>
                                    <div>{{ $book['book_name'] }}</div>
                                </div>
                            </td>
                            <td>{{ $book['author'] ?? 'Unknown' }}</td>
                            <td>{{ $book['category']['name'] ?? 'General' }}</td>
                            <td>{{ \Carbon\Carbon::parse($book['created_at'] ?? now())->format('M d, Y') }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No recent additions</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection