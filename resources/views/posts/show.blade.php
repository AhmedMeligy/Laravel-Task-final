@extends('layout.main')

@section('title', 'Post Details')

@section('content')
<div class="container mt-5">
    <h1>Post Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Post Information</h5>
            <p class="card-text"><strong>ID:</strong> {{ $post->id }}</p>
            <p class="card-text"><strong>Title:</strong> {{ $post->title }}</p>
            <p class="card-text"><strong>Content:</strong> {{ $post->body }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $post->created_at }}</p>
        </div>
    </div>
</div>
@endsection