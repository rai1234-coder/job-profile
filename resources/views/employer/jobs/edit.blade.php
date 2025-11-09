

@extends('layouts.adminmain')

@section('title', 'Edit Jobs')  <!-- Set your page title here -->

@section('content')

<div class="main-content">

    

<div class="job-form-container">
    <h2>Create Job</h2>
    <form method="POST" action="{{ route('jobs.update', $job->id) }}">
        @csrf
        @method('PUT') <!-- Important: for update request -->

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Job Title</label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $job->title) }}" placeholder="Enter job title">
        </div>

        <div class="col-md-6">
          <label class="form-label">Location</label>
          <input type="text" name="location" class="form-control" value="{{ old('location', $job->location) }}" placeholder="Enter job location">
        </div>

        <div class="col-md-6">
            <label class="form-label">Job Type</label>
   <select name="type" class="form-select" required>
    <option value="">Select type</option>
    <option value="remote" {{ old('type', $job->type) == 'remote' ? 'selected' : '' }}>Remote</option>
    <option value="office" {{ old('type', $job->type) == 'office' ? 'selected' : '' }}>Office</option>
    <option value="hybrid" {{ old('type', $job->type) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
</select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Salary (₹)</label>
          <input type="number" name="salary" value="{{ old('salary', $job->salary) }}" class="form-control" placeholder="Enter salary range">
        </div>

        <div class="col-md-6">
          <label class="form-label">Category</label>
        <select name="category_id" class="form-select">
                <option value="">Select Category</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
            </select>
        </div>

                <div class="col-md-6">
          <label class="form-label">Company Name</label>
          <input type="text" name="company_name" value="{{ old('company_name', $job->company_name) }}" class="form-control" placeholder="Enter company name">
        </div>

                       <div class="col-md-6">
          <label class="form-label">Responsibilities</label>
          <textarea id="responsibilitiesCode" name="responsibilities">{{old('responsibilities', $job->responsibilities)}}</textarea>
        </div>

                <div class="col-md-6">
          <label class="form-label">Requirements</label>
          <textarea id="requirementsCode" name="requirements">{{old('requirements', $job->requirements)}}</textarea>
        </div>

        <div class="col-12">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" placeholder="Enter job description...">{{old('description', $job->description)}}</textarea>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-submit px-5">Save Job</button>
      </div>
    </form>
  </div>
</div>

@endsection