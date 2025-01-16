@extends('layouts.app')
@section('content')
<section class="product-category py-5">
    <div class="container mt-5" style="margin-bottom:100px; margin-top:100px;">
        <div class="section-title text-center mb-4">
            <h4>Our Category</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Card -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- Image -->
                                        <td>
                                            <img 
                                                src="{{ Storage::url($category->image) }}" 
                                                alt="{{ $category->name }}" 
                                                class="img-fluid rounded"
                                                style="height: 80px; width: 100px; object-fit: cover;">
                                        </td>
                                        <!-- Name -->
                                        <td>{{ $category->name }}</td>
                                        <!-- Description -->
                                        <td>{{ $category->description }}</td>
                                        <!-- Created At -->
                                        <td>{{ $category->created_at ? $category->created_at->format('d-m-Y') : 'N/A' }}</td>
                                        <!-- Action -->
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm">Add to listing</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center">
                            {{ $categories->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
