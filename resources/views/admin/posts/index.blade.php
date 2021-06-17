@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{ session('deleted') }}</strong>
                deleted successfully.
            </div>
        @endif

        <h1>POSTS</h1>
        <a class="btn btn-primary mb-3" href="{{ route('admin.posts.create') }}">New post</a>

        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->id) }}">SHOW</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" class="btn btn-danger" value="DELETE">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection