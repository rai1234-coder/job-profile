@extends('layouts.adminmain')

@section('title', 'Admin - Dashboiard')  <!-- Set your page title here -->

@section('content')

<div class="main-content">
 <div>
    <div class="mb-4 text-left">
      <h3 class="fw-bold">Add New Category</h3>
    </div>

    <div class="card p-4 bg-white">
      <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label fw-semibold">Category Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter category name">
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label fw-semibold">Slug</label>
          <input type="text" class="form-control" id="slug" placeholder="Enter slug (optional)">
        </div>

        <button type="submit" class="btn btn-primary">Save Category</button>
      </form>
    </div>
  </div>
</div>


@endsection