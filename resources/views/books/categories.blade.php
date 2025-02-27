@extends('layouts.index')

@section('header')
<header class="bg-primary text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold">Book Categories</h1>
                <p class="lead">Browse our extensive collection by category</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">Categories</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-end">
                <i class="fas fa-tags fa-5x text-white-50"></i>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
    <div class="col-12 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">
                <i class="fas fa-folder-open text-primary me-2"></i>All Categories
            </h2>
            <div class="input-group" style="max-width: 300px;">
                <input type="text" class="form-control" placeholder="Search categories..." id="categorySearch">
                <button class="btn btn-outline-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <hr>
    </div>

    @forelse ($categories as $category)
        <div class="col-md-6 col-lg-4 mb-4 category-card">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        @php
                            $colors = ['primary', 'success', 'danger', 'warning', 'info', 'secondary'];
                            $icons = ['book', 'flask', 'landmark', 'user', 'heart', 'briefcase', 'music', 'globe', 'palette', 'utensils', 'car', 'gamepad'];
                            $colorIndex = $loop->index % count($colors);
                            $iconIndex = $loop->index % count($icons);
                        @endphp
                        <div class="rounded-circle bg-{{ $colors[$colorIndex] }} p-3 me-3">
                            <i class="fas fa-{{ $icons[$iconIndex] }} text-white fa-2x"></i>
                        </div>
                        <h5 class="card-title mb-0">{{ $category->category_name }}</h5>
                    </div>
                    
                    @if(isset($category->description) && !empty($category->description))
                        <p class="card-text">{{ Str::limit($category->description, 100) }}</p>
                    @else
                        <p class="card-text text-muted">Explore our collection of {{ $category->category_name }} books.</p>
                    @endif
                    
                    @if(isset($category->books_count))
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-light text-dark">
                                <i class="fas fa-book me-1"></i> {{ $category->books_count }} Books
                            </span>
                        </div>
                    @endif
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye me-1"></i> Browse Books
                        </a>
                        @if(auth()->check() && auth()->user()->isAdmin ?? false)
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $category->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $category->id }}">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-trash-alt me-1"></i> Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> No categories found. Please check back later.
            </div>
        </div>
    @endforelse
    
    <div class="col-12 mt-4">
        @if(isset($categories) && method_exists($categories, 'links'))
            {{ $categories->links() }}
        @endif
    </div>
    
    <!-- Add Category Modal Button (for admin users) -->
    @if(auth()->check() && auth()->user()->isAdmin ?? false)
        <div class="col-12 text-end mt-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="fas fa-plus me-1"></i> Add New Category
            </button>
        </div>
        
        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
<script>
    // Simple category search functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('categorySearch');
        const categoryCards = document.querySelectorAll('.category-card');
        
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            
            categoryCards.forEach(card => {
                const categoryName = card.querySelector('.card-title').textContent.toLowerCase();
                const description = card.querySelector('.card-text').textContent.toLowerCase();
                
                if (categoryName.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection