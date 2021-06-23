@extends('layouts.app')

@section('content')
<div class="container">
    {{-- EDIT --}}
    <div class="mb-1">
        <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
    </div>

    {{-- TITLE --}}
    <h1>Title: {{ $post->title }}</h1>


    {{-- CATEGORY --}}
    @if ($post->category)
        <div>
            <span class="mt-1">Category: </span>
            <div class="badge badge-success p-1">{{$post->category->name}}</div>
        </div>
    @endif
        
    {{-- TAGS --}}
    @if (count($post->tag) > 0)
    <div>
        <span>Tags:</span>
        @foreach ($post->tag as $tag)
        <div class="badge badge-primary p-1">
            {{ $tag->name }}
        </div>
        @endforeach
    </div>
    @endif
    
    

    <h6 class="mt-5">Content:</h6>
    <div >
        {{ $post->content }}
    </div>

</div>
@endsection