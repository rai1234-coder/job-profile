@extends('layouts.adminmain')

@section('title', 'Admin - Dashboiard')  <!-- Set your page title here -->

@section('content')

<div class="main-content">
    <div>
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="fw-bold">Category List</h3>
      <a href="{{ route('category.create') }}" class="btn btn-primary">+ Add New Category</a>
    </div>
    <div class="card">
      <div>
        <table class="table table-bordered table-hover align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Slug</th>
              <th>Created At</th>
              <th width="150">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $categories as $category )
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$category->name}}</td>
              <td>{{$category->slug}}</td>
              <td>{{$category->created_at}}</td>
<td>
    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-success">Edit</a>
    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
    </form>
  </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection