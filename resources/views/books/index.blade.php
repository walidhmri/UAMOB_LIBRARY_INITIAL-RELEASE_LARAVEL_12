@extends('layouts.index')

@section("content")
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                @if($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top img-fluid" alt="{{ $book->book_name }}">
                @endif
                <div class="card-body text-center">
                    <h3 class="card-title font-weight-bold">{{ $book->book_name }}</h3>
                    <p class="card-text text-muted"><strong>المؤلف:</strong> {{ $book->Author }}</p>
                    <p class="card-text"><strong>الوصف:</strong> {{ $book->description }}</p>
                    <p class="card-text"><strong>السنة:</strong> {{ $book->year }}</p>
                    <p class="card-text"><strong>التصنيف:</strong> {{ $book->category }}</p>
                    <p class="card-text"><strong>الحالة:</strong> 
                        <span class="badge {{ $book->status == 'متاح' ? 'bg-success' : 'bg-danger' }}">
                            {{ $book->status }}
                        </span>
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ asset('storage/' . $book->pdf) }}" class="btn btn-primary btn-lg" download>
                            <i class="fas fa-download"></i> تحميل الكتاب
                        </a>
                        <a href="{{ asset('storage/' . $book->pdf) }}" target="_blank" class="btn btn-secondary btn-lg">
                            <i class="fas fa-book-reader"></i> قراءة الآن
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
