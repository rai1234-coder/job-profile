@extends('layouts.adminmain')

@section('title', 'Admin - Dashboiard')  <!-- Set your page title here -->

@section('content')

<div class="main-content">
    <div class="action-bar">
        <h2 class="page-title">Job Applications</h2>
    </div>
    <table class="table">
    <thead>
        <tr>
            <th>Job</th>
            <th>Name</th>
            <th>Email</th>
            <th>Resume</th>
            <th>Message</th>
            <th>Applied At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $app)
            <tr>
                <td>{{ $app->job->title }}</td>
                <td>{{ $app->name }}</td>
                <td>{{ $app->email }}</td>
                <td>
                    @if($app->resume)
                        <a href="{{ asset('storage/'.$app->resume) }}" target="_blank">View Resume</a>
                    @endif
                </td>
                <td>{{ $app->message }}</td>
                <td>{{ $app->created_at->format('d M, Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $applications->links() }}

</div>


@endsection