@extends('layouts.adminmain')

@section('title', 'Jobs')  <!-- Set your page title here -->

@section('content')


<div class="main-content">
      <div>
    <div class="action-bar">
      <h2 class="page-title">Job Listings</h2>
      <div class="d-flex align-items-center gap-3">
        <input type="text" class="form-control search-input" placeholder="Search jobs...">
        <a href="{{ route('jobs.create') }}" class="btn btn-create">+ Create Job</a>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Job Title</th>
            <th>Category</th>
            <th>Location</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
          <tr>
            <td>{{ $loop->iteration  }}</td>
            <td>{{ $job->title }}</td>
            <td>{{ $job->category->name }}</td>
            <td>{{ $job->location }}</td>
            <td>{{ $job->type }}</td>
            <td><button class="btn btn-sm btn-status">Active</button></td>
          <td>
            <!-- Edit Button (no change needed) -->
            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-edit">Edit</a>

            <!-- Delete Button (requires form with DELETE method) -->
            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-delete">Delete</button>
            </form>
          </td>
          </tr>
           @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection