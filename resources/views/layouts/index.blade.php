<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{request()->route()->getName();}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3a506b;
            --secondary-color: #5bc0be;
            --light-color: #f8f9fa;
            --dark-color: #1c2541;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--secondary-color) !important;
        }
        
        .nav-link {
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--secondary-color) !important;
        }
        
        .active {
            border-bottom: 2px solid var(--secondary-color);
        }
        
        main {
            flex: 1;
        }
        
        footer {
            background-color: var(--dark-color) !important;
            margin-top: auto;
        }
        
        .book-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('Uamob Library')}}">
                <i class="fas fa-book-reader me-2"></i>Uamob Library
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    @if (Route::has('login'))
        @auth
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                </a>
            </li>
        @else
            <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt me-1"></i> Login
                </a>
            </li>

            @if (Route::has('register'))
                <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">   
                    <a href="{{ route('register') }}" class="nav-link">
                        <i class="fas fa-user-plus me-1"></i> Register
                    </a>
                </li>
            @endif
        @endauth
    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-book me-1"></i> Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}">
                            <i class="fas fa-tags me-1"></i> Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-envelope me-1"></i> Contact
                        </a>
                    </li>
                </ul>
                <form class="d-flex ms-3">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search books..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <!-- Header -->
    @yield('header')

    <!-- Main Content -->
    <main class="container my-5">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <!-- Sidebar -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-list me-2"></i> Quick Links
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-star me-2"></i> Popular Books
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-calendar-alt me-2"></i> New Arrivals
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-users me-2"></i> Authors
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-bookmark me-2"></i> My Bookmarks
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Books Section -->
                <section>
                    <div class="row">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    </main>

    <!-- Newsletter -->
    <section class="bg-primary text-white py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3>Subscribe to Our Newsletter</h3>
                    <p>Get the latest updates on new books and library events.</p>
                </div>
                <div class="col-md-6">
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Your email address">
                        <button type="submit" class="btn btn-light">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <h5><i class="fas fa-book-reader me-2"></i> Uamob Library</h5>
                    <p>Your gateway to knowledge and imagination. Discover, learn, and grow with our extensive collection.</p>
                    <div class="social-icons">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/')}}" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Books</a></li>
                        <li><a href="{{route('categories.index')}}" class="text-white">Categories</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-3">
                    <h5>Library Hours</h5>
                    <ul class="list-unstyled">
                        <li>Monday - Friday: 9am - 8pm</li>
                        <li>Saturday: 10am - 6pm</li>
                        <li>Sunday: 12pm - 5pm</li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-3">
                    <h5>Contact Us</h5>
                    <address>
                        <i class="fas fa-map-marker-alt me-2"></i> 123 Library Street<br>
                        <i class="fas fa-phone me-2"></i> (123) 456-7890<br>
                        <i class="fas fa-envelope me-2"></i> info@uamoblibrary.com
                    </address>
                </div>
            </div>
            <hr class="my-3 bg-light">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 Uamob Library Management System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add active class to current nav item
        document.addEventListener('DOMContentLoaded', function() {
            const currentLocation = location.href;
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            navLinks.forEach(link => {
                if(link.href === currentLocation) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>