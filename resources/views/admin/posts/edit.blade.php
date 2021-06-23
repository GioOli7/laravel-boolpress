@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit: {{ $post->title }}</h1>

    {{-- validation message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action=" {{ route('admin.posts.update', $post->id) }} " method="POST">

            @csrf
            @method('PATCH')

            <div class="mt-3" >
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{  $post->title }}">
            </div>
            
            <div class="mt-3">
                <label for="description">Content</label>
                <textarea class="form-control" name="content" id="content" cols="50" rows="6">{{  $post->content }}</textarea>
            </div>

            <div class="mt-3">
                <label for="category_id">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="">-- Select category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if($category->id == old('category_id', $post->category_id)) selected @endif
                            >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="feedback">{{ $message }}</div>
                @enderror
            </div>

            <h4 class="mb-2 mt-3">Tags</h4>
            {{-- @dd($post->tag) --}}
            <div>
                @foreach ($tags as $tag)
                    <span class="mr-3 d-inline-block">
                        <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value="{{ $tag->id }}"
                            @if ($errors->any() && in_array($tag->id, old('tags'))) 
                                checked 
                            @elseif (!$errors->any() && $post->tag->contains($tag->id))
                                checked
                            @endif
                        >
                        <label for="tag{{ $loop->iteration }}">
                            {{ $tag->name }}
                        </label>
                    </span>               
                @endforeach
                @error('tags')
                    <div>{{ $message }}</div>
                @enderror
            </div>


            <div class="mt-3">
                <button class="btn btn-primary" type="submit">INVIA</button>
            </div>

        </form>

</div>
@endsection