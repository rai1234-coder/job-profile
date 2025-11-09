@extends('layouts.mainlayout')

@section('title', 'JobPortal - Find Jobs')  <!-- Set your page title here -->

@section('content')

<!-- ===== Hero Section Start ===== -->
<section class="hero">
  <div class="container text-center text-white position-relative z-2">
    <h1 class="fw-bold mb-3">Discover Your Next <span class="text-highlight">Dream Job</span></h1>
    <p class="mb-5 fs-5 text-light">
      Browse thousands of opportunities and take your career to new heights.
    </p>

    <!-- Search Box -->
    <form method="GET" action="{{ route('alljobs.show') }}" class="search-box row gx-2 gy-2 justify-content-center mx-auto">
      <div class="col-md-5 col-sm-12">
        <input type="text" class="form-control" name="title" placeholder="Job title, keywords...">
      </div>
      <div class="col-md-5 col-sm-12">
        <input type="text" class="form-control" name="location" placeholder="Location">
      </div>
      <div class="col-md-2 col-sm-12">
        <button type="submit" class="btn btn-search w-100">Search</button>
      </div>
    </form>
  </div>

  <!-- Decorative Shapes -->
  <div class="circle-shape"></div>
  <div class="triangle-shape"></div>
</section>
<!-- ===== Hero Section End ===== -->

<!-- ===== Popular Job Categories Section ===== -->
<section class="categories py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-2">Explore <span class="text-gradient">Popular Job Categories</span></h2>
    <p class="text-muted mb-5">Choose a category and discover thousands of job opportunities waiting for you.</p>

    <div class="row g-4 justify-content-center">
      <!-- Category Card 1 -->
      @foreach ( $categories as $category )
              <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="category-card">
          <h5 class="mt-3 mb-1">
                        <a href="{{ route('alljobs.show', ['category_id' => $category->id]) }}">
                {{ $category->name }}
            </a>
          </h5>
          <p class="text-muted small mb-0">{{ $category->jobs_count }} Jobs</p>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>


<section class="featured-jobs py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Featured <span class="highlight">Jobs</span></h2>
      <p class="text-muted">Explore the latest and most popular job opportunities</p>
    </div>

    <div class="row g-4">
      <!-- Job Card -->
      @foreach($jobs as $job)
      <div class="col-md-6 col-lg-4">
        <div class="job-card p-4 shadow-sm rounded-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="job-title mb-0">{{$job->title}}</h5>
            <span class="badge remote">{{$job->type}}</span>
          </div>
          <p class="text-muted mb-1"><i class="bi bi-geo-alt"></i> {{$job->location}}</p>
          <p class="text-muted mb-2"><i class="bi bi-cash"></i> ₹{{$job->salary}}/ month</p>
          <p class="job-desc">{{ Str::words($job->description, 10, '...') }}</p>
          <a href="{{ route('job.details',$job->id) }}" class="btn btn-outline-primary w-100 mt-2">View Details</a>
        </div>
      </div>
      @endforeach
      <div class="col-12">
                <!-- View All Jobs Button -->
        <div class="text-center mt-3">
            <a href="{{ route('alljobs.show') }}" class="btn btn-primary">View All Jobs</a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection