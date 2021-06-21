@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    @if ($post->category)
        <h4>Category: {{$post->category->name}}</h4>
    @endif
    
    <div class="mb-5 mt-2">
        <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
    </div>

    <div>{{ $post->content }}</div>

</div>
@endsection