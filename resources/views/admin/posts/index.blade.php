@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>POSTS</h1>

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
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection