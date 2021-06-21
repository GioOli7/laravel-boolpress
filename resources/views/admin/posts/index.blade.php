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
                    <td>Category</td>
                    <td>Title</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            @if ($post->category)
                                {{$post->category->name}}
                            @endif
                        </td>
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

        {{-- get posts by category --}}
        <h2>Post by Category</h2>
        @foreach ($categories as $category)
            <h5 class="mt-4">{{ $category->name }}</h5>
            {{-- <span>{{  }}</span> --}}
            
            @forelse ($category->posts as $post)
                <div><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></div>
            @empty
                No posts found for this category. <a href="{{ route('admin.posts.create') }}">Create a new one</a> 
            @endforelse
         
        @endforeach
    </div>
@endsection