@extends('layout.main')
@section('title', 'List users')

@section('content')
<div class="container mt-5">
        <h1>Users</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>email_verified_at</th>
                    <th>Posts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at }}</td>
                <td>{{ $user->posts_count }}</td>
                <td>
                <button type="button" class="btn btn-primary">
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" style="color: white; text-decoration: none;">Edit</a>
                </button>
                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
            </tbody>
            
        </table>
        <div class="pagination">
    {{ $users->links() }}
</div>
    </div>
@endsection