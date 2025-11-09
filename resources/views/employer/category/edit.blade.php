@extends('layouts.adminmain')

@section('title', 'Admin - Dashboiard')  <!-- Set your page title here -->

@section('content')

<div class="main-content">
 <div>
    <div class="mb-4 text-left">
      <h3 class="fw-bold">Update Category</h3>
    </div>

    <div class="card p-4 bg-white">
      <form method="POST" action="{{ route('category.update', $category->id) }}">
        @csrf
        @method('PUT') <!-- Important: for update request -->
        <div class="mb-3">
          <label for="name" class="form-label fw-semibold">Category Name</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ old('category', $category->name) }}" placeholder="Enter category name">
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label fw-semibold">Slug</label>
          <input type="text" class="form-control" id="slug" value="{{ old('slug', $category->slug) }}" placeholder="Enter slug (optional)">
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
      </form>
    </div>
  </div>
</div>


@endsection