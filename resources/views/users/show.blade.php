@extends('layout.main')

@section('title', 'User Details')

@section('content')
<div class="container mt-5">
    <h1>User Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User Information</h5>
            <p class="card-text"><strong>ID:</strong> {{ $user->id }}</p>
            <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Email_verified_at:</strong> {{ $user->email_verified_at }}</p>
        </div>
    </div>

    <div class="mt-5">
        <h2>Posts Owned by {{ $user->name }}</h2>
        @if ($user->posts->count() > 0)
            <ul class="list-group">
                @foreach ($user->posts as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>{{ $user->name }} has no posts.</p>
        @endif
    </div>
</div>
@endsection
