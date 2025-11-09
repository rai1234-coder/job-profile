@extends('layouts.mainlayout')

@section('title', 'All Jobs')  <!-- Set your page title here -->

@section('content')

<section>
      <div class="container py-5">
    <div class="row g-4">

      <!-- LEFT SIDE — Job Details -->
      <div class="col-lg-8">
        <div class="job-details">
          <h2 class="job-title">{{$job->title}}</h2>
          <p class="company-name">{{$job->company_name}}</p>

          <div class="job-meta">
            <p><i class="bi bi-geo-alt"></i> {{$job->location}}</p>
            <p><i class="bi bi-cash-coin"></i> ₹{{$job->salary}} / month</p>
            <p><i class="bi bi-briefcase"></i> <span class="job-type remote">{{$job->type}}</span></p>
            <p><i class="bi bi-tags"></i> Category: {{$job->category}}</p>
          </div>

          <hr>

          <h5 class="section-title mt-4">Job Description</h5>
          <p class="text-muted">
{{$job->description}}
          </p>

          <h5 class="section-title mt-4">Responsibilities</h5>
          {!! $job->responsibilities !!}

          <h5 class="section-title mt-4">Requirements</h5>
          {!! $job->requirements !!}
        </div>
      </div>

      <!-- RIGHT SIDE — Apply Job Form -->
      <div class="col-lg-4">
        <div class="apply-form">
          <h5 class="section-title">Apply for this Job</h5>
          <form method="POST" action="{{ route('job.apply', $job->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter your name">
            </div>

            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your email">
            </div>

            <div class="mb-3">
              <label class="form-label">Upload Resume</label>
              <input type="file" name="resume" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" rows="4" name="message" placeholder="Why are you suitable for this job?"></textarea>
            </div>

            <button type="submit" class="btn apply-btn w-100 py-2">Submit Application</button>
          </form>
        </div>
      </div>

    </div>
  </div>

</section>

@endsection