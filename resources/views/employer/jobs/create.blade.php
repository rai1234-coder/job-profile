

@extends('layouts.adminmain')

@section('title', 'Create Jobs')  <!-- Set your page title here -->

@section('content')

<div class="main-content">

    

<div class="job-form-container">
    <h2>Create Job</h2>
    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Job Title</label>
          <input type="text" name="title" class="form-control" placeholder="Enter job title">
        </div>

        <div class="col-md-6">
          <label class="form-label">Location</label>
          <input type="text" name="location" class="form-control" placeholder="Enter job location">
        </div>

        <div class="col-md-6">
          <label class="form-label">Job Type</label>
          <select name="type" class="form-select">
            <option value="">Select type</option>
            <option value="remote">Remote</option>
            <option value="office">Office</option>
            <option value="hybrid">Hybrid</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Salary (₹)</label>
          <input type="number" name="salary" class="form-control" placeholder="Enter salary range">
        </div>

        <div class="col-md-6">
          <label class="form-label">Category</label>
          <select name="category_id" class="form-select">
            <option value="">Select Category</option>
@foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
          </select>
        </div>

                <div class="col-md-6">
          <label class="form-label">Company Name</label>
          <input type="text" name="company_name" class="form-control" placeholder="Enter company name">
        </div>

                <div class="col-md-6">
          <label class="form-label">Responsibilities</label>
          <textarea id="responsibilitiesCode" name="responsibilities"></textarea>
        </div>

                <div class="col-md-6">
          <label class="form-label">Requirements</label>
          <textarea id="requirementsCode" name="requirements"></textarea>
        </div>

        <div class="col-12">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" placeholder="Enter job description..."></textarea>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-submit px-5">Save Job</button>
      </div>
    </form>
  </div>
</div>

@endsection